<?php 

class Zakat_fitrah extends CI_Controller{

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
            
        $this->load->model('M_zakat_fitrah');  
    }

    public function index(){
        $data['zakat_fitrah'] = $this->M_zakat_fitrah->view_table()->result();

        $this->load->view('pages/header');
        $this->load->view('pages/sidebar');
        $this->load->view('zakat_fitrah/v_zakat_fitrah', $data);
        $this->load->view('pages/footer');
    }

    function get_data_zakat_fitrah()
    {   
        $list = $this->M_zakat_fitrah->get_datatables_daftar_zakat_fitrah();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<b><font color="red">'.$field->no_id.' | '.$field->nama.'</font></b>';
            $row[] = $field->rt;
            $row[] = date('d F Y', strtotime($field->tgl_zakat_fitrah));
            $row[] = $field->status_zakat_fitrah;
            $row[] = $field->muzaki_zakat_fitrah;
            $row[] = 'Rp '.number_format($field->nominal_zakat_fitrah,0,',','.'); 
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_zakat_fitrah->count_all_daftar_zakat_fitrah(),
            "recordsFiltered" => $this->M_zakat_fitrah->count_filtered_daftar_zakat_fitrah(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function form_zakat_fitrah($id)
    {
        $data['formx'] = $this->M_zakat_fitrah->view_zakat_fitrah($id)->row();
        
        $this->load->view('pages/header');
        $this->load->view('pages/sidebar');
        $this->load->view('zakat_fitrah/add_zakat_fitrah', $data);
        $this->load->view('pages/footer');
    }

    public function insert_zakat_fitrah()
    {   
        $id     = $this->input->post('no_id');
        $bulan  = $this->input->post('tgl_zakat_fitrah');
        $row    = $this->M_zakat_fitrah->get_zakat_fitrah($id,$bulan)->row();
        // if(date("m-Y", strtotime($row->tgl_zakat_fitrah)) == date("m-Y", strtotime($bulan))) {
        //     $this->session->set_flashdata('gagal','Data Bulan yang diinputkan sudah ada');
        //     redirect('Amwal/get/'.$this->input->post('no_id'));
        // } else {
        $data   = array(
            'no_id'                 => $this->input->post('no_id'),
            'tgl_zakat_fitrah'      => $this->input->post('tgl_zakat_fitrah'),
            'status_zakat_fitrah'   => $this->input->post('status_zakat_fitrah'),
            'muzaki_zakat_fitrah'   => $this->input->post('muzaki_zakat_fitrah'),
            'nominal_zakat_fitrah'  => $this->input->post('nominal_zakat_fitrah')
        );

        $this->M_zakat_fitrah->insert_zakat_fitrah($data);
        $this->session->set_flashdata('success','Data Berhasil ditambah');
        redirect('Amwal/get/'.$this->input->post('no_id'));
        // }
    }
}