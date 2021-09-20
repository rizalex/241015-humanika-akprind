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

  <title>Administrator | Artikel</title>

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
                Artikel
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php"> Dashboard</a>
                </li>
				<li>
                    <a href="artikel.php"> Tabel Artikel</a>
                </li>
                <li class="active"> Detail Artikel</li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
        <header class="panel-heading">
            Artikel
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
        </header>
		<div class="panel-body">
		<div class="col-lg-12">
		<div class="panel panel-success">
				<div class="panel-heading">
                    <h3 class="panel-title">Detail Artikel</h3>
                </div>
                <div class="panel-body">
                    <?php
					include '../controller/konversi.php';
					include_once '../controller/artikel-control.php';
					$kode = $_GET['id'];
					$client = new ArtikelController();
					$tampil = $client->DaftarDetail($kode);
					foreach ($tampil as $data) {
            
					$stat=$data->publish;
					echo "<table class='table table-hover'>";
					echo "<tr><td>Jenis Kegiatan </td><td>:</td><td> $data->nama_kegiatan</td></tr>";
					echo "<tr><td>Judul</td><td>:</td><td> $data->judul</td></tr>";
					echo "<tr><td>Isi Berita</td><td>:</td><td> $data->isi_berita</td></tr>";
					echo "<tr><td>Gambar</td><td>:</td><td><div class='col-md-5'><div class='blog-img-sm'> <img src='$data->gambar'/></div></div></td></tr>";
					echo "<tr><td></td><td></td><td> <a href='artikel_edit_gambar.php?id=$data->id_artikel'><button class='btn btn-info' type='button'>Ganti Gambar</button></a></td></tr>";
					echo "<tr><td>Tanggal Jam Update</td><td>:</td><td> $data->tgl_jam_update</td></tr>";
					echo "<tr><td>Admin </td><td>:</td><td> $data->admin</td></tr>";
					echo "<tr><td>Status </td><td>:</td>"; if($stat==1) { echo"<td>Tidak Dipublikasikan</td></tr>";}
					else { echo"<td>Dipublikasikan</td></tr>";}
					echo "</table>";
					}
					?>
                </div>
                </div>
		</div>
		</div>
        </section>
		
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
