<?php

include_once 'koneksi.php';

class BankController {

    private $koneksi;

    public function __construct() {
        $this->koneksi = Database::connect();
    }

	public function DaftarBankSE($tahun) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM referensi_bank natural join keg_jenis_detail natural join keg_jenis where ket='SE' && tahun='$tahun'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function DaftarBankLDKM($tahun) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM referensi_bank natural join keg_jenis_detail natural join keg_jenis where ket='LDKM' && tahun='$tahun'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function DaftarBank() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM referensi_bank natural join keg_jenis_detail natural join keg_jenis ");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	    public function DaftarKegjen() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM keg_jenis_detail natural join keg_jenis ");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function TambahBank($id, $norek, $namabank, $namapemilik) {
        try {
            $sst = $this->koneksi->prepare("INSERT INTO referensi_bank(
            no_rekening, id_detail, nama_bank, nama_pemilik)
    VALUES (?,?,?,?);");        
             $sst->bindparam(1, $norek);
			$sst->bindparam(2, $id);
			$sst->bindparam(3, $namabank);
			$sst->bindparam(4, $namapemilik);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function HapusBank($key) {
        try {
            $sst = $this->koneksi->prepare("DELETE from referensi_bank where no_rekening='$key'");
            $sst->execute();
            return $result = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function TampilEditBank($key) {
        try {
            $sst = $this->koneksi->prepare("select * from referensi_bank natural join keg_jenis_detail natural join keg_jenis where no_rekening='$key'");
            $sst->execute();
            return $result = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function EditBank($kode, $id, $norek, $namabank, $namapemilik) {
        try {
            $sst = $this->koneksi->prepare("UPDATE referensi_bank  SET no_rekening=?, id_detail=?, nama_bank=?, nama_pemilik=? WHERE no_rekening='$kode';");
            $sst->bindparam(1, $norek);
			$sst->bindparam(2, $id);
			$sst->bindparam(3, $namabank);
			$sst->bindparam(4, $namapemilik);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	

	

}
?>