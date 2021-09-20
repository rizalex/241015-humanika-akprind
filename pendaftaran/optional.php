<?php
session_start();
error_reporting(0);
$nim=$_GET['nim'];
$ket=$_GET['keg'];
$jen=$_SESSION['jenis'];
$thn=$_GET['tahun'];
$nopes=$_GET['peserta'];
if(empty ($nim)){
echo "<script type='text/javascript'>alert('Halaman tidak dapat diakses');
            document.location.href='index.php'</script>";
}

?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">
  
  <title>Humanika | Konfirmasi Pembayaran</title>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/style1.css" media="all" />
  <!--file upload-->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-fileupload.min.css" />
  
  <script src="../js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="../js/jquery.cycle.all.min.js"></script>
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
					<li class="active"><a href="index.php"><i class="fa fa-home"></i>  Home</a></li>
                   
                </ul>
            </div><!-- /.navbar-collapse -->		
        </div><!-- /.container-fluid -->
  </nav>
  <!--body wrapper start-->
        <div class="wrapper">
        <div class="row blog">


        <div class="col-lg-14">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
					
					<div class="panel">
					<div class="panel-body">
						<div class="panel-body p-states green-box">
                            <div class="summary pull-center">
								
                                <center><h3>KONFIRMASI PEMBAYARAN</h3>
                                <span><?php if($ket=='SE'){echo"Studi Ekskursi";} else if($ket=='LDKM'){echo"Latihan Dasar Kepemimpinan Mahasiswa";}?></span></center>
                                </br>
								<div class='alert alert-success fade in'>
									<button type='button' class='close close-sm' data-dismiss='alert'>
										<i class='fa fa-times'></i>
									</button>	
									<strong>Notify! </strong><span> Anda harus melakukan pembayaran sebagai syarat untuk melengkapi administrasi pendaftaran. <br>
								Apakah anda sudah melakukan pembayaran ?</span>
								</div>
							<?php if($ket=='SE' || $jen=1){ ?>	 
							<center><a class="btn btn-success" href="se/konfirmasi_pembayaran.php?keg=<?php echo $ket?>&nim=<?php echo $nim?>&peserta=<?php echo $nopes?>&tahun=<?php echo $thn?>"> Ya </a>
		                    <a class="btn btn-success" href="se/index.php"> Belum </a></center>
							<?php } else if($ket=='LDKM' || $jen=2){ ?>	 
							<center><a class="btn btn-success" href="ldkm/konfirmasi_pembayaran.php?keg=<?php echo $ket?>&nim=<?php echo $nim?>&peserta=<?php echo $nopes?>&tahun=<?php echo $thn?>"> Ya </a>
		                    <a class="btn btn-success" href="ldkm/index.php"> Belum </a></center>
							<?php } ?>
                        </div>		
                    </div>
					</div>
					
					
					</div>
                </div>
            </div>				
			
        </div>

        </div>
        </div>
        <!--body wrapper end-->
		<!--footer section start-->
        <footer><center>
            2015 &copy; Humanika
        </center></footer>
        <!--footer section end-->
		
</section>
<!-- Placed js at the end of the document so the pages load faster -->

<script src="../../js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="../../js/jquery-migrate-1.2.1.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/modernizr.min.js"></script>
<script src="../../js/jquery.nicescroll.js"></script>

<script type="text/javascript" src="../../js/jquery.validate.min.js"></script>
<script src="../../js/validation-init.js"></script>

<!--file upload-->
<script type="text/javascript" src="../../js/bootstrap-fileupload.min.js"></script>

	<!--common scripts for all pages-->
	<script src="../../js/scripts.js"></script>
	
</body>
</html>