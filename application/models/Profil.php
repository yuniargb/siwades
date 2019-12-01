<?php
class Profil extends CI_Model
{
    public function dokumen(){
        $nik = $this->session->userdata('nik');
        $dokumen = $_mysqli->query("SELECT dokumen.nama_dokumen, file.file FROM penduduk, dokumen, file 
                            WHERE penduduk.nik = file.nik
                            AND file.id_dokumen = dokumen.id_dokumen
                            AND file.nik = '$nik'");
        return $dokumen;
    }

    public function about(){
        $nik = $this->session->userdata('nik');
        $about = $_mysqli->query("SELECT * FROM penduduk, agama, klasifikasi WHERE penduduk.nik = '$nik' AND agama.id_agama = penduduk.id_agama 
                                    AND klasifikasi.id_klasifikasi = penduduk.id_klasifikasi");
        $prof = mysqli_fetch_array($about);
        return $prof;
    }

    public function edit_profil($nik,$username,$password,$tentang,$ft_lw){
        $pass       = base64_encode($password);
        //foto
        if ($_FILES['foto']['name'] == "") {
            $fotoup = $ft_lw;
        }else{
            $lawas = "../foto/".$ft_lw;
            unlink($lawas);

            $filename   = $_FILES['foto']['name'];
            $dir        = "../foto/";
            $file       = 'foto';
            $file_name      = $_FILES[''.$file.'']["name"];
            $tmp_file       = $_FILES[''.$file.'']["tmp_name"];
            move_uploaded_file ($tmp_file, $dir.$file_name);
            $fotoup = $file_name;
        }
        //foto
        $edit = $_mysqli->query("UPDATE penduduk SET username = '$username', password = '$pass', about = '$tentang', foto = '$fotoup' WHERE nik ='$nik'");
                    if ($edit) {
            $nilai = 
            <<<HEREDOCS
                        <!-- Danger Alert -->
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><strong>Sukses</strong></h4>
                            <p>Data Anda berhasil di Update !</p>
                        </div>
                        <!-- END Danger Alert -->
HEREDOCS;
                            setcookie("alert", $nilai, time()+2);
                            header('location:../pilihan.php?menu=7');
                            return TRUE;
                    }else{
            $nilai = 
<<<HEREDOCS
                        <!-- Danger Alert -->
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><strong>Error</strong></h4>
                            <p>Data Anda gagal di Update !</p>
                        </div>
                        <!-- END Danger Alert -->
HEREDOCS;
                            setcookie("alert", $nilai, time()+2);
                            header('location:../pilihan.php?menu=7');
                            return TRUE;
                    }
    }



}