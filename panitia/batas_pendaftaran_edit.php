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

  <title>Administrator | Batas Pendaftaran & Pembayaran</title>

  <!--dynamic table-->
  <link href="../js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="../js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="../js/data-tables/DT_bootstrap.css" />
  
  <link rel="stylesheet" type="text/css" href="../js/bootstrap-datepicker/css/datepicker-custom.css" />

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
				<li class="active"><a href="batas_pendaftaran.php"><i class="fa fa-dashboard"></i> <span>Batas Pendaftaran & Pembayaran</span></a></li>
				<li class="menu-list"><a href="#"><i class="fa fa-credit-card"></i> <span>Verifikasi Administrasi</span></a>
					<ul class="sub-menu-list">
						<li><a href="peserta_verifikasi_berkas.php">Verifikasi Status Berkas</a></li>
						<li><a href="peserta_verifikasi.php">Verifikasi Status Pembayaran</a></li>
						<li><a href="peserta_status.php">Verifikasi Status Peserta</a></li>
					</ul>
				</li>
				<li class="menu-list "><a href="#"><i class="fa fa-clipboard"></i> <span>Daftar Peserta</span></a>
					<ul class="sub-menu-list">
						<li ><a href="se_data.php"> Studi Ekskursi</a></li>
						<li ><a href="ldkm_data.php"> Latihan Dasar Kepemimpinan Mahasiswa</a></li>
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
                            if(($_SESSION['lvl_user']==2)) {
                                echo $_SESSION['nm_usr_panitia'];
                            }
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
                Batas Pendaftaran & Pembayaran
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php"> Dashboard</a>
                </li>
				<li>
                    <a href="batas_pendaftaran.php"> Tabel Batas Pendaftaran & Pembayaran</a>
                </li>
                <li class="active"> Edit Batas Pendaftaran & Pembayaran</li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Batas Pendaftaran & Pembayaran
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
        </header>
		
        <div class="panel-body">
				 <?php
				require_once '../controller/batas-control.php';
				$client = new BatasController();
				$kode=$_GET['id'];
				if (isset($_POST['submit_edit'])) {
					$tglmulai= $_POST['tglmulai'];
					$tglselesai= $_POST['tglselesai'];
					$byrmulai= $_POST['byrmulai'];
					$byrakhir= $_POST['byrakhir'];
					
					if($tglmulai<=$tglselesai && $byrmulai<=$byrakhir){
						if($tglmulai<=$byrmulai && $tglselesai<=$byrakhir){
						$result = $client->EditBatas($kode, $tglmulai, $tglselesai, $byrmulai, $byrakhir);
						if ($result > 0) {?>
							<script language="javascript">alert('Edit Success'); document.location.href='batas_pendaftaran.php'</script>
							<?php } else { echo "Failed"; }
						}else {echo"<div class='alert alert-danger fade in'>
											<button type='button' class='close close-sm' data-dismiss='alert'>
												<i class='fa fa-times'></i>
											</button>	
											<strong>Warning! </strong><span> Tanggal mulai pendaftaran atau pembayaran tidak bisa melewati tanggal selesai pendaftaran atau pembayaran.</span>
										</div>";} 
					} else {echo"<div class='alert alert-danger fade in'>
											<button type='button' class='close close-sm' data-dismiss='alert'>
												<i class='fa fa-times'></i>
											</button>	
											<strong>Warning! </strong><span> Tanggal mulai pendaftaran atau pembayaran tidak bisa melewati tanggal selesai pendaftaran atau pembayaran.</span>
										</div>";} 
				}
			
			$tampil = $client->TampilEditBatas($kode);
			?>
		<form class="cmxform form-horizontal adminex-form" id="signupForm" method="post" action="">
			<?php
				foreach ($tampil as $data) {
            ?>
			<div class="form-group">
                <label class="control-label col-lg-3">Jenis Kegiatan & Tahun Kegiatan</label>
				<div class="col-md-2">
                    <input class="form-control" readonly=""  value="<?php echo $data->ket." - ".$data->tahun;  ?>" type="text" size="16"/>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-lg-3">Tgl Awal Pendaftaran</label>
				<div class="col-md-2">
                    <input class="form-control form-control-inline input-medium default-date-picker" readonly=""  value="<?php echo $data->tgl_start ?>" type="text" id="tglmulai" name="tglmulai" size="16"/>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-lg-3">Tgl Akhir Pendaftaran</label>
				<div class="col-md-2">
                    <input class="form-control form-control-inline input-medium default-date-picker"  readonly="" value="<?php echo $data->tgl_selesai ?>" type="text" id="tglselesai" name="tglselesai"/>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-lg-3">Tgl Awal Bayar</label>
				<div class="col-md-2">
                    <input class="form-control form-control-inline input-medium default-date-picker" readonly="" value="<?php echo $data->tgl_byr_awal ?>" type="text" id="byrmulai" name="byrmulai" size="16"/>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-lg-3">Tgl Akhir bayar</label>
				<div class="col-md-2">
                    <input class="form-control form-control-inline input-medium default-date-picker" readonly=""  value="<?php echo $data->tgl_byr_akhir ?>" type="text" id="byrakhir" name="byrakhir"/>
                </div>
            </div>
			
			<div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                   <button class="btn btn-info" type='submit' name='submit_edit'>Save</button>
                </div>
            </div>
			<?php
				}
            ?>			
		</form>
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

<!--pickers plugins-->
<script type="text/javascript" src="../js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!--pickers initialization-->
<script src="../js/pickers-init.js"></script>

<!--dynamic table initialization -->
<script src="../js/dynamic_table_init.js"></script>

<!--validation initialization -->
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script src="../js/validation-init.js"></script>

<!--common scripts for all pages-->
<script src="../js/scripts.js"></script>

</body>
</html>
