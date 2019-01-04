<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect("masuk");
        }
        $this->load->model('M_Formulir');
        $this->load->model('M_Pasien');
        $this->load->model('M_Pimpinan');
    }
    public function index()
    {
        $title='Cetak Formulir';
        $this->load->view('head', array('title'=>$title));
        $this->load->view('formulir', array('pasien'=>$this->M_Pasien->tabel()));
        $this->load->view('footer');
    }
    public function print($id_pasien, $tipe_formulir)
    {
        $id_pasien = $this->security->xss_clean($id_pasien);
        $tipe_formulir = $this->security->xss_clean($tipe_formulir);
        $data=$this->M_Pasien->pasien($id_pasien);
        $data['pimpinan'] = $this->M_Pimpinan->pimpinan();
        $sir=$this->M_Formulir->pendaftaran($id_pasien);
        if (substr($tipe_formulir, 0, 2)=='rk') {
            $konseling_ke=substr($tipe_formulir, 2);
            $konseling=$this->M_Formulir->konseling($id_pasien, $konseling_ke);
            $this->load->view('print/rk', array('data'=>$konseling));
        }
        switch ($tipe_formulir) {
            case 'dpn':
                $this->load->view('print/dpn', array('data'=>$data));
                break;
            case 'sir':
                $this->load->view('print/sir', array('data'=>$sir));
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
    public function detail($id_pasien)
    {
        $this->load->model('M_Konseling');
        $id_pasien = $this->security->xss_clean($id_pasien);
        $banyak_konseling=$this->M_Konseling->konseling($id_pasien)['banyak_konseling'];
        $title='Cetak Formulir > Pasien '.$id_pasien;
        $this->load->view('head', array('title'=>$title));
        $this->load->view('cetak-formulir', array('data'=>array('pasien'=>$this->M_Pasien->pasien($id_pasien, array('id_pasien','id','nama','sudah_verifikasi','notif_status','jenis_kelamin','pernah_rehabilitasi','tgl_lahir')),'banyak_konseling'=>$banyak_konseling)));
        $this->load->view('footer');
    }
}
/* End of file formulir.php */
/* Location: ./application/controllers/formulir.php */
