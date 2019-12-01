<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {
    public $title = 'LOGIN SIWADES';

     public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Login', 'login');
        $this->load->model('M_global', 'global');
    }

	public function index()
	{
        $this->load->view('template/head');
        $this->load->view('login/loginm');
        $this->load->view('template/footer');
    }
    
    public function registrasi(){
        $this->title = 'SIWADES';
        $this->load->view('template/head');
        $this->load->view('login/daftar');
        $this->load->view('template/footer');
    }

    public function auth()
    {
        $u = $this->input->post('val-username');
        $p = $this->input->post('val-password');
        $pass = base64_encode($p);
        $cek_login = $this->login->auth($u,$pass);
        $cek = $cek_login->num_rows();
        $sesi = $cek_login->row_array();
        if ($cek > 1) {
            $nik = $sesi['nik'];
            $waktu = date("d-m-Y  H:i");
            $res = $this->login->status($nik,$waktu);
            if ($res > 0) {
                $this->session->set_userdata('userdata',$sesi['nik']);
                $this->session->set_userdata('data',$sesi);
                redirect('validasi');
            }else{
                redirect('validasi');
            }
        }elseif($cek > 0){
            $nik = $sesi['nik'];
            $waktu = date("d-m-Y  H:i");
            $this->session->set_userdata('userdata',$sesi['nik']);
            $this->session->set_userdata('level',$sesi['nama_akses']);
            $this->session->set_userdata('data',$sesi);
            $res = $this->login->status($nik,$waktu);
            if ($res > 0) {
                redirect('dashboard');
            }
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><strong>Login Gagal</strong></h4><p>Maaf, username dan password tidak cocok !</p></div>');
            redirect('/');
        }
    }

    public function validasi_user(){
        $this->session->set_userdata('level',$this->input->post('nama_akses'));
        redirect('dashboard');
    }

    public function get_validasi(){
        $aa = $this->session->userdata('userdata');
        $data['sesi'] = $this->login->getValidasi($aa)->result_array();
        $this->title = 'VALIDASI AKSES';
        if($this->session->userdata('level'))
            redirect('/pilihan');
        $this->load->view('template/head');
        $this->load->view('login/validasi',$data);
        $this->load->view('template/footer');
    }

    public function daftar(){
        $username = $this->input->post('val-username');
        $password = base64_encode($this->input->post('val-password'));
        $nik 	  = $this->input->post('val-number');
        $where = array('nik' => $nik);
        $cek1 = $this->global->getAll('penduduk',$where)->num_rows();
        $where2 = array('id_akses' => 'akses04','nik' => $nik);
        $cek2 = $this->global->getAll('hak_akses_user',$where2)->num_rows();
        if ($cek2 > 0) {
            $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><strong>Pendaftaran Gagal</strong></h4><p>NIK <strong>'.$nik.'</strong> sudah terdaftar !</p></div>');
            redirect('/');
        }else{
            if ($cek1 > 0) {
                $res1 = $this->global->insert('hak_akses_user',$where2);
                $set = array('username' => $username,'password' => $password);
                $res = $this->global->update('penduduk',$set,$where);
                if ($res1 > 0 && $res > 0) {
                    $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><strong>Pendaftaran Berhasil</strong></h4><p>SIlahkan Login!</p></div>');
                    redirect('/');
                }else{
                    $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><strong>Pendaftaran Gagal</strong></h4><p>Maaf, NIK anda salah !</p></div>');
                    redirect('/');
                }
            }else{
                $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><strong>Pendaftaran Gagal</strong></h4><p>NIK <strong>'.$nik.'</strong> tidak terdaftar !</p></div>');
                redirect('/');
            }
        }
    }

    public function logout(){
        $cc = $this->session->userdata('userdata');
        $set = array('status' => '0');
        $where = array('nik' => $cc);
        $up = $this->global->update('penduduk',$set,$where);
        $ol = $this->global->delete('online',$where);
        if ($up > 0 && $ol > 0) {
            $this->session->sess_destroy();
            redirect('/');
        }else{
            var_dump($ol);
        }
    }
}
