<?php

include_once 'koneksi.php';

class ArtikelController {

    private $koneksi;

    public function __construct() {
        $this->koneksi = Database::connect();
    }

    public function DaftarArtikel() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM keg_artikel natural join keg_jenis_detail natural join keg_jenis");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function DaftarPublish() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM keg_artikel natural join keg_jenis_detail natural join keg_jenis where publish='0'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function DaftarArtikelLimit($ket) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM keg_artikel natural join keg_jenis_detail natural join keg_jenis where id_keg='$ket' && publish='0' limit 5");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function DaftarArtikelSE() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM keg_artikel join keg_jenis_detail using(id_detail) join keg_jenis using(id_keg) where ket='SE' && publish='0'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
    public function DaftarArtikelLDKM() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM keg_artikel join keg_jenis_detail using(id_detail) natural join keg_jenis where ket='LDKM' && publish='0'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	public function DaftarDetail($kode) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM keg_artikel natural join keg_jenis_detail natural join keg_jenis where id_artikel='$kode'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function DaftarAdmin() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM admin_user natural join admin_level where level='Administrator'");
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
	
	public function EditStatus($idartikel, $status) {
        try {
            $sst = $this->koneksi->prepare("UPDATE keg_artikel  SET publish=? WHERE id_artikel='$idartikel';");
            $sst->bindparam(1, $status);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function TambahArtikel($id, $judul, $isi, $gambar, $jenis_gambar, $ukuran, $nama_gambar, $tgl, $jam, $admin, $stat) {
        try {
            $sst = $this->koneksi->prepare("INSERT INTO keg_artikel(
            id_detail, judul, isi_berita, publish, gambar, nama_gambar, type_gambar, size_gambar, tgl_update, jam_update, admin)
    VALUES (?,?,?,?,?,?,?,?,?,?,?);");        
            $sst->bindparam(1, $id);
			$sst->bindparam(2, $judul);
			$sst->bindparam(3, $isi);
			$sst->bindparam(4, $stat);
			$sst->bindparam(5, $gambar);
			$sst->bindparam(6, $nama_gambar);
			$sst->bindparam(7, $jenis_gambar);
			$sst->bindparam(8, $ukuran);
			$sst->bindparam(9, $tgl);
			$sst->bindparam(10, $jam);
			$sst->bindparam(11, $admin);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function HapusArtikel($key) {
        try {
            $sst = $this->koneksi->prepare("DELETE from keg_artikel where id_artikel='$key'");
            $sst->execute();
            return $result = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function TampilEditArtikel($key) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM keg_artikel natural join keg_jenis_detail natural join keg_jenis where id_artikel='$key'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function EditArtikel($kode, $id, $judul, $isi, $tgl, $jam, $admin, $stat) {
        try {
            $sst = $this->koneksi->prepare("UPDATE keg_artikel  SET id_detail=?, judul=?, isi_berita=?, publish=?, tgl_update=?, jam_update=?, admin=? WHERE id_artikel='$kode';");
            $sst->bindparam(1, $id);
			$sst->bindparam(2, $judul);
			$sst->bindparam(3, $isi);
			$sst->bindparam(4, $stat);
			$sst->bindparam(5, $tgl);
			$sst->bindparam(6, $jam);
			$sst->bindparam(7, $admin);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function EditGambar($kode, $gambar, $jenis_gambar, $ukuran, $nama_gambar) {
        try {
            $sst = $this->koneksi->prepare("UPDATE keg_artikel SET gambar=?, nama_gambar=?, type_gambar=?, size_gambar=? WHERE id_artikel='$kode';");
            $sst->bindparam(1, $gambar);
            $sst->bindparam(2, $nama_gambar);
            $sst->bindparam(3, $jenis_gambar);
            $sst->bindparam(4, $ukuran);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	

}
?>