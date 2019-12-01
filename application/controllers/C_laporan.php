<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_laporan extends CI_Controller {
    public $title = 'LAPORAN || SIWADES';
    public $aktif = 'laporan';

     public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Kartukeluarga', 'kk');
        $this->load->model('M_global', 'global');
        if(!$this->session->userdata('userdata'))
            redirect('/');
    }

	 //menampilkan
    public function index(){
        $data['kk'] = $this->kk->getKK()->result_array();
        $data['agama'] = $this->global->getAll('agama')->result_array();
        $data['agama'] = $this->global->getAll('agama')->result_array();
        $data['klasifikasi'] = $this->global->getAll('klasifikasi')->result_array();
        $this->load->view('template/head');
        $this->load->view('template/menu');
        $this->load->view('laporan/laporanm',$data);
        $this->load->view('template/footer');
    }
 
    //tambah klasifikasi
    public function export(){
        $kk = $this->input->post('kk');
        $agama = $this->input->post('agama');
        $klasifikasi = $this->input->post('klasifikasi');
        $data['all'] = $this->kk->getLaporan($kk, $agama, $klasifikasi)->result_array(); 
        $this->load->view('laporan/eks',$data);
    }
}
