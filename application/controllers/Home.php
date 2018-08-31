<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
	parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect("masuk");
		}
	}
	public function index()
	{
		$this->load->model('M_Pasien');
		$title = "Dashboard";
		$tipe = $this->session->userdata('tipe');
		$this->load->view('head',array('title'=>$title));
		$this->load->view('dashboard',array('data'=>$this->M_Pasien->dashboard()));
		$this->load->view('footer');
	}
	public function notif()
	{
		$this->load->model('M_Pasien');
		if ($this->input->post('notif')) {
			$output='';
			$count=0;
			switch ($this->input->post('notif')) {
				case 'tarik':
					$tarik=$this->M_Pasien->notif();
					$count=sizeof($tarik);
					if ($count<1) {
						$output='<li><a href="#" class="text-bold text-italic">Tidak ada notif</a></li>';
						$data = array('notification' => $output,'unseen_notification'=> $count);
						echo json_encode($data);
					}else{
						foreach ($tarik as $key) {
							$output=$output.'<li class="notif-item" data-id="'.$key['id_pasien'].'"><a href="'.base_url('pasien/').$key['id_pasien'].'"><strong>'.$key["nama"].'</strong><br/><small><em>'.$key["tanggal_kedatangan"].'</em></small></a></li>';
						}
						$data = array('notification' => $output,'unseen_notification'=> $count);
						echo json_encode($data);
					}
					break;
				case 'hapus':
					$output='<li><a href="#" class="text-bold text-italic">Tidak ada notif</a></li>';
					if ($this->M_Pasien->perbarui_pasien($this->input->post('id'),array('notif_status'=>1))) {
						$data = array('notification' => $output,'unseen_notification'=> 0);
						echo json_encode($data);
					}else{
						$data = array('notification' => $output,'unseen_notification'=> 0);
						echo json_encode($data);
					}
					break;
			}
		}
	}
	public function buat_akun()
	{
		if ($this->session->userdata('tipe')==0) {
			$this->load->model('M_Pengguna');
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$passconf=$this->input->post('passconf');
			$tipe=$this->input->post('tipe');
			$cari_pengguna=$this->db->where('email',$email)->or_where('username',$username)->get('pengguna')->row_array();
			if (!($cari_pengguna)) {
				if (strcmp($password,$passconf)==0) {
					$akunBaru=array('name' => $name,'email' => $email,'username' => $username,'password' => password_hash($password,PASSWORD_DEFAULT),'tipe' => $tipe);
					if ($this->M_Pengguna->buat_akun($akunBaru)) {
						echo "ok";
					}else{
						echo "Terjadi kesalahan sistem, coba ulangi lagi";
					}
				}else{
					echo "Password tidak sesuai dengan konfirmasi, silahkan cek dan ulangi lagi";
				}
			}else{
				echo "Email/username sudah dipakai, silahkan coba yang lain";
			}
		}else{
			redirect('/','refresh');
		}
	}
	public function ganti_password()
	{
		$this->load->model('M_Pengguna');

		$email=$this->input->post('email');
		$old_password=$this->input->post('old_password');
		$new_password=$this->input->post('new_password');
		$passconf=$this->input->post('passconf');

		$data=$this->M_Pengguna->get_pengguna(array('email'=>$email));

		if ($data) {
			if (password_verify($old_password,$data['password'])) {
				if (strcmp($new_password,$passconf)==0) {
					if (!(strcmp($new_password,$old_password)==0)) {
						$this->M_Pengguna->ganti_password($email,password_hash($new_password,PASSWORD_DEFAULT));
						if ($this->db->affected_rows() > 0) {
							echo "ok";
						}else{
							echo "Terjadi kesalahan sistem, coba ulangi lagi";
						}
					}else{
						echo "Password baru tidak boleh sama dengan password lama";
					}
				}else{
					echo "Password baru dan konfirmasi tidak sama";
				}
			}else{
				echo "password lama salah";
			}
		}else{
			echo "email salah";
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('masuk');
	}
}
/* End of file home.php */
/* Location: ./application/controllers/home.php */