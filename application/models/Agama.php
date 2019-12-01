<?php
class Agama extends CI_Model
{
    public function getAgama(){
        return $this->db->query("SELECT *, count(penduduk.id_agama) as jumlah,agama.status as statt,agama.id_agama FROM agama LEFT JOIN penduduk ON penduduk.id_agama = agama.id_agama GROUP BY agama.id_agama");
    }
    public function newId(){
        return $this->db->query("SELECT MAX(RIGHT(id_agama,1)) + 1 as id_new FROM agama");
    }
}