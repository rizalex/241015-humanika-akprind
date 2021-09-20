-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2016 at 04:07 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `humanika`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_level`
--

CREATE TABLE IF NOT EXISTS `admin_level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(15) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin_level`
--

INSERT INTO `admin_level` (`id_level`, `level`) VALUES
(1, 'Administrator'),
(2, 'Panitia'),
(3, 'Jurnalistik');

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
('endang', 'endang', 'Endang Efendi', 2),
('rizal', 'rizal', 'Rizal Ardian', 1);

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
(4, 1, '2016-11-01', '2016-11-21', '2016-11-01', '2016-11-27', 7),
(5, 2, '2016-10-20', '2016-11-07', '2015-10-20', '2015-11-10', 3);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `isi_berita` text NOT NULL,
  `publish` enum('0','1') NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `nama_gambar` varchar(50) NOT NULL,
  `type_gambar` varchar(50) NOT NULL,
  `size_gambar` varchar(10) NOT NULL,
  `tgl_jam_update` datetime NOT NULL,
  `admin` varchar(25) NOT NULL,
  PRIMARY KEY (`id_berita`),
  KEY `id_berita` (`id_berita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi_berita`, `publish`, `gambar`, `nama_gambar`, `type_gambar`, `size_gambar`, `tgl_jam_update`, `admin`) VALUES
(1, 'Pelantikan Pengurus Humanika', '<p><strong>SUSUNAN ACARA PELANTIKAN 2</strong></p>\r\n\r\n<p>08.00-09.00&nbsp;&nbsp;&nbsp;&nbsp; Persiapan Acara Pelantikan</p>\r\n\r\n<p>09.00-09.30&nbsp;&nbsp;&nbsp;&nbsp; Pembukaan</p>\r\n\r\n<ul>\r\n	<li>Sambutan Ketua Pelaksana</li>\r\n	<li>Sambutan Ketua HUMANIKA Periode 2012/2013</li>\r\n	<li>Sambutan Ketua Jurusan Teknik Informatika</li>\r\n	<li>Sambutan Dekan Fakultas Teknologi Industri</li>\r\n	<li>Sambutan Pembantu Rektor III</li>\r\n</ul>\r\n\r\n<p>09.30-10.00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Acara Inti</p>\r\n\r\n<ul>\r\n	<li>Serah Terima Jabatan</li>\r\n	<li>Penandatanganan Surat Pelimpahan Jabatan</li>\r\n</ul>\r\n\r\n<p>10.00-10.30&nbsp;&nbsp;&nbsp; Sambutan Ketua HUMANIKA Periode 2013/2014</p>\r\n\r\n<p>11.00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Penutup</p>\r\n\r\n<p style="margin-left:44.5pt">&nbsp;</p>\r\n', '0', '', '', '', '', '0000-00-00 00:00:00', ''),
(2, 'LDK dan Makrab Pengurus', '<p><strong>TEMA : </strong>&rdquo;OPTIMALISASI WAWASAN DENGAN KEBERSAMAAN&rdquo;</p>\r\n\r\n<p><strong>LATAR BELAKANG</strong> :&nbsp;Upgrading pengurus HUMANIKA periode 2012/2013 ditujukan untuk pembaruan pola pikir pengurus baru dan pengurus lama HUMANIKA, agar dalam menjalankan program kerja (proker) HUMANIKA lebih maksimal, juga untuk mempererat hubungan antar pengurus HUMANIKA periode 2012/2013.</p>\r\n\r\n<p><strong>MAKSUD DAN TUJUAN :&nbsp;</strong>Untuk menambah wawasan dan pengelolaan keorganisasian serta mempererat kebersamaan penguerus HUMANIKA 2012/2013 dengan DPO.</p>\r\n\r\n<p><strong>WAKTU DAN TEMPAT</strong></p>\r\n\r\n<p>Hari&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Jumat dan Sabtu</p>\r\n\r\n<p>Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 08 - 09 Desember 2013</p>\r\n\r\n<p>Waktu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; 13.00 s/d selesai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>Tempat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Wisma Kaliurang</p>\r\n', '0', '', '', '', '', '0000-00-00 00:00:00', ''),
(3, 'Informatika Cup', '<p>Lomba futsal dan badminton antar mahasiswa informatika IST AKPRIND Yogyakarta. Perlombaan dilaksanakan pada tanggal 12 Januari 2015 bertempat di selma futsal jalan diponegoro 32 Yogyakarta</p>\r\n', '1', '', '', '', '', '0000-00-00 00:00:00', ''),
(4, 'Humanika Goes to School', '<p><strong>Dilaksanakan di</strong> <strong>SMKN 1 </strong><strong>Saptosari, Gunung Kidul, Yogyakarta.</strong></p>\r\n\r\n<p><strong>TEMA :&nbsp;</strong>&ldquo;Pelatihan Pembuatan Animasi Dasar menggunakan Macromedia Flash&rdquo;</p>\r\n\r\n<p><strong>LATAR BELAKANG :</strong></p>\r\n\r\n<p>HUMANIKA Goes to School di SMKN 1 Saptosari, Gunung Kidul,Yogyakarta periode 2014 / 2015 ditujukan untuk mangamalkan ilmu-ilmu dan wawasan yang kami miliki di bidang teknologi informasi kepada siswa-siswi SMK / SMA, serta untuk memperkenalkan IST AKPRIND Yogyakarta terutama jurusan Teknik Informatika ke SMK / SMA.</p>\r\n', '1', '', '', '', '', '0000-00-00 00:00:00', ''),
(6, 'Studi Ekskursi', '<p><strong>NAMA KEGIATAN</strong></p>\r\n\r\n<p><img alt="" src="https://www.google.com/search?q=aku&amp;client=ubuntu&amp;hs=And&amp;channel=fs&amp;source=lnms&amp;tbm=isch&amp;sa=X&amp;ved=0ahUKEwiPmdmk_OPLAhULno4KHXX1DDAQ_AUIBygB&amp;biw=1366&amp;bih=643#imgrc=I-JA6XkKSkJRQM%3A" /></p>\r\n\r\n<p><strong><em>&ldquo; </em>STUDI EKSKURSI MAHASISWA </strong><strong>TEKNIK INFORMATIKA 20</strong><strong>15&rdquo;</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>TEMA KEGIATAN</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&rdquo;MUDA HEBAT GENERASI BANGSA GEMILANG MENUJU DUNIA KERJA NYATA DALAM TARAF TEKNOLOGI YANG BERKOMPETENSI&rdquo;</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>LATAR BELAKANG</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;Memperoleh pekerjaan sesuai bidang ilmu, apalagi mendapat kedudukan yang strategis adalah harapan setiap orang. Namun untuk memperoleh itu semua tidaklah mudah. Banyak syarat yang harus dipenuhi. Ijazah bukan jaminan untuk bisa memperoleh pekerjaan yang sesuai harapan kita. Dibutuhkan keterampilan serta trik-trik tertentu agar seseorang bisa menghadapi tuntutan dalam dunia kerja. Salah satunya adalah mengetahui seluk beluk masalah yang ada dalam dunia kerja, sehingga ilmu yang diperoleh dapat diterapkan secara tepat.</p>\r\n\r\n<p>Tidak jarang mahasiswa yang belum siap memasuki dunia kerja dikarenakan mereka belum tahu apa yang harus dilakukan dan bagaimana bentuk pengaplikasian ilmu yang&nbsp; didapat dibangku kuliah dalam dunia kerja, bagaimana bekerja secara team (team work), bagaimana cara mengatur waktu antara kepentingan pribadi dengan kepentingan perusahaan, etika kerja, cara menyelesaikan masalah yang dihadapi didalam dunia kerja. Hal tersebut dapat dilihat ketika dihadapkan dengan pilihan praktek kerja perusahaaan industri (magang).</p>\r\n\r\n<p>Dengan memperkenalkan mahasiswa pada dunia kerja sejak dini melalui kunjungan perusahaan, diharapkan mahasiswa lebih siap menghadapi dunia kerja yang sebenarnya, dan mahaiswa mampu memeprsiapkan <em>soft skill</em> sedini mungkin sebelum memasuki dunia kerja. Tentunya dengan begitu mahasiswa mampu bersaing dalam dunia kerja.</p>\r\n\r\n<p><strong>MAKSUD DAN TUJUAN</strong></p>\r\n\r\n<p>Tujuan dari kegiatan ini adalah :</p>\r\n\r\n<ol>\r\n	<li>Sebagai penggugah semangat belajar mahasiswa Teknik Informatika.</li>\r\n	<li>Memperkenalkan mahasiswa pada dunia kerja yang sebenarnya.</li>\r\n	<li>Memberikan gambaran pentingnya <em>soft skill</em> di dunia kerja.</li>\r\n	<li>Terciptanya Sarjana Informatika yang mempunyai pola berpikir yang terintegrasi dalam melihat dan memecahkan suatu persoalan.</li>\r\n	<li>Memotivasi mahasiswa sehingga memiliki mental yang kuat untuk berkompetensi dalam dunia kerja.</li>\r\n	<li>Menanamkan jiwa leadership dalam dunia kerja baik secara struktural maupun relasional.</li>\r\n	<li>Sebagai bekal awal mahasiswa informatika dalam menghadapi dunia kerja diera global.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>WAKTU DAN TEMPAT PELAKSANAAN</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Studi&nbsp; Ekskursi Mahasiswa Teknik &nbsp;Informatika 2014 akan dilaksanakan pada :</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hari&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Senin &ndash; Kamis.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 25 &ndash; 28 Mei 2015.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tujuan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Jakarta.</p>\r\n\r\n<p><strong>PENYELENGGARA</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Departemen LITBANG (Penelitian dan Pengembangan) Himpunan Mahasiswa Teknik Informatika (HUMANIKA) Institut Sains dan Teknologi AKPRIND Yogyakarta.</p>\r\n\r\n<p><strong>PESERTA</strong></p>\r\n\r\n<p>Mahasiswa Teknik Informatika (S1) dan Manajemen Informatika &amp; Teknik Komputer (D3) &nbsp;Institut Sains dan Teknologi AKPRIND Yogyakarta</p>\r\n', '0', '../file/berita/rbac.png', 'rbac.png', 'image/png', '21112', '0000-00-00 00:00:00', ''),
(11, 'percobaan', '<p>vba chsdvchvhxanix xanfgyiagyinfgxyigfygaygzx</p>\r\n\r\n<p>xamgnxfngaxfgmgagzuox\\</p>\r\n\r\n<p>xnjasygyimcgzgmgayigymzigdaiyfgiayg</p>\r\n', '0', '../file/berita/aeGAeqp_460s_v2.jpg', 'aeGAeqp_460s_v2.jpg', 'image/jpeg', '66910', '2016-03-23 16:03:17', 'Rizal Ardian'),
(12, 'percobaan', '<p>Ini adalah percobaan pertama yang akan membuat paragraf pada blognya</p>\r\n\r\n<p>&nbsp;</p>\r\n', '0', '../file/berita/aeGAeqp_460s_v2.jpg', 'aeGAeqp_460s_v2.jpg', 'image/jpeg', '66910', '2016-03-27 21:03:10', 'Rizal Ardian'),
(13, 'Gambar kecil', '<p>Ini adalah contoh kalau gambar uploadnya kecil ukurannya!</p>\r\n', '0', '../file/berita/close-prelight.png', 'close-prelight.png', 'image/png', '641', '2016-04-01 22:04:19', 'Rizal Ardian');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `keg_jenis`
--

INSERT INTO `keg_jenis` (`id_keg`, `nama_kegiatan`, `ket`) VALUES
(1, 'Studi Ekskursi', 'SE'),
(2, 'Latihan Dasar Kepemimpinan Mahasiswa ', 'LDKM'),
(3, 'Seminar Nasional', 'SN');

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
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `pesan` text NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `nama`, `email`, `telp`, `pesan`) VALUES
(1, 'Yolly', 'labrand.labs@gmail.com', '081226613739', 'Terima kasih infonya sangan bermanfaat                '),
(2, 'idni', 'idninuzulul94@gmail.com', '084343431234', 'Tingkatkan kualitas desain                '),
(3, 'lenge', 'lenge@gmail.com', '09876543212', 'websitenya sangat bagus');

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
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `sender` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=168 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message`, `sender`) VALUES
(159, 'iya mawa', 'idni (23-12-2015 08:54:00am)'),
(158, 'halo idni', 'mawa (23-12-2015 08:53:56am)'),
(157, 'halo juga', 'deny (23-12-2015 08:26:17am)'),
(156, 'halo', 'yogy (23-12-2015 08:27:41am)'),
(155, 'qwertyuiop', 'deny (22-12-2015 08:47:55pm)'),
(160, 'aaa', 'idni (18-03-2016 01:13:46am)'),
(161, 'hay', 'deny > Fri-Mar 11:31:21 am'),
(162, 'hay', 'deny > Fri-Mar 11:31:21 am'),
(163, 'hay', 'deny > Fri-Mar 11:31:21 am'),
(164, 'hay', 'deny > Fri-Mar 11:31:21 am'),
(165, 'hoy', 'deny > Fri-Mar 11:31:57 am'),
(166, 'dxfchmlcgvhbjn', 'deny > Fri-Mar 11:32:32 am'),
(167, 'dxfchmlcgvhbjn', 'deny > Fri-Mar 11:32:32 am');

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

-- --------------------------------------------------------

--
-- Table structure for table `temp_login`
--

CREATE TABLE IF NOT EXISTS `temp_login` (
  `nama_user` varchar(20) NOT NULL,
  PRIMARY KEY (`nama_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_login`
--

INSERT INTO `temp_login` (`nama_user`) VALUES
('deny'),
('idni');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `nama_user` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(40) NOT NULL,
  PRIMARY KEY (`nama_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nama_user`, `email`, `pass`) VALUES
('deny', 'ardy1106@gmail.com', 'ZGVueQ=='),
('denyardy', 'deny_ziege@yahoo.com', 'ZGVueWFyZHk='),
('idni', 'idninuzulul94@gmail.com', 'aWRuaQ=='),
('lenge', 'dianlenge24@gmail.com', 'bGVuZ2U='),
('mawa', 'rumahmawa@gmail.com', 'bWF3YTA0'),
('yogy', 'yogy1037@gmail.com', 'eW9neQ==');

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

--
-- Constraints for table `temp_login`
--
ALTER TABLE `temp_login`
  ADD CONSTRAINT `temp_login_ibfk_1` FOREIGN KEY (`nama_user`) REFERENCES `user` (`nama_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
