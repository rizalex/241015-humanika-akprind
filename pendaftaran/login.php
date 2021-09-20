<?php
session_start();
error_reporting(0);
if(!empty ($_SESSION['nim']) || !empty ($_SESSION['jenis']) ){
if($_SESSION['jenis']==1){
echo "<script type='text/javascript'>document.location.href='se/index.php'</script>";}
else if($_SESSION['jenis']==2){
echo "<script type='text/javascript'>document.location.href='ldkm/index.php'</script>";}
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
  
  <title>Humanika</title>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/style1.css" media="all" />

  
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
					<li ><a href="index.php"><i class="fa fa-home"></i>  Home</a></li>
					<li><a href="cara-pembayaran.php"><i class="fa fa-money"></i>  Cara Pembayaran</a></li>
                    <li class="active"><a href="login.php"><i class="fa fa-sign-in"></i>  Login</a> </li>
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

								include '../controller/konversi.php';
								include_once '../controller/batas-control.php';
								$thn=date("Y");
								$client = new BatasController();
								$hasil=$client->DaftarBatasSE($thn);
								$tgl=date("Y-m-d");
								
								
								foreach ($hasil as $data) {
									if($data->tgl_start<=$tgl && $data->tgl_selesai>=$tgl){ if($data->jum_peserta<$data->kuota){echo " 
													<center><h3>".DateToIndo($data->tgl_start)." - ". DateToIndo($data->tgl_selesai)."</h3>
													<h2>PENDAFTARAN DIBUKA</h2></br>
													Jumlah Kuota : $data->kuota </br>Jumlah Peserta : $data->jum_peserta</br></br>
													<a href='se/daftar.php?keg=SE&thn=$thn'><button class='btn btn-primary btn-lg' type='button' >DAFTAR SE</button></a>
													</center>
												";} else{
												echo"
													<center><h3>".DateToIndo($data->tgl_start)." - ". DateToIndo($data->tgl_selesai)."</h3>
													<h2>Maaf Kuota Sudah Penuh</h2></br>
													Jumlah Kuota : $data->kuota </br>Jumlah Peserta : $data->jum_peserta</br></br>
													
													</center>";
												}
												}
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
				<div class="panel-body">
                    <div class="blog-post">
                        <div class="panel-body p-states green-box">
                            <div class="summary pull-left">
							 <span>Latihan Dasar Kepemimpinan Mahasiswa </span></br></br>
							<?php
								$hasil=$client->DaftarBatasLDKM($thn);								
								foreach ($hasil as $data) {
									if($data->tgl_start<=$tgl && $data->tgl_selesai>=$tgl){ if($data->jum_peserta<$data->kuota){echo " 
													<center><h3>".DateToIndo($data->tgl_start)." - ". DateToIndo($data->tgl_selesai)."</h3>
													<h2>PENDAFTARAN DIBUKA</h2></br>
													Jumlah Kuota : $data->kuota </br>Jumlah Peserta : $data->jum_peserta</br></br>
													<a href='ldkm/daftar.php?keg=LDKM&thn=$thn'><button class='btn btn-primary btn-lg' type='button' >DAFTAR LDKM</button></a>
													
													</center>
												";}
												else {echo"
													<center><h3>".DateToIndo($data->tgl_start)." - ". DateToIndo($data->tgl_selesai)."</h3>
													<h2>Maaf Kuota Sudah Penuh</h2></br>
													Jumlah Kuota : $data->kuota </br>Jumlah Peserta : $data->jum_peserta</br></br>
													
													</center>";
												}
												}
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
           <div class="panel">
                <div class="panel-body">
                    <div class="blog-post">
                        <h3>Syarat & Ketentuan</h3>
                        <table class="table table-hover">
							<tr><td width="30px"><i class="fa fa-forward"> </i></td><td> Mahasiswa IST AKPRIND Yogyakarta Jurusan Teknik Informatika</td></tr>
							<tr><td width="30px"><i class="fa fa-forward"> </i></td><td> Belum Pernah Mengikuti Kegiatan Ini Sebelumnya</td></tr>
							<tr><td width="30px"><i class="fa fa-forward"> </i></td><td> Membayar Uang Muka Kegiatan Pada Saat Melakukan Pendaftaran</td></tr>
							<tr><td width="30px"><i class="fa fa-forward"> </i></td><td> Menyiapkan KTM, KRS, dan Foto dalam bentuk gambar dengan format JPG, JPEG, PNG atau GIF</td></tr>
						</table>
                    </div>
                </div>
            </div>
			<?php 
				include_once '../controller/arsip-control.php';
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
									echo"<tr><td> $data->deskripsi</td><td><a href='download.php?id=$data->id_arsip'><button class='btn btn-primary' type='button' ><i class='fa fa-download'></i></button></a></td></tr>";
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
									echo"<tr><td> $data->deskripsi</td><td><a href='download.php?id=$data->id_arsip'><button class='btn btn-primary' type='button' ><i class='fa fa-download'></i></button></a></td></tr>";
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
					<div class="panel">
						<div class="panel-body p-states green-box">

							<div class="summary pull-center">
								<center><h3>LOGIN</h3></center></br>
									<div class='alert alert-block alert-success fade in'>
										<button type='button' class='close close-sm' data-dismiss='alert'>
											<i class='fa fa-times'></i>
										</button>
										<strong>Perhatian !</strong> Jika lupa password atau ada kesalahan saat login, silahkan hubungi Panitia Kegiatan (Tamam - 081327349090).
									</div>

								<form class="cmxform form-horizontal adminex-form" id="signupForm" method="post" action="login-proses.php">
									<div class="form-group ">
										<label for="nim" class="control-label col-lg-4">Masukkan NIM</label>
										<div class="col-lg-6">
											<input type="text"  name="nim" id="nim" class="form-control" placeholder="Masukkan NIM">
										</div>
									</div>
									<div class="form-group ">
										<label for="password" class="control-label col-lg-4">Masukkan Password</label>
										<div class="col-lg-6">
											<input type="password"  name="password" id="password" class="form-control" placeholder="Masukkan Password">
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-offset-4 col-lg-9">
										   <button class="btn btn-info" type='submit' name='submit_login'>Sign In</button>
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
        <!--body wrapper end-->
		<!--footer section start-->
        <footer><center>
            2015 &copy; Humanika
        </center></footer>
        <!--footer section end-->
		
</section>
<!-- Placed js at the end of the document so the pages load faster -->

<script src="../js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="../js/jquery-migrate-1.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/modernizr.min.js"></script>
<script src="../js/jquery.nicescroll.js"></script>

<!--validation initialization -->
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script src="../js/validation-init.js"></script>

	<!--common scripts for all pages-->
	<script src="../js/scripts.js"></script>
	
</body>
</html>