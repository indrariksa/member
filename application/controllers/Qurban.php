<?php 

class Qurban extends CI_Controller{

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
            
        $this->load->model('M_qurban');     
    }

    public function index(){
        $data['qurban'] = $this->M_qurban->view_table()->result();

        $this->load->view('pages/header');
        $this->load->view('pages/sidebar');
        $this->load->view('qurban/v_qurban', $data);
        $this->load->view('pages/footer');
    }

    function get_data_qurban()
    {   
        $list = $this->M_qurban->get_datatables_daftar_qurban();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<b><font color="red">'.$field->no_id.' | '.$field->nama.'</font></b>';
            $row[] = $field->rt;
            $row[] = date('d F Y', strtotime($field->tgl_qurban));
            $row[] = $field->jenis_qurban;
            $row[] = $field->kelas_qurban;
            // $row[] = $field->nominal_qurban;
            $row[] = 'Rp '.number_format($field->nominal_qurban,0,',','.'); 
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_qurban->count_all_daftar_qurban(),
            "recordsFiltered" => $this->M_qurban->count_filtered_daftar_qurban(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function form_qurban($id)
    {
        $data['formx'] = $this->M_qurban->view_qurban($id)->row();
        
        $this->load->view('pages/header');
        $this->load->view('pages/sidebar');
        $this->load->view('qurban/add_qurban', $data);
        $this->load->view('pages/footer');
    }

    public function insert_qurban()
    {   
        $id     = $this->input->post('no_id');
        $bulan  = $this->input->post('tgl_qurban');
        $row    = $this->M_qurban->get_qurban($id,$bulan)->row();
        $data   = array(
            'no_id'             => $this->input->post('no_id'),
            'tgl_qurban'        => $this->input->post('tgl_qurban'),
            'jenis_qurban'      => $this->input->post('jenis_qurban'),
            'kelas_qurban'      => $this->input->post('kelas_qurban'),
            'nominal_qurban'    => $this->input->post('nominal_qurban')
        );

        $this->M_qurban->insert_qurban($data);
        $this->session->set_flashdata('success','Data Berhasil ditambah');
        redirect('Amwal/get/'.$this->input->post('no_id'));
    }
}