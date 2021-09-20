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
                <li class="active"> Edit Gambar Artikel</li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Artikel
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
        </header>
		
        <div class="panel-body">
		 <?php
				require_once '../controller/artikel-control.php';
				$client = new ArtikelController();
				$kode=$_GET['id'];
				$namafolder="../file/berita/";
				if (isset($_POST['submit_edit'])) {
					if (!empty($_FILES["nama_file"]["tmp_name"])){
						$jenis_gambar=$_FILES['nama_file']['type'];
						$ukuran=$_FILES['nama_file']['size'];
						$nama_gambar=$_FILES['nama_file']['name'];
						
							if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png"){
								$gambar = $namafolder . basename($_FILES['nama_file']['name']);
								if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
									$result = $client->EditGambar($kode, $gambar, $jenis_gambar, $ukuran, $nama_gambar);
									if ($result > 0) {?>
									<script language="javascript">alert('Success'); document.location.href='artikel.php'</script>
									<?php } else { echo "Failed"; } 

								} else { echo " <div class='alert alert-block alert-danger fade in'>
												<button type='button' class='close close-sm' data-dismiss='alert'>
												<i class='fa fa-times'></i>
												</button>
												<strong>Warning!</strong> Jenis gambar yang anda kirim salah, harus .jpg .gif .png
												</div>"; 
										}
								} else {
								echo " <div class='alert alert-block alert-danger fade in'>
												<button type='button' class='close close-sm' data-dismiss='alert'>
												<i class='fa fa-times'></i>
												</button>
												<strong>Warning!</strong> Jenis gambar yang anda kirim salah, harus .jpg .gif .png
												</div>"; 
							}
					
					}
				}
			
			
			?>

		<form class="cmxform form-horizontal adminex-form" id="signupForm" method="post" action="" enctype="multipart/form-data">
		<div class="form-group ">
			<label class="control-label col-lg-2">Gambar</label>
            <div class="col-md-4">
			<div class="fileupload fileupload-new" data-provides="fileupload">
                 <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"></div>
                 <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                   <div>
                     <span class="btn btn-default btn-file">
                     <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                     <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                       <input type="file" id="nama_file" name="nama_file" class="default" />
					   <input name="MAX_FILE_SIZE" type="hidden" value="100000"/>
                     </span>
                     <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                   </div>
            </div>
			</div>
			</div>	
			<div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                   <button class="btn btn-info" type='submit' name='submit_edit'>Simpan</button>
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
