<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {
    public $title = 'SIWADES';
    public $aktif = 'dashboard';

     public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Admin', 'admin');
        $this->load->model('M_global', 'global');
        if(!$this->session->userdata('userdata'))
            redirect('/');
    }

	 //menampilkan
    public function index(){
        $data['prof'] = $this->admin->about()->row_array();
        $data['dokumen'] = $this->admin->dokumen()->row_array();
        $this->load->view('template/head');
        $this->load->view('template/menu');
        $this->load->view('admin/profilm',$data);
        $this->load->view('template/footer');
    }
    //edit proses
    public function update(){
        $nik        = $this->session->userdata('userdata');
        $username   = $this->input->post('username_baru');
        $password   = $this->input->post('password_baru');
        $pass       = base64_encode($password);
        $tentang    = $this->input->post('tentang');
        $ft_lw      = $this->input->post('foto_lawas');
        //foto
        if ($_FILES['foto']['name'] == "") {
            $fotoup = $ft_lw;
        }else{
            $lawas = "./assets/foto/".$ft_lw;
            unlink($lawas);

            $filename   = $_FILES['foto']['name'];
            $dir        = "./assets/foto/";
            $file       = 'foto';
            $file_name      = $_FILES[''.$file.'']["name"];
            $tmp_file       = $_FILES[''.$file.'']["tmp_name"];
            move_uploaded_file ($tmp_file, $dir.$file_name);
            $fotoup = $file_name;
        }
        //foto
        $set = array(
            'username' => $username,
            'password' => $pass,
            'about' => $tentang,
            'foto' => $fotoup
        );
        $where = array('nik' => $nik);
        $edit = $this->global->update('penduduk',$set,$where);
        if ($edit) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data Anda berhasil di Update !</p></div>');
            redirect('profile');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-sanger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data Anda gagal di Update !</p></div>');
            redirect('profile');
        }
    }
    
}
