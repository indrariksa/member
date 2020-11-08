<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

    public $table = 'mahasiswa_baru';
    public $table_temp = 'mahasiswa_baru_temp';
    public $table2 = 'pendaftaran';
    public $table3 = 'log_va';
    public $table_gel = 'jadwal_gelombang';
    public $table_biaya = 'biaya';
    public $id = 'id';
    public $nisn = 'nisn';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    public function view_mahasiswa(){
        $query = $this->db
        ->from('mahasiswa_baru')
        ->join('wilayah_provinsi', 'wilayah_provinsi.id_provinsi=mahasiswa_baru.provinsi', 'left')
        ->join('wilayah_kabupaten', 'wilayah_kabupaten.id_kabupaten=mahasiswa_baru.kota', 'left')
        ->join('wilayah_kecamatan', 'wilayah_kecamatan.id_kecamatan=mahasiswa_baru.kecamatan', 'left')
        ->join('wilayah_desa', 'wilayah_desa.id_kelurahan=mahasiswa_baru.kelurahan', 'left')
        ->like('perguruan_tinggi', 'POLTEKPOS')
        ->like('status_kelulusan', 0) 
        ->get()->result();
        return $query;

    }

    //get sebagian data pendaftar
    public function hitungPendaftar(){  
    $query = $this->db
    ->get('pendaftaran');
    return $query->num_rows();
    }

    public function hitungPendaftarLaki(){  
    $query = $this->db
    ->where('jk_mhs', 'Laki-Laki')
    ->get('pendaftaran');
    return $query->num_rows();
    }

    public function hitungPendaftarPerempuan(){  
    $query = $this->db
    ->where('jk_mhs', 'Perempuan')
    ->get('pendaftaran');
    return $query->num_rows();
    }

    public function hitungSudahBayar(){  
    $query = $this->db
    ->where('status', 'sudah')
    ->get('pendaftaran');
    return $query->num_rows();
    }

    public function hitungBelumBayar(){  
    $query = $this->db
    ->where('status', 'belum')
    ->get('pendaftaran');
    return $query->num_rows();
    }

    public function hitungPendaftarReguler(){  
    $query = $this->db
    ->where('jalur_pendaftaran', 'reguler')
    ->get('pendaftaran');
    return $query->num_rows();
    }

    public function hitungPendaftarMandiri(){  
    $query = $this->db
    ->where('jalur_pendaftaran', 'mandiri')
    ->get('pendaftaran');
    return $query->num_rows();
    }

    public function hitungPendaftarPmdk(){  
    $query = $this->db
    ->where('jalur_pendaftaran', 'pmdk')
    ->get('pendaftaran');
    return $query->num_rows();
    }

    public function hitungPendaftarUndangan(){  
    $query = $this->db
    ->where('jalur_pendaftaran', 'undangan')
    ->get('pendaftaran');
    return $query->num_rows();
    }

    public function hitungPendaftarBeasiswa(){  
    $query = $this->db
    ->where('jalur_pendaftaran', 'beasiswa')
    ->get('pendaftaran');
    return $query->num_rows();
    }

    //get sebagian data calon mahasiswa
    public function hitungMhs(){  
    $query = $this->db
    ->where('tahun', '2020/2021')
    ->get('mahasiswa_baru');
    return $query->num_rows();
    }

    public function hitungMhsLaki(){  
    $query = $this->db
    ->where('tahun', '2020/2021')
    ->where('jenis_kelamin', 'Laki-Laki')
    ->get('mahasiswa_baru');
    return $query->num_rows();
    }

    public function hitungMhsPerempuan(){  
    $query = $this->db
    ->where('tahun', '2020/2021')
    ->where('jenis_kelamin', 'Perempuan')
    ->get('mahasiswa_baru');
    return $query->num_rows();
    }

    public function hitungMhsReguler(){  
    $query = $this->db
    ->where('tahun', '2020/2021')
    ->where('jalur', 'reguler')
    ->get('mahasiswa_baru');
    return $query->num_rows();
    }

    public function hitungMhsMandiri(){  
    $query = $this->db
    ->where('tahun', '2020/2021')
    ->where('jalur', 'mandiri')
    ->get('mahasiswa_baru');
    return $query->num_rows();
    }

    public function hitungMhsPmdk(){  
    $query = $this->db
    ->where('tahun', '2020/2021')
    ->where('jalur', 'pmdk')
    ->get('mahasiswa_baru');
    return $query->num_rows();
    }

    public function hitungMhsUndangan(){  
    $query = $this->db
    ->where('tahun', '2020/2021')
    ->where('jalur', 'undangan')
    ->get('mahasiswa_baru');
    return $query->num_rows();
    }

    public function hitungMhsBeasiswa(){  
    $query = $this->db
    ->where('tahun', '2020/2021')
    ->where('jalur', 'beasiswa')
    ->get('mahasiswa_baru');
    return $query->num_rows();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_by_id_nisn($nisn)
    {
        $this->db->where($this->nisn, $nisn);
        return $this->db->get($this->table)->row();
    }

    function get_by_id_nisn2($nisn)
    {
        $this->db
        ->join('pendaftaran', 'pendaftaran.nisn_mhs=mahasiswa_baru.nisn')
        ->where('mahasiswa_baru.nisn', $nisn);
        return $this->db->get($this->table)->row();
    }

    function get_by_id_nisn_temp($nisn)
    {
        $this->db->where($this->nisn, $nisn);
        $this->db->join('wilayah_desa', 'wilayah_desa.id_kelurahan=mahasiswa_baru_temp.kelurahan');
        return $this->db->get($this->table_temp)->row();
    }

    function get_biaya_her($prodi1)
    {
        $this->db->where('prodi_kode', $prodi1); 

        $query = $this->db->get($this->table_biaya)->row();

        return $query;  
    }

    function get_jadwal_gelombang1()
    {
        $this->db->where('nama_gelombang', '1'); 

        $query = $this->db->get($this->table_gel)->row();

        return $query;  
    }

    function get_jadwal_gelombang2()
    {
        $this->db->where('nama_gelombang', '2');
        $query = $this->db->get($this->table_gel)->row();

        return $query;
    }

    function get_jadwal_gelombang3()
    {
        $this->db->where('nama_gelombang', '3');
        $query = $this->db->get($this->table_gel)->row();

        return $query;
    }

    // function get_by_nisn($id)
    // {
    //     $this->db->where('nisn', $id);
    //     return $this->db->get($this->table)->row();
    // }

    // get data by NISN
    function get_by_nisn($nisn)
    {
        $this->db
        ->join('program_studi', 'program_studi.kode_program_studi=mahasiswa_baru.program_studi_1')
        ->join('pendaftaran', 'pendaftaran.nisn_mhs=mahasiswa_baru.nisn')
        ->join('log_va', 'log_va.nisn=mahasiswa_baru.nisn','left')
        ->join('wilayah_provinsi', 'wilayah_provinsi.id_provinsi=mahasiswa_baru.provinsi', 'left')
        ->join('wilayah_kabupaten', 'wilayah_kabupaten.id_kabupaten=mahasiswa_baru.kota', 'left')
        ->join('wilayah_kecamatan', 'wilayah_kecamatan.id_kecamatan=mahasiswa_baru.kecamatan', 'left')
        ->join('wilayah_desa', 'wilayah_desa.id_kelurahan=mahasiswa_baru.kelurahan', 'left')
        ->where('mahasiswa_baru.nisn', $nisn)
        ->order_by('log_va.tgl_create', 'DESC');
        return $this->db->get($this->table)->row();
    }

    function get_by_nisn_her($nisn)
    {
        $this->db
        ->select('program_studi.*, log_va.trx_id as x_trx, log_va.virtual_account as x_va, log_va.trx_amount as x_amount, log_va.jenis_bayar, log_va.tgl_expired_va, log_va.status_bayar, payment_notification.*, payment_notification_dtl.*, mahasiswa_baru.*')
        ->join('program_studi', 'program_studi.kode_program_studi=mahasiswa_baru.program_studi_1')
        // ->join('pendaftaran', 'pendaftaran.nisn_mhs=mahasiswa_baru.nisn')
        ->join('log_va', 'log_va.nisn=mahasiswa_baru.nisn','left')
        ->join('payment_notification', 'payment_notification.trx_id=log_va.trx_id','left')
        ->join('payment_notification_dtl', 'payment_notification_dtl.trx_id_dtl=payment_notification.trx_id','left')
        ->where('mahasiswa_baru.nisn', $nisn)
        ->order_by('log_va.tgl_create', 'DESC');
        // ->where('log_va.jenis_bayar', 'HER-REGISTRASI');
        return $this->db->get($this->table)->row();
    }

    function get_by_nisn_daftar($nisn)
    {
        $this->db->where('nisn_mhs', $nisn);
        return $this->db->get($this->table2)->row();
    }

    public function get_provinsi()
    {
        $query = $this->db->get('wilayah_provinsi');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function get_kabupaten()
    {
        $query = $this->db->get('wilayah_kabupaten');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function get_kecamatan()
    {
        $query = $this->db->get('wilayah_kecamatan');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function get_kelurahan()
    {
        $query = $this->db->get('wilayah_desa');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function get_kabupaten_query($id_provinsi)
    {
        $query = $this->db
        ->get_where('wilayah_kabupaten', array('id_provinsi' => $id_provinsi));
        return $query->result();
    }

    public function get_kecamatan_query($id_kabupaten)
    {
        $query = $this->db
        ->get_where('wilayah_kecamatan', array('id_kabupaten' => $id_kabupaten));
        return $query->result();
    }

    public function get_kelurahan_query($id_kecamatan)
    {
        $query = $this->db
        ->get_where('wilayah_desa', array('id_kecamatan' => $id_kecamatan));
        return $query->result();
    }

    public function ceknomor($prodi)
    {
        // $query = $this->db->query("SELECT npm from mahasiswa_baru WHERE program_studi_1='$prodi' ORDER BY npm DESC");
        $this->db
        ->join('program_studi', 'program_studi.kode_program_studi=mahasiswa_baru.program_studi_1')
        ->where('program_studi_1', $prodi)
        ->order_by('npm', 'DESC');
        return $this->db->get($this->table)->row();
        // $hasil = $query->row();
        // return $hasil->npmmhs;
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
    $this->db->or_like('jalur', $q);
    $this->db->or_like('lokasi_usm', $q);
    $this->db->or_like('program_studi', $q);
    $this->db->or_like('nama_lengkap', $q);
    $this->db->or_like('nisn', $q);
    $this->db->or_like('ttl', $q);
    $this->db->or_like('agama', $q);
    $this->db->or_like('alamat', $q);
    $this->db->or_like('telephone', $q);
    $this->db->or_like('email', $q);
    $this->db->or_like('nama_orang_tua_Wali', $q);
    $this->db->or_like('pekerjaan_orang_tua_Wali', $q);
    $this->db->or_like('alamat_orang_tua_Wali', $q);
    $this->db->or_like('penghasilan_orang_tua_Wali', $q);
    $this->db->or_like('asal_sekolah', $q);
    $this->db->or_like('alamat_sekolah', $q);
    $this->db->or_like('jurusan', $q);
    $this->db->or_like('tanggal_daftar', $q);
    $this->db->or_like('nilai', $q);
    $this->db->or_like('surat_undangan', $q);
    $this->db->or_like('raport_semester_3', $q);
    $this->db->or_like('raport_semester_4', $q);
    $this->db->or_like('raport_semester_5', $q);
    $this->db->or_like('photo', $q);
    $this->db->or_like('jenis_prestasi', $q);
    $this->db->or_like('bukti_pembayaran', $q);
    $this->db->or_like('bukti_pembayaran_semester_1', $q);
    $this->db->or_like('guru_bk', $q);
    $this->db->or_like('hp_guru_bk', $q);
    $this->db->or_like('tanggal_input', $q);
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('jalur', $q);
	$this->db->or_like('lokasi_usm', $q);
	$this->db->or_like('program_studi', $q);
	$this->db->or_like('nama_lengkap', $q);
	$this->db->or_like('nisn', $q);
	$this->db->or_like('ttl', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('telephone', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('nama_orang_tua_Wali', $q);
	$this->db->or_like('pekerjaan_orang_tua_Wali', $q);
	$this->db->or_like('alamat_orang_tua_Wali', $q);
	$this->db->or_like('penghasilan_orang_tua_Wali', $q);
	$this->db->or_like('asal_sekolah', $q);
	$this->db->or_like('alamat_sekolah', $q);
	$this->db->or_like('jurusan', $q);
	$this->db->or_like('tanggal_daftar', $q);
	$this->db->or_like('nilai', $q);
	$this->db->or_like('surat_undangan', $q);
	$this->db->or_like('raport_semester_3', $q);
	$this->db->or_like('raport_semester_4', $q);
	$this->db->or_like('raport_semester_5', $q);
	$this->db->or_like('photo', $q);
	$this->db->or_like('jenis_prestasi', $q);
	$this->db->or_like('bukti_pembayaran', $q);
	$this->db->or_like('bukti_pembayaran_semester_1', $q);
	$this->db->or_like('guru_bk', $q);
	$this->db->or_like('hp_guru_bk', $q);
	$this->db->or_like('tanggal_input', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function insert_data_diri($data)
    {
        $this->db->insert($this->table_temp, $data);
    }

    function insert_daftar($data)
    {
        $this->db->insert($this->table2, $data);
    }

    function insert_log($data)
    {
        $this->db->insert($this->table3, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function update_temp($nisn, $data)
    {
        $this->db->where($this->nisn, $nisn);
        $this->db->update($this->table_temp, $data);
    }

    // update data
    function update_by_nisn($nisn, $data)
    {
        $this->db->where('nisn', $nisn);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function delete_temp($nisn)
    {
        $this->db->where($this->nisn, $nisn);
        $this->db->delete($this->table_temp);
    }

}

/* End of file Mahasiswa_model.php */
/* Location: ./application/models/Mahasiswa_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-11-06 01:02:00 */
/* http://harviacode.com */