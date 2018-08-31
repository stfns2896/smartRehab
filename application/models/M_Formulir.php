<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Formulir extends CI_Model {
	public function pendaftaran($id_pasien){
		return $this->db->query('SELECT nama,id,no_rekam_medis,jenis_kelamin,nama_ibu,nama_ayah,tempat_lahir,tgl_lahir,goldar,a.nama_agama,suku,menikah,pend_terakhir,pekerjaan,alamat,pr.nama_provinsi,no_telp,alamat_keluarga,tanggal_kedatangan,sb.keterangan AS sumber_biaya,sp.keterangan AS sumber_pasien FROM pasien p JOIN agama a ON p.id_agama=a.id_agama JOIN provinsi pr ON p.id_provinsi=pr.id_provinsi JOIN sumber_biaya sb ON p.id_sumber_biaya=sb.id_sumber_biaya JOIN sumber_pasien sp ON p.id_sumber_pasien=sp.id_sumber_pasien WHERE id_pasien='.$id_pasien)->row_array();
	}
	public function konseling($id_pasien,$konseling_ke){
		return $this->db->query("SELECT
								  pgn.name AS nama_konselor,
								  id_konseling,
								  konseling_ke,
								  masalah_motivasi,
								  hal_yg_mendukung_penyelesaian,
								  hal_yg_menghambat_penyelesaian,
								  rencana_tindak_lanjut,
								  nama,
								  tgl_lahir,
								  k.tanggal_kedatangan
								FROM
								  konseling k
								  JOIN pasien p
								    ON p.id_pasien = k.id_pasien
								  JOIN pengguna pgn
								    ON pgn.id = k.id_konselor
								WHERE p.id_pasien = $id_pasien
								ORDER BY k.tanggal_kedatangan ASC")->result_array()[$konseling_ke-1];
	}
}
/* End of file m_Formulir.php */
/* Location: ./application/models/m_Formulir.php */