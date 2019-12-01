<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Penduduk extends CI_Controller {
    public $title = 'PENDUDUK || SIWADES';
    public $aktif = 'penduduk';

     public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Kartukeluarga', 'kk');
        $this->load->model('Penduduk', 'penduduk');
        $this->load->model('M_global', 'global');
        if(!$this->session->userdata('userdata'))
            redirect('/');
    }

	 //menampilkan
    public function index(){
        $data['penduduk'] = $this->global->getAll('penduduk')->result_array();
        $this->load->view('template/head');
        $this->load->view('template/menu');
        $this->load->view('penduduk/pendudukm',$data);
        $this->load->view('template/footer');
    }

    //hapus penduduk
    public function delete($id){
        $where = array('nik' => $id);
        $nama   = $this->global->getAll('penduduk',$where)->row_array();
        $nw = $nama['nama'];
        $kk = $nama['no_kk'];
        $hapus = $this->global->delete('penduduk',$where);
        if ($hapus) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data <strong>'.$nw.'</strong>  Berhasil dihapus !</p></div>');
            redirect('penduduk');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-sanger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data <strong>'.$nw.'</strong>  Gagal dihapus !</p></div>');
            redirect('penduduk');
        }
    }
    //hapus kk
    public function edit($id){
        $this->title = "EDIT || PENDUDUK || SIWADES";
        $where = array('nik' => $id);
        $data['edit']   = $this->global->getAll('penduduk',$where)->row_array();
        $data['link']   = base_url('updatependuduk');
        $where2 = array('kepala_keluarga' => $id,'no_kk' => $data['edit']['no_kk']);
        $data['cek']   = $this->global->getAll('kk',$where2)->num_rows();
        $data['agama']   = $this->global->getAll('agama')->result_array();
        $data['klasifikasi']   = $this->global->getAll('klasifikasi')->result_array();
        $data['kk']   = $this->kk->getKK()->result_array();
        $this->load->view('template/head');
        $this->load->view('template/menu');
        $this->load->view('penduduk/penduduke',$data);
        $this->load->view('template/footer');
    }

    //edit proses
    public function update(){
        if (!empty($this->input->post('no_kk'))) {
            $no_kk          = $_POST['no_kk'];
        }else{
            $no_kk          = $_POST['kk'];
        }
        $ft_lw              = $_POST['foto_lawas'];
        $nik = $this->input->post('nik');
        if ($_FILES['foto']['name'] == "") {
            $fotoup = $ft_lw;
        }else{
            $lawas = "./assets/foto/".$ft_lw;
            unlink($lawas);

            $filename   = $_FILES['foto']['name'];
            $dir        = "./assets/foto/";
            $file       = 'foto';
            $new_name3  ='foto'.$nik.'.jpg'; //name pada input type file
            
            $file_name      = $_FILES[''.$file.'']["name"];
            $tmp_file       = $_FILES[''.$file.'']["tmp_name"];
            
            move_uploaded_file ($tmp_file, $dir.$file_name);
            rename($dir.$file_name, $dir.$new_name3);
            
            $fotoup = $new_name3;
        }

        $val = array(
            'nik'                => $this->input->post('nik'),
            'nama'               => $this->input->post('nama'),
            'tempat_lahir'       => $this->input->post('tempat_lahir'),
            'tanggal_lahir'      => $this->input->post('tanggal_lahir'),
            'jk'                 => $this->input->post('jk'),
            'golongan_darah'     => $this->input->post('golongan_darah'),
            'pendidikan'         => $this->input->post('pendidikan'),
            'pekerjaan'          => $this->input->post('pekerjaan'),
            'status_perkawinan'  => $this->input->post('status_perkawinan'),
            'kewarganegaraan'    => $this->input->post('kewarganegaraan'),
            'id_agama'           => $this->input->post('id_agama'),
            'id_klasifikasi'     => $this->input->post('id_klasifikasi'),
            'no_kk'              => $no_kk,
            'foto'               => $fotoup
        );
        $where = array('nik' => $this->input->post('nik'));
        $edit = $this->global->update('penduduk',$val,$where);
        if ($edit) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data <strong>'.$nama.'</strong>  Berhasil diedit !</p></div>');
            redirect('penduduk');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data <strong>'.$nama.'</strong>  Gagal diedit !</p></div>');
            redirect('penduduk');
        }
    }

    //edit kk
    public function detail($nik,$l){
        $this->title = 'PENDUDUK || SIWADES || DETAIL';
        if($l == 2){
            $this->aktif = 'kk';
        }
        $data['penduduk'] = $this->penduduk->getPenduduk($nik)->row_array();
        $data['l'] = $l;
        $data['fl'] = $this->penduduk->getFileAll($nik)->result_array();
        $this->load->view('template/head');
        $this->load->view('template/menu');
        $this->load->view('penduduk/pendudukd',$data);
        $this->load->view('template/footer');
    }
    //edit kk
    public function embed($id){
        $data['file'] = $id;
        $this->load->view('penduduk/embed',$data);
    }

    // add pdf
    public function addPdf(){
        $nik = $this->input->post('nik');
        $id_dokumen = $this->input->post('id_dokumen');
        $l = $this->input->post('lee');
        $dokumen=$_FILES['file']['name'];
        $dir="./assets/file/"; //tempat upload foto
        $dirs="./assets/files/"; //tempat upload foto
        $file='file'; //name pada input type file
        $new_name3='file'.$nik.'-'.$id_dokumen.'.pdf'; //name pada input type file
        $vdir_upload = $dir;
        $file_name=$_FILES[''.$file.'']["name"];
        $vfile_upload = $vdir_upload . $file;
        $tmp_name=$_FILES[''.$file.'']["tmp_name"];
        if (move_uploaded_file($tmp_name, $dirs.$file_name)) {
            rename($dirs.$file_name,$dirs.$new_name3);
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data Gagal ditambahkan !</p></div>');
            redirect('detailpenduduk/'.$nik.'/'.$l);
        }
        $val = array(
            'id_dokumen' => $id_dokumen,
            'nik' => $nik,
            'file' => $new_name3,
            'status' => 1
        );
        $tambah = $this->global->insert('file',$val);
        
        if ($tambah) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data Berhasil ditambahkan !</p></div>');
             redirect('detailpenduduk/'.$nik.'/'.$l);
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data Gagal ditambahkan !</p></div>');
            redirect('detailpenduduk/'.$nik.'/'.$l);
        }
    }
    // delete pdf
    public function deletePdf(){
        $nik = $this->input->post('nik');
        $id_dokumen = $this->input->post('id_dokumen');
        $l = $this->input->post('lee');
        $files = $file['file'];
        $dir = "./assets/files/";
        unlink($dir.$files);
        $where = array('nik' => $nik,'id_dokumen' => $id_dokumen);
        $hapus = $this->global->delete('file',$where);
        
        if ($hapus) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data Berhasil dihapus !</p></div>');
            redirect('detailpenduduk/'.$nik.'/'.$l);
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data Gagal dihapus !</p></div>');
            redirect('detailpenduduk/'.$nik.'/'.$l);
        }
        
    }
}
