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

  <title>Administrator | Arsip</title>

  <!--dynamic table-->
  <link href="../js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="../js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="../js/data-tables/DT_bootstrap.css" />
  
  <link rel="stylesheet" type="text/css" href="../js/bootstrap-datepicker/css/datepicker-custom.css" />
  <link rel="stylesheet" type="text/css" href="../js/bootstrap-timepicker/css/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="../js/bootstrap-datetimepicker/css/datetimepicker-custom.css" />
  
  <!--file upload-->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-fileupload.min.css" />

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
                <li><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
				<li class="menu-list"><a href="#"><i class="fa fa-users"></i> <span>Induk Admin</span></a>
					<ul class="sub-menu-list">
						<li><a href="admin_lev.php">Level Admin</a></li>
						<li><a href="admin_dat.php">Data Admin</a></li>
					</ul>
				</li>
				<li class="menu-list"><a href="#"><i class="fa fa-file"></i> <span>Induk Jenis Kegiatan</span></a>
					<ul class="sub-menu-list">
						<li><a href="keg_jenis.php"> Jenis Kegiatan</a></li>
						<li ><a href="keg_detail.php"> Detail Kegiatan</a></li>
					</ul>
				</li>
				<li class="active"><a href="arsip.php"><i class="fa fa-files-o"></i> <span>Arsip</span></a></li>
				<li><a href="artikel.php"><i class="fa fa-clipboard"></i> <span>Artikel</span></a></li>
				<li><a href="ref-bank.php"><i class="fa fa-money"></i> <span>Referensi Bank</span></a></li>
				<li><a href="mahasiswa_data.php"><i class="fa fa-user"></i> <span>Mahasiswa</span></a></li>
				
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
                Arsip
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php"> Dashboard</a>
                </li>
				<li>
                    <a href="arsip.php"> Tabel Arsip</a>
                </li>
                <li class="active"> Edit File Arsip</li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Arsip
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
        </header>
		
        <div class="panel-body">
		 <?php
				require_once '../controller/arsip-control.php';
				$client = new ArsipController();
				$kode=$_GET['id'];
				$namafolder="../file/arsip/";
				if (isset($_POST['submit_edit'])) {
		     	if (!empty($_FILES["nama_file"]["tmp_name"])){
						$type=$_FILES['nama_file']['type'];
						$size=$_FILES['nama_file']['size'];
						$name=$_FILES['nama_file']['name'];
						$file = $namafolder . basename($_FILES['nama_file']['name']);
						move_uploaded_file($_FILES['nama_file']['tmp_name'], $file); 
						$result = $client->EditFile($kode, $file, $name, $size, $type);
						if ($result > 0) {?>
							<script language="javascript">alert('Edit Success'); document.location.href='arsip.php'</script>
						<?php } else { echo "Failed"; } 
						
						
					}
					else {
								echo " <div class='alert alert-block alert-danger fade in'>
												<button type='button' class='close close-sm' data-dismiss='alert'>
												<i class='fa fa-times'></i>
												</button>
												<strong>Warning!</strong> Silahkan masukkan file...
												</div>"; 
							}
				}
				
			?>

		<form class="cmxform form-horizontal adminex-form" id="signupForm" method="post" action="" enctype="multipart/form-data">
			<div class="form-group">
                <label class="control-label col-lg-2">File</label>
                <div class="col-md-4">
                    <input type="file" name="nama_file" />
                </div>
            </div>	
			<div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                   <button class="btn btn-info" type='submit' name='submit_edit'>Save</button>
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
<script type="text/javascript" src="../js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>

<!--file upload-->
<script type="text/javascript" src="../js/bootstrap-fileupload.min.js"></script>

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
