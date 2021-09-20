<?php
session_start();
error_reporting(0);
$keg=$_GET['keg']; 
$id=$_GET['id'];
$thn=$_GET['thn'];
if(empty($keg)){
echo "<script type='text/javascript'>alert('Halaman tidak dapat diakses');
            document.location.href='../index.php'</script>";
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
  
  <title>Humanika | Pendaftaran Studi Ekskursi</title>
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/style-responsive.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../css/style1.css" media="all" />

  
	<script src="../../js/jquery-1.10.2.min.js"></script>
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
		<img src="../../js/style/images/art/3.jpg" width="965" height="385" />
		<img src="../../js/style/images/art/1.jpg" width="965" height="385" /> 
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
                    <img src="../../images/hm.png" alt="">
                </a>
        </div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-">
                <ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="../index.php"><i class="fa fa-home"></i>  Home</a></li>
					<li><a href="cara-pembayaran.php"><i class="fa fa-money"></i>  Cara Pembayaran</a></li>
                    <li><a href="../login.php"><i class="fa fa-sign-in"></i>  Login</a> </li>
                </ul>
            </div><!-- /.navbar-collapse -->		
        </div><!-- /.container-fluid -->
  </nav>
  <!--body wrapper start-->
        <div class="wrapper">
        <div class="row blog">
        <div class="col-md-4">
		
            <div class="panel">
                <div class="panel-body">
                    <div class="blog-post">
					<h3>Informasi Pendaftaran</h3>
                        <div class="panel-body p-states green-box">
                            <div class="summary pull-left">
							 <span>Studi Ekskursi </span></br></br>
							<?php

								include '../../controller/konversi.php';
								include_once '../../controller/batas-control.php';
								
								$client = new BatasController();
								$hasil=$client->DaftarBatasKeg($keg, $thn);
								$tgl=date("Y-m-d");
								
								foreach ($hasil as $data) {
									if($data->tgl_start<=$tgl && $data->tgl_selesai>=$tgl){ echo " 
													<center><h3>".DateToIndo($data->tgl_start)." - ". DateToIndo($data->tgl_selesai)."</h3>
													<h2>PENDAFTARAN DIBUKA</h2></br>
													Jumlah Kuota : $data->kuota </br>Jumlah Peserta : $data->jum_peserta
													</center>
												";}
									else if($data->tgl_start<$tgl && $data->tgl_selesai<$tgl){ echo " 
													<center><h3>".DateToIndo($data->tgl_start)." - ". DateToIndo($data->tgl_selesai)."</h3>
													<h2>PENDAFTARAN SUDAH DITUTUP</h2></center>
													";}
									else if($data->tgl_start>$tgl && $data->tgl_selesai>$tgl){ echo " 
													<center><h3>".DateToIndo($data->tgl_start)." - ". DateToIndo($data->tgl_selesai)."</h3>
													<h2>PENDAFTARAN MASIH BELUM DIBUKA</h2></center>
													";}				
													
													   
									} ?>							
                            </div>
                        </div> 
						
                    </div>
				
                </div>
				
            </div>
			<?php 
				include_once '../../controller/arsip-control.php';
				$clientarsip = new ArsipController();
				$sea = $clientarsip->DaftarArsipSE();
				$ldkma = $clientarsip->DaftarArsipLDKM();
				
			?> 
			<!--collapse start-->
			<div class="panel">
				<div class="panel-body">
				<div class="blog-post">
					<h3>Arsip File</h3>
                    <div class="panel-group " id="accordion2">
                        <div class="panel">
                            <div class="panel-heading dark">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo2">
                                        Studi Ekskursi
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo2" class="panel-collapse collapse">
                                <div class="panel-body">
								 <table class="table table-hover">
								<?php foreach($sea as $data){
									echo"<tr><td width='30px'> $data->file_name </td><td> $data->deskripsi</td><td><a href='../download.php?id=$data->id_arsip'><button class='btn btn-primary' type='button' ><i class='fa fa-download'></i></button></a></td></tr>";
								}?>
								</table>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading dark">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree2">
                                        Latihan Dasar Kepemimpinan Mahasiswa
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree2" class="panel-collapse collapse">
                                <div class="panel-body">
								 <table class="table table-hover">
								<?php foreach($ldkma as $data){
									echo"<tr><td width='30px'> $data->file_name </td><td> $data->deskripsi</td><td><a href='../download.php?id=$data->id_arsip'><button class='btn btn-primary' type='button' ><i class='fa fa-download'></i></button></a></td></tr>";
								}?>
								</table>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
				</div>
			</div>
                    <!--collapse end-->                     
        </div>

        <div class="col-md-8">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
					
					<div class="panel">
					<div class="panel-body">
						<div class="panel-body p-states green-box">
                            <div class="summary pull-center">
								<?php
									include_once '../../controller/mahasiswa-control.php';
									$app = new MahasiswaController();
									

									if(isset ($_POST['submit_daftar'])) {
											
											$x=$app->Mahasiswa($_POST['nim']);
											if($x==null) {
												echo " <div class='alert alert-block alert-danger fade in'>
												<button type='button' class='close close-sm' data-dismiss='alert'>
												<i class='fa fa-times'></i>
												</button>
												<strong>Maaf !</strong> Anda tidak terdaftar sebagai Mahasiswa Teknik Informaatika IST AKPRIND Yogyakarta
												</div>";;
											}else {
												$x=$app->Mahasiswa($_POST['nim']);
												if($_POST['nim'] == $x->nim ) {
													
													?>
														<script language="javascript"> document.location.href='../cek_peserta.php?keg=SE&tahun=<?php echo $thn;?>&id=<?php echo $x->nim;?>'</script>
													<?php
												}else {
													echo "gagal";
												}
										}
									}
								?>
                                <center><h3> PENDAFTARAN</h3>
                                <span>Studi Ekskursi</span></center>
                                </br></br>
								
								<form class="cmxform form-horizontal adminex-form" id="signupForm" method="post" action="">
									<div class="form-group ">
										<label for="nim" class="control-label col-lg-4">Masukkan NIM</label>
										<div class="col-lg-6">
											<input type="text"  name="nim" id="nim" class="form-control" placeholder="Masukkan NIM">
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-offset-4 col-lg-9">
										   <button class="btn btn-info" type='submit' name='submit_daftar'>Daftar</button>
										</div>
									</div>
								</form>
                            </div>
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

<!--validation initialization -->
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script src="../js/validation-init.js"></script>

	<!--common scripts for all pages-->
	<script src="../../js/scripts.js"></script>
	
</body>
</html>