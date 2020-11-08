<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_zakat_fitrah extends CI_Model {

	public function view_table(){
		$query = $this->db
		->from('form_member')
		->join('form_zakat_fitrah', 'form_member.no_id=form_zakat_fitrah.no_id')
		->order_by('tgl_zakat_fitrah', 'DESC')
		->get();
        return $query;
	}

	public function view_zakat_fitrah_table($id){
		$query = $this->db
		->from('form_member')
		->join('form_zakat_fitrah', 'form_member.no_id=form_zakat_fitrah.no_id')
		->where('form_member.no_id', $id)
		->order_by('tgl_zakat_fitrah', 'DESC')
		->get();
        return $query;
	}

	public function view_zakat_fitrah($id){
		$query = $this->db
		->from('form_member')
		// ->join('form_zakat_fitrah', 'form_member.no_id=form_zakat_fitrah.no_id', 'left')
		->where('form_member.no_id', $id)
		->get();
        return $query;
	}

	public function get_zakat_fitrah($id, $tgl){
		$query = $this->db
		->from('form_zakat_fitrah')
		->where('form_zakat_fitrah.no_id', $id)
		->where('form_zakat_fitrah.tgl_zakat_fitrah', $tgl)
		->get();
        return $query;
	}

	public function insert_zakat_fitrah($data)
	{
		$this->db->insert('form_zakat_fitrah',$data);
	}

	public function edit_data_zakat_fitrah($where,$table){		
		return $this->db->get_where($table,$where);
	}

	public function update_data_zakat_fitrah($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_zakat_fitrah($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	//DATATABLE SERVERSIDE
	var $table_zakat_fitrah = 'form_zakat_fitrah'; //nama tabel dari database
    var $column_order_zakat_fitrah = array(null, 'form_zakat_fitrah.no_id', 'nama','rt','tgl_zakat_fitrah', 'status_zakat_fitrah', 'muzaki_zakat_fitrah', 'nominal_zakat_fitrah'); //field yang ada di table user
    var $column_search_zakat_fitrah = array('form_zakat_fitrah.no_id', 'nama','rt','tgl_zakat_fitrah', 'status_zakat_fitrah', 'muzaki_zakat_fitrah', 'nominal_zakat_fitrah'); //field yang diizin untuk pencarian 
    var $order_zakat_fitrah = array('tgl_zakat_fitrah' => 'desc'); // default order 
    private function _get_datatables_query_zakat_fitrah()
    {
        //add custom filter here
        if($this->input->post('tgl_zakat_fitrah'))
        {
            $this->db->like('tgl_zakat_fitrah', str_replace('_','', $this->input->post('tgl_zakat_fitrah')));
        }
        if($this->input->post('nama_zakat_fitrah'))
        {
            $this->db->like('nama', $this->input->post('nama_zakat_fitrah'));
        }

        $this->db->from($this->table_zakat_fitrah);
 
        $i = 0;
     
        foreach ($this->column_search_zakat_fitrah as $item) // looping awal
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
 
                if(count($this->column_search_zakat_fitrah) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order_zakat_fitrah[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order_zakat_fitrah))
        {
            $order = $this->order_zakat_fitrah;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_daftar_zakat_fitrah()
    {
        $this->_get_datatables_query_zakat_fitrah();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
    	$this->db->join('form_member', 'form_member.no_id=form_zakat_fitrah.no_id');
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_daftar_zakat_fitrah()
    {
        $this->_get_datatables_query_zakat_fitrah();
        $this->db->join('form_member', 'form_member.no_id=form_zakat_fitrah.no_id');
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_daftar_zakat_fitrah()
    {
        $this->db->from($this->table_zakat_fitrah);
        $this->db->join('form_member', 'form_member.no_id=form_zakat_fitrah.no_id');
        return $this->db->count_all_results();
    }

}