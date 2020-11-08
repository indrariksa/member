<?php 

class Amwal extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if($_SESSION['level_id'] != 1)
        {
            $this->session->set_flashdata('error',"Halaman tidak dapat diakses.");
            redirect('Galat');
        }elseif (!$this->session->userdata('level_id')) {
            $this->session->set_flashdata('msg', ' ');
            redirect('Galat');
        }
            
        $this->load->model('M_amwal');
        $this->load->model('M_zakat_fitrah');  
        $this->load->model('M_qurban');     
    }

    public function index(){
        $data['amwal'] = $this->M_amwal->view_table()->result();

        $this->load->view('pages/header');
        $this->load->view('pages/sidebar');
        $this->load->view('amwal/v_amwal', $data);
        $this->load->view('pages/footer');
    }

    function get_data_amwal()
    {   
        $csrf_name = $this->security->get_csrf_token_name();
        $csrf_hash = $this->security->get_csrf_hash(); 
        $list = $this->M_amwal->get_datatables_daftar_amwal();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $jumlah = $field->in_amwal+$field->zm_amwal+$field->sh_amwal+$field->ze_amwal+$field->ln_amwal;
            $row = array();
            $row[] = $no;
            $row[] = '<b><font color="red">'.$field->no_id.' | '.$field->nama.'</font></b>';
            $row[] = $field->rt;
            $row[] = date('d F Y', strtotime($field->bulan_amwal));
            $row[] = $field->mbi_amwal;
            $row[] = 'Rp '.number_format($field->in_amwal,0,',','.'); 
            $row[] = 'Rp '.number_format($field->zm_amwal,0,',','.');
            $row[] = 'Rp '.number_format($field->sh_amwal,0,',','.');
            $row[] = 'Rp '.number_format($field->ze_amwal,0,',','.');
            $row[] = 'Rp '.number_format($field->ln_amwal,0,',','.'); 
            $row[] = 'Rp '.number_format($jumlah,0,',','.');   
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_amwal->count_all_daftar_amwal(),
            "recordsFiltered" => $this->M_amwal->count_filtered_daftar_amwal(),
            "data" => $data,
        );
        $output[$csrf_name] = $csrf_hash;
        //output dalam format JSON
        echo json_encode($output);
    }

    public function get($id){
        $data['amwal'] = $this->M_amwal->view_amwal_table($id)->result();
        $data['zakat_fitrah'] = $this->M_zakat_fitrah->view_zakat_fitrah_table($id)->result();
        $data['qurban'] = $this->M_qurban->view_qurban_table($id)->result();
        $data['formx'] = $this->M_amwal->view_amwal($id)->row();

        $this->load->view('pages/header');
        $this->load->view('pages/sidebar');
        $this->load->view('amwal/v_amwal_dtl', $data);
        $this->load->view('pages/footer');
    }

    public function form_amwal($id)
    {
        $data['formx'] = $this->M_amwal->view_amwal($id)->row();
        
        $this->load->view('pages/header');
        $this->load->view('pages/sidebar');
        $this->load->view('amwal/add_amwal', $data);
        $this->load->view('pages/footer');
    }

    public function insert_amwal()
    {   
        $id     = $this->input->post('no_id');
        $bulan  = $this->input->post('bulan_amwal');
        $row    = $this->M_amwal->get_amwal($id,$bulan)->row();
        if(date("m-Y", strtotime($row->bulan_amwal)) == date("m-Y", strtotime($bulan))) {
            $this->session->set_flashdata('gagal','Data Bulan yang diinputkan sudah ada');
            redirect('Amwal/get/'.$this->input->post('no_id'));
        } else {
        $data   = array(
            'no_id'             => $this->input->post('no_id'),
            'bulan_amwal'   => $this->input->post('bulan_amwal'),
            'mbi_amwal'     => $this->input->post('mbi_amwal'),
            'in_amwal'      => $this->input->post('in_amwal'),
            'zm_amwal'      => $this->input->post('zm_amwal'),
            'sh_amwal'      => $this->input->post('sh_amwal'),
            'ze_amwal'      => $this->input->post('ze_amwal'),
            'ln_amwal'      => $this->input->post('ln_amwal')
        );

        $this->M_amwal->insert_amwal($data);
        $this->session->set_flashdata('success','Data Berhasil ditambah');
        redirect('Amwal/get/'.$this->input->post('no_id'));
        }
    }
}