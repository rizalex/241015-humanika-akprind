<?php

include_once 'koneksi.php';

class ArsipController {

    private $koneksi;

    public function __construct() {
        $this->koneksi = Database::connect();
    }


	public function DaftarArsip() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM `keg_arsip` join keg_jenis_detail using(id_detail) join keg_jenis using(id_keg)");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function DaftarArsipSE() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM `keg_arsip` join keg_jenis_detail using(id_detail) join keg_jenis using(id_keg) where ket='SE' && status='0'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function DaftarArsipLDKM() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM `keg_arsip` join keg_jenis_detail using(id_detail) join keg_jenis using(id_keg) where ket='LDKM' && status='0'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function DaftarDetail($kode) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM `keg_arsip` join keg_jenis_detail using(id_detail) join keg_jenis using(id_keg) where id_arsip='$kode'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function DaftarKegjen() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM keg_jenis_detail natural join keg_jenis");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function TambahArsip($id, $desk, $file, $name, $size, $type, $jamtgl, $status) {
        try {
            $sst = $this->koneksi->prepare("INSERT INTO keg_arsip(id_detail, deskripsi, file, file_name, file_size, file_type, tgl_jam_update, status) 
			VALUES (?,?,?,?,?,?,?,?,?)");        
            $sst->bindparam(1, $id);
			$sst->bindparam(2, $desk);
			$sst->bindparam(3, $file);
			$sst->bindparam(4, $name);
			$sst->bindparam(5, $size);
			$sst->bindparam(6, $type);
			$sst->bindparam(7, $jamtgl);
			$sst->bindparam(8, $status);
	
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function EditStatus($idarsip, $status) {
        try {
            $sst = $this->koneksi->prepare("UPDATE keg_arsip  SET status=? WHERE id_arsip='$idarsip';");
            $sst->bindparam(1, $status);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function EditFile($idarsip, $file, $name, $size, $type) {
        try {
            $sst = $this->koneksi->prepare("UPDATE keg_arsip  SET file=?, file_name=?, file_size=?, file_type=? WHERE id_arsip='$idarsip';");
            $sst->bindparam(1, $file);
			$sst->bindparam(2, $name);
			$sst->bindparam(3, $size);
			$sst->bindparam(4, $type);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	

	
	public function HapusArsip($key) {
        try {
            $sst = $this->koneksi->prepare("DELETE from keg_arsip where id_arsip='$key'");
            $sst->execute();
            return $result = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function TampilEditArsip($key) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM `keg_arsip` join keg_jenis_detail using(id_detail) join keg_jenis using(id_keg) where id_arsip='$key'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function EditArsip($kode, $id, $desk, $jam, $tgl, $status) {
        try {
            $sst = $this->koneksi->prepare("UPDATE keg_arsip  SET id_detail=?, deskripsi=?, jam_update=?, tgl_update=?, status=? WHERE id_arsip='$kode';");
            $sst->bindparam(1, $id);
			$sst->bindparam(2, $desk);
			$sst->bindparam(3, $jam);
			$sst->bindparam(4, $tgl);
			$sst->bindparam(5, $status);
		
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	

}
?>