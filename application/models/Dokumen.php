<?php
class Dokumen extends CI_Model
{
    public function getDokumen(){
        return $this->db->query("SELECT dokumen.nama_dokumen,dokumen.id_dokumen, 
        count(penduduk.nama) as jumlah,
        (SELECT count(*) from penduduk p,klasifikasi,dokumen d,klasifikasi_dokumen 
        WHERE p.id_klasifikasi = klasifikasi.id_klasifikasi 
        AND klasifikasi.id_klasifikasi = klasifikasi_dokumen.id_klasifikasi
        AND d.id_dokumen = klasifikasi_dokumen.id_dokumen
        AND d.id_dokumen = dokumen.id_dokumen) as jumlah2
        FROM dokumen 
        LEFT JOIN file ON dokumen.id_dokumen = file.id_dokumen 
        LEFT JOIN penduduk ON  penduduk.nik = file.nik 
        GROUP BY dokumen.id_dokumen");
    }
    public function newId(){
        return $this->db->query("SELECT MAX(RIGHT(id_dokumen,1)) + 1 as id_new FROM dokumen");
    }
}