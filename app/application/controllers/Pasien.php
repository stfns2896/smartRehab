<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect("masuk");
		}
		$this->load->model('M_Pasien');
	}
	public function index()
	{
		$title='Data Pasien';
		$this->load->view('head',array('title'=>$title));
		$this->load->view('pasien',array('pasien'=>$this->M_Pasien->tabel()));
		$this->load->view('footer');
	}
	public function ubah($id_pasien){
		$id_pasien = $this->security->xss_clean($id_pasien);
		$title='Data Pasien > Ubah Data Pasien '.$id_pasien;
		$pasien_narkoba=$this->M_Pasien->pasien_narkoba($id_pasien);
		$nip = $this->M_Pasien->dashboard()['nip'];
		$pimpinan = $this->M_Pasien->dashboard()['pimpinan'];

		$this->load->view('head',array('title'=>$title));
		$this->load->view('pasien-detail',array('data'=>array(
			'pasien'=>$this->M_Pasien->pasien($id_pasien),
			'atribut'=>$this->M_Pasien->semua_atribut(),
			'pasien_narkoba'=>$pasien_narkoba,
			'nip'=>$nip,
			'pimpinan'=>$pimpinan
		)));
		$this->load->view('footer');
		if ($this->input->post('btn-verifikasi-pasien')=='verifikasi') {
			if ($this->M_Pasien->verifikasi($id_pasien)) {
				$this->session->set_flashdata('response','Verifikasi berhasil');
				redirect("home");
			}else{
				$this->session->set_flashdata('response','Verifikasi gagal');
				redirect("home");
			}
		}
		if ($this->input->post('btn-ubah-pasien')=='ubah') {
			$data=array('id'=>$this->input->post('no_identitas'),
	                'jenis_id'=>$this->input->post('tipe_identitas'),
	                'nama'=>$this->input->post('fullname'),
	                'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
	                'no_telp'=>$this->input->post('no_telp'),
	                'tempat_lahir'=>$this->input->post('tempat_lahir'),
	                'tgl_lahir'=>date_format(date_create_from_format('d/m/Y',$this->input->post('tgl_lahir')),'Y/m/d'),
	                'alamat'=>$this->input->post('alamat'),
	                'id_provinsi'=>$this->input->post('provinsi'),
	                'id_agama'=>$this->input->post('agama'),
	                'suku'=>$this->input->post('suku'),
	                'goldar'=>$this->input->post('goldar'),
	                'pend_terakhir'=>$this->input->post('pend_terakhir'),
	                'pekerjaan'=>$this->input->post('pekerjaan'),
	                'menikah'=>$this->input->post('menikah'),
	                'nama_pasangan'=>$this->input->post('nama_pasangan'),
	                'nama_ayah'=>$this->input->post('nama_ayah'),
	                'nama_ibu'=>$this->input->post('nama_ibu'),
	                'nomer_telp_keluarga'=>$this->input->post('telp_keluarga'),
	                'alamat_keluarga'=>$this->input->post('alamat_keluarga'),
	                'id_sumber_pasien'=>$this->input->post('sumber_pasien'),
	                'id_sumber_biaya'=>$this->input->post('sumber_biaya'),
	                'no_rekam_medis'=>$this->input->post('no_rekam_medis'),
	                'mulai_pakai'=>$this->input->post('mulai_pakai'),
	                'terakhir_pakai'=>$this->input->post('terakhir_pakai'),
	                'cara_pakai'=>$this->input->post('cara_pakai'),
	                'frekuensi'=>$this->input->post('frekuensi'),
	                'pernah_rehabilitasi'=>$this->input->post('rehabilitasi'),
	                'tempat_rehabilitasi'=>$this->input->post('tempat_rehab'),
	                'status_rawat'=>$this->input->post('rawat'),
	                'lama_rawat'=>$this->input->post('lama_rawat'),
	                'email'=>$this->input->post('email_pasien'));
			$narkoba = $this->input->post('jenis_narkoba[]');
			
			if ($this->M_Pasien->perbarui_pasien($id_pasien,$data,$narkoba)) {
					$this->session->set_flashdata('response','Ubah data berhasil');
					redirect('home');
			}else{
				$this->session->set_flashdata('response','Ubah data gagal');
				redirect('home');
			}
		}
	}
}
/* End of file pasien.php */
/* Location: ./application/controllers/pasien.php */