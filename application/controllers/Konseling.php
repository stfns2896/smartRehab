<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konseling extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect("masuk");
		}
		$this->load->model('M_Konseling');
	}
	public function index()
	{
		$title='Data Konseling';
		$tipe = $this->session->userdata('tipe');
		$this->load->view('head',array('title'=>$title));
		$this->load->view('konseling',array('pasien'=>$this->M_Konseling->tabel()));
		$this->load->view('footer');
	}
	public function ubah()
	{
		$id_konseling=$this->input->post('id_konseling');
		$data=array('masalah_motivasi'=>$this->input->post('masalah_motivasi'),
                	'hal_yg_menghambat_penyelesaian'=>$this->input->post('hal_yg_menghambat_penyelesaian'),
                	'hal_yg_mendukung_penyelesaian'=>$this->input->post('hal_yg_mendukung_penyelesaian'),
                	'rencana_tindak_lanjut'=>$this->input->post('rencana_tindak_lanjut'));
		if ($this->M_Konseling->perbarui($id_konseling,$data)){
			echo "ok";
		}else{
			echo "Data gagal diubah, mohon muat ulang halaman lalu ulangi lagi";
		}
	}
	public function detail($id_pasien)
	{
		$this->load->model('M_Pasien');
		$this->load->model('M_Pengguna');
		$id_pasien = $this->security->xss_clean($id_pasien);
		$title='Data Konseling > Kelola Data Konseling '.$id_pasien;

		$konseling=$this->M_Konseling->konseling($id_pasien);
		$banyak_konseling=$konseling['banyak_konseling'];
		
		$id_konselor=$this->M_Pengguna->id_pengguna();

		$this->load->view('head',array('title'=>$title));
		$this->load->view('konseling-detail',array('data'=>array('pasien'=>$this->M_Pasien->pasien($id_pasien,array('id_pasien','nama','tgl_lahir')),'konseling'=>$konseling)));
		$this->load->view('footer');

		if ($this->input->post('btn-tambah-konseling')) {
			$data=array('id_pasien'=>$id_pasien,
                    'id_konselor'=>$id_konselor,
                    'konseling_ke'=>($banyak_konseling+1),
                	'masalah_motivasi'=>$this->input->post('masalah_motivasi'),
                	'hal_yg_menghambat_penyelesaian'=>$this->input->post('hal_yg_menghambat_penyelesaian'),
                	'hal_yg_mendukung_penyelesaian'=>$this->input->post('hal_yg_mendukung_penyelesaian'),
                	'rencana_tindak_lanjut'=>$this->input->post('rencana_tindak_lanjut'));
			if ($this->M_Konseling->tambah($data)) {
				$this->session->set_flashdata('response','Data konseling berhasil ditambahkan');
				redirect("home",'refresh');
			}else{
				$this->session->set_flashdata('response','Data konseling gagal ditambahkan');
				redirect("konseling/$id_pasien",'refresh');
			}
		}
		// if($this->input->post('hapus_konseling')!=null){
		// 	$id_konseling=$this->input->post('hapus_konseling');
		// 	echo $id_konseling;
		// 	if ($this->Singleton_Model->hapus('konseling',array('id_konseling'=>$id_konseling))) {
		// 		$this->session->set_flashdata('response','Data konseling dengan id '.$id_konseling.' berhasil dihapus');
		// 		redirect("konseling/$id_pasien",'refresh');
		// 	}else{
		// 		$this->session->set_flashdata('response','Data konseling dengan id '.$id_konseling.' gagal dihapus');
		// 		redirect("konseling/$id_pasien",'refresh');
		// 	}
		// }
	}
}
/* End of file konseling.php */
/* Location: ./application/controllers/konseling.php */