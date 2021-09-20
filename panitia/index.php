<?php
session_start();
if(empty ($_SESSION['usernamep']) || empty ($_SESSION['lvl_user'])){
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
  <link rel="shortcut icon" href="#" type="../image/png">

  <title>Administrator | Panitia</title>

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
                <li class="active"><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
				<li><a href="batas_pendaftaran.php"><i class="fa fa-dashboard"></i> <span>Batas Pendaftaran & Pembayaran</span></a></li>
				<li class="menu-list"><a href="#"><i class="fa fa-credit-card"></i> <span>Verifikasi Administrasi</span></a>
					<ul class="sub-menu-list">
						<li><a href="peserta_verifikasi_berkas.php">Verifikasi Status Berkas</a></li>
						<li><a href="peserta_verifikasi.php">Verifikasi Status Pembayaran</a></li>
						<li><a href="peserta_status.php">Verifikasi Status Peserta</a></li>
					</ul>
				</li>
				<li class="menu-list"><a href="#"><i class="fa fa-clipboard"></i> <span>Daftar Peserta</span></a>
					<ul class="sub-menu-list">
						<li><a href="se_data.php"> Studi Ekskursi</a></li>
						<li><a href="ldkm_data.php"> Latihan Dasar Kepemimpinan Mahasiswa</a></li>
					</ul>
				</li>
				<li class="menu-list"><a href="#"><i class="fa fa-file"></i> <span>Laporan</span></a>
					<ul class="sub-menu-list">
						<?php $thnskrg=date("Y");?>
						<li><a href="se_laporan.php?tahun=<?php echo $thnskrg;?>">Peserta Studi Ekskursi</a></li>
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
                Informasi Peserta
            </h3>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
         <div class="wrapper">
            <div class="row">
			<center>
                <div class="col-md-12">
					<?php
						include '../controller/konversi.php';
						include_once '../controller/batas-control.php';
						$tahun=date("Y");
						$client = new BatasController();
						$hasil1 = $client->DaftarIndexSE($tahun);
						$hasil2 = $client->DaftarIndexLDKM($tahun);
						$hasil3 = $client->DaftarIndexLunasSE($tahun);
						$hasil4 = $client->DaftarIndexLunasLDKM($tahun);
						$hasil5 = $client->DaftarIndexBelumLunasSE($tahun);
						$hasil6 = $client->DaftarIndexBelumLunasLDKM($tahun);
						
					?>
					
					<div class="row state-overview">
					    <div class="col-md-4 col-xs-6 col-sm-2">
                            <div class="panel purple">
                                <div class="symbol">
                                    <i class="fa fa-users"></i>
                                </div>
								<?php foreach($hasil1 as $dat){ ?>
                                <div class="state-value">
                                    <div class="value"><?php echo "$dat->jumlah"; ?></div>
                                    <div class="title"><?php echo "Jumlah Peserta SE $tahun Keseluruhan   "; ?></div>
                                </div><?php } ?>
                            </div>
                        </div>
						<div class="col-md-4 col-xs-6 col-sm-2">
                            <div class="panel blue">
                                <div class="symbol">
                                    <i class="fa fa-users"></i>
                                </div>
								<?php foreach($hasil3 as $dat){ ?>
                                <div class="state-value">
                                    <div class="value"><?php echo "$dat->jumlah"; ?></div>
                                    <div class="title"><?php echo "Jumlah Peserta SE $tahun Yang Telah Lunas"; ?></div>
                                </div><?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6 col-sm-2">
                            <div class="panel red">
                                <div class="symbol">
                                    <i class="fa fa-users"></i>
                                </div>
								<?php foreach($hasil5 as $dat){ ?>
                                <div class="state-value">
                                    <div class="value"><?php echo "$dat->jumlah"; ?></div>
                                    <div class="title"><?php echo "Jumlah Peserta SE $tahun Yang Belum Lunas"; ?></div>
                                </div><?php } ?>
                            </div>
                        </div>
					</div>
                    <div class="row state-overview">
                       <div class="col-md-4 col-xs-6 col-sm-2">
                            <div class="panel red">
                                <div class="symbol">
                                    <i class="fa fa-users"></i>
                                </div>
								<?php foreach($hasil2 as $dat){ ?>
                                <div class="state-value">
                                    <div class="value"><?php echo "$dat->jumlah"; ?></div>
                                    <div class="title"><?php echo "Jumlah Peserta LDKM $tahun Keseluruhan "; ?></div>
                                </div><?php } ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6 col-sm-1">
                            <div class="panel green">
                                <div class="symbol">
                                    <i class="fa fa-users"></i>
                                </div>
								<?php foreach($hasil4 as $dat){ ?>
                                <div class="state-value">
                                    <div class="value"><?php echo "$dat->jumlah"; ?></div>
                                    <div class="title"><?php echo "Jumlah Peserta LDKM $tahun Yang Telah Lunas "; ?></div>
                                </div><?php } ?>
                            </div>
                        </div>
						<div class="col-md-4 col-xs-6 col-sm-1">
                            <div class="panel purple">
                                <div class="symbol">
                                    <i class="fa fa-users"></i>
                                </div>
								<?php foreach($hasil6 as $dat){ ?>
                                <div class="state-value">
                                    <div class="value"><?php echo "$dat->jumlah"; ?></div>
                                    <div class="title"><?php echo "Jumlah Peserta LDKM $tahun Yang Belum Lunas"; ?></div>
                                </div><?php } ?>
                            </div>
                        </div>
					</div>
					<div class="row state-overview">

                        
					</div>
				</center>
        <!--body wrapper end-->

        <!--footer section start-->
        <footer class="sticky-footer">
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


<!--common scripts for all pages-->
<script src="../js/scripts.js"></script>

</body>
</html>
