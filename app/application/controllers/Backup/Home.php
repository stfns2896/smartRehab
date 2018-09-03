<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Home extends CI_Controller {
	
		function __construct(){
		parent::__construct();
			if($this->session->userdata('status') != "login"){
				redirect("masuk");
			}
			$this->load->model('Singleton_Model');
		}

		public function index()
		{
			$banyak_pasien=$this->db->query("SELECT COUNT(id_pasien) AS banyak_pasien FROM pasien WHERE sudah_verifikasi=1")->row()->banyak_pasien;
			$banyak_pasien_konseling=$this->db->query("SELECT COUNT(pasien) AS pasien FROM (SELECT COUNT(id_konseling) AS pasien FROM konseling GROUP BY id_pasien) AS konseling")->row()->pasien;
			$datang_bulan_ini=$this->db->query("SELECT COUNT(id_pasien) AS datang_bulan_ini FROM pasien WHERE MONTH(tanggal_kedatangan)=MONTH(NOW())")->row()->datang_bulan_ini;
			$verifikasi_bulan_ini=$this->db->query("SELECT COUNT(id_pasien) AS verifikasi_bulan_ini FROM pasien WHERE MONTH(update_on)=MONTH(NOW()) AND sudah_verifikasi=1")->row()->verifikasi_bulan_ini;
			$data_join=$this->db->query("SELECT pernah_rehabilitasi,notif_status,sudah_verifikasi,nama,id,no_rekam_medis,jenis_kelamin,nama_ibu,nama_ayah,tempat_lahir,tgl_lahir,goldar,a.nama_agama,suku,menikah,pend_terakhir,pekerjaan,alamat,pr.nama_provinsi,no_telp,alamat_keluarga,tanggal_kedatangan,sb.keterangan AS sumber_biaya,sp.keterangan AS sumber_pasien FROM pasien p JOIN agama a ON p.id_agama=a.id_agama JOIN provinsi pr ON p.id_provinsi=pr.id_provinsi JOIN sumber_biaya sb ON p.id_sumber_biaya=sb.id_sumber_biaya JOIN sumber_pasien sp ON p.id_sumber_pasien=sp.id_sumber_pasien")->result_array();
			$data=array('pasien'=>$data_join,'banyak_pasien'=>$banyak_pasien,"banyak_pasien_konseling"=>$banyak_pasien_konseling,"datang_bulan_ini"=>$datang_bulan_ini,"verifikasi_bulan_ini"=>$verifikasi_bulan_ini);


			$title = "Dashboard";
			$tipe = $this->session->userdata('tipe');
			$this->load->view('head',array('title'=>$title));
			$this->load->view('dashboard',array('data'=>$data));
			$this->load->view('footer');
		}

		public function notif()
		{
			if ($this->input->post('notif')) {
				$output='';
				$count=0;
				switch ($this->input->post('notif')) {
					case 'tarik':
						$tarik=$this->Singleton_Model->ambil('pasien',array('id_pasien','nama','tanggal_kedatangan'),array('notif_status'=>0),'tanggal_kedatangan');
						$count=sizeof($tarik);
						if ($count<1) {
							$output='<li><a href="#" class="text-bold text-italic">Tidak ada notif</a></li>';
							$data = array('notification' => $output,'unseen_notification'=> $count);
							echo json_encode($data);
						}else{
							foreach ($tarik as $key) {
								$output=$output.'<li class="notif-item"><a href="'.base_url('pasien/').$key['id_pasien'].'"><strong>'.$key["nama"].'</strong><br/><small><em>'.$key["tanggal_kedatangan"].'</em></small></a></li>';
							}
							$data = array('notification' => $output,'unseen_notification'=> $count);
							echo json_encode($data);
						}
						break;
					case 'hapus':
						$output='<li><a href="#" class="text-bold text-italic">Tidak ada notif</a></li>';
						if ($this->Singleton_Model->perbarui('pasien',array('notif_status'=>1),array('notif_status'=>0))) {
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

		public function print($id_pasien,$tipe_formulir){
			$id_pasien = $this->security->xss_clean($id_pasien);
			$tipe_formulir = $this->security->xss_clean($tipe_formulir);
			$data=$this->Singleton_Model->ambil('pasien',null,array('id_pasien'=>$id_pasien))[0];
			$data_join=$this->db->query("SELECT nama,id,no_rekam_medis,jenis_kelamin,nama_ibu,nama_ayah,tempat_lahir,tgl_lahir,goldar,a.nama_agama,suku,menikah,pend_terakhir,pekerjaan,alamat,pr.nama_provinsi,no_telp,alamat_keluarga,tanggal_kedatangan,sb.keterangan AS sumber_biaya,sp.keterangan AS sumber_pasien FROM pasien p JOIN agama a ON p.id_agama=a.id_agama JOIN provinsi pr ON p.id_provinsi=pr.id_provinsi JOIN sumber_biaya sb ON p.id_sumber_biaya=sb.id_sumber_biaya JOIN sumber_pasien sp ON p.id_sumber_pasien=sp.id_sumber_pasien WHERE id_pasien=$id_pasien")->result_array()[0];
			if (substr($tipe_formulir,0,2)=='rk') {
				$konseling_ke=substr($tipe_formulir, 2);
				$konseling=$this->db->query("SELECT
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
				$this->load->view('print/rk', array('data'=>$konseling));
			}
			switch($tipe_formulir){
				case 'dpn':
					$this->load->view('print/dpn', array('data'=>$data));
					break;
				case 'sir':
					$this->load->view('print/sir', array('data'=>$data_join));
					break;
				case 'lpt':
					$this->load->view('print/lpt', array('data'=>$data));
					break;
				case 'lpr':
					$this->load->view('print/lpr', array('data'=>$data));
					break;
				case 'ak':
					$this->load->view('print/ak', array('data'=>$data));
					break;
			}
		}

		public function formulir()
		{
			$title='Cetak Formulir';
			$this->load->view('head',array('title'=>$title));
			$this->load->view('formulir',array('pasien'=>$this->Singleton_Model->ambil('pasien',array('id_pasien','id','nama','sudah_verifikasi','notif_status','jenis_kelamin','pernah_rehabilitasi','tgl_lahir'),null,'tanggal_kedatangan')));
			$this->load->view('footer');
		}
		public function formulir_detail($id_pasien)
		{
			$id_pasien = $this->security->xss_clean($id_pasien);
			$banyak_konseling=$this->db->query("SELECT COUNT(id_konseling) AS banyak_konseling FROM konseling WHERE id_pasien = $id_pasien")->row()->banyak_konseling;
			$title='Cetak Formulir > Pasien '.$id_pasien;
			$this->load->view('head',array('title'=>$title));
			$this->load->view('cetak-formulir',array('data'=>array('pasien'=>$this->Singleton_Model->ambil('pasien',array('id_pasien','id','nama','sudah_verifikasi','notif_status','jenis_kelamin','pernah_rehabilitasi','tgl_lahir'),array('id_pasien'=>$id_pasien)),'banyak_konseling'=>$banyak_konseling)));
			$this->load->view('footer');
			if ($this->input->post('btn_formulir')!=null) {
				$this->print($id_pasien,$this->input->post('btn_formulir'));
			}
		}

		public function pasien()
		{
			$title='Data Pasien';
			$this->load->view('head',array('title'=>$title));
			$this->load->view('pasien',array('pasien'=>$this->Singleton_Model->ambil('pasien',array('id_pasien','id','nama','sudah_verifikasi','notif_status','jenis_kelamin','pernah_rehabilitasi','tgl_lahir'),null,'tanggal_kedatangan')));
			$this->load->view('footer');
		}

		public function ubah_pasien($id_pasien){
			$id_pasien = $this->security->xss_clean($id_pasien);
			$title='Data Pasien > Ubah Data Pasien '.$id_pasien;
			$pasien_narkoba=$this->db->query("SELECT jn.id_jenis_narkoba
												FROM pasien p 
												JOIN pasien_narkoba pn ON (p.id_pasien = pn.id_pasien)
												JOIN jenis_narkoba jn ON (pn.id_narkoba=jn.id_jenis_narkoba)
												WHERE p.id_pasien=$id_pasien GROUP BY jn.nama_narkoba")->result_array();

			$this->load->view('head',array('title'=>$title));
			$this->load->view('pasien-detail',array('data'=>array('pasien'=>$this->Singleton_Model->ambil('pasien',null,array('id_pasien'=>$id_pasien)),'provinsi'=>$this->Singleton_Model->ambil('provinsi'),'agama'=>$this->Singleton_Model->ambil('agama'),'sumber_biaya'=>$this->Singleton_Model->ambil('sumber_biaya'),'sumber_pasien'=>$this->Singleton_Model->ambil('sumber_pasien'),'narkoba'=>$this->Singleton_Model->ambil('jenis_narkoba'),'pasien_narkoba'=>$pasien_narkoba)));
			$this->load->view('footer');

			if ($this->input->post('btn-verifikasi-pasien')=='verifikasi') {
				if ($this->Singleton_Model->perbarui('pasien',array('sudah_verifikasi'=>'1'),array('id_pasien'=>$id_pasien))) {
					$this->session->set_flashdata('response','Verifikasi berhasil');
					redirect("pasien");
				}else{
					$this->session->set_flashdata('response','Verifikasi gagal');
					redirect("pasien");
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
                        'mulai_pakai'=>date_format(date_create_from_format('d/m/Y',$this->input->post('mulai_pakai')),'Y/m/d'),
                        'terakhir_pakai'=>date_format(date_create_from_format('d/m/Y',$this->input->post('terakhir_pakai')),'Y/m/d'),
                        'cara_pakai'=>$this->input->post('cara_pakai'),
                        'frekuensi'=>$this->input->post('frekuensi'),
                        'pernah_rehabilitasi'=>$this->input->post('rehabilitasi'),
                        'tempat_rehabilitasi'=>$this->input->post('tempat_rehab'),
                        'status_rawat'=>$this->input->post('rawat'),
                        'lama_rawat'=>$this->input->post('lama_rawat'),
                        'email'=>$this->input->post('email_pasien'));
				$narkoba = $this->input->post('jenis_narkoba[]');
				
				if ($this->Singleton_Model->perbarui('pasien',$data,array('id_pasien'=>$id_pasien))) {
					if($this->db->delete('pasien_narkoba',array('id_pasien'=>$id_pasien))){
						for ($i=0; $i < sizeof($narkoba); $i++) { 
		                    $this->Singleton_Model->masukkan('pasien_narkoba',array('id_pasien'=>$id_pasien,'id_narkoba'=>$narkoba[$i]));}
						$this->session->set_flashdata('response','Ubah data berhasil');
						redirect('pasien');
					}
				}else{
					if($this->db->delete('pasien_narkoba',array('id_pasien'=>$id_pasien))){
						for ($i=0; $i < sizeof($narkoba); $i++) { 
		                    $this->Singleton_Model->masukkan('pasien_narkoba',array('id_pasien'=>$id_pasien,'id_narkoba'=>$narkoba[$i]));}
						$this->session->set_flashdata('response','Ubah data berhasil');
						redirect('pasien');
					}
					$this->session->set_flashdata('response','Ubah data gagal');
					redirect('pasien');
				}
			}
		}
		public function test(){
			echo "this is test function - Hello world!";
			echo phpinfo();
		}
		public function konseling()
		{
			$title='Data Konseling';
			$tipe = $this->session->userdata('tipe');
			$this->load->view('head',array('title'=>$title));
			$this->load->view('konseling',array('pasien'=>$this->db->query('SELECT p.id_pasien,p.id,nama,p.alamat,p.jenis_kelamin,p.pernah_rehabilitasi,p.tgl_lahir, COUNT(k.id_pasien)AS banyak_konseling FROM pasien p LEFT OUTER JOIN konseling k ON p.id_pasien=k.id_pasien GROUP BY p.id_pasien')->result_array()));
			$this->load->view('footer');
		
		}
		public function ubah_konseling(){
			$id_konseling=$this->input->post('id_konseling');
			$data=array('masalah_motivasi'=>$this->input->post('masalah_motivasi'),
                    	'hal_yg_menghambat_penyelesaian'=>$this->input->post('hal_yg_menghambat_penyelesaian'),
                    	'hal_yg_mendukung_penyelesaian'=>$this->input->post('hal_yg_mendukung_penyelesaian'),
                    	'rencana_tindak_lanjut'=>$this->input->post('rencana_tindak_lanjut'));
			if ($this->Singleton_Model->perbarui('konseling',$data,array('id_konseling'=>$id_konseling))) {
				echo "ok";
			}else{
				echo "Data gagal diubah, mohon muat ulang halaman lalu ulangi lagi";
			}
		}
		public function konseling_detail($id_pasien){
			$id_pasien = $this->security->xss_clean($id_pasien);
			$title='Data Konseling > Kelola Data Konseling '.$id_pasien;
			$konseling=$this->Singleton_Model->ambil('konseling',null,array('id_pasien'=>$id_pasien),'tanggal_kedatangan');
			$id_konselor=$this->Singleton_Model->ambil('pengguna','id',array('username'=>$this->session->userdata('username')))[0]['id'];
			$banyak_konseling=$this->db->query("SELECT COUNT(id_konseling) AS banyak_konseling FROM konseling WHERE id_pasien = $id_pasien")->row()->banyak_konseling;

			$this->load->view('head',array('title'=>$title));
			$this->load->view('konseling-detail',array('data'=>array('pasien'=>$this->Singleton_Model->ambil('pasien',array('id_pasien','nama','tgl_lahir'),array('id_pasien'=>$id_pasien)),'konseling'=>$konseling,'banyak_konseling'=>$banyak_konseling)));
			$this->load->view('footer');

			if ($this->input->post('btn-tambah-konseling')) {
				$data=array('id_pasien'=>$id_pasien,
                        'id_konselor'=>$id_konselor,
                        'konseling_ke'=>($banyak_konseling+1),
                    	'masalah_motivasi'=>$this->input->post('masalah_motivasi'),
                    	'hal_yg_menghambat_penyelesaian'=>$this->input->post('hal_yg_menghambat_penyelesaian'),
                    	'hal_yg_mendukung_penyelesaian'=>$this->input->post('hal_yg_mendukung_penyelesaian'),
                    	'rencana_tindak_lanjut'=>$this->input->post('rencana_tindak_lanjut'));
				if ($this->Singleton_Model->masukkan('konseling',$data)) {
					$this->session->set_flashdata('response','Data konseling berhasil ditambahkan');
					redirect("konseling/$id_pasien",'refresh');
				}else{
					$this->session->set_flashdata('response','Data konseling gagal ditambahkan');
					redirect("konseling/$id_pasien",'refresh');
				}
			}
			if($this->input->post('hapus_konseling')!=null){
				$id_konseling=$this->input->post('hapus_konseling');
				echo $id_konseling;
				if ($this->Singleton_Model->hapus('konseling',array('id_konseling'=>$id_konseling))) {
					$this->session->set_flashdata('response','Data konseling dengan id '.$id_konseling.' berhasil dihapus');
					redirect("konseling/$id_pasien",'refresh');
				}else{
					$this->session->set_flashdata('response','Data konseling dengan id '.$id_konseling.' gagal dihapus');
					redirect("konseling/$id_pasien",'refresh');
				}
				
			}
		}
		public function buat_akun()
		{
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$passconf=$this->input->post('passconf');
			$tipe=$this->input->post('tipe');

			$emailCek=$this->db->where('email',$email)->get('pengguna')->row_array();
			$usernameCek=$this->db->where('username',$username)->get('pengguna')->row_array();

			if (!($emailCek && $usernameCek)) {
				if (strcmp($password,$passconf)==0) {
					$akunBaru=array('name' => $name,'email' => $email,'username' => $username,'password' => password_hash($password,PASSWORD_DEFAULT),'tipe' => $tipe);
					$this->db->insert('pengguna',$akunBaru);
					if ($this->db->affected_rows() > 0) {
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
		}
		public function ganti_password()
		{
			$email=$this->input->post('email');
			$old_password=$this->input->post('old_password');
			$new_password=$this->input->post('new_password');
			$passconf=$this->input->post('passconf');

			$data=$this->db->where('email',$email)->get('pengguna')->row_array();

			if ($data) {
				if (password_verify($old_password,$data['password'])) {
					if (strcmp($new_password,$passconf)==0) {
						if (!(strcmp($new_password,$old_password)==0)) {
							$this->db->where('email',$email)->update('pengguna',array('password'=>password_hash($new_password,PASSWORD_DEFAULT)));
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
?>