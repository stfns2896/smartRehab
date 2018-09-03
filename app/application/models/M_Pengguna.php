<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Pengguna extends CI_Model {
	public function id_pengguna(){
		$username=$this->session->userdata('username');
		$this->db->select('id');
		return $this->db->get_where('pengguna',array('username'=>$username))->row_array()['id'];
	}
	public function get_pengguna($by,$select=null){
		if (!is_null($select)) {
			$this->db->select($select);
		}
		return $this->db->where($by)->get('pengguna')->row_array();
	}
	public function buat_akun($data){
		$this->db->insert('pengguna',$data);
		return $this->db->affected_rows() > 0;
	}
	public function ganti_password($email,$password){
		$this->db->where('email',$email)->update('pengguna',array('password'=>$password));
		return $this->db->affected_rows() > 0;
	}	
}
/* End of file M_Pengguna.php */
/* Location: ./application/models/M_Pengguna.php */