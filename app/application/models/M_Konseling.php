<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Konseling extends CI_Model {
	public function tabel(){
		return $this->db->query('SELECT p.id_pasien,p.id,nama,p.alamat,p.jenis_kelamin,p.pernah_rehabilitasi,p.tgl_lahir, COUNT(k.id_pasien)AS banyak_konseling FROM pasien p LEFT OUTER JOIN konseling k ON p.id_pasien=k.id_pasien GROUP BY p.id_pasien')->result_array();
	}
	public function tambah($data)
	{
		$this->db->insert('konseling',$data);
		return $this->db->affected_rows() > 0;
	}
	public function perbarui($id_konseling,$data)
	{	
		$this->db->where(array('id_konseling'=>$id_konseling));
		$this->db->update('konseling',$data);
		return $this->db->affected_rows() > 0;
	}
	public function konseling($id_pasien)
	{
		$detail;
		$konseling=$this->db->order_by('tanggal_kedatangan','desc')->get_where('konseling',array('id_pasien'=>$id_pasien))->result_array();
		$detail=array('konseling'=>$konseling,'banyak_konseling'=>sizeof($konseling));
		return $detail;
	}
}
/* End of file m_Konseling.php */
/* Location: ./application/models/m_Konseling.php */