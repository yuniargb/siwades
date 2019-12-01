<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_agama extends CI_Controller {
    public $title = 'AGAMA || SIWADES';
    public $aktif = 'agama';

     public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Agama', 'agama');
        $this->load->model('M_global', 'global');
        if(!$this->session->userdata('userdata'))
            redirect('/');
    }

	 //menampilkan
    public function index(){
        $data['agm'] = $this->agama->getAgama()->result_array();
        $data['id_new'] = $this->agama->newId('agama')->row_array();
        $this->load->view('template/head');
        $this->load->view('template/menu');
        $this->load->view('agama/agamam',$data);
        $this->load->view('template/footer');
    }
 
    //tambah agama
    public function store(){
        $id = $this->input->post('id_agama');
        $nama = $this->input->post('nama_agama');
        $val = array(
            'id_agama' => $id, 'nama_agama' => $nama, 'status' => 1
        );
        $tambah = $this->global->insert('agama',$val);
        if ($tambah) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data <strong>'.$nama.'</strong> berhasil ditambahkan !</p></div>');
            redirect('agama');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data <strong>'.$nama.'</strong> gagal ditambahkan !</p></div>');
            redirect('agama');
        }
    }

    //hapus agama
    public function delete($id){
        $where = array('id_agama' => $id);
        $nama   = $this->global->getAll('agama',$where)->result_array();
        $nw = $nm['nama_agama'];
        $hapus = $this->global->delete('agama',$where);
        if ($hapus) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data <strong>'.$nw.'</strong>  Berhasil dihapus !</p></div>');
            redirect('agama');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-sanger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data <strong>'.$nw.'</strong>  Gagal dihapus !</p></div>');
            redirect('agama');
        }
    }

    //edit agama
    public function edit($id_agama){
        $this->title = 'EDIT || AGAMA || SIWADES';
        $where = array('id_agama' => $id_agama);
        $data['edit'] = $this->global->getAll('agama',$where)->row_array();
        $this->load->view('template/head');
        $this->load->view('template/menu');
        $this->load->view('agama/agamae',$data);
        $this->load->view('template/footer');
    }

    //edit proses
    public function update(){
        $id_agama = $this->input->post('id_agama');  
        $nama_agama = $this->input->post('nama_agama');
        $set = array('nama_agama' => $nama_agama);
        $where = array('id_agama' => $id_agama);
        $edit = $this->global->update('agama',$set,$where);
        if ($edit) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data <strong>'.$nama_agama.'</strong>  Berhasil diedit !</p></div>');
            redirect('agama');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-sanger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data <strong>'.$nama_agama.'</strong>  Gagal diedit !</p></div>');
            redirect('agama');
        }
    }
    
}
