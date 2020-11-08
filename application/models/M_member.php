<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_member extends CI_Model {

	public function view_biodata(){
		$query = $this->db
		->from('form_member')
		->order_by('no', 'DESC')
		->get();
        return $query;
	}

	public function view_biodata_dtl($id){
		$query = $this->db
		->from('form_member')
		->join('pekerjaan', 'pekerjaan.id_pekerjaan=form_member.pekerjaan', 'LEFT')
		->where('form_member.no_id', $id)
		->get();
        return $query;
	}

	public function get_pekerjaan()
    {
        $query = $this->db
        ->order_by('id_pekerjaan', 'ASC')
        ->get('pekerjaan');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

	public function insert_biodata($data)
	{
		$this->db->insert('form_member',$data);
	}

	public function edit_data_biodata($where,$table){		
		return $this->db->get_where($table,$where);
	}

	public function update_data_biodata($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_biodata($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}


	//DATATABLE SERVERSIDE
	var $table_member = 'form_member'; //nama tabel dari database
    var $column_order_member = array(null, 'no_id','rt','pkl', 'nama', 'jenis_kelamin', 'no_telp', 'alamat'); //field yang ada di table user
    var $column_search_member = array('no_id','rt','pkl', 'nama', 'jenis_kelamin', 'no_telp', 'alamat'); //field yang diizin untuk pencarian 
    var $order_member = array('no' => 'desc'); // default order 
    private function _get_datatables_query_member()
    {
        //add custom filter here
        if($this->input->post('rt_member'))
        {
            $this->db->like('rt', $this->input->post('rt_member'));
        }
        if($this->input->post('nama_member'))
        {
            $this->db->like('nama', $this->input->post('nama_member'));
        }

        $this->db->from($this->table_member);
 
        $i = 0;
     
        foreach ($this->column_search_member as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                 
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search_member) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order_member[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order_member))
        {
            $order = $this->order_member;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_daftar_member()
    {
        $this->_get_datatables_query_member();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_daftar_member()
    {
        $this->_get_datatables_query_member();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_daftar_member()
    {
        $this->db->from($this->table_member);
        return $this->db->count_all_results();
    }

	
}