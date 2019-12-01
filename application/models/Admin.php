<?php
class Admin extends CI_Model
{
    public function dokumen(){
        $nik = $this->session->userdata('userdata');
        $dokumen = $this->db->query("SELECT dokumen.nama_dokumen, file.file FROM penduduk, dokumen, file 
                            WHERE penduduk.nik = file.nik
                            AND file.id_dokumen = dokumen.id_dokumen
                            AND file.nik = '$nik'");
        return $dokumen;
    }

    public function about(){
        $nik = $this->session->userdata('userdata');
        $about = $this->db->query("SELECT * FROM penduduk, agama, klasifikasi WHERE penduduk.nik = '$nik' AND agama.id_agama = penduduk.id_agama 
                                    AND klasifikasi.id_klasifikasi = penduduk.id_klasifikasi");
        return $about;
    }
}