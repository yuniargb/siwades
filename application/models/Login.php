<?php
class Login extends CI_Model
{
    public function auth($u,$pass){
        return $this->db->query("SELECT * FROM penduduk, hak_akses, hak_akses_user 
							WHERE penduduk.nik = hak_akses_user.nik 
							AND hak_akses.id_akses = hak_akses_user.id_akses
							AND penduduk.username = '$u'
                            AND penduduk.password = '$pass'");
    }
    public function status($nik,$waktu){
        $this->db->query("INSERT INTO online (nik, waktu) VALUES ('$nik', '$waktu')");
        $this->db->query("UPDATE penduduk SET status = 1 WHERE nik = '$nik'");
        return $this->db->affected_rows();
    }
    public function getValidasi($aa){
        return $this->db->query("SELECT * FROM penduduk, hak_akses, hak_akses_user 
                                WHERE penduduk.nik = hak_akses_user.nik 
                                AND hak_akses.id_akses = hak_akses_user.id_akses
                                AND penduduk.nik = '$aa'");
    }
}
