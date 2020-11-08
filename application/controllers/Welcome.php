<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

class Welcome extends CI_Controller {

	function __construct(){
        parent::__construct();     

        if(!$_SESSION['level_id'])
        {
            $this->session->set_flashdata('error',"Halaman tidak dapat diakses.");
            redirect('Galat');
        }

        $this->load->model('Mahasiswa_model');
        $this->load->helper(array('url','form'));   
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');

    }

	public function index(){
		
		$this->load->view('pages/header');
		$this->load->view('pages/sidebar');
		$this->load->view('pages/home/dashboard');
		$this->load->view('pages/footer');
	}

	public function mahasiswa()
	{
		$perguruan_tinggi = "POLTEKPOS";

		// $q = urldecode($this->input->get('q', TRUE));
		// $start = intval($this->input->get('start'));

		// if ($q <> '') {
		// 	$config['base_url'] = base_url() . 'index.php/mahasiswa/?q=' . urlencode($q);
		// 	$config['first_url'] = base_url() . 'index.php/mahasiswa/?q=' . urlencode($q);
		// } else {
		// 	$config['base_url'] = base_url() . 'index.php/mahasiswa';
		// 	$config['first_url'] = base_url() . 'index.php/mahasiswa';
		// }

		// $tahun = urldecode($this->input->get('tahun', TRUE));
		// $jalur = urldecode($this->input->get('jalur', TRUE));
		// $program_studi = urldecode($this->input->get('program_studi', TRUE));
		// $jenis_kelamin = urldecode($this->input->get('jenis_kelamin', TRUE));
		// $asal_sekolah = urldecode($this->input->get('asal_sekolah', TRUE));
		// $kota = urldecode($this->input->get('kota', TRUE));
		// $provinsi = urldecode($this->input->get('provinsi', TRUE));


		// $search = array();

		// if ($tahun != "" || $jalur != "" || $program_studi != "" || $jenis_kelamin != "" || $asal_sekolah != "" || $kota != "" || $provinsi != ""){
		// 	$search = array(
		// 		'tahun' => $tahun,
		// 		'jalur' => $jalur,
		// 		'program_studi' => $program_studi,
		// 		'jenis_kelamin' => $jenis_kelamin,
		// 		'asal_sekolah' => $asal_sekolah,
		// 		'kota' => $kota,
		// 		'provinsi' => $provinsi
		// 		);
		// }

		// $config['per_page'] = 10;
		// $config['page_query_string'] = TRUE;
		// if ($this->input->post('tahun_post')==""){
		// $config['total_rows'] = $this->Mahasiswa_model->total_rows($q, $perguruan_tinggi, $search);
		// $mahasiswa = $this->Mahasiswa_model->get_limit_data($config['per_page'], $start, $q, $perguruan_tinggi, $search);
		// } elseif ($this->input->post('tahun_post')=="2019/2020"){	
		// $config['total_rows'] = $this->Mahasiswa_model->total_rows_2019_2020($q, $perguruan_tinggi, $search);
		// $mahasiswa = $this->Mahasiswa_model->get_limit_data_2019_2020($config['per_page'], $start, $q, $perguruan_tinggi, $search);
		// } elseif ($this->input->post('tahun_post')=="2020/2021"){	
		// $config['total_rows'] = $this->Mahasiswa_model->total_rows_2020_2021($q, $perguruan_tinggi, $search);
		// $mahasiswa = $this->Mahasiswa_model->get_limit_data_2020_2021($config['per_page'], $start, $q, $perguruan_tinggi, $search);
		// } else {
		// $config['total_rows'] = $this->Mahasiswa_model->total_rows($q, $perguruan_tinggi, $search);
		// $mahasiswa = $this->Mahasiswa_model->get_limit_data($config['per_page'], $start, $q, $perguruan_tinggi, $search);
		// }

		// $this->load->library('pagination');
		// $this->pagination->initialize($config);		

		// $data = array(
		// 	// 'mahasiswa_data' => $mahasiswa,
		// 	// 'q' => $q,
		// 	// 'pagination' => $this->pagination->create_links(),
		// 	// 'total_rows' => $config['total_rows'],
		// 	// 'start' => $start,
		// 	// 'perguruan_tinggi' => $perguruan_tinggi,
		// 	'tahun' => $tahun,
		// 	'jalur' => $jalur,
		// 	'program_studi' => $program_studi,
		// 	'jenis_kelamin' => $jenis_kelamin,
		// 	'asal_sekolah' => $asal_sekolah,
		// 	'kota' => $kota,
		// 	'provinsi' => $provinsi,
		// 	'tahun_post' => $this->input->post('tahun_post'),
		// 	);

		$data['jml_mhs']    		= $this->Mahasiswa_model->hitungMhs();
		$data['jml_mhs_laki']    	= $this->Mahasiswa_model->hitungMhsLaki();
		$data['jml_mhs_perempuan']  = $this->Mahasiswa_model->hitungMhsPerempuan();

		$data['jml_mhs_reguler']    = $this->Mahasiswa_model->hitungMhsReguler();
		$data['jml_mhs_mandiri']    = $this->Mahasiswa_model->hitungMhsMandiri();
		$data['jml_mhs_pmdk']    	= $this->Mahasiswa_model->hitungMhsPmdk();
		$data['jml_mhs_undangan']   = $this->Mahasiswa_model->hitungMhsUndangan();
		$data['jml_mhs_beasiswa']   = $this->Mahasiswa_model->hitungMhsBeasiswa();

		$data['mahasiswa_data'] = $this->Mahasiswa_model->view_mahasiswa();
		
		$this->load->view('pages/header');
		$this->load->view('pages/sidebar');
		$this->load->view('mahasiswa/data', $data);
		$this->load->view('pages/footer');

		// $data['content'] = $this->load->view('mahasiswa_baru/mahasiswa_baru_list', $data, true);
		// $this->load->view('page', $data);

	}

