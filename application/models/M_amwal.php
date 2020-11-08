<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_amwal extends CI_Model {

	public function view_table(){
		$query = $this->db
		->from('form_member')
		->join('form_amwal', 'form_member.no_id=form_amwal.no_id')
		->order_by('bulan_amwal', 'DESC')
		->get();
        return $query;
	}

	public function view_amwal_table($id){
		$query = $this->db
		->from('form_member')
		->join('form_amwal', 'form_member.no_id=form_amwal.no_id')
		->where('form_member.no_id', $id)
		->order_by('bulan_amwal', 'DESC')
		->get();
        return $query;
	}

	public function view_amwal($id){
		$query = $this->db
		->from('form_member')
		// ->join('form_amwal', 'form_member.no_id=form_amwal.no_id', 'left')
		->where('form_member.no_id', $id)
		->get();
        return $query;
	}

	public function get_amwal($id, $bulan){
		$query = $this->db
		->from('form_amwal')
		->where('form_amwal.no_id', $id)
		->where('form_amwal.bulan_amwal', $bulan)
		->get();
        return $query;
	}

	public function insert_amwal($data)
	{
		$this->db->insert('form_amwal',$data);
	}

	public function edit_data_amwal($where,$table){		
		return $this->db->get_where($table,$where);
	}

	public function update_data_amwal($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_amwal($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	//DATATABLE SERVERSIDE
	var $table_amwal = 'form_amwal'; //nama tabel dari database
    var $column_order_amwal = array(null, 'form_amwal.no_id', 'nama', 'rt', 'bulan_amwal', 'mbi_amwal', 'in_amwal', 'zm_amwal', 'sh_amwal', 'ze_amwal', 'ln_amwal'); //field yang ada di table user
    var $column_search_amwal = array('form_amwal.no_id', 'nama', 'rt', 'bulan_amwal', 'mbi_amwal', 'in_amwal', 'zm_amwal', 'sh_amwal', 'ze_amwal', 'ln_amwal'); //field yang diizin untuk pencarian 
    var $order_amwal = array('bulan_amwal' => 'desc'); // default order 
    private function _get_datatables_query_amwal()
    {
        //add custom filter here
        if($this->input->post('tgl_amwal'))
        {
            $this->db->like('bulan_amwal', str_replace('_','', $this->input->post('tgl_amwal')));
        }
        if($this->input->post('nama_amwal'))
        {
            $this->db->like('nama', $this->input->post('nama_amwal'));
        }

        $this->db->from($this->table_amwal);
 
        $i = 0;
     
        foreach ($this->column_search_amwal as $item) // looping awal
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
 
                if(count($this->column_search_amwal) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order_amwal[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order_amwal))
        {
            $order = $this->order_amwal;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_daftar_amwal()
    {
        $this->_get_datatables_query_amwal();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
    	$this->db->join('form_member', 'form_member.no_id=form_amwal.no_id');
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_daftar_amwal()
    {
        $this->_get_datatables_query_amwal();
        $this->db->join('form_member', 'form_member.no_id=form_amwal.no_id');
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_daftar_amwal()
    {
        $this->db->from($this->table_amwal);
        $this->db->join('form_member', 'form_member.no_id=form_amwal.no_id');
        return $this->db->count_all_results();
    }

	
}