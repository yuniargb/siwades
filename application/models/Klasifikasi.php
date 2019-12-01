<?php
class Klasifikasi extends CI_Model
{
    public function getKlasifikasi(){
        return $this->db->query("SELECT *, count(penduduk.nama) as jumlah,klasifikasi.nama_klasifikasi,klasifikasi.status,klasifikasi.id_klasifikasi FROM klasifikasi  LEFT JOIN penduduk ON penduduk.id_klasifikasi = klasifikasi.id_klasifikasi GROUP BY klasifikasi.id_klasifikasi");
    }
    public function newId(){
        return $this->db->query("SELECT MAX(RIGHT(id_klasifikasi,1)) + 1 as id_new FROM klasifikasi");
    }
    public function detailKlasifikasi($id_klasifikasi){
        return $this->db->query("SELECT * FROM klasifikasi , dokumen, klasifikasi_dokumen
                                        WHERE klasifikasi.id_klasifikasi = klasifikasi_dokumen.id_klasifikasi
                                        AND dokumen.id_dokumen = klasifikasi_dokumen.id_dokumen
                                        AND klasifikasi.id_klasifikasi = '$id_klasifikasi'");
    }
}