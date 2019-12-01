<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Klasifikasi extends CI_Controller {
    public $title = 'KLASIFIKASI || SIWADES';
    public $aktif = 'klasifikasi';

     public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Klasifikasi', 'klasifikasi');
        $this->load->model('M_global', 'global');
        if(!$this->session->userdata('userdata'))
            redirect('/');
    }

	 //menampilkan
    public function index(){
        $data['klas'] = $this->klasifikasi->getKlasifikasi()->result_array();
        $data['id_new'] = $this->klasifikasi->newId('klasifikasi')->row_array();
        $this->load->view('template/head');
        $this->load->view('template/menu');
        $this->load->view('klasifikasi/klasifikasim',$data);
        $this->load->view('template/footer');
    }
 
    //tambah klasifikasi
    public function store(){
        $id = $this->input->post('id_klasifikasi');
        $nama = $this->input->post('nama_klasifikasi');
        $val = array(
            'id_klasifikasi' => $id, 'nama_klasifikasi' => $nama, 'status' => 1
        );
        $tambah = $this->global->insert('klasifikasi',$val);
        if ($tambah) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data <strong>'.$nama.'</strong> berhasil ditambahkan !</p></div>');
            redirect('klasifikasi');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data <strong>'.$nama.'</strong> gagal ditambahkan !</p></div>');
            redirect('klasifikasi');
        }
    }

    //tambah dokumen klasifikasi
    public function storeDokumen(){
        $id = $this->input->post('id_klasifikasi');
        $idDokumen = $this->input->post('id_dokumen');
        $val = array(
            'id_klasifikasi' => $id, 'id_dokumen' => $idDokumen
        );
        $cek = $this->global->getAll('klasifikasi_dokumen',$val)->num_rows();
        if($cek > 0){
            $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><strong>Error</strong></h4><p>Data Sudah Ada !</p></div>');
            redirect('detailklasifikasi/'.$id);
        }else{
            $tambah = $this->global->insert('klasifikasi_dokumen',$val);
            if ($tambah) {
                $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data Berhasil ditambahkan !</p></div>');
                redirect('detailklasifikasi/'.$id);
            }else{
                $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data gagal ditambahkan !</p></div>');
                redirect('detailklasifikasi/'.$id);
            }
        }
    }

    //hapus klasifikasi
    public function delete($id){
        $where = array('id_klasifikasi' => $id);
        $nama   = $this->global->getAll('klasifikasi',$where)->result_array();
        $nw = $nm['nama_klasifikasi'];
        $hapus = $this->global->delete('klasifikasi',$where);
        if ($hapus) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data <strong>'.$nw.'</strong>  Berhasil dihapus !</p></div>');
            redirect('klasifikasi');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-sanger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data <strong>'.$nw.'</strong>  Gagal dihapus !</p></div>');
            redirect('klasifikasi');
        }
    }

    //hapus klasifikasi
    public function deleteDokumen(){
        $id = $this->input->post('id_klasifikasi');
        $idDokumen = $this->input->post('id_dokumen');
        $where = array('id_klasifikasi' => $id,'id_dokumen' => $idDokumen);
        $nama   = $this->global->getAll('klasifikasi_dokumen',$where)->result_array();
        $nw = $nm['nama_klasifikasi'];
        $hapus = $this->global->delete('klasifikasi_dokumen',$where);
        if ($hapus) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data <strong>'.$nw.'</strong>  Berhasil dihapus !</p></div>');
            redirect('detailklasifikasi/'.$id);
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-sanger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data <strong>'.$nw.'</strong>  Gagal dihapus !</p></div>');
            redirect('detailklasifikasi/'.$id);
        }
    }

    //edit klasifikasi
    public function edit($id_klasifikasi){
        $this->title = 'EDIT || klasifikasi || SIWADES';
        $where = array('id_klasifikasi' => $id_klasifikasi);
        $data['edit'] = $this->global->getAll('klasifikasi',$where)->row_array();
        $this->load->view('template/head');
        $this->load->view('template/menu');
        $this->load->view('klasifikasi/klasifikasie',$data);
        $this->load->view('template/footer');
    }
    
    //edit proses
    public function update(){
        $id = $this->input->post('id_klasifikasi');
        $nama = $this->input->post('nama_klasifikasi');
        $set = array('nama_klasifikasi' => $nama);
        $where = array('id_klasifikasi' => $id);
        $edit = $this->global->update('klasifikasi',$set,$where);
        if ($edit) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data <strong>'.$nama.'</strong>  Berhasil diedit !</p></div>');
            redirect('klasifikasi');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-sanger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data <strong>'.$nama.'</strong>  Gagal diedit !</p></div>');
            redirect('klasifikasi');
        }
    }
    
    //detail klasifikasi
    public function detail($id_klasifikasi){
        $where = array('id_klasifikasi' => $id_klasifikasi);
        $data['judul'] = $this->global->getAll('klasifikasi',$where)->row_array();
        $data['id_klas'] = $id_klasifikasi;
        $data['dokumen'] = $this->global->getAll('dokumen')->result_array();
        $data['detail'] = $this->klasifikasi->detailKlasifikasi($id_klasifikasi)->result_array();
        $this->title = 'DETAIL '.$data['judul']['nama_klasifikasi'].' || KLASIFIKASI || SIWADES';
        $this->load->view('template/head');
        $this->load->view('template/menu');
        $this->load->view('klasifikasi/klasifikasid',$data);
        $this->load->view('template/footer');
    }
    
}
