<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {
    public $title = 'SIWADES';
    public $aktif = 'dashboard';

     public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Dashboard', 'dashboard');
        $this->load->model('M_global', 'global');
        if(!$this->session->userdata('userdata'))
            redirect('/');
    }

	public function index()
	{
        $data['x'] = $this->dashboard->penduduk()->row();
        $this->load->view('template/head');
        $this->load->view('template/menu');
        $this->load->view('dashboard/dashboardm',$data);
        $this->load->view('template/footer');
    }
    
}
