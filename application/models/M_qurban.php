<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_qurban extends CI_Model {

	public function view_table(){
		$query = $this->db
		->from('form_member')
		->join('form_qurban', 'form_member.no_id=form_qurban.no_id')
		->order_by('tgl_qurban', 'DESC')
		->get();
        return $query;
	}

	public function view_qurban_table($id){
		$query = $this->db
		->from('form_member')
		->join('form_qurban', 'form_member.no_id=form_qurban.no_id')
		->where('form_member.no_id', $id)
		->order_by('tgl_qurban', 'DESC')
		->get();
        return $query;
	}

	public function view_qurban($id){
		$query = $this->db
		->from('form_member')
		// ->join('form_qurban', 'form_member.no_id=form_qurban.no_id', 'left')
		->where('form_member.no_id', $id)
		->get();
        return $query;
	}

	public function get_qurban($id, $tgl){
		$query = $this->db
		->from('form_qurban')
		->where('form_qurban.no_id', $id)
		->where('form_qurban.tgl_qurban', $tgl)
		->get();
        return $query;
	}

	public function insert_qurban($data)
	{
		$this->db->insert('form_qurban',$data);
	}

	public function edit_data_qurban($where,$table){		
		return $this->db->get_where($table,$where);
	}

	public function update_data_qurban($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_qurban($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	//DATATABLE SERVERSIDE
	var $table_qurban = 'form_qurban'; //nama tabel dari database
    var $column_order_qurban = array(null, 'form_qurban.no_id', 'nama','rt','tgl_qurban', 'jenis_qurban', 'kelas_qurban', 'nominal_qurban'); //field yang ada di table user
    var $column_search_qurban = array('form_qurban.no_id', 'nama','rt','tgl_qurban', 'jenis_qurban', 'kelas_qurban', 'nominal_qurban'); //field yang diizin untuk pencarian 
    var $order_qurban = array('tgl_qurban' => 'desc'); // default order 
    private function _get_datatables_query_qurban()
    {
        //add custom filter here
        if($this->input->post('tgl_qurban'))
        {
            $this->db->like('tgl_qurban', str_replace('_','', $this->input->post('tgl_qurban')));
        }
        if($this->input->post('nama_qurban'))
        {
            $this->db->like('nama', $this->input->post('nama_qurban'));
        }

        $this->db->from($this->table_qurban);
 
        $i = 0;
     
        foreach ($this->column_search_qurban as $item) // looping awal
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
 
                if(count($this->column_search_qurban) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order_qurban[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order_qurban))
        {
            $order = $this->order_qurban;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_daftar_qurban()
    {
        $this->_get_datatables_query_qurban();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
    	$this->db->join('form_member', 'form_member.no_id=form_qurban.no_id');
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered_daftar_qurban()
    {
        $this->_get_datatables_query_qurban();
        $this->db->join('form_member', 'form_member.no_id=form_qurban.no_id');
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_daftar_qurban()
    {
        $this->db->from($this->table_qurban);
        $this->db->join('form_member', 'form_member.no_id=form_qurban.no_id');
        return $this->db->count_all_results();
    }

}