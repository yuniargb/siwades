<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Kartukeluarga extends CI_Controller {
    public $title = 'KARTU KELUARGA || SIWADES';
    public $aktif = 'kk';

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
        $data['kk'] = $this->kk->getKartuKeluarga()->result_array();
        $data['id_new'] = $this->kk->newId()->row_array();
        $this->load->view('template/head');
        $this->load->view('template/menu');
        $this->load->view('kk/kkm',$data);
        $this->load->view('template/footer');
    }
 
    //tambah klasifikasi
    public function store(){
        $val = array(
           'id_kk'  => $this->input->post('id_kk'),
           'no_kk'  => $this->input->post('no_kk'),
           'rt'     => $this->input->post('rt'),
           'rw'     => $this->input->post('rw'),
           'alamat' => $this->input->post('alamat'),
           'desa'   => $this->input->post('desa'),
           'kecamatan' => $this->input->post('kecamatan'),
           'kabupaten' => $this->input->post('kabupaten'),
           'kode_pos'  => $this->input->post('kode_pos'),
           'provinsi'  => $this->input->post('provinsi'),
           'status' => 1
        );
        $tambah = $this->global->insert('kk',$val);
        if ($tambah) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data <strong>'.$no_kk.'</strong> berhasil ditambahkan !</p></div>');
            redirect('kartukeluarga');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data <strong>'.$no_kk.'</strong> gagal ditambahkan !</p></div>');
            redirect('kartukeluarga');
        }
    }

    //tambah anggota
    public function storeAnggota(){
        $nik                = $this->input->post('nik');
        $kk                = $this->input->post('no_kk');
        //upload foto
        $filename   = $_FILES['foto']['name'];
        $dir        = "./assets/foto/";
        $file       = 'foto';
        $new_name3  ='foto'.$nik.'.jpg'; //name pada input type file
        
        $file_name      = $_FILES[''.$file.'']["name"];
        $tmp_file       = $_FILES[''.$file.'']["tmp_name"];
        
        move_uploaded_file ($tmp_file, $dir.$file_name);
        rename($dir.$file_name, $dir.$new_name3);

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
            'no_kk'              => $this->input->post('no_kk'),
            'foto'               => $new_name3, 
            'status'             => 0
        );
        $tambah = $this->global->insert('penduduk',$val);
        if ($tambah) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data Berhasil ditambahkan !</p></div>');
            redirect('detailkartukeluarga/'.$kk);
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data gagal ditambahkan !</p></div>');
            redirect('detailkartukeluarga/'.$kk);
        }
    }

    //hapus kk
    public function delete($id){
        $where = array('no_kk' => $id);
        $nama   = $this->global->getAll('kk',$where)->result_array();
        $nw = $nm['no_kk'];
        $hapus = $this->global->delete('kk',$where);
        $hapus2 = $this->global->delete('penduduk',$where);
        if ($hapus && $hapus2) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data <strong>'.$nw.'</strong>  Berhasil dihapus !</p></div>');
            redirect('kartukeluarga');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-sanger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data <strong>'.$nw.'</strong>  Gagal dihapus !</p></div>');
            redirect('kartukeluarga');
        }
    }

    //hapus kk
    public function deleteAnggota($id){
        $where = array('nik' => $id);
        $nama   = $this->global->getAll('penduduk',$where)->row_array();
        $nw = $nama['nama'];
        $kk = $nama['no_kk'];
        $hapus = $this->global->delete('penduduk',$where);
        if ($hapus) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data <strong>'.$nw.'</strong>  Berhasil dihapus !</p></div>');
            redirect('detailkartukeluarga/'.$kk);
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-sanger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data <strong>'.$nw.'</strong>  Gagal dihapus !</p></div>');
            redirect('detailkartukeluarga/'.$kk);
        }
    }
    //hapus kk
    public function editAnggota($id){
        $this->title = "EDIT || PENDUDUK || SIWADES";
        $where = array('nik' => $id);
        $data['edit']   = $this->global->getAll('penduduk',$where)->row_array();
        $data['link']   = base_url('updateanggota');
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
    public function updateAnggota(){
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
            redirect('detailkartukeluarga/'.$no_kk);
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data <strong>'.$nama.'</strong>  Gagal diedit !</p></div>');
            redirect('detailkartukeluarga/'.$no_kk);
        }
    }

    //edit kk
    public function detailAnggota($id_kk){
        $this->title = 'PENDUDUK || SIWADES || DETAIL';
        $where = array('no_kk' => $id_kk);
        $data['edit'] = $this->global->getAll('kk',$where)->row_array();
        $this->load->view('template/head');
        $this->load->view('template/menu');
        $this->load->view('penduduk/pendudukd',$data);
        $this->load->view('template/footer');
    }


    //kepala keluarga
    public function kepalakeluarga(){
        $no_kk = $this->input->post('no_kk'); 
        $nik = $this->input->post('nik');
        $where = array('nik' => $nik);
        $where2 = array('no_kk' => $no_kk);
        $set = array('kepala_keluarga' => $nik);
        $nama   = $this->global->getAll('penduduk',$where)->row_array();
        $nw = $nama['nama'];
        $update = $this->global->update('kk',$set,$where2);
        if ($update) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data <strong>'.$nw.'</strong>  Berhasil dijadikan Kepala Keluarga !</p></div>');
            redirect('detailkartukeluarga/'.$no_kk);
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-sanger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Gagal saat menjadikan <strong>'.$nw.'</strong>  sebagai Kepala Keluarga !</p></div>');
            redirect('detailkartukeluarga/'.$no_kk);
        }
    }

    //edit kk
    public function edit($id_kk){
        $this->title = 'EDIT || KK || SIWADES';
        $where = array('no_kk' => $id_kk);
        $data['edit'] = $this->global->getAll('kk',$where)->row_array();
        $this->load->view('template/head');
        $this->load->view('template/menu');
        $this->load->view('kk/kke',$data);
        $this->load->view('template/footer');
    }
    
    //edit proses
    public function update(){
        $nama = $this->input->post('kkk');
        $set = array(
           'no_kk'  => $this->input->post('no_kk'),
           'rt'     => $this->input->post('rt'),
           'rw'     => $this->input->post('rw'),
           'alamat' => $this->input->post('alamat'),
           'desa'   => $this->input->post('desa'),
           'kecamatan' => $this->input->post('kecamatan'),
           'kabupaten' => $this->input->post('kabupaten'),
           'kode_pos'  => $this->input->post('kode_pos'),
           'provinsi'  => $this->input->post('provinsi')
        );
        $set2 = array('no_kk' => $this->input->post('no_kk'));
        $where = array('no_kk' => $this->input->post('kkk'));
        $edit = $this->global->update('kk',$set,$where);
        $edit2 = $this->global->update('penduduk',$set2,$where);
        if ($edit) {
            $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Sukses</strong><p>Data <strong>'.$nama.'</strong>  Berhasil diedit !</p></div>');
            redirect('kartukeluarga');
        }else{
            $this->session->set_flashdata('alert','<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Error</strong><p>Data <strong>'.$nama.'</strong>  Gagal diedit !</p></div>');
            redirect('kartukeluarga');
        }
    }
    
    //detail kk
    public function detail($id_kk){
        $where = array('no_kk' => $id_kk);
        $data['judul'] = $this->kk->getJudulKK($id_kk)->row_array();
        $data['penduduk'] = $this->kk->getPendudukKK($id_kk)->result_array();
        $data['klasifikasi'] = $this->global->getAll('klasifikasi')->result_array();
        $data['agama'] = $this->global->getAll('agama')->result_array();
        $data['detail'] = $id_kk;
        $this->title = 'ANGGOTA || KK || SIWADES';
        $this->load->view('template/head');
        $this->load->view('template/menu');
        $this->load->view('kk/kkd',$data);
        $this->load->view('template/footer');
    }
    
}
