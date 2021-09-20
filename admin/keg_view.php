<?php
session_start();
if(empty ($_SESSION['nm_user']) |empty ($_SESSION['lvl_user'])){
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

  <title>Administrator | Jenis Kegiatan</title>

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
    
    <?php include 'left_sidebar.php'; ?>
    
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
                            if(($_SESSION['lvl_user']==1)) {
                                echo $_SESSION['nm_user'];
                            }
                            ?> (Admin)
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
                Jenis Kegiatan
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php">Dashboard</a>
                </li>
				<li>
                    <a href="keg_detail.php">Tabel Detail Kegiatan</a>
                </li>
                <li class="active">Lihat Detail Kegiatan</li>
				
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Jenis Kegiatan
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
        </header>
		
        <div class="panel-body">
			<?php require_once '../controller/keg-control.php';
			$client = new JenisController();
			$kode=$_GET['id'];			
			$tampil = $client->TampilEditDetail($kode); ?>
		<form class="cmxform form-horizontal adminex-form" id="signupForm" method="post" action="">
			<?php
				foreach ($tampil as $data) {
            ?>
			<div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Jenis Kegiatan</label>
                <div class="col-sm-4">
                    <?php echo $data->nama_kegiatan ?>
                </div>
            </div>
			<div class="form-group ">
                    <label for="biaya" class="control-label col-lg-2">Biaya Kegiatan</label>
					<div class="col-md-3">
                      Rp. <?php echo $data->biaya ?>,-
                    </div>
            </div>
			<div class="form-group ">
                <label for="name" class="control-label col-lg-2">Penanggung Jawab</label>
				<div class="col-lg-4">
                    <?php echo $data->penanggung_jawab ?>
                </div>
            </div> 
			<div class="form-group ">
				<label for="kuota" class="control-label col-lg-2">Kuota</label>
                <div class="col-md-2">
                    <?php echo $data->kuota ?> Peserta
                </div>
            </div> 
			<div class="form-group ">
				<label for="lokasi" class="control-label col-lg-2">Lokasi Kegiatan</label>
                <div class="col-md-8">
					<?php echo $data->lokasi ?>       
                </div>
            </div>
			<div class="form-group ">
				<label for="tahun" class="control-label col-lg-2">Tahun</label>
                <div class="col-md-2">
                    <?php echo $data->tahun ?>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-lg-2">Tanggal Mulai</label>
				<div class="col-md-2">
                    <?php $date = new DateTime($data->tgl_mulai);
                    echo $date->format('d M Y'); ?>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-lg-2">Tanggal Selesai</label>
				<div class="col-md-2">
                    <?php $date = new DateTime($data->tgl_akhir);
                    echo $date->format('d M Y'); ?>
                </div>
            </div>
			<?php } ?>			
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
