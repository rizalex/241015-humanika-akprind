<?php

include_once 'koneksi.php';

class PesertaController {

    private $koneksi;

    public function __construct() {
        $this->koneksi = Database::connect();
    }

    public function DaftarPesertaLimit() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis order by id_peserta desc limit 1");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function DaftarPeserta($keg, $tahun) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='$keg' && tahun='$tahun'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function PesertaStatus($kode) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta where id_peserta=?");
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
   
    public function DaftarTersedia($kode, $keg) {
         try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta natural join keg_jenis_detail natural join keg_jenis where nim='$kode' && ket='$keg' ");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    
    public function DaftarDetail($kode, $ket) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='$ket' && id_peserta='$kode'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function PesertaStat($kode, $ket) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join keg_jenis_detail using(id_detail) join keg_jenis using(id_keg) where id_keg='$ket' && id_peserta='$kode'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	    public function PesertaData($kode) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) join keg_jenis_detail using(id_detail) join keg_jenis using(id_keg) where id_peserta='$kode'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function DaftarSeluruh() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis ");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function DaftarPesertaKeg($keg) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='$keg'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function DaftarPesertaKegTah($keg, $tahun) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='$keg' && tahun='$tahun'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }


	
    public function DaftarSE() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='SE'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	
	public function DaftarSETahun($kode) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='SE' && tahun='$kode'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	
	public function DaftarLDKMStatusTahun($kode, $stat) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='LDKM' && tahun='$kode' && status_bayar='$stat' ");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	
	public function DaftarSEStatusTahun($kode, $stat) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='SE' && tahun='$kode' && status_bayar='$stat'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function DaftarLDKMBerkasTahun($kode, $stat) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='SE' && tahun='$kode' && status_berkas='$stat'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function DaftarSEBerkasTahun($kode, $stat) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='LDKM' && tahun='$kode' && status_berkas='$stat'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	
	public function DaftarSEStatus($status) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='SE' && status_bayar='$status'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }	
	
	
	public function DaftarLDKMStatus($status) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='LDKM' && status_bayar='$status'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function DaftarSEBerkas($status) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='SE' && status_berkas='$status'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function DaftarLDKMBerkas($status) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='LDKM' && status_berkas='$status'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function DaftarLDKM() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='LDKM'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function DaftarSETahunPrint($kode) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis natural join konfirmasi where ket='SE' && tahun='$kode' && status_bayar='Lunas'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	    public function DaftarSELunas() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis natural join konfirmasi where ket='SE' && status_bayar='Lunas'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function DaftarLDKMTahun($kode) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis where ket='LDKM' && tahun='$kode'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function DaftarLDKMTahunPrint($kode) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis natural join konfirmasi where ket='LDKM' && tahun='$kode' && status_bayar='Lunas'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
	
	public function DaftarLDKMLunas() {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM peserta join mahasiswa using(nim) natural join keg_jenis_detail natural join keg_jenis natural join konfirmasi where ket='LDKM' && status_bayar='Lunas'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function DaftarKegjen($ket, $tahun) {
        try {
            $sst = $this->koneksi->prepare("SELECT * FROM keg_jenis_detail natural join keg_jenis where ket='$ket' && tahun='$tahun'");
            $sst->execute();
            return $r = $sst->fetchAll(PDO::FETCH_OBJ);
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function TambahPeserta($no, $id, $keg, $ukuran, $penyakit, $notelp, $ktm, $nktm, $sktm, $tktm, $krs, $nkrs, $skrs, $tkrs, $foto, $nfoto, $sfoto, $tfoto, $pass, $tgl, $alamat, $status, $verif, $ket) {
        try {
            $sst = $this->koneksi->prepare("INSERT INTO `peserta`( id_peserta, id_detail, nim, ukuran_kaos, penyakit_bawaan, notelp, ktm, nama_ktm, size_ktm, type_ktm, krs, nama_krs, size_krs, type_krs, foto, nama_foto, size_foto, type_foto, password, tgl_pendaftaran, alamat, status_bayar, status_berkas, keterangan) 
			VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");        
            $sst->bindparam(1, $no);
            $sst->bindparam(2, $keg);
            $sst->bindparam(3, $id);
            $sst->bindparam(4, $ukuran);
            $sst->bindparam(5, $penyakit);
            $sst->bindparam(6, $notelp);
            $sst->bindparam(7, $ktm);
            $sst->bindparam(8, $nktm);
            $sst->bindparam(9, $sktm);
            $sst->bindparam(10, $tktm);
            $sst->bindparam(11, $krs);
            $sst->bindparam(12, $nkrs);
            $sst->bindparam(13, $skrs);
            $sst->bindparam(14, $tkrs);
            $sst->bindparam(15, $foto);
            $sst->bindparam(16, $nfoto);
            $sst->bindparam(17, $sfoto);
            $sst->bindparam(18, $tfoto);
            $sst->bindparam(19, $pass);
            $sst->bindparam(20, $tgl);
            $sst->bindparam(21, $alamat);
            $sst->bindparam(22, $status);
            $sst->bindparam(23, $verif);
            $sst->bindparam(24, $ket);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function EditStatus($kode, $status, $ket){
        try {
            $sst = $this->koneksi->prepare("UPDATE peserta SET status_berkas=?, keterangan=? WHERE id_peserta='$kode';");
            $sst->bindparam(1, $status);
            $sst->bindparam(2, $ket);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

	public function EditKTM($kode, $ktm, $ktm_type, $ktm_size, $ktm_nama){
        try {
            $sst = $this->koneksi->prepare("UPDATE peserta SET ktm=?, nama_ktm=?, size_ktm=?, type_ktm=? WHERE id_peserta='$kode';");
            $sst->bindparam(1, $ktm);
            $sst->bindparam(2, $ktm_nama);
            $sst->bindparam(3, $ktm_size);
            $sst->bindparam(4, $ktm_type);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }		
	
	public function EditKRS($kode, $krs, $krs_type, $krs_size, $krs_nama){
        try {
            $sst = $this->koneksi->prepare("UPDATE peserta SET krs=?, nama_krs=?, size_krs=?, type_krs=? WHERE id_peserta='$kode';");
            $sst->bindparam(1, $krs);
            $sst->bindparam(2, $krs_nama);
            $sst->bindparam(3, $krs_size);
            $sst->bindparam(4, $krs_type);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }	

	public function EditFoto($kode, $foto, $foto_type, $foto_size, $foto_nama){
        try {
            $sst = $this->koneksi->prepare("UPDATE peserta SET foto=?, nama_foto=?, size_foto=?, type_foto=? WHERE id_peserta='$kode';");
            $sst->bindparam(1, $foto);
            $sst->bindparam(2, $foto_nama);
            $sst->bindparam(3, $foto_size);
            $sst->bindparam(4, $foto_type);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }	
	
	public function EditFotoKRS($kode, $foto, $foto_type, $foto_size, $foto_nama, $krs, $krs_type, $krs_size, $krs_nama){
        try {
            $sst = $this->koneksi->prepare("UPDATE peserta SET foto=?, nama_foto=?, size_foto=?, type_foto=?, krs=?, nama_krs=?, size_krs=?, type_krs=? WHERE id_peserta='$kode';");
            $sst->bindparam(1, $foto);
            $sst->bindparam(2, $foto_nama);
            $sst->bindparam(3, $foto_size);
            $sst->bindparam(4, $foto_type);
			$sst->bindparam(5, $krs);
            $sst->bindparam(6, $krs_nama);
            $sst->bindparam(7, $krs_size);
            $sst->bindparam(8, $krs_type);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }	

	public function EditFotoKTM($kode, $foto, $foto_type, $foto_size, $foto_nama, $ktm, $ktm_type, $ktm_size, $ktm_nama){
        try {
            $sst = $this->koneksi->prepare("UPDATE peserta SET foto=?, nama_foto=?, size_foto=?, type_foto=?, ktm=?, nama_ktm=?, size_ktm=?, type_ktm=? WHERE id_peserta='$kode';");
            $sst->bindparam(1, $foto);
            $sst->bindparam(2, $foto_nama);
            $sst->bindparam(3, $foto_size);
            $sst->bindparam(4, $foto_type);
			$sst->bindparam(5, $ktm);
            $sst->bindparam(6, $ktm_nama);
            $sst->bindparam(7, $ktm_size);
            $sst->bindparam(8, $ktm_type);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }	
	
	public function EditKRSKTM($kode, $krs, $krs_type, $krs_size, $krs_nama, $ktm, $ktm_type, $ktm_size, $ktm_nama){
        try {
            $sst = $this->koneksi->prepare("UPDATE peserta SET krs=?, nama_krs=?, size_krs=?, type_krs=?, ktm=?, nama_ktm=?, size_ktm=?, type_ktm=? WHERE id_peserta='$kode';");
            $sst->bindparam(1, $krs);
            $sst->bindparam(2, $krs_nama);
            $sst->bindparam(3, $krs_size);
            $sst->bindparam(4, $krs_type);
			$sst->bindparam(5, $ktm);
            $sst->bindparam(6, $ktm_nama);
            $sst->bindparam(7, $ktm_size);
            $sst->bindparam(8, $ktm_type);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }	
	
	public function EditBerkas($kode, $krs, $krs_type, $krs_size, $krs_nama, $ktm, $ktm_type, $ktm_size, $ktm_nama, $foto, $foto_type, $foto_size, $foto_nama){
        try {
            $sst = $this->koneksi->prepare("UPDATE peserta SET krs=?, nama_krs=?, size_krs=?, type_krs=?, ktm=?, nama_ktm=?, size_ktm=?, type_ktm=?, foto=?, nama_foto=?, size_foto=?, type_foto=? WHERE id_peserta='$kode';");
            $sst->bindparam(1, $krs);
            $sst->bindparam(2, $krs_nama);
            $sst->bindparam(3, $krs_size);
            $sst->bindparam(4, $krs_type);
			$sst->bindparam(5, $ktm);
            $sst->bindparam(6, $ktm_nama);
            $sst->bindparam(7, $ktm_size);
            $sst->bindparam(8, $ktm_type);
			$sst->bindparam(9, $foto);
            $sst->bindparam(10, $foto_nama);
            $sst->bindparam(11, $foto_size);
            $sst->bindparam(12, $foto_type);
            $sst->execute();
            return $sst->rowCount();
            $this->koneksi = Database::disconnect();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }





}
?>