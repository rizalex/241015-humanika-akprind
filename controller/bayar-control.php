<?php

include_once 'koneksi.php';

class BayarController {

    private $koneksi;

    public function __construct() {
        $this->koneksi = Database::connect();
    }

    
	
	public function DaftarBayar() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM konfirmasi natural join peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function DaftarBayarKeg($kode) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM konfirmasi natural join peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='$kode'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function DaftarKeuangan($kode, $tahun) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM konfirmasi natural join peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='$kode' && status='Verifikasi' && tahun='$tahun' order by id_peserta");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


	public function DaftarKeuanganBank($kode, $bank, $tahun) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM konfirmasi natural join keg_jenis_detail natural join keg_jenis where ket='$kode' && status='Verifikasi' && bank_tujuan='$bank' && tahun='$tahun'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	

	public function DaftarBank($ket, $tahun) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM referensi_bank natural join keg_jenis_detail natural join keg_jenis where ket='$ket' && tahun='$tahun'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function DaftarBayarKegTah($kode, $tahun) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM konfirmasi natural join peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='$kode' && tahun='$tahun'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function Rincian($kode, $keg) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM konfirmasi natural join peserta natural join keg_jenis_detail natural join keg_jenis where id_peserta='$kode' && ket='$keg' order by tgl_pembayaran");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function RincianBiaya($kode, $keg) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM konfirmasi natural join peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where id_peserta='$kode' && ket='$keg' && status='Verifikasi' order by tgl_pembayaran");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
		public function RincianBiayaPeserta($kode) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM konfirmasi natural join peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where nim='$kode' order by tgl_pembayaran");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	

    public function BiayaDetail($kode) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM konfirmasi natural join referensi_bank natural join peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where id_konfirmasi=?");
            $sst->bindparam(1,$kode);
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
	
	public function DaftarPesertaLimit() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM konfirmasi natural join peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis order by id_konfirmasi desc limit 1");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function DaftarBayarDetail($kode) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM konfirmasi natural join peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where id_konfirmasi='$kode'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function Bayar($kode, $ket) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM `konfirmasi` natural join peserta natural join keg_jenis_detail natural join keg_jenis where id_konfirmasi=? && ket=?");
            $sst->bindparam(1,$kode);
            $sst->bindparam(2,$ket);
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
	


    public function TambahKonfirmasi($id, $nopes, $tgl, $abank, $pemilik, $tbank, $jumlah, $bukti, $namabukti, $type, $size, $statver) {
        try {
            $sst = $this->koneksi->prepare("INSERT INTO konfirmasi(
            id_peserta, tgl_pembayaran, bank_asal, pemilik_rekening, bank_tujuan, jumlah, bukti_pembayaran, nama_bukti, type_bukti, size, status, id_konfirmasi)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");       
            $sst->bindparam(1, $nopes);
			$sst->bindparam(2, $tgl);
			$sst->bindparam(3, $abank);
			$sst->bindparam(4, $pemilik);
			$sst->bindparam(5, $tbank);
			$sst->bindparam(6, $jumlah);
			$sst->bindparam(7, $bukti);
			$sst->bindparam(8, $namabukti);
			$sst->bindparam(9, $type);
			$sst->bindparam(10, $size);
			$sst->bindparam(11, $statver);
			$sst->bindparam(12, $id);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
		public function EditStatus($id, $status) {
        try {
            $sst = $this->koneksi->prepare("UPDATE konfirmasi  SET status=? WHERE id_konfirmasi='$id';");
            $sst->bindparam(1, $status);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function EditPeserta($id, $status) {
        try {
            $sst = $this->koneksi->prepare("UPDATE peserta  SET status_bayar=? WHERE id_peserta='$id';");
            $sst->bindparam(1, $status);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	

}
?>