<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_chat extends CI_Controller {
    public $title = 'CHAT || SIWADES';
    public $aktif = 'chat';

     public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Chat', 'chat');
        $this->load->model('M_global', 'global');
        if(!$this->session->userdata('userdata'))
            redirect('/');
    }

	 //menampilkan
    public function index(){
        $where = array('status' => 1);
        $where2 = array('status' => 0);
        $data['online'] = $this->global->getAll('penduduk',$where)->result_array();
        $data['offline'] = $this->global->getAll('penduduk',$where2)->result_array();
        $this->load->view('template/head');
        $this->load->view('template/menu');
        $this->load->view('chat/chatm',$data);
        $this->load->view('template/footer');
    }
    public function store(){
        $nik = $this->session->userdata('userdata');
        $pesan = $this->input->post('pesan');
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date("d-m-Y  H:i");

        $kirim = $this->db->query("INSERT INTO `pesan` (`nik`, `pesan`, `waktu`) VALUES ('$nik', '$pesan', '$waktu')");

        if ($kirim) {
            print "terkirim";
        }else{
            print "gagal";
        }
    }
    //edit proses
    public function ambil(){
        $ambil = $this->chat->pesan()->result_array();
        foreach ($ambil as $ulangi):
            // this is emoticon's operation bro 
            $text_awal=$ulangi['pesan'];
            $symbol=array("[kasmaran]","[kedip]","[ketawa]","[marah]","[melet]","[nangis]",
                        "[sakit]","[bye]","[maki-maki]","[cmarah]","[cmurung]","[cnangis]",
                        "[csedih]","[csenyum]","[bonus]");
                        
            $icon=array("<img src='".base_url('assets/chat/')."emot/akasmaran.gif' title='handup'>",
                    "<img src='".base_url('assets/chat/')."emot/akedip.gif' title='bingung'>",
                    "<img src='".base_url('assets/chat/')."emot/aketawa.gif' title='capek'>",
                    "<img src='".base_url('assets/chat/')."emot/amarah.gif' title='cemen'>",
                    "<img src='".base_url('assets/chat/')."emot/amelet.gif' title='cool'>",
                    "<img src='".base_url('assets/chat/')."emot/anangis.gif' title='galau'>",
                    "<img src='".base_url('assets/chat/')."emot/asakit.gif' title='hay'>",
                    "<img src='".base_url('assets/chat/')."emot/bye.gif' title='kedip'>",
                    "<img src='".base_url('assets/chat/')."emot/maki-maki.gif' title='kesetrum'>",
                    "<img src='".base_url('assets/chat/')."emot/marah.gif' title='lol'>",
                    "<img src='".base_url('assets/chat/')."emot/murung.gif' title='mewek'>",
                    "<img src='".base_url('assets/chat/')."emot/nangis.gif' title='nangis'>",
                    "<img src='".base_url('assets/chat/')."emot/sedih.gif' title='nyengir'>",
                    "<img src='".base_url('assets/chat/')."emot/smile.gif' title='psimis'>",
                    "<img src='".base_url('assets/chat/')."emot/bonus.png' title='rokok'>");
            $pesan=str_replace($symbol,$icon,$text_awal);
            
            

        $ui = $ulangi['nik'];
        $f = $this->db->query("SELECT * FROM penduduk WHERE penduduk.nik = '$ui'");
        $foto = $f->row_array();
        $ft =  $foto['foto'];
        if ($ulangi['nik'] == $this->session->userdata('userdata')) {
            echo "			
            <div align='right'>
                <p>
                    <span class='label label-info text-center'>"
                        .$ulangi['nama']."<img src='".base_url('assets/chat/')."/foto/$ft' alt='Avatar' class='img-circle '>
                    </span><br>
                    <small class='muted'>(".$ulangi['waktu'].")</small><br>
                    <small>&nbsp;".nl2br($pesan)."</small>
                </p>
            </div>";	
        }else{
            echo "			
            <div align='left'>
                <p>
                    <span class='label label-warning text-center'>
                        <img src='".base_url('assets/chat/')."/foto/$ft' alt='Avatar' class='img-circle '>".$ulangi['nama']."
                    </span><br>
                    <small class='muted'>(".$ulangi['waktu'].")</small><br>
                    <small>&nbsp;".nl2br($pesan)."</small>
                </p>
            </div>";
        }

        endforeach;

    }
    
}
