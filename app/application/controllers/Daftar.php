<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Daftar extends CI_Controller {
    function __construct(){
        parent::__construct();
            $this->load->model('M_Pasien');
    }
	public function index(){
        $this->load->view('daftar/form-pasien',array('data'=>$this->M_Pasien->semua_atribut()));
    }
    public function hasil(){
        $captcha=$this->input->post('g-recaptcha-response');
        $secret='6LdLYloUAAAAADtdbsQ3Oy6PrsHPjiEg5Uuc1lnP';
        $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);
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
                    'email'=>$this->input->post('email'));
            $narkoba = $this->input->post('jenis_narkoba[]');
        if ($response['success']) {
            if($this->M_Pasien->tambah_pasien($data,$narkoba)){
                if($this->kirim_email($data['email'],"Konfirmasi Pendatftaran Rehabilitasi - BNN Kota Malang","Terimakasih ".$data['nama']." telah mendaftarkan diri, dapat langsung datang dengan membawa kartu identitas yang anda daftarkan untuk mem-verifikasi")){
                    $this->session->set_flashdata('konfirmasi', 'Data telah terekam & Kirim email berhasil');
                    $this->load->view('daftar/halaman-sukses',array('userdata'=>array('nama'=>$data['nama'],'email'=>$data['email'])));
                }else{
                    $this->session->set_flashdata('konfirmasi', 'Data telah terekam & Kirim email gagal, harap cek alamat email anda');
                    $this->load->view('daftar/halaman-sukses',array('userdata'=>array('nama'=>$data['nama'],'email'=>$data['email'])));
                }
            }else{
                $this->session->set_flashdata('konfirmasi', 'Data belum masuk');
                $this->load->view('daftar/halaman-sukses');
            }
        }else{
            $this->session->set_flashdata('konfirmasi', 'Belum Captcha/Captcha tidak valid');
            $this->load->view('daftar/halaman-sukses');
        }
    }
    private function kirim_email($to,$subject,$message){
        $status;
        $this->load->library('email');
        $config=array(
            'protocol'=>'smpt',
            'smtp_host'=>'ssl://smtp.gmail.com',
            'smtp_port'=>'465',
            'smtp_user'=>'handosub@gmail.com',
            'smptp_pass'=>'08813276811',
            'mailtype'=>'html',
            'charset'=>'iso-8859-1',
            'wordwrap'=>TRUE
        );
        $this->email->initialize($config);
        $this->email->from('no-reply@bnnkotamalang.com','ADMIN');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        if($result=$this->email->send()){
            $status=true;
        }else{
            $status=false;
        }
        return $status;
    }
}
/* End of file daftar.php */
/* Location: ./application/controllers/daftar.php */