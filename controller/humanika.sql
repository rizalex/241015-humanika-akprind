-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2015 at 11:54 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `workshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_level`
--

CREATE TABLE IF NOT EXISTS `admin_level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(15) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_level`
--

INSERT INTO `admin_level` (`id_level`, `level`) VALUES
(1, 'Administrator'),
(2, 'Panitia');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `id_level` int(11) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`),
  KEY `level` (`id_level`),
  KEY `id_level` (`id_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`username`, `password`, `nama`, `id_level`) VALUES
('dwiken', 'lelah', 'Dwi Ismira', 1),
('mimit', '12345', 'Paramitha', 1),
('nhatin', '12345', 'Nurhatin', 2),
('titin', 'apasaja', 'siti hadijah', 2);

-- --------------------------------------------------------

--
-- Table structure for table `batas_pendaftaran`
--

CREATE TABLE IF NOT EXISTS `batas_pendaftaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_detail` int(11) NOT NULL,
  `tgl_start` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_byr_awal` date NOT NULL,
  `tgl_byr_akhir` date NOT NULL,
  `jum_peserta` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_detail` (`id_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `batas_pendaftaran`
--

INSERT INTO `batas_pendaftaran` (`id`, `id_detail`, `tgl_start`, `tgl_selesai`, `tgl_byr_awal`, `tgl_byr_akhir`, `jum_peserta`) VALUES
(4, 1, '2015-11-01', '2015-11-21', '2015-11-01', '2015-11-27', 7),
(5, 2, '2015-10-20', '2015-11-07', '2015-10-20', '2015-11-10', 3);

-- --------------------------------------------------------

--
-- Table structure for table `keg_arsip`
--

CREATE TABLE IF NOT EXISTS `keg_arsip` (
  `id_arsip` int(11) NOT NULL AUTO_INCREMENT,
  `id_detail` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_size` varchar(10) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `tgl_jam_update` datetime NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_arsip`),
  KEY `id_detail` (`id_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `keg_arsip`
--

INSERT INTO `keg_arsip` (`id_arsip`, `id_detail`, `deskripsi`, `file`, `file_name`, `file_size`, `file_type`, `tgl_jam_update`, `status`) VALUES
(1, 2, 'Persyaratan LDKM 2015', '../file/arsip/PERSYARATAN LDKM 2015.pdf', 'PERSYARATAN LDKM 2015.pdf', '2795', 'application/pdf', '2015-10-28 13:11:08', '0'),
(2, 1, 'Persyaratan SE 2015', '../file/arsip/PERSYARATAN SE 2015.pdf', 'PERSYARATAN SE 2015.pdf', '2796', 'application/pdf', '2015-10-28 13:26:16', '0'),
(3, 1, 'Studi Ekskursi', '../file/arsip/fileSE.pdf', 'fileSE.pdf', '2770', 'application/pdf', '2015-10-28 13:35:23', '0'),
(4, 2, 'LDKM', '../file/arsip/fileLDKM.pdf', 'fileLDKM.pdf', '2773', 'application/pdf', '2015-10-28 13:50:22', '0');

-- --------------------------------------------------------

--
-- Table structure for table `keg_artikel`
--

CREATE TABLE IF NOT EXISTS `keg_artikel` (
  `id_artikel` int(11) NOT NULL AUTO_INCREMENT,
  `id_detail` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi_berita` text NOT NULL,
  `publish` enum('1','0') NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `nama_gambar` varchar(50) NOT NULL,
  `type_gambar` varchar(50) NOT NULL,
  `size_gambar` varchar(10) NOT NULL,
  `tgl_jam_update` datetime NOT NULL,
  `admin` varchar(25) NOT NULL,
  PRIMARY KEY (`id_artikel`),
  KEY `id_keg` (`id_detail`),
  KEY `id_detail` (`id_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `keg_artikel`
--

INSERT INTO `keg_artikel` (`id_artikel`, `id_detail`, `judul`, `isi_berita`, `publish`, `gambar`, `nama_gambar`, `type_gambar`, `size_gambar`, `tgl_jam_update`, `admin`) VALUES
(1, 1, 'Studi Ekskursi', 'Studi Ekskursi (SE) adalah suatu kegiatan kunjungan perusahaan atau instansi yang merupakan sarana bagi mahasiswa Teknik Informatika  dalam mengenal dunia kerja. ', '0', '../file/berita/DSCF1544.JPG', 'DSCF1544.JPG', 'image/jpeg', '25529', '2015-10-28 16:35:33', 'Paramitha'),
(2, 2, 'Latihan Dasar Kepemimpinan', 'Latihan Dasar Kepemimpinan (LDKM) adalah  pelatihan dasar tentang segala hal yang berkaitan dengan kepemimpinan agar mahasiswa mengetahui serta memahami arti dari kepemimpinan  dalam berorganisasi.', '0', '../file/berita/IMG_9381.JPG', 'IMG_9381.JPG', 'image/jpeg', '60341', '2015-10-28 20:30:31', 'Paramitha');

-- --------------------------------------------------------

--
-- Table structure for table `keg_jenis`
--

CREATE TABLE IF NOT EXISTS `keg_jenis` (
  `id_keg` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(50) NOT NULL,
  `ket` varchar(50) NOT NULL,
  PRIMARY KEY (`id_keg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `keg_jenis`
--

INSERT INTO `keg_jenis` (`id_keg`, `nama_kegiatan`, `ket`) VALUES
(1, 'Studi Ekskursi', 'SE'),
(2, 'Latihan Dasar Kepemimpinan Mahasiswa ', 'LDKM');

-- --------------------------------------------------------

--
-- Table structure for table `keg_jenis_detail`
--

CREATE TABLE IF NOT EXISTS `keg_jenis_detail` (
  `id_detail` int(11) NOT NULL,
  `id_keg` int(11) NOT NULL,
  `biaya` double NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `penanggung_jawab` varchar(50) NOT NULL,
  `kuota` int(11) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `dp` double NOT NULL,
  PRIMARY KEY (`id_detail`),
  UNIQUE KEY `id_keg` (`id_detail`),
  KEY `id_detail` (`id_detail`),
  KEY `id_keg_2` (`id_keg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keg_jenis_detail`
--

INSERT INTO `keg_jenis_detail` (`id_detail`, `id_keg`, `biaya`, `tgl_mulai`, `tgl_akhir`, `penanggung_jawab`, `kuota`, `tahun`, `lokasi`, `dp`) VALUES
(1, 1, 800000, '2015-11-30', '2015-12-02', 'Dwi Ismira', 90, '2015', 'Jakarta - Bandung', 200000),
(2, 2, 250000, '2015-11-12', '2015-11-14', 'Tamam Hanafi', 150, '2015', 'Jalan Kaliurang', 0);

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `bank_asal` varchar(20) NOT NULL,
  `pemilik_rekening` varchar(50) NOT NULL,
  `bank_tujuan` varchar(20) NOT NULL,
  `jumlah` double NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `nama_bukti` varchar(50) NOT NULL,
  `type_bukti` varchar(50) NOT NULL,
  `size` varchar(10) NOT NULL,
  `status` enum('Belum Verifikasi','Verifikasi') NOT NULL,
  PRIMARY KEY (`id_konfirmasi`),
  KEY `id_daftar` (`id_peserta`),
  KEY `bank_tujuan` (`bank_tujuan`),
  KEY `bank_tujuan_2` (`bank_tujuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `id_peserta`, `tgl_pembayaran`, `bank_asal`, `pemilik_rekening`, `bank_tujuan`, `jumlah`, `bukti_pembayaran`, `nama_bukti`, `type_bukti`, `size`, `status`) VALUES
(1, 1, '2015-10-28', 'MANDIRI', 'Nurhatin', '3636-01-123993-53-8', 800000, '../../file/peserta/bukti/buktipembayaran.jpg', 'buktipembayaran.jpg', 'image/jpeg', '22839', 'Verifikasi'),
(2, 2, '2015-10-22', 'BNI', 'Muhammad Husain', '0307642655', 200000, '../../file/peserta/bukti/Capture17_34_12.jpg', 'Capture17_34_12.jpg', 'image/jpeg', '31663', 'Verifikasi'),
(3, 4, '2015-10-28', 'BRI', 'Siti Hadijah', '3636-01-123993-53-8', 400000, '../../file/peserta/bukti/buktipembayaran.jpg', 'buktipembayaran.jpg', 'image/jpeg', '22839', 'Verifikasi'),
(4, 5, '2015-10-29', 'MANDIRI', 'Dwi Ismira', '3365-01-022220-53-5', 800000, '../../file/peserta/bukti/buktipembayaran.jpg', 'buktipembayaran.jpg', 'image/jpeg', '22839', 'Verifikasi'),
(5, 6, '2015-10-30', 'BNI', 'Inggar Prihartini Eka Putri', '0307642655', 150000, '../../file/peserta/bukti/buktipembayaran.jpg', 'buktipembayaran.jpg', 'image/jpeg', '22839', 'Verifikasi'),
(6, 7, '2015-10-29', 'BNI', 'Evi Eltinah', '0307642655', 150000, '../../file/peserta/bukti/buktipembayaran.jpg', 'buktipembayaran.jpg', 'image/jpeg', '22839', 'Verifikasi'),
(7, 7, '2015-10-31', 'BNI', 'Evi Eltinah', '0307642655', 100000, '../../file/peserta/bukti/buktipembayaran.jpg', 'buktipembayaran.jpg', 'image/jpeg', '22839', 'Verifikasi'),
(8, 8, '2015-10-29', 'BRI', 'Ardiansyah', '3365-01-022220-53-5', 400000, '../../file/peserta/bukti/buktipembayaran.jpg', 'buktipembayaran.jpg', 'image/jpeg', '22839', 'Verifikasi'),
(10, 10, '2015-11-06', 'BNI', 'Nurhatin', '3636-01-123993-53-8', 200000, '../../file/peserta/bukti/buktipembayaran.jpg', 'buktipembayaran.jpg', 'image/jpeg', '22839', 'Verifikasi'),
(11, 10, '2015-11-07', 'BRI', 'Nurhatin', '3636-01-123993-53-8', 600000, '../../file/peserta/bukti/buktipembayaran.jpg', 'buktipembayaran.jpg', 'image/jpeg', '22839', 'Verifikasi'),
(12, 11, '2015-11-06', 'BRI', 'Asti ', '3365-01-022220-53-5', 400000, '../../file/peserta/bukti/buktipembayaran.jpg', 'buktipembayaran.jpg', 'image/jpeg', '22839', 'Verifikasi'),
(13, 11, '2015-11-07', 'BRI', 'Asti', '3365-01-022220-53-5', 400000, '../../file/peserta/bukti/buktipembayaran.jpg', 'buktipembayaran.jpg', 'image/jpeg', '22839', 'Verifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` char(9) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `alamat_asal` varchar(100) NOT NULL,
  `alamat_jogja` varchar(100) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `goldar` varchar(2) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mhs`, `alamat_asal`, `alamat_jogja`, `jk`, `email`, `no_telp`, `jurusan`, `tempat_lahir`, `tgl_lahir`, `asal_sekolah`, `agama`, `goldar`, `angkatan`) VALUES
('151051001', 'Nurhatin', 'Timika,Papua', 'Jl.Munggur,Gg.Permadi,Yogyakarta', 'P', 'atin1056@gmail.com', '082325256336', 'Teknik Informatika', 'Dili', '1994-10-19', 'SMA AL-FALAH', 'Islam', 'B', '2015'),
('151051002', 'Paramitha Dahlan', 'Ternate,Maluku Utara', 'Jl.Munggur,Gg.Srikandi,Yogyakarta', 'P', 'mitamit@gmail.com', '082321122112', 'Teknik Informatika', 'Ternate', '1994-12-13', 'SMA Negeri 1 Kota Ternate', 'Islam', 'O', '2015'),
('151051003', 'Siti Hadijah', 'Karimun,Kepulauan Riau', 'Jl.Prof.Dr.soepomo,Umbulharjo,Yogyakarta', 'P', 'sitih1057@gmail.com', '087654321765', 'Teknik Informatika', 'Sungai Sebesi', '1994-11-22', 'SMA Negeri 3 Kundur', 'Islam', 'B', '2015'),
('151051004', 'Dwi Ismira', 'Tual, Maluku ', 'Jl.Munggur,Gg.Srikandi,Yogyakarta', 'P', 'dwiismira@gmail.com', '082345673421', 'Teknik Informatika', 'Tual', '1994-12-31', 'SMA Negeri 1 Tual', 'Islam', 'O', '2015'),
('151051005', 'Inggar Prihartini Eka P', 'Manokwari,Papua Barat', 'Bantul,Yogyakarta', 'P', 'ipep@gmail.com', '081973396785', 'Teknik Informatika', 'Manokwari', '1994-06-19', 'SMK Negeri 1 Manokwari', 'Islam', 'A', '2015'),
('151051006', 'Refendi Genendra', 'Pekanbaru,Riau', 'Papringan,Yogyakarta', 'L', 'refendig@gmail.com', '082345678965', 'Teknik Informatika', 'Indragiri Hilir', '1994-07-10', 'SMK Negeri 1 Pekanbaru', 'Islam', 'B', '2015'),
('151051007', 'Muhammad Husain', 'Palopo, Sulawesi Selatan', 'Seturan, Sleman, Yogyakarta', 'L', 'ucen@gmail.com', '082325256337', 'Teknik Informatika', 'Toli-Toli', '1994-07-12', 'SMA Negeri 1 Walenrang', 'Islam', 'O', '2015'),
('151051008', 'Anggit Tri Atmaja', 'Manado, Sulawesi Utara', 'Mandala Krida, Yogyakarta', 'L', 'anggit@gmail.com', '082321122114', 'Teknik Informatika', 'Manado', '1994-09-07', 'SMA Negeri 2 Manado', 'Islam', 'A', '2015'),
('151051009', 'Evi Eltinah', 'Klaten,Jawa Tengah', 'Jl.Munggur, Gg.Permadi, Yogyakarta', 'P', 'eltinah@gmail.com', '082345673422', 'Teknik Informatika', 'Klaten', '1994-10-11', 'SMA Negeri 1 Klaten', 'Islam', 'O', '2015'),
('151051010', 'Ardiansyah', 'Sumbawa, Nusa Tenggara Barat', 'Gembira Loka, Yogyakarta', 'L', 'lenge@gmail.com', '082325256358', 'Teknik Informatika', 'Kempo', '1994-04-23', 'SMA Negeri 1 Sumbawa', 'Islam', 'A', '2015'),
('151051011', 'Asti Widyaningsih', 'Bambang Lipuro, Bantul', 'Bambang Lipuro, Bantul', 'P', 'asti@gmail.com', '081329342617', 'Teknik Informatika', 'Bantul', '1994-08-17', 'SMK Negeri 1 Bantul', 'Islam', 'O', '2015'),
('151051012', 'Syafrizal Ardiansyah', 'Medan, Sumatera Utara', 'Timoho, Yogyakarta', 'L', 'rizal@gmail.com', '081327893245', 'Teknik Informatika', 'Medan', '1994-11-04', 'SMK Negeri 1 Medan', 'Islam', 'AB', '2015'),
('151051013', 'Imam Prasetyo', 'Klaten, Jawa Tengah', 'Klaten, Jawa Tengah', 'L', 'imam@gmail.com', '081227856746', 'Teknik Informatika', 'Klaten', '1993-10-13', 'SMA N 1 Klaten', 'Islam', 'O', '2015');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE IF NOT EXISTS `peserta` (
  `id_peserta` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `nim` char(9) NOT NULL,
  `ukuran_kaos` varchar(2) NOT NULL,
  `penyakit_bawaan` text NOT NULL,
  `notelp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `ktm` varchar(50) NOT NULL,
  `nama_ktm` varchar(50) NOT NULL,
  `size_ktm` varchar(10) NOT NULL,
  `type_ktm` varchar(50) NOT NULL,
  `krs` varchar(50) NOT NULL,
  `nama_krs` varchar(50) NOT NULL,
  `size_krs` varchar(10) NOT NULL,
  `type_krs` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama_foto` varchar(50) NOT NULL,
  `size_foto` varchar(10) NOT NULL,
  `type_foto` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status_bayar` enum('Belum Lunas','Lunas') NOT NULL,
  `status_berkas` enum('Unvalid','Valid') NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  PRIMARY KEY (`id_peserta`),
  KEY `id_detail` (`id_detail`),
  KEY `id_detail_2` (`id_detail`),
  KEY `nim` (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `id_detail`, `nim`, `ukuran_kaos`, `penyakit_bawaan`, `notelp`, `alamat`, `ktm`, `nama_ktm`, `size_ktm`, `type_ktm`, `krs`, `nama_krs`, `size_krs`, `type_krs`, `foto`, `nama_foto`, `size_foto`, `type_foto`, `password`, `status_bayar`, `status_berkas`, `keterangan`, `tgl_pendaftaran`) VALUES
(1, 1, '151051001', 'S', 'Tidak ada', '082325256336', 'Jl. Munggur, Gg Permadi, Yogyakarta', '../../file/peserta/ktm/KTMNurhatin151051001.jpg', 'KTMNurhatin151051001.jpg', '1032970', 'image/jpeg', '../../file/peserta/krs/KRSNurhatin151051001.jpg', 'KRSNurhatin151051001.jpg', '23449', 'image/jpeg', '../../file/peserta/foto/Nurhatin151051001.JPG', 'Nurhatin151051001.JPG', '48250', 'image/jpeg', '12345', 'Lunas', 'Valid', 'Semuanya Valid', '2015-10-28'),
(2, 2, '151051002', 'S', 'Tidak ada', '081329375670', 'Jl. Munggur Gg. Srikandi GKI/10, Demangan, Yogyakarta', '../../file/peserta/ktm/KTMParamithaDahlan151051002', 'KTMParamithaDahlan151051002.jpg', '77310', 'image/jpeg', '../../file/peserta/krs/KRSParamithaDahlan151051002', 'KRSParamithaDahlan151051002.jpg', '22685', 'image/jpeg', '../../file/peserta/foto/ParamithaDahlan151051002.J', 'ParamithaDahlan151051002.JPG', '53384', 'image/jpeg', '12345', 'Belum Lunas', 'Valid', 'Semuanya Valid', '2015-10-28'),
(4, 1, '151051003', 'XL', 'Tidak ada', '087654321765', 'Jl.Prof.Dr.Soepomo, Umbulharjo, Yogyakarta', '../../file/peserta/ktm/KTMSitiHadijah151051003.jpg', 'KTMSitiHadijah151051003.jpg', '1062101', 'image/jpeg', '../../file/peserta/krs/KRSSitiHadijah151051003.jpg', 'KRSSitiHadijah151051003.jpg', '23449', 'image/jpeg', '../../file/peserta/foto/SitiHadijah151051003.jpg', 'SitiHadijah151051003.jpg', '75932', 'image/jpeg', '12345', 'Belum Lunas', 'Unvalid', '', '2015-10-28'),
(5, 1, '151051004', 'L', 'Tidak ada', '082345673421', 'Jl.Munggur, Gg.Srikandi, Yogyakarta', '../../file/peserta/ktm/KTMDwiIsmira151051004.jpg', 'KTMDwiIsmira151051004.jpg', '1032970', 'image/jpeg', '../../file/peserta/krs/KRSDwiismira151051004.jpg', 'KRSDwiismira151051004.jpg', '23449', 'image/jpeg', '../../file/peserta/foto/DwiIsmira151051004.jpg', 'DwiIsmira151051004.jpg', '95415', 'image/jpeg', '12345', 'Lunas', 'Unvalid', '', '2015-10-28'),
(6, 2, '151051005', 'M', 'Tidak ada', '081973396785', 'Bantul, Yogyakarta', '../../file/peserta/ktm/KTMInggarPEP151051005.jpg', 'KTMInggarPEP151051005.jpg', '77310', 'image/jpeg', '../../file/peserta/krs/KRSInggarPEP151051005.jpg', 'KRSInggarPEP151051005.jpg', '22685', 'image/jpeg', '../../file/peserta/foto/InggarPEP151051005.JPG', 'InggarPEP151051005.JPG', '42415', 'image/jpeg', '12345', 'Belum Lunas', 'Unvalid', '', '2015-10-28'),
(7, 2, '151051009', 'M', 'Tidak ada', '082345673422', 'Jl.Munggur, Gg.Permadi, Yogyakarta', '../../file/peserta/ktm/KTMEviEltinah151051009.jpg', 'KTMEviEltinah151051009.jpg', '1062101', 'image/jpeg', '../../file/peserta/krs/KRSEviEltinah151051009.jpg', 'KRSEviEltinah151051009.jpg', '22685', 'image/jpeg', '../../file/peserta/foto/EviEltinah151051009.JPG', 'EviEltinah151051009.JPG', '49851', 'image/jpeg', '12345', 'Lunas', 'Unvalid', '', '2015-10-28'),
(8, 1, '151051010', 'L', 'Tidak ada', '082325256358', 'Gembira Loka, Yogyakarta', '../../file/peserta/ktm/KTMArdiansyah151051010.jpg', 'KTMArdiansyah151051010.jpg', '1032970', 'image/jpeg', '../../file/peserta/krs/KRSArdiansyah151051010.jpg', 'KRSArdiansyah151051010.jpg', '23449', 'image/jpeg', '../../file/peserta/foto/Ardiansyah151051010.jpg', 'Ardiansyah151051010.jpg', '0', '', '12345', 'Belum Lunas', 'Unvalid', '', '2015-10-29'),
(10, 1, '151051008', 'S', 'Tidak Ada', '081329345637', 'Demangan', '../../file/peserta/ktm/KTMArdiansyah151051010.jpg', 'KTMArdiansyah151051010.jpg', '1032970', 'image/jpeg', '../../file/peserta/krs/KRSArdiansyah151051010.jpg', 'KRSArdiansyah151051010.jpg', '23449', 'image/jpeg', '../../file/peserta/foto/Nurhatin151051001.JPG', 'Nurhatin151051001.JPG', '48250', 'image/jpeg', '12345', 'Lunas', 'Unvalid', '', '2015-11-06'),
(11, 1, '151051011', 'S', 'Tidak ada', '082325256666', 'Bantul', '../../file/peserta/ktm/KTMAstiWidyaningsih15105101', 'KTMAstiWidyaningsih151051011.jpg', '1062101', 'image/jpeg', '../../file/peserta/krs/KRSAstiWidyaningsih15105101', 'KRSAstiWidyaningsih151051011.jpg', '30096', 'image/jpeg', '../../file/peserta/foto/AstiWidyaningsih151051011.', 'AstiWidyaningsih151051011.png', '0', '', '12345', 'Lunas', 'Unvalid', '', '2015-11-06'),
(12, 1, '151051013', 'S', 'eg', 'gr', 'ef', '../../file/peserta/ktm/EviEltinah151051009.JPG', 'EviEltinah151051009.JPG', '49851', 'image/jpeg', '../../file/peserta/krs/KRSEviEltinah151051009.jpg', 'KRSEviEltinah151051009.jpg', '22685', 'image/jpeg', '../../file/peserta/foto/KTMAstiWidyaningsih1510510', 'KTMAstiWidyaningsih151051011.jpg', '0', '', 'imam123', 'Belum Lunas', 'Unvalid', '-', '2015-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `referensi_bank`
--

CREATE TABLE IF NOT EXISTS `referensi_bank` (
  `no_rekening` varchar(20) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `nama_bank` varchar(15) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  PRIMARY KEY (`no_rekening`),
  KEY `id_detail` (`id_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referensi_bank`
--

INSERT INTO `referensi_bank` (`no_rekening`, `id_detail`, `nama_bank`, `nama_pemilik`) VALUES
('0307642655', 2, 'BNI', 'Nurhatin'),
('3365-01-022220-53-5', 1, 'BRI', 'Siti Hadijah'),
('3541569855', 2, 'DANAMON', 'Dwi Ismira'),
('3636-01-123993-53-8', 1, 'BRI', 'Paramitha Dahlan');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD CONSTRAINT `admin_user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `admin_level` (`id_level`);

--
-- Constraints for table `batas_pendaftaran`
--
ALTER TABLE `batas_pendaftaran`
  ADD CONSTRAINT `batas_pendaftaran_ibfk_1` FOREIGN KEY (`id_detail`) REFERENCES `keg_jenis_detail` (`id_detail`);

--
-- Constraints for table `keg_arsip`
--
ALTER TABLE `keg_arsip`
  ADD CONSTRAINT `keg_arsip_ibfk_1` FOREIGN KEY (`id_detail`) REFERENCES `keg_jenis_detail` (`id_detail`);

--
-- Constraints for table `keg_artikel`
--
ALTER TABLE `keg_artikel`
  ADD CONSTRAINT `keg_artikel_ibfk_1` FOREIGN KEY (`id_detail`) REFERENCES `keg_jenis_detail` (`id_detail`);

--
-- Constraints for table `keg_jenis_detail`
--
ALTER TABLE `keg_jenis_detail`
  ADD CONSTRAINT `keg_jenis_detail_ibfk_1` FOREIGN KEY (`id_keg`) REFERENCES `keg_jenis` (`id_keg`);

--
-- Constraints for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `konfirmasi_ibfk_2` FOREIGN KEY (`bank_tujuan`) REFERENCES `referensi_bank` (`no_rekening`),
  ADD CONSTRAINT `konfirmasi_ibfk_3` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`);

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`id_detail`) REFERENCES `keg_jenis_detail` (`id_detail`),
  ADD CONSTRAINT `peserta_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `referensi_bank`
--
ALTER TABLE `referensi_bank`
  ADD CONSTRAINT `referensi_bank_ibfk_1` FOREIGN KEY (`id_detail`) REFERENCES `keg_jenis_detail` (`id_detail`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
