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
                <li class="active">Add Mahasiswa</li>
				
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Tambah Mahasiswa
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
        </header>
		
        <div class="panel-body">
			<?php
				require_once '../controller/mahasiswa-control.php';
				$client = new MahasiswaController();
			
				
				if (isset($_POST['submit'])) {
					$nim = $_POST['nim'];
					$nama_mhs = $_POST['nama_mhs'];
					$alamat_asal = $_POST['alamat_asal'];
					$alamat_jogja = $_POST['alamat_jogja'];
					$jk= $_POST['jk'];		
					$email= $_POST['email'];
					$no_telp= $_POST['no_telp'];
					$jurusan= $_POST['jurusan'];
					$tempat_lahir= $_POST['tempat_lahir'];
					$tgl_lahir= $_POST['tgl_lahir'];
					$asal_sekolah= $_POST['asal_sekolah'];
					$agama= $_POST['agama'];
					$goldar= $_POST['goldar'];
					$angkatan= $_POST['angkatan'];
						$result = $client->TambahMahasiswa($nim, $nama_mhs, $alamat_asal, $alamat_jogja, $jk, $email, $no_telp, $jurusan, $tempat_lahir, $tgl_lahir, $asal_sekolah, $agama, $goldar, $angkatan);
						if ($result > 0) {?>
							<script language="javascript">alert('Success'); document.location.href='mahasiswa_data.php'</script>
							<?php } else { echo "Failed"; }
				}
			
			
			?>
		<form class="cmxform form-horizontal adminex-form" id="signupForm" method="post" action="">
		
			<div class="form-group ">
                  <label for="nim" class="control-label col-lg-2">NIM</label>
				  <div class="col-md-2">
                    <input type="text"  name="nim" id="nim" class="form-control" placeholder="Masukkan NIM">
                  </div>
            </div>
			<div class="form-group ">
                  <label for="nama_mhs" class="control-label col-lg-2">Nama Mahasiswa</label>
				  <div class="col-md-4">
                    <input type="text"  name="nama_mhs" id="nama_mhs" class="form-control" placeholder="Masukkan Nama Mahasiswa">
                  </div>
            </div>
			<div class="form-group ">
                  <label for="alamat_asal" class="control-label col-lg-2">Alamat Asal</label>
				  <div class="col-lg-8">
                    <textarea   name="alamat_asal" id="alamat_asal" class="form-control"></textarea>
                  </div>
            </div>
			<div class="form-group ">
                  <label for="alamat_jogja" class="control-label col-lg-2">Alamat Jogja</label>
				  <div class="col-lg-8">
                    <textarea   name="alamat_jogja" id="alamat_jogja" class="form-control"></textarea>
                  </div>
            </div>
			<div class="form-group">
                <label class="col-lg-2 control-label">Jenis Kelamin</label>
                    <div class="col-md-2 icheck minimal">
                        <div class="radio single-row">
                            <input tabindex="2" type="radio"  name="jk" value="L" checked>
                            <label>Laki-laki</label>
                        </div>                                         
                    </div>
					<div class="col-md-2 icheck minimal">
                        <div class="radio single-row">
                            <input tabindex="2" type="radio"  name="jk" value="P">
                            <label>Perempuan</label>
                        </div>                                         
                    </div>
            </div>		
			<div class="form-group ">
                    <label for="email" class="control-label col-lg-2">Email</label>
					<div class="col-md-3">
                      <input type="text"  name="email" id="email" class="form-control" placeholder="Masukkan Email">
                    </div>
            </div>
			<div class="form-group ">
                    <label for="no_telp" class="control-label col-lg-2">Nomor Telpon</label>
					<div class="col-md-3">
                      <input type="text"  name="no_telp" id="no_telp" class="form-control" placeholder="Masukkan Nomor Telpon">
                    </div>
            </div>
			<div class="form-group ">
                    <label for="jurusan" class="control-label col-lg-2">Jurusan</label>
					<div class="col-md-2">
                      <input type="text"  name="jurusan" id="jurusan" class="form-control" value="Teknik Informatika" readonly="">
                    </div>
            </div>
			<div class="form-group ">
                    <label for="tempat_lahir" class="control-label col-lg-2">Tempat Lahir</label>
					<div class="col-md-4">
                      <input type="text"  name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir">
                    </div>
            </div>
			<div class="form-group">
                <label class="control-label col-lg-2">Tanggal Lahir</label>
                  <div class="col-md-2 col-xs-11">
				    <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="1990-01-01"  class="input-append date dpYears">
                       <input type="text" readonly="" value="" size="16" class="form-control" name="tgl_lahir">
                       <span class="input-group-btn add-on">
                       <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                       </span>
                     </div>
                  </div>
             </div>

			<div class="form-group ">
                    <label for="asal_sekolah" class="control-label col-lg-2">Asal Sekolah</label>
					<div class="col-md-4">
                      <input type="text"  name="asal_sekolah" id="asal_sekolah" class="form-control" placeholder="Masukkan Asal Sekolah">
                    </div>
            </div>			
			<div class="form-group ">
                <label for="agama" class="control-label col-lg-2">Agama</label>
				<div class="col-lg-2">
					<select class="form-control m-bot15" name="agama" id="agama">
                        <option value="">Pilih Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
						<option value="Katolik">Katolik</option>
						<option value="Hindu">Hindu</option>
						<option value="Budha">Budha</option>
                    </select>
                </div>
            </div> 
			<div class="form-group ">
                <label for="goldar" class="control-label col-lg-2">Golongan Darah</label>
				<div class="col-lg-3">
					<select class="form-control m-bot15" name="goldar" id="goldar">
                        <option value="">Pilih Golongan Darah</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
						<option value="AB">AB</option>
						<option value="O">O</option>
                    </select>
                </div>
            </div> 
			<div class="form-group ">
                <label for="angkatan" class="control-label col-lg-2">Angkatan</label>
				<div class="col-lg-2">
					<select class="form-control m-bot15" name="angkatan" id="angkatan">
                        <option value="">Pilih Angkatan</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
						<option value="2012">2012</option>
						<option value="2013">2013</option>
						<option value="2014">2014</option>
						<option value="2015">2015</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
                    </select>
                </div>
            </div> 
			<div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                   <button class="btn btn-info" type='submit' name='submit'>Save</button>
                </div>
            </div>		
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
