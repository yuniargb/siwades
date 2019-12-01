<?php
class Penduduk extends CI_Model
{
    public function getPenduduk($nik){
        return $this->db->query("SELECT * FROM penduduk, agama, klasifikasi where penduduk.nik='$nik' AND penduduk.id_agama=agama.id_agama AND penduduk.id_klasifikasi = klasifikasi.id_klasifikasi");
    }
    public function getFileAll($nik){
        return $this->db->query("SELECT * FROM penduduk, dokumen, klasifikasi, klasifikasi_dokumen 
                                WHERE penduduk.id_klasifikasi = klasifikasi.id_klasifikasi
                                AND klasifikasi.id_klasifikasi = klasifikasi_dokumen.id_klasifikasi
                                AND dokumen.id_dokumen = klasifikasi_dokumen.id_dokumen
                                AND penduduk.nik = '$nik'");
    }
    public function getFile($id_dokumen,$nik){
        return $this->db->query("SELECT * FROM penduduk, dokumen, file where 
                                penduduk.nik='$nik' 
                                AND penduduk.nik = file.nik 
                                AND dokumen.id_dokumen = file.id_dokumen
                                AND dokumen.id_dokumen = '$id_dokumen'");
    }
}