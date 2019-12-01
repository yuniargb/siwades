<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dokumen extends CI_Controller {
    public $title = 'DOKUMEN || SIWADES';
    public $aktif = 'dokumen';

     public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Dokumen', 'dokumen');
        $this->load->model('M_global', 'global');
        if(!$this->session->userdata('userdata'))
            redirect('/');
    }

	 //menampilkan
    public function index(){
        $data['dokumen'] = $this->dokumen->getDokumen()->result_array();
        $data['id_new'] = $this->dokumen->newId('dokumen')->row_array();
        $this->load->view('template/head');
        $this->load->view('template/menu');
        $this->load->view('dokumen/dokumenm',$data);
        $this->load->view('template/footer');
    }
 
    //tambah agama
    public function store(){
        $id = $this->input->post('id_dokumen');
        $nama = $this->input->post('nama_dokumen');
        $val = array(
            'id_dokumen' => $id, 'nama_dokumen' => $nama, 'status' => 1
        );
        $tambah = $this->global->insert('dokumen',$val);
        if ($tambah) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data <strong>'.$nama.'</strong> berhasil ditambahkan !</p></div>');
            redirect('dokumen');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data <strong>'.$nama.'</strong> gagal ditambahkan !</p></div>');
            redirect('dokumen');
        }
    }

    //hapus agama
    public function delete($id){
        $where = array('id_dokumen' => $id);
        $nma   = $this->global->getAll('dokumen',$where)->result_array();
        $nm = $nma['nama_dokumen'];
        $hapus = $this->global->delete('dokumen',$where);
        $select2   = $this->global->getAll('file',$where)->result_array();
        $hapus3 = $this->global->delete('klasifikasi_dokumen',$where);

        foreach ($select2 as $key):
            $dir = "../files/";
            $files = $key['file'];
            unlink($dir.$files);
            $this->global->delete('file',$where);
        endforeach;

        if ($hapus) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data <strong>'.$nm.'</strong>  Berhasil dihapus !</p></div>');
            redirect('dokumen');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-sanger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data <strong>'.$nm.'</strong>  Gagal dihapus !</p></div>');
            redirect('dokumen');
        }
    }

    //edit dokumen
    public function edit($id_dokumen){
        $this->title = 'EDIT || DOKUMEN || SIWADES';
        $where = array('id_dokumen' => $id_dokumen);
        $data['edit'] = $this->global->getAll('dokumen',$where)->row_array();
        $this->load->view('template/head');
        $this->load->view('template/menu');
        $this->load->view('dokumen/dokumene',$data);
        $this->load->view('template/footer');
    }

    //edit proses
    public function update(){
        $id_dokumen = $this->input->post('id_dokumen');  
        $nama_dokumen = $this->input->post('nama_dokumen');
        $set = array('nama_dokumen' => $nama_dokumen);
        $where = array('id_dokumen' => $id_dokumen);
        $edit = $this->global->update('dokumen',$set,$where);
        if ($edit) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data <strong>'.$nama_dokumen.'</strong>  Berhasil diedit !</p></div>');
            redirect('dokumen');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-sanger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data <strong>'.$nama_dokumen.'</strong>  Gagal diedit !</p></div>');
            redirect('dokumen');
        }
    }
    
}
