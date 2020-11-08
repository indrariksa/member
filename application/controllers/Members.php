<?php 

class Members extends CI_Controller{

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
            
        $this->load->model('M_member');   
    }

    public function index(){
        $data['form'] = $this->M_member->view_biodata()->result();

        $this->load->view('pages/header');
        $this->load->view('pages/sidebar');
        $this->load->view('member/v_member', $data);
        $this->load->view('pages/footer');
    }

    function get_data_member()
    {   
        $csrf_name = $this->security->get_csrf_token_name();
        $csrf_hash = $this->security->get_csrf_hash(); 
        $list = $this->M_member->get_datatables_daftar_member();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->no_id;
            $row[] = $field->nama;
            $row[] = $field->rt;
            $row[] = $field->pkl;

            // $row[] = '<center><a href="'.site_url('mahasiswa/form_set_undur_diri/'.$field->nisn).'" class="btn btn-danger btn-xs"><i class="fas fa-user-alt-slash text-warning"></i> Set Undur Diri</a></center>';

            $row[] = '<center>
                    <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">Pilihan </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="'.site_url('Members/detail/'.$field->no_id).'"> <i class="far fa-id-card"></i><span> Detail Biodata</span></a>
                      <a class="dropdown-item" href="'.site_url('Amwal/get/'.$field->no_id).'"> <i class="fas fa-archive"></i><span> Detail Amwal</span></a>
                      <a class="dropdown-item" href="'.site_url('Members/update_biodata/'.$field->no_id).'"> <i class="fas fa-edit"></i><span> Ubah</span></a>
                      <a class="dropdown-item" href="'.site_url('Members/delete_biodata/'.$field->no_id).'" onclick="javasciprt: return confirm(\'Apakah anda yakin?\')"><i class="fas fa-trash"></i><span> Hapus</span></a>
                    </div>
                    </div>
                    </center>';
            
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_member->count_all_daftar_member(),
            "recordsFiltered" => $this->M_member->count_filtered_daftar_member(),
            "data" => $data,
        );
        $output[$csrf_name] = $csrf_hash;
        
        //output dalam format JSON
        echo json_encode($output);
    }

    public function detail($id){
        $data['form'] = $this->M_member->view_biodata_dtl($id)->result();

        $this->load->view('pages/header');
        $this->load->view('pages/sidebar');
        $this->load->view('member/v_member_dtl', $data);
        $this->load->view('pages/footer');
    }

    public function insert_biodata()
    {
        $this->form_validation->set_rules('no_id_member','ID', 'is_unique[form_member.no_id]');
        // $this->form_validation->set_rules('deskripsi_level','Deskripsi', 'min_length[5]');

        // $this->form_validation->set_message('min_length', '%s minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '%s sudah ada, silahkan ganti');
        $data['data_pekerjaan']     = $this->M_member->get_pekerjaan();
        $data['status']             = set_value('status');

        
        if ($this->form_validation->run() == FALSE) {
        $this->load->view('pages/header');
        $this->load->view('pages/sidebar');
        $this->load->view('member/add_member', $data);
        $this->load->view('pages/footer');
        }else{
        $dateOfBirth = $this->input->post('tanggal_lahir');
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        $insert = array(
            'no_id'             => $this->input->post('no_id_member'),
            'rt'                => $this->input->post('rt'),
            'pkl'               => $this->input->post('pkl'),
            'nama'              => $this->input->post('nama'),
            'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
            'no_telp'           => str_replace('_','', $this->input->post('no_telp')),
            'alamat'            => $this->input->post('alamat'),
            'status'            => $this->input->post('status'),
            'nama_pasangan'     => $this->input->post('nama_pasangan'),
            'pendidikan'        => $this->input->post('pendidikan'),
            'pekerjaan'         => $this->input->post('pekerjaan'),
            'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
            'usia'              => $diff->format('%y'),
            'tanggal_daftar'    => $this->input->post('tanggal_daftar'),
            'sgm'               => $this->input->post('sgm'),
            'sl_cs'             => $this->input->post('sl_cs')
        );

        $this->M_member->insert_biodata($insert);
        $this->session->set_flashdata('success','Data Berhasil ditambah');
        
        redirect('Members');
    }
    }

    public function update_biodata($ID){

        $where = array('no_id' => $ID);
        
        $data['data_pekerjaan']=$this->M_member->get_pekerjaan();
        $data['biodata'] = $this->M_member->edit_data_biodata($where,'form_member')->result();

        $this->form_validation->set_rules('no_id','ID', 'min_length[2]');

        $this->form_validation->set_message('min_length', '%s minimal 2 karakter');
        
        if ($this->form_validation->run() == FALSE) {

        $this->load->view('pages/header');
        $this->load->view('pages/sidebar');
        $this->load->view('member/edit_member', $data);
        $this->load->view('pages/footer');
        }else{
        $dateOfBirth = $this->input->post('tanggal_lahir');
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        $data = array(
            'no_id'             => $this->input->post('no_id'),
            'rt'                => $this->input->post('rt'),
            'pkl'               => $this->input->post('pkl'),
            'nama'              => $this->input->post('nama'),
            'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
            'no_telp'           => str_replace('_','', $this->input->post('no_telp')),
            'alamat'            => $this->input->post('alamat'),
            'status'            => $this->input->post('status'),
            'pendidikan'        => $this->input->post('pendidikan'),
            'pekerjaan'         => $this->input->post('pekerjaan'),
            'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
            'usia'              => $diff->format('%y'),
            'tanggal_daftar'    => $this->input->post('tanggal_daftar'),
            // 'umur'              => $this->input->post('umur'),
            'sgm'               => $this->input->post('sgm'),
            'sl_cs'             => $this->input->post('sl_cs')
        );
        if ($this->input->post('status')=="belum") {
            $data['nama_pasangan'] = NULL;
        } else {
            $data['nama_pasangan'] = $this->input->post('nama_pasangan');
        }
        
        $this->M_member->update_data_biodata($where,$data,'form_member');
        $this->session->set_flashdata('success','Data Berhasil diubah');
        redirect('Members');
        }
        }

    public function delete_biodata($id){
        $where = array('no_id' => $id);

        $this->M_member->hapus_biodata($where,'form_member');
        $this->session->set_flashdata('success','Data Berhasil dihapus');
        redirect('Members');
    }
}