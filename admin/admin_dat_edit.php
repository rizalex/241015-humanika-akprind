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

  <title>Administrator | Admin Users</title>

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
                Adminisitrator
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php">Dashboard</a>
                </li>
                <li> <a href="admin_dat.php">Tabel Data Admin</a></li>
				<li class="active"> Edit Data Admin</li>
            </ul>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Administrator
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
        </header>
		
        <div class="panel-body">
		<?php
		require_once '../controller/admin-control.php';
		$client = new UserController();
		$kode = $_GET['username'];
		if (isset($_POST['submit_edit'])) {
			$user = $_POST['username'];
			$passlam = $_POST['passl'];
			$passbar = $_POST['password'];
			$nama = $_POST['name'];
			$level = $_POST['id_level'];
			
				$tampil = $client->TampilEditUser($kode);
				foreach ($tampil as $data) {
				if($passlam==$data->password){
				$result = $client->EditUser($kode, $user, $passbar, $nama, $level);
				if ($result > 0) {?>
				<script language="javascript">alert('Edit Success'); document.location.href='admin_dat.php'</script>
				<?php
				} else { echo "Failed"; }
				}
				else{ 
							echo "<div class='alert alert-block alert-danger fade in'>
                                <button type='button' class='close close-sm' data-dismiss='alert'>
                                    <i class='fa fa-times'></i>
                                </button>
                                <strong>Password lama yang anda masukkan salah ! </strong>Silahkan ulangi lagi 
                            </div>";
				} 
				}
		}

		$tampil = $client->TampilEditUser($kode);
		?>
		    <form class="cmxform form-horizontal adminex-form" id="signupForm" method="post" action="">
			<?php
				foreach ($tampil as $data) {
            ?>
                <div class="form-group ">
                    <label for="username" class="control-label col-lg-2">Username</label>
					<div class="col-lg-6">
                        <input class="form-control " id="username" name="username" type="text" value="<?php echo $data->username ?>"/>
                    </div>
                </div>
				<div class="form-group ">
					<label for="passl" class="control-label col-lg-2">Password Lama</label>
                    <div class="col-lg-6">
                        <input class="form-control " id="passl" name="passl" type="password" placeholder="Masukkan Password Lama"/>
                    </div>
				</div>    
				<div class="form-group ">
					<label for="password" class="control-label col-lg-2">Password Baru</label>
                    <div class="col-lg-6">
                        <input class="form-control " id="password" name="password" type="password" placeholder="Masukkan Password Baru"/>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="confirm_password" class="control-label col-lg-2">Konfirmasi Password Baru</label>
                    <div class="col-lg-6">
                        <input class="form-control " id="confirm_password" name="confirm_password" type="password" placeholder="Ulangi Password Baru"/>
					</div>
                </div> 
				<div class="form-group ">
                    <label for="name" class="control-label col-lg-2">Nama Lengkap</label>
					<div class="col-lg-6">
                        <input type="text"  name="name" id="name" class="form-control" value="<?php echo $data->nama ?>"/>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-sm-2 col-sm-2 control-label">Level Admin</label>
					<div class="col-sm-4">
					<select class="form-control m-bot15" name="id_level" id="id_level">
						<option value='<?php echo $data->id_level ?>'><?php echo $data->level ?></option>
						<?php
						$opsi=$client->DaftarLevel();
						foreach($opsi as $d){
						echo "<option value='$d->id_level'>$d->level</option>";}?>
					</select>
					</div>
				</div>
				<div class="form-group ">
					<div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-info" type="submit" name="submit_edit">Save</button>
                    </div>
                </div>
            </div>
				
			</form>		
			<?php } ?>
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
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script src="../js/validation-init.js"></script>

<!--common scripts for all pages-->
<script src="../js/scripts.js"></script>

</body>
</html>
