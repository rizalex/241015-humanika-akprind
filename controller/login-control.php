<?php
require_once 'koneksi.php';

class ProgramUtama {

    private $koneksi;

    public function  __construct() {
        $this->koneksi=Database::connect();
    }

    public function CekLogin($user, $pass) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM `admin_user` where username=? and password=?");
            $sst->bindparam(1,$user);
            $sst->bindparam(2,$pass);
            $sst->execute();
            if($sst->rowCount()==0) {
                return 0;
            }else {
                return $sst->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function CekPeserta($nim, $password) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM `peserta` join mahasiswa using(nim) join keg_jenis_detail using(id_detail) join keg_jenis using(id_keg) where nim=? and password=?");
            $sst->bindparam(1,$nim);
            $sst->bindparam(2,$password);
            $sst->execute();
            if($sst->rowCount()==0) {
                return 0;
            }else {
                return $sst->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function CekKegPeserta($kode) {
        try {
            $sst = $this->koneksi->prepare("SELECT count(*) as jumlah peserta join mahasiswa using(nim) join keg_jenis_detail using(id_detail) join keg_jenis using(id_keg) where nim='$kode'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


}
?>
