<?php

include_once 'koneksi.php';

class JenisController {

    private $koneksi;

    public function __construct() {
        $this->koneksi = Database::connect();
    }

    
    public function DaftarKegjen() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM `keg_jenis`");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function TambahJenis($nama, $ket) {
        try {
            $sst = $this->koneksi->prepare("INSERT INTO keg_jenis(
            nama_kegiatan, ket)
    VALUES (?,?);");        
            $sst->bindparam(1, $nama);
			$sst->bindparam(2, $ket);;
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function HapusJenis($key) {
        try {
            $sst = $this->koneksi->prepare("DELETE from keg_jenis where id_keg='$key'");
            $sst->execute();
            return $result = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function TampilEditJenis($key) {
        try {
            $sst = $this->koneksi->prepare("select * from keg_jenis where id_keg='$key'");
            $sst->execute();
            return $result = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function EditJenis($idkeg, $nama, $ket) {
        try {
            $sst = $this->koneksi->prepare("UPDATE keg_jenis  SET nama_kegiatan=?, ket=? WHERE id_keg='$idkeg';");
            $sst->bindparam(1, $nama);
			$sst->bindparam(2, $ket);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function DaftarDetail() {
        try {
            $sst = $this->koneksi->prepare("select * from keg_jenis_detail natural join keg_jenis ");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	

	public function DaftarKeg($ket) {
        try {
            $sst = $this->koneksi->prepare("select * from keg_jenis_detail natural join keg_jenis where ket='$ket'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
		public function TambahDetail($keg, $biaya, $pj, $kuota, $thn, $awal, $akhir, $lokasi) {
        try {
            $sst = $this->koneksi->prepare("INSERT INTO keg_jenis_detail(
            id_keg, biaya, tgl_mulai, tgl_akhir, penanggung_jawab, kuota, tahun, lokasi)
    VALUES (?,?,?,?,?,?,?,?);");        
            $sst->bindparam(1, $keg);
			$sst->bindparam(2, $biaya);
			$sst->bindparam(3, $awal);
			$sst->bindparam(4, $akhir);
			$sst->bindparam(5, $pj);
			$sst->bindparam(6, $kuota);
			$sst->bindparam(7, $thn);
			$sst->bindparam(8, $lokasi);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
		public function HapusDetail($key) {
        try {
            $sst = $this->koneksi->prepare("DELETE from keg_jenis_detail where id_detail='$key'");
            $sst->execute();
            return $result = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
		public function TampilEditDetail($key) {
        try {
            $sst = $this->koneksi->prepare("select * from keg_jenis_detail natural join keg_jenis WHERE id_detail='$key'");
            $sst->execute();
            return $result = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	    public function EditDetail($key, $keg, $biaya, $pj, $kuota, $thn, $awal, $akhir, $lokasi) {
        try {
            $sst = $this->koneksi->prepare("UPDATE keg_jenis_detail  SET id_keg=?, biaya=?, tgl_mulai=?, tgl_akhir=?, 
			penanggung_jawab=?, kuota=?, tahun=?, lokasi=? WHERE id_detail='$key';");
            $sst->bindparam(1, $keg);
			$sst->bindparam(2, $biaya);
			$sst->bindparam(3, $awal);
			$sst->bindparam(4, $akhir);
			$sst->bindparam(5, $pj);
			$sst->bindparam(6, $kuota);
			$sst->bindparam(7, $thn);
			$sst->bindparam(8, $lokasi);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	

}
?>