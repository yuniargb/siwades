<?php
class Kartukeluarga extends CI_Model
{
    public function getKartuKeluarga(){
        return $this->db->query("SELECT *,(SELECT count(p.nama) FROM penduduk p
                                    WHERE p.no_kk = kk.no_kk) as jumlah,kk.no_kk,penduduk.nama,kk.kepala_keluarga,penduduk.nama FROM kk LEFT JOIN penduduk ON kk.kepala_keluarga = penduduk.nik GROUP BY kk.no_kk");
    }
    public function getKK(){
        return $this->db->query("SELECT * FROM kk, penduduk WHERE kk.kepala_keluarga = penduduk.nik");
    }
    public function newId(){
        return $this->db->query("SELECT MAX(RIGHT(id_kk,1)) + 1 as id_new FROM kk");
    }
    public function detailKK($id_kk){
        return $this->db->query("SELECT * FROM kk , dokumen, kk_dokumen
                                        WHERE kk.id_kk = kk_dokumen.id_kk
                                        AND dokumen.id_dokumen = kk_dokumen.id_dokumen
                                        AND kk.id_kk = '$id_kk'");
    }
    public function getJudulKK($id_kk){
        return $this->db->query("SELECT penduduk.nama FROM penduduk, kk
                                    WHERE penduduk.no_kk = kk.no_kk
                                    AND kk.kepala_keluarga = penduduk.nik
                                    AND penduduk.no_kk = '$id_kk'");
    }
    public function getPendudukKK($id_kk){
        return $this->db->query("SELECT * ,(SELECT penduduk.nama FROM penduduk p, kk k
                                    WHERE p.nik = k.kepala_keluarga
                                    AND k.kepala_keluarga = kk.no_kk ) as jumlah FROM penduduk, kk
                                    WHERE penduduk.no_kk = kk.no_kk
                                    AND penduduk.no_kk = '$id_kk'");
                                    
    }
    //menampilkan ekspor
    public function getLaporan($kk = null, $agama = null, $klasifikasi = null){
        if($kk!=""){
		$and="AND kk.no_kk='$kk'";
		}else{
			$and="";
		}
		if($agama!=""){
			$and1="AND agama.id_agama='$agama'";
		}else{
			$and1="";
		}
		if($klasifikasi!=""){
			$and2="AND klasifikasi.id_klasifikasi='$klasifikasi'";
		}else{
			$and2="";
		}

        $all = $this->db->query("SELECT * FROM penduduk, agama, klasifikasi, kk 
        						WHERE penduduk.no_kk = kk.no_kk
        						AND penduduk.id_agama = agama.id_agama
        						AND penduduk.id_klasifikasi = klasifikasi.id_klasifikasi
        						".$and."
        						".$and1."
        						".$and2."
        						");
        return $all;
	}
}