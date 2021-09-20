<?php
session_start();
if(empty ($_SESSION['nm_usr_panitia']) |empty ($_SESSION['lvl_user'])){
echo "<script type='text/javascript'>alert('Sorry, you have to login first');
            document.location.href='../login.html'</script>";

}
error_reporting(0);
$ket=$_GET['keterangan'];
$thn=$_GET['tahun'];
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
				<li class="menu-list "><a href="#"><i class="fa fa-clipboard"></i> <span>Daftar Peserta</span></a>
					<ul class="sub-menu-list">
						<li ><a href="se_data.php"> Studi Ekskursi</a></li>
						<li ><a href="ldkm_data.php"> Latihan Dasar Kepemimpinan Mahasiswa</a></li>
					</ul>
				</li>
				<li class="menu-list nav-active"><a href="#"><i class="fa fa-file"></i> <span>Laporan</span></a>
					<ul class="sub-menu-list">
						<?php $thnskrg=date("Y");?>
						<li class="active"><a href="se_laporan.php?tahun=<?php echo $thnskrg;?>">Peserta Studi Ekskursi</a></li>
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
                    <a href="se_laporan.php"> Laporan Peserta Studi Ekskursi</a>
                </li>
                <li class="active"> Laporan Peserta Studi Ekskursi Berdasarkan Status Pembayaran</li>
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
			
			include_once '../controller/peserta-control.php';
			include_once '../controller/bayar-control.php';
			$client = new PesertaController();
			$clientt = new BayarController();
			$no=1;
			$jumlah=0;
			$sisa=0;
			$keg='SE';
			 
			
		?>
        <div class="panel-body">
		<div class="btn-group">
            <button data-toggle="dropdown" class="btn btn-info dropdown-toggle" type="button">Tahun Kegiatan SE <span class="caret"></span></button>
            <ul role="menu" class="dropdown-menu">
                <?php
                    $currentYear = date('Y');
                    foreach (range($currentYear-4, $currentYear+1) as $value)
                        echo "<li><a href='se_laporan.php?tahun=".$value."'>" . $value . "</a></li>"; ?>
            </ul>
        </div>
		<a class="btn btn-danger" href="se_laporan_status.php?tahun=<?php echo "$thn";?>&keterangan=Belum Lunas"> Belum Lunas </a>
		<a class="btn btn-success" href="se_laporan_status.php?tahun=<?php echo "$thn";?>&keterangan=Lunas"> Lunas </a>
		
        <a class="btn btn-primary" target="_blank" href="print_se_status.php?tahun=<?php echo "$thn";?>&keterangan=<?php echo "$ket";?>"><i class="fa fa-print"></i> Print </a>
        <div class="panel-body invoice">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                         <img class="inv-logo" src="../images/humanika.png"/>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-2 ">
                        <h1 align="right">PANITIA STUDI EKSKURSI <?php echo "$thn";?><br/>
                            INSTITUT SAINS & TEKNOLOGI AKPRIND<br/>
                            YOGYAKARTA
						</h1>
						<h4 align="right" class="inv-to">Sekretariat : Ruang T106 Jl. Kalisahak 28 Komp. Balapan Tromol Pos 45</h4>
						<p align="right">
                        Telp. (0274) 563029 - 563847 Yogyakarta        
                        </p>
                    </div>
                </div>
                <div class="invoice-address">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-3">
                            <h1 class="t-due">Daftar Peserta Studi Ekskursi  <?php echo "$thn"; ?> (<?php echo "$ket"; ?>)</h1>
                        </div>
                    </div>
                </div></br>
                <table class="table table-bordered table-invoice">
                    <thead>
					<tr>
						<th>No</th>
						<th>NIM</th>
						<th>Nama Peserta</th>
						<th>No Telepon</th>
						<th>Ukuran Kaos</th>
						<th>Angkatan</th>
						<?php if ($ket=='Belum Lunas'){
						echo "<th>Sisa Pembayaran</th>";
						}?>
          
					</tr>
					</thead>
						<?php
							
							$hasil = $client->DaftarSEStatusTahun($thn, $ket);
							
						?>
						<tbody>
						 <?php
						foreach($hasil as $dat){
						echo "
						<tr class='gradeX'>
							<td>".$no++."</td>
							<td>$dat->nim</td>
							<td>$dat->nama_mhs</td>           	
							<td>$dat->notelp</td>
							<td class='center hidden-phone'>$dat->ukuran_kaos</td>
							<td>$dat->angkatan</td>";
							$rinci=$clientt->RincianBiaya($dat->id_peserta, $keg);
							foreach($rinci as $data){ $jumlah=$jumlah+$data->jumlah; $sisa=$data->biaya-$jumlah;} 
							if ($ket=='Belum Lunas'){
							echo "<td>Rp.$sisa,-</td>";
							}
						echo"</tr>";
						$jumlah=0;	
						
						}?>
						</tbody>
				</table>
        </div>
        </div>   
        </div>
        </div>
        </section>
        </div>
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
