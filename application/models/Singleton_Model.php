<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Singleton_Model extends CI_Model {

	public function masukkan($table_name,$data)
	{
		$this->db->insert($table_name,$data);
		return $this->db->affected_rows() > 0;
	}

	public function perbarui($table_name,$data,$where)
	{	
		$this->db->where($where);
		$this->db->update($table_name,$data);
		return $this->db->affected_rows() > 0;
	}

	public function ambil($nama_tabel,$select=null,$where=null,$order=null,$sort='desc'){
		if (!is_null($select)) {
			$this->db->select($select);
		}
		return $this->db->order_by($order,$sort)->get_where($nama_tabel,$where)->result_array();
	}
	public function hapus($nama_tabel,$where){
		$this->db->delete($nama_tabel,$where);
		return $this->db->affected_rows() > 0;
	}

}

/* End of file singleton_Model.php */
/* Location: ./application/models/Singleton_Model.php */