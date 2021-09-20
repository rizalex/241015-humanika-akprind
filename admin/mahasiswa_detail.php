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

  <title>Administrator | Mahasiswa</title>

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
                Mahasiswa
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php">Dashboard</a>
                </li>
				<li>
                    <a href="mahasiswa_data.php">Tabel Mahasiswa</a>
                </li>
                <li class="active">Detail Mahasiswa</li>
				
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Edit Mahasiswa
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
        </header>
		
        <div class="panel-body">
				 <?php
				require_once '../controller/mahasiswa-control.php';
				require_once '../controller/konversi.php';
				$client = new MahasiswaController();
				$kode=$_GET['id'];
				
			
			$tampil = $client->TampilEditMahasiswa($kode);
			?>
		<form class="cmxform form-horizontal adminex-form" id="signupForm" method="post" action="">
			<?php
				foreach ($tampil as $data) {
            ?>
			<div class="form-group ">
                  <label class="control-label col-lg-2">NIM</label>
				  <div class="col-md-2">
                    <input type="text" class="form-control" readonly="" value="<?php echo $data->nim ?>">
                  </div>
            </div>
			<div class="form-group ">
                  <label class="control-label col-lg-2">Nama Mahasiswa</label>
				  <div class="col-md-4">
                    <input type="text" readonly="" class="form-control" value="<?php echo $data->nama_mhs ?>">
                  </div>
            </div>
			<div class="form-group ">
                  <label class="control-label col-lg-2">Alamat Asal</label>
				  <div class="col-lg-8">
                    <textarea  class="form-control" readonly=""><?php echo $data->alamat_asal ?></textarea>
                  </div>
            </div>
			<div class="form-group ">
                  <label for="alamat_jogja" class="control-label col-lg-2">Alamat Jogja</label>
				  <div class="col-lg-8">
                    <textarea   readonly="" class="form-control"><?php echo $data->alamat_jogja ?></textarea>
                  </div>
            </div>
			<div class="form-group">
                <label class="col-lg-2 control-label">Jenis Kelamin</label>
					<?php if($data->jk=="P"){ $jk="Perempuan";} else { $jk="Laki-laki";} ?>
					<div class="col-md-2">
                    <input type="text" readonly="" class="form-control" value="<?php echo $jk ?>">
					</div>
            </div>		
			<div class="form-group ">
                    <label for="email" class="control-label col-lg-2">Email</label>
					<div class="col-md-3">
                      <input type="text"  name="email" id="email" class="form-control" value="<?php echo $data->email ?>" readonly="">
                    </div>
            </div>
			<div class="form-group ">
                    <label class="control-label col-lg-2">Nomor Telpon</label>
					<div class="col-md-2">
                      <input type="text"  readonly="" class="form-control" value="<?php echo $data->no_telp ?>">
                    </div>
            </div>
			<div class="form-group ">
                    <label class="control-label col-lg-2">Jurusan</label>
					<div class="col-md-2">
                      <input type="text"  class="form-control" value="<?php echo $data->jurusan ?>" readonly="">
                    </div>
            </div>
			<div class="form-group ">
                    <label for="tempat_lahir" class="control-label col-lg-2">Tempat Lahir</label>
					<div class="col-md-4">
                      <input type="text"  readonly="" class="form-control" value="<?php echo $data->tempat_lahir ?>">
                    </div>
            </div>
			<div class="form-group">
                <label class="control-label col-lg-2">Tanggal Lahir</label>
                  <div class="col-md-2 col-xs-11">
                       <input type="text" readonly="" value="<?php echo DateToIndo($data->tgl_lahir) ?>" size="16" class="form-control">
                  </div>
             </div>

			<div class="form-group ">
                    <label for="asal_sekolah" class="control-label col-lg-2">Asal Sekolah</label>
					<div class="col-md-4">
                      <input type="text"  readonly="" class="form-control" value="<?php echo $data->asal_sekolah ?>">
                    </div>
            </div>			
			<div class="form-group ">
                <label for="agama" class="control-label col-lg-2">Agama</label>
				<div class="col-md-2">
                      <input type="text"  readonly="" class="form-control" value="<?php echo $data->agama ?>">
                    </div>
            </div> 
			<div class="form-group ">
                <label for="goldar" class="control-label col-lg-2">Golongan Darah</label>
				<div class="col-md-1">
                      <input type="text"  readonly="" class="form-control" value="<?php echo $data->goldar ?>">
                    </div>
            </div> 
			<div class="form-group ">
                <label for="angkatan" class="control-label col-lg-2">Angkatan</label>
				<div class="col-md-1">
                      <input type="text"  readonly="" class="form-control" value="<?php echo $data->angkatan ?>">
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
