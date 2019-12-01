<?php
class Chat extends CI_Model
{
    public function pesan(){
        $pesan = $this->db->query("SELECT * FROM pesan, penduduk WHERE pesan.nik = penduduk.nik");
        return $pesan;
    }
}