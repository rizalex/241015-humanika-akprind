<?php
session_start();
error_reporting(0);

if($_SESSION['jenis']==1){ $keg="SE";}elseif($_SESSION['jenis']==2){$keg="LDKM";}
$ambil=$_GET['hal'];
$kode=$_GET['id'];
$keg=$_GET['keg'];
$thn=$_GET['tahun'];
if(empty($thn)){$thn=date("Y");}
include '../controller/konversi.php';
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">
  
  <title>Humanika | Daftar Peserta SE</title>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/style1.css" media="all" />\
  
   <!--dynamic table-->
  <link href="../js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="../js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="../js/data-tables/DT_bootstrap.css" />
  
  <script src="../js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="../../js/jquery.cycle.all.min.js"></script>
  <script type="text/javascript">
	$(function() {
			if ($('#sliderholder-cycle').length) {
			// timeouts per slide (in seconds) 
			var timeouts = [50,80,25]; 
			function calculateTimeout(currElement, nextElement, opts, isForward) { 
			    var index = opts.currSlide; 
			   return timeouts[index] * 100;
			}
			jQuery('#sliderholder-cycle').cycle({
				fx: 'fade',
				pager: '.slidernav',
				prev:    '.sliderprev',
        		next:    '.slidernext',
				speed: 1000,
				timeoutFn: calculateTimeout,
				pagerEvent: 'click',
    			pauseOnPagerHover: true,
    			cleartype: 1
	});
			jQuery('#sliderholder-cycle').css("display", "block");
			jQuery('.slidernav').css("display", "block");
			
			} 
	});
</script>	
</head>
<body class="bk">
<section>
  
  <div class="bg"></div>
   
  <!-- Begin Slider -->
   <div id="cycle-wrapperr">
    <div id="sliderholder-cycle"> 
		<img src="../js/style/images/art/3.jpg" width="965" height="385" />
		<img src="../js/style/images/art/1.jpg" width="965" height="385" /> 
	</div>
    <ul class="slidernav"></ul>
    <div class="sliderdir"> <a href="#"><span class="sliderprev">Prev</span></a> <a href="#"><span class="slidernext">Next</span></a> </div>
  </div>
  <!-- End Slider --> 
  <div class="horizontal-menu-page">
  <nav class=" navbar navbar-default" role="navigation">
        <div class="container-fluid">       
		<div class="navbar-header">
                <a class="navbar-brand" href="index.php">
                    <img src="../images/hm.png" alt="">
                </a>
        </div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-">
                <ul class="nav navbar-nav navbar-right">
					<?php if(empty($_SESSION['jenis'])) {
					?> <li><a href="index.php"><i class="fa fa-home"></i>  Home</a></li>
					<li  class="active"><a href="cara-pembayaran.php"><i class="fa fa-money"></i>  Cara Pembayaran</a></li>
					<li><a href="login.php"><i class="fa fa-sign-in"></i>  Login</a></li>
					<?php } 
					else {
						if($_SESSION['jenis']==1){?>
						<li ><a href="se/index.php"><i class="fa fa-home"></i>  Home</a></li><?php }
						else if($_SESSION['jenis']==2){
						?> <li><a href="ldkm/index.php"><i class="fa fa-home"></i>  Home</a></li><?php } ?>
				 
					<li><a href="daftar-peserta.php?keg=<?php echo $keg ?>&tahun=<?php echo $thn ?>"><i class="fa fa-users"></i>  Daftar Peserta</a></li>
					<li  class="active"><a href="cara-pembayaran.php?keg=<?php echo $keg ?>&tahun=<?php echo $thn ?>"><i class="fa fa-money"></i>  Cara Pembayaran</a></li>
					<li>
						<a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-user"></i>
							Welcome, <?php
								
									echo $_SESSION['nama_peserta']." ".$_SESSION['nim'];
								$nim=$_SESSION['nim'];
								?> 
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-usermenu pull-right">
							<li><a href="data-pribadi.php?nim=<?php echo $_SESSION['id_peserta']; ?>"><i class="fa fa-user"></i> Profile</a></li>
							<li><a href="history.php?id=<?php echo $_SESSION['id_peserta']; ?>&keg=<?php echo $keg ?>&tahun=<?php echo $thn ?>"><i class="fa fa-money"></i> History Pembayaran</a></li>
							<li><a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
						</ul>
					</li><?php } ?>
                </ul>
            </div><!-- /.navbar-collapse -->		
        </div><!-- /.container-fluid -->
  </nav>
  <!--body wrapper start-->
        
       
		<div class="wrapper">
			<div class="row">
				<div class="col-md-14">        
						   
				<section class="panel">
					<header class="panel-heading">
						Cara Pembayaran
						<span class="tools pull-right">
							<a href="javascript:;" class="fa fa-chevron-down"></a>
							<a href="javascript:;" class="fa fa-times"></a>
						</span>
					</header>
					
					<?php 
							include_once '../controller/bank-control.php';
							$client = new BankController();
							$se = $client->DaftarBankSE($thn);	
							$ldkm = $client->DaftarBankLDKM($thn);	
							
						?> 
					<div class="panel-body">
						<div class="alert alert-block alert-success fade in">
							<button type="button" class="close close-sm" data-dismiss="alert">
							<i class="fa fa-times"></i>
							</button>
							<strong>Cara Pembayaran!</strong> Bisa dilakukan dengan dua cara yaitu :</br>
							<ul>
								<li>Transfer Melalui ATM</li>
								<li>Transfer Melalui Bank</li>
							</ul>
									<h3>Berikut adalah daftar bank dan rekening tujuan :</h3>
									<ul>
										<li>Untuk kegiatan Studi Ekskursi
											<ul><?php
												foreach($se as $data){
												echo"<li>$data->nama_bank - $data->no_rekening - $data->nama_pemilik</li>";
												}
											?>
											</ul>
										</li>
										<li>Untuk kegiatan Latihan Dasar Kepemimpinan Mahasiswa
											<ul><?php
												foreach($ldkm as $data){
												echo"<li>$data->nama_bank - $data->no_rekening - $data->nama_pemilik</li>";
												}
											?>
											</ul>
										</li>
									</ul>
						</div>
					</div>
				</section>
				</div>
			</div>
		</div>
            
        <!--body wrapper end-->
		<!--footer section start-->
        <footer><center>
            2015 &copy; Humanika
        </center></footer>
        <!--footer section end-->
		

<!-- Placed js at the end of the document so the pages load faster -->

<script src="../js/jquery-1.10.2.min.js"></script>
<script src="../js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="../js/jquery-migrate-1.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/modernizr.min.js"></script>
<script src="../js/jquery.nicescroll.js"></script>

<!--validation initialization -->
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script src="../js/validation-init.js"></script>


<!--dynamic table-->
<script type="text/javascript" language="javascript" src="../js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../js/data-tables/DT_bootstrap.js"></script>
<!--dynamic table initialization -->
<script src="../js/dynamic_table_init.js"></script>



<!--common scripts for all pages-->
<script src="../../js/scripts.js"></script>

	
</body>
</html>