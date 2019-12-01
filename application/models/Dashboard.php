<?php
class Dashboard extends CI_Model
{
    public function penduduk()
    {
        $this->db->select("count(*) as jumlah, 
        (select count(*) from penduduk where id_klasifikasi = 'k1') as a,
        (select count(*) from penduduk where id_klasifikasi = 'k2') as b,
        (select count(*) from penduduk where id_klasifikasi = 'k3') as c,
        (select count(*) from penduduk where id_klasifikasi = 'k4') as d,
        (select count(*) from penduduk where jk = 'L') as l,
        (select count(*) from penduduk where jk = 'P') as p");
        return $this->db->get('penduduk');
    }
}