	public function read()
    {
        $id = "89175861276";
        $this->db->where('nisn',$id);
        $q = $this->db->get('mahasiswa_baru');

        if ( $q->num_rows() <= 0 ) 
        {
            $row = $this->Mahasiswa_model->get_by_nisn_daftar($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama_mhs' => $row->nama_mhs,
                'nisn_mhs' => $row->nisn_mhs,
                'jk_mhs' => $row->jk_mhs,
                'email_mhs' => $row->email_mhs,
                'hp_mhs' => $row->hp_mhs,
                'perguruan_tinggi' => $row->perguruan_tinggi,
                'jalur' => $row->jalur_pendaftaran
                );

            // $data['content'] = $this->load->view('app/dashboard', $data, true);
            // $this->load->view('page', $data);
            $this->load->view('pages/header');
			$this->load->view('pages/sidebar');
			$this->load->view('app/dashboard', $data);
			$this->load->view('pages/footer');
        }
        } else {

        $row = $this->Mahasiswa_model->get_by_nisn($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'perguruan_tinggi' => $row->perguruan_tinggi,
                'jalur' => $row->jalur,
                'tahun' => $row->tahun,
                'nomor_ujian' => $row->nomor_ujian,
                'gelombang' => $row->gelombang,
                'tgl_usm' => $row->tgl_usm,
                'program_studi_1' => $row->program_studi_1,
                'program_studi_2' => $row->program_studi_2,
                'program_studi_3' => $row->program_studi_3,
                'nama_lengkap' => $row->nama_lengkap,
                'jenis_kelamin' => $row->jenis_kelamin,
                'nisn' => $row->nisn,
                'ttl' => $row->ttl,
                'agama' => $row->agama,
                'alamat' => $row->alamat,
                'kota' => $row->kota,
                'provinsi' => $row->provinsi,
                'kode_pos' => $row->kode_pos,
                'telephone' => $row->telephone,
                'whatsapp' => $row->whatsapp,
                'email' => $row->email,
                'nama_ayah_kandung' => $row->nama_ayah_kandung,
                'hp_ayah_kandung' => $row->hp_ayah_kandung,
                'nama_ibu_kandung' => $row->nama_ibu_kandung,
                'hp_ibu_kandung' => $row->hp_ibu_kandung,
                'pekerjaan_orang_tua_wali' => $row->pekerjaan_orang_tua_wali,
                'alamat_orang_tua_wali' => $row->alamat_orang_tua_wali,
                'penghasilan_orang_tua_wali' => $row->penghasilan_orang_tua_wali,
                'asal_sekolah' => $row->asal_sekolah,
                'alamat_sekolah' => $row->alamat_sekolah,
                'kota_sekolah' => $row->kota_sekolah,
                'provinsi_sekolah' => $row->provinsi_sekolah,
                'kode_pos_sekolah' => $row->kode_pos_sekolah,
                'jurusan' => $row->jurusan,
                'tanggal_daftar' => $row->tanggal_daftar,
                'nilai' => $row->nilai,
                'surat_undangan' => $row->surat_undangan,
                'surat_kelulusan' => $row->surat_kelulusan,
                'raport_semester_1' => $row->raport_semester_1,
                'raport_semester_2' => $row->raport_semester_2,
                'raport_semester_3' => $row->raport_semester_3,
                'raport_semester_4' => $row->raport_semester_4,
                'raport_semester_5' => $row->raport_semester_5,
                'photo' => $row->photo,
                'jenis_prestasi' => $row->jenis_prestasi,
                'surat_rekomendasi_sekolah'=> $row->surat_rekomendasi_sekolah,
                'bukti_pembayaran' => $row->bukti_pembayaran,
                'bukti_pembayaran_semester_1' => $row->bukti_pembayaran_semester_1,
                'guru_bk' => $row->guru_bk,
                'hp_guru_bk' => $row->hp_guru_bk,
                'tanggal_input' => $row->tanggal_input,
                'status_kelulusan' => $row->status_kelulusan,
                'send_email_kartu_ujian' => $row->send_email_kartu_ujian,

                'nama_penyetor' => $row->nama_penyetor,
                'nominal_yang_disetor' => $row->nominal_yang_disetor,
                'tanggal_penyetoran' => $row->tanggal_penyetoran,

                'surat_pernyataan_registrasi_1' => $row->surat_pernyataan_registrasi_1,
                'surat_pernyataan_registrasi_2' => $row->surat_pernyataan_registrasi_2,
                'surat_pernyataan_registrasi_3' => $row->surat_pernyataan_registrasi_3,
                'ijazah_sttb' => $row->ijazah_sttb,
                'ktp' => $row->ktp,
                'skhun' => $row->skhun,
                'surat_kelakuan_baik' => $row->surat_kelakuan_baik,
                'surat_keterangan_bebas_narkoba' => $row->surat_keterangan_bebas_narkoba,
                'pas_foto_terbaru' => $row->pas_foto_terbaru,
                'akta_kelahiran' => $row->akta_kelahiran,
                'surat_keterangan_kepegawaian_pos' => $row->surat_keterangan_kepegawaian_pos,
                'kartu_keluarga' => $row->kartu_keluarga,
                'ukuran_jaket_almamater' => $row->ukuran_jaket_almamater,
                'ukuran_sepatu' => $row->ukuran_sepatu
                );

            // $data['content'] = $this->load->view('app/dashboard', $data, true);
            // $this->load->view('page', $data);

            $this->load->view('pages/header');
			$this->load->view('pages/sidebar');
			$this->load->view('app/dashboard', $data, true);
			$this->load->view('pages/footer');
        }
    }
    }

	public function table(){
		
		$this->load->view('pages/header');
		$this->load->view('pages/sidebar');
		$this->load->view('pages/tables/table');
		$this->load->view('pages/footer');
	}
}
