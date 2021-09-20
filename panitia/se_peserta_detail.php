<?php
session_start();
if(empty ($_SESSION['nm_usr_panitia']) |empty ($_SESSION['lvl_user'])){
echo "<script type='text/javascript'>alert('Sorry, you have to login first');
            document.location.href='../login.html'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <title>Administrator | Studi Ekskursi</title>

  <!--dynamic table-->
  <link href="../js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="../js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="../js/data-tables/DT_bootstrap.css" />

  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="index.php"><img src="../images/logohm.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->


        <div class="left-side-inner">

           <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li ><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
				<li><a href="batas_pendaftaran.php"><i class="fa fa-dashboard"></i> <span>Batas Pendaftaran & Pembayaran</span></a></li>
				<li class="menu-list"><a href="#"><i class="fa fa-credit-card"></i> <span>Verifikasi Administrasi</span></a>
					<ul class="sub-menu-list">
						<li><a href="peserta_verifikasi_berkas.php">Verifikasi Status Berkas</a></li>
						<li   ><a href="peserta_verifikasi.php">Verifikasi Status Pembayaran</a></li>
						<li><a href="peserta_status.php">Verifikasi Status Peserta</a></li>
					</ul>
				</li>
				<li class="menu-list nav-active"><a href="#"><i class="fa fa-clipboard"></i> <span>Daftar Peserta</span></a>
					<ul class="sub-menu-list">
						<li class="active"><a href="se_data.php"> Studi Ekskursi</a></li>
						<li ><a href="ldkm_data.php"> Latihan Dasar Kepemimpinan Mahasiswa</a></li>
					</ul>
				</li>
				<li class="menu-list "><a href="#"><i class="fa fa-file"></i> <span>Laporan</span></a>
					<ul class="sub-menu-list">
						<?php $thnskrg=date("Y");?>
						<li ><a href="se_laporan.php?tahun=<?php echo $thnskrg;?>">Peserta Studi Ekskursi</a></li>
						<li><a href="ldkm_laporan.php?tahun=<?php echo $thnskrg;?>">Peserta Latihan Dasar Kepemimpinan Mahasiswa</a></li>
						<li><a href="laporan_keuangan_se.php?tahun=<?php echo $thnskrg;?>">Laporan Keuangan Studi Ekskursi</a></li>
						<li><a href="laporan_keuangan_ldkm.php?tahun=<?php echo $thnskrg;?>">Laporan Keuangan Latihan Dasar Kepemimpinan Mahasiswa</a></li>
					</ul>
				</li>
			
            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

        <!--toggle button start-->
        <a class="toggle-btn"><i class="fa fa-bars"></i></a>
        <!--toggle button end-->

		<!--notification menu start -->
        <div class="menu-right">
            <ul class="notification-menu">
                
               
                <li>
                    <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i>
                        Welcome, <?php
                                echo $_SESSION['nm_usr_panitia'];
                            ?> (Panitia)
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                        <li><a href="../logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            <h3>
                Studi Ekskursi
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php"> Dashboard</a>
                </li>
				<li>
                    <a href="se_data.php"> Tabel Peserta Studi Ekskursi</a>
                </li>
                <li class="active"> Detail Peserta Studi Ekskursi</li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Studi Ekskursi
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
        </header>
		<?php
			include '../controller/konversi.php';
			include_once '../controller/peserta-control.php';
			$client = new PesertaController();
		?>
        <div class="panel-body">
		
		<div class="col-lg-9">
		<div class="panel panel-success">
				<div class="panel-heading">
                    <h3 class="panel-title">Detail Peserta</h3>
                </div>
                <div class="panel-body">
                    <?php
					$kode=$_GET['id'];
					$keg="SE";
					$tampil = $client->DaftarDetail($kode, $keg);
					foreach ($tampil as $data) {
					echo "<table class='table table-hover'>";
					echo "<tr><td>NIM </td><td>:</td><td> $data->nim</td></tr>";
					echo "<tr><td>Nama Peserta</td><td>:</td><td> $data->nama_mhs</td></tr>";
					echo "<tr><td>Ukuran Kaos</td><td>:</td><td> $data->ukuran_kaos</td></tr>";
					echo "<tr><td>Penyakit Bawaan</td><td>:</td><td> $data->penyakit_bawaan</td></tr>";
					echo "<tr><td>No Telp</td><td>:</td><td> $data->no_telp</td></tr>";
					echo "<tr><td>Tgl Pendaftaran</td><td>:</td><td> $data->tgl_pendaftaran</td></tr>";
					echo "<tr><td>KRS </td><td>:</td><td><div class='col-md-10'><div class='blog-img-sm'> <img src='../file/peserta/krs/$data->nama_krs' title='$data->nama_krs'></div></div></td></tr>";
					echo "<tr><td>KTM</td><td>:</td><td><div class='col-md-10'><div class='blog-img-sm'> <img src='../file/peserta/ktm/$data->nama_ktm' title='$data->nama_ktm'></div></div></td></tr>";
					echo "<tr><td>Foto</td><td>:</td><td><div class='col-md-10'><div class='blog-img-sm'> <img src='../file/peserta/foto/$data->nama_foto' title='$data->nama_foto'></div></div></td></tr>";
					echo "<tr><td>Password</td><td>:</td><td> $data->password</td></tr>";
					echo "<tr><td>Status Pembayaran</td><td>:</td><td> $data->status_bayar</td></tr>";
					echo "</table>";
					}
					?>
                </div>
                </div>
		</div>
		</div>
        </div>
        </section>
        </div>
        <!--body wrapper end-->

        <!--footer section start-->
        <footer>
            2015 &copy; Humanika
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="../js/jquery-1.10.2.min.js"></script>
<script src="../js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="../js/jquery-migrate-1.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/modernizr.min.js"></script>
<script src="../js/jquery.nicescroll.js"></script>

<!--dynamic table-->
<script type="text/javascript" language="javascript" src="../js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../js/data-tables/DT_bootstrap.js"></script>
<!--dynamic table initialization -->
<script src="../js/dynamic_table_init.js"></script>

<!--common scripts for all pages-->
<script src="../js/scripts.js"></script>

</body>
</html>
