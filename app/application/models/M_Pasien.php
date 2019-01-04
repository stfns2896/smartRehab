<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Pasien extends CI_Model {
	public function tabel(){
		$this->db->select(array('id_pasien','id','nama','sudah_verifikasi','notif_status','jenis_kelamin','pernah_rehabilitasi','tgl_lahir'));
		return $this->db->order_by('tanggal_kedatangan','desc')->get('pasien')->result_array();
	}
	public function pasien_narkoba($id_pasien){
		return $this->db->query("SELECT jn.id_jenis_narkoba
								FROM pasien p 
								JOIN pasien_narkoba pn ON (p.id_pasien = pn.id_pasien)
								JOIN jenis_narkoba jn ON (pn.id_narkoba=jn.id_jenis_narkoba)
								WHERE p.id_pasien=$id_pasien GROUP BY jn.nama_narkoba")->result_array();
	}
	public function dashboard(){
		$banyak_pasien=$this->db->query("SELECT COUNT(id_pasien) AS banyak_pasien FROM pasien WHERE sudah_verifikasi=1")->row()->banyak_pasien;
		$banyak_pasien_konseling=$this->db->query("SELECT COUNT(pasien) AS pasien FROM (SELECT COUNT(id_konseling) AS pasien FROM konseling GROUP BY id_pasien) AS konseling")->row()->pasien;
		$datang_bulan_ini=$this->db->query("SELECT COUNT(id_pasien) AS datang_bulan_ini FROM pasien WHERE MONTH(tanggal_kedatangan)=MONTH(NOW())")->row()->datang_bulan_ini;
		$verifikasi_bulan_ini=$this->db->query("SELECT COUNT(id_pasien) AS verifikasi_bulan_ini FROM pasien WHERE MONTH(update_on)=MONTH(NOW()) AND sudah_verifikasi=1")->row()->verifikasi_bulan_ini;
		$pasien=$this->db->query("SELECT id_pasien,pernah_rehabilitasi,notif_status,sudah_verifikasi,nama,id,no_rekam_medis,jenis_kelamin,nama_ibu,nama_ayah,tempat_lahir,tgl_lahir,goldar,a.nama_agama,suku,menikah,pend_terakhir,pekerjaan,alamat,pr.nama_provinsi,no_telp,alamat_keluarga,tanggal_kedatangan,YEAR(tanggal_kedatangan)AS tahun_masuk,sb.keterangan AS sumber_biaya,sp.keterangan AS sumber_pasien FROM pasien p JOIN agama a ON p.id_agama=a.id_agama JOIN provinsi pr ON p.id_provinsi=pr.id_provinsi JOIN sumber_biaya sb ON p.id_sumber_biaya=sb.id_sumber_biaya JOIN sumber_pasien sp ON p.id_sumber_pasien=sp.id_sumber_pasien")->result_array();
		$pimpinan=$this->db->get('pimpinan')->row_array();
		$username=$this->session->userdata('username');
		$nip=$this->db->query("SELECT nip FROM pengguna WHERE username='$username'")->row_array()['nip'];
		$narkoba=$this->db->get('jenis_narkoba')->result_array();

		return array(
			'banyak_pasien'=>$banyak_pasien,
			'banyak_pasien_konseling'=>$banyak_pasien_konseling,
			'datang_bulan_ini'=>$datang_bulan_ini,
			'verifikasi_bulan_ini'=>$verifikasi_bulan_ini,
			'pasien'=>$pasien,
			'narkoba'=>$narkoba,
			'pimpinan'=>$pimpinan,
			'nip'=>$nip
		);
	}
	public function semua_atribut(){
		$atribut;
		$provinsi=$this->db->get('provinsi')->result_array();
		$agama=$this->db->get('agama')->result_array();
		$sumber_biaya=$this->db->get('sumber_biaya')->result_array();
		$sumber_pasien=$this->db->get('sumber_pasien')->result_array();
		$narkoba=$this->db->get('jenis_narkoba')->result_array();
		$frekuensi=$this->db->get('frekuensi')->result_array();
		$atribut=array('provinsi'=>$provinsi,'agama'=>$agama,'sumber_biaya'=>$sumber_biaya,'sumber_pasien'=>$sumber_pasien,'narkoba'=>$narkoba,'frekuensi'=>$frekuensi);
		return $atribut;
	}
	public function pasien($id_pasien,$select=null){
		if (!is_null($select)) {
			$this->db->select($select);
		}
		return $this->db->get_where('pasien',array('id_pasien'=>$id_pasien))->row_array();
	}
	public function perbarui_pasien($id_pasien,$data_pasien,$data_narkoba=null)
	{	
		$this->db->where(array('id_pasien'=>$id_pasien));
		$this->db->update('pasien',$data_pasien);

		if (!is_null($data_narkoba)) {
			$this->db->delete('pasien_narkoba',array('id_pasien'=>$id_pasien));
			for ($i=0; $i < sizeof($data_narkoba); $i++) { 
				if (!is_numeric($data_narkoba[$i])) {
					$this->db->insert('jenis_narkoba',array('nama_narkoba'=>$data_narkoba[$i]));
					$id_jenis_narkoba=$this->db->insert_id();
					$data_narkoba[$i]=$id_jenis_narkoba;
				}
			}
			for ($i=0; $i < sizeof($data_narkoba); $i++) { 
		        $this->db->insert('pasien_narkoba',array('id_pasien'=>$id_pasien,'id_narkoba'=>$data_narkoba[$i]));}
		}

		return $this->db->affected_rows() > 0;
	}
	public function tambah_pasien($data_pasien,$data_narkoba)
	{	
		for ($i=0; $i < sizeof($data_narkoba); $i++) { 
			if (!is_numeric($data_narkoba[$i])) {
				$this->db->insert('jenis_narkoba',array('nama_narkoba'=>$data_narkoba[$i]));
				$id_jenis_narkoba=$this->db->insert_id();
				$data_narkoba[$i]=$id_jenis_narkoba;
			}
		}
		$this->db->insert('pasien',$data_pasien);
		$id_pasien=$this->db->insert_id();
		for ($i=0; $i < sizeof($data_narkoba); $i++) { 
	        $this->db->insert('pasien_narkoba',array('id_pasien'=>$id_pasien,'id_narkoba'=>$data_narkoba[$i]));}

		return $this->db->affected_rows() > 0;
	}
	public function verifikasi($id_pasien)
	{
		$this->db->where(array('id_pasien'=>$id_pasien));
		$this->db->update('pasien',array('sudah_verifikasi'=>'1'));
		return $this->db->affected_rows() > 0;
	}
	public function notif(){
		$this->db->select(array('id_pasien','nama','tanggal_kedatangan'));
		return $this->db->order_by('tanggal_kedatangan','desc')->get_where('pasien',array('notif_status'=>0))->result_array();
	}
}
/* End of file m_Pasien.php */
/* Location: ./application/models/m_Pasien.php */