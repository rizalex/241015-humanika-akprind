<?php
session_start();
error_reporting(0);
if(empty ($_SESSION['nim']) || empty ($_SESSION['jenis']) ){
echo "<script type='text/javascript'>alert('Sorry, you have to login first');
            document.location.href='../login.php'</script>";
}
$ambil=$_GET['hal'];
$kode=$_GET['id'];
$tahun=date("Y");
if($_SESSION['jenis']==1){ $keg="SE";}elseif($_SESSION['jenis']==2){$keg="LDKM";}
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
					<li class="active"><a href="index.php"><i class="fa fa-home"></i>  Home</a></li>
					<li><a href="../daftar-peserta.php?keg=LDKM&tahun=<?php echo $tahun;?>"><i class="fa fa-users"></i>  Daftar Peserta</a></li>
					<li><a href="../cara-pembayaran.php"><i class="fa fa-money"></i>  Cara Pembayaran</a></li>
					<li>
						<a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-user"></i>
							Welcome, <?php
								
									echo $_SESSION['nama_peserta']." ".$_SESSION['nim'];
									
								
								?> 
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-usermenu pull-right">
							<li><a href="../data-pribadi.php?id=<?php echo $_SESSION['id_peserta']; ?>"><i class="fa fa-user"></i> Profile</a></li>
							<li><a href="../history.php?id=<?php echo $_SESSION['id_peserta']; ?>&keg=<?php echo $keg?>&tahun=<?php echo $tahun ?>"><i class="fa fa-money"></i> History Pembayaran</a></li>
							<li><a href="../logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
						</ul>
					</li>
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
					<h3>Informasi Berkas Administrasi</h3>
                        <div class="panel-body p-states green-box">
                            <div class="summary pull-left">
							
							<?php

								include '../../controller/konversi.php';
								include_once '../../controller/batas-control.php';
								include_once '../../controller/peserta-control.php';
								$thn=date("Y");
								$client = new BatasController();
								$clientpeserta = new PesertaController();
								$hasil=$client->DaftarBatasLDKM($thn);
								$tgl=date("Y-m-d");
								$pes=$clientpeserta->PesertaStat($_SESSION['id_peserta'],$_SESSION['jenis']);
								foreach ($pes as $data) {$st=$data->status_berkas; 
									if($st=='Unvalid'){
									echo "<center>
									<h3>Berkas yang Anda inputkan masih belum bisa divalidasikan, segera ganti berkas yang masih salah. 
									Jika sampai pada waktu selesai pendaftaran, kami belum menerima perbaikan berkas dari anda mohon maaf anda kami 
									anggap tidak terdaftar sebagai peserta walaupun anda telah membayar biaya kegiatan</h2></br>
									Keterangan : <h2>$data->keterangan</h3></br></br>
									<a href='../data-pribadi.php?id=".$_SESSION['id_peserta']."><button class='btn btn-primary btn-lg' type='button' >Edit Berkas</button></a></center>";}	
									else {
									echo "<center>
									<h3>Berkas yang Anda inputkan sudah benar dan sudah kami validasi</h3>
									</center>";}					
													   
									} ?>							
                            </div>
                        </div> 
						
                    </div>
				
                </div>
            </div>
            <div class="panel">
                <div class="panel-body">
                    <div class="blog-post">
					<h3>Konfirmasi Pembayaran</h3>
                        <div class="panel-body p-states green-box">
                            <div class="summary pull-left">
							 <span>Latihan Dasar Kepemimpinan Mahasiswa </span></br></br>
							<?php
								foreach ($pes as $data) {$st=$data->status_bayar; }
								foreach ($hasil as $data) {
									if($data->tgl_byr_awal<=$tgl && $data->tgl_byr_akhir>=$tgl){ 
													if($st=='Belum Lunas'){
													echo"	
													<center><h3>".DateToIndo($data->tgl_byr_awal)." - ". DateToIndo($data->tgl_byr_akhir)."</h3>
													<h2>Konfirmasi Pembayaran</h2></br>
													<a href='konfirmasi_pembayaran.php?keg=LDKM&nim=".$_SESSION['nim']."&peserta=".$_SESSION['id_peserta']."&tahun=$thn'><button class='btn btn-primary btn-lg' type='button' >KONFIRMASI</button></a>
													</center>";}
													else if($st=='Lunas'){
													echo"	
													<center><h3>".DateToIndo($data->tgl_byr_awal)." - ". DateToIndo($data->tgl_byr_akhir)."</h3>
													<h2>Status Pembayaran Anda SUDAH LUNAS</h2></br>
													</center>";}
												}
												
									else if($data->tgl_byr_awal<$tgl && $data->tgl_byr_akhir<$tgl){ echo " 
													<center><h3>".DateToIndo($data->tgl_byr_awal)." - ". DateToIndo($data->tgl_byr_akhir)."</h3>
													<h2>PENDAFTARAN SUDAH DITUTUP</h2></center>
													";}
									else if($data->tgl_byr_awal>$tgl && $data->tgl_byr_akhir>$tgl){ echo " 
													<center><h3>".DateToIndo($data->tgl_byr_awal)." - ". DateToIndo($data->tgl_byr_akhir)."</h3>
													<h2>PENDAFTARAN MASIH BELUM DIBUKA</h2></center>
													";}				
													
													   
									} ?>							
                            </div>
                        </div> 
						
                    </div>
				
                </div>
            </div>
			<?php 
				include_once '../../controller/artikel-control.php';
				$clientarsip = new ArtikelController();
				$kegi=2;
				$ldkm = $clientarsip->DaftarArtikelLimit($kegi);	
				
			?> 
            <div class="panel">
                <div class="panel-body">
                    <div class="blog-post">
                        <h3>Recent Updates </h3>
                        <table class="table table-hover">
							<?php foreach($ldkm as $data) {?>
							<tr><td width="30px"><i class="fa fa-forward"> </i></td><td><a href="index.php?hal=full&id=<?php echo $data->id_artikel ?>"> <?php echo $data->judul ?></a></td></tr>
							<?php } ?>
						</table>
                    </div>
                </div>
            </div>
			<?php 
				include_once '../../controller/arsip-control.php';
				$clientarsip = new ArsipController();
				$ldkm = $clientarsip->DaftarArsipLDKM();			
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
                                        Latihan Dasar Kepemimpinan Mahasiswa
                                </h4>
                            </div>
                            <div id="collapseTwo2" class="panel-collapse collapse">
                                <div class="panel-body">
								 <table class="table table-hover">
								<?php foreach($ldkm as $data){
									echo"<tr><td> $data->deskripsi</td><td><a href='../download.php?id=$data->id_arsip'><button class='btn btn-primary' type='button' ><i class='fa fa-download'></i></button></a></td></tr>";
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
		    <?php
					
					include_once '../../controller/artikel-control.php';
					$clientartikel = new ArtikelController();
					$artikel = $clientartikel->DaftarArtikelLDKM();
					$artikeldet=$clientartikel->DaftarDetail($kode);
					
				if(empty($ambil)){
				foreach($artikel as $data){				
			?> 
			
            <div class="panel">
				<div class="panel-body">
                    <div class="row">
						<div class="col-md-5">
                            <div class="blog-img-sm">
                                <img src="../../file/berita/<?php echo $data->nama_gambar?>" alt="">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h1 class=""><a href="index.php?hal=full&id=<?php echo $data->id_artikel?>"><?php echo $data->judul ?></a></h1>
                            <p class="auth-row">
                                By <?php echo $data->admin ?>   |   <?php echo DateToIndo($data->tgl_jam_update)?>   
                            </p>
                            <p><?php echo $data->isi_berita ?></p>
							<a href="index.php?hal=full&id=<?php echo $data->id_artikel?>" class="more">Read More</a>
                            
                        </div> 			
                    </div>
                </div>
            </div>
            
            <?php  } }
			else if($ambil=='full'){
			foreach($artikeldet as $data){
			?>
			 <div class="panel">
                <div class="panel-body">
                    <h1 class="text-center mtop35"><a href="index.php?hal=full&id=<?php echo $data->id_artikel?>"><?php echo $data->judul ?></a></h1>
                    <p class="text-center auth-row">
                        By <?php echo $data->admin ?>   |   <?php echo DateToIndo($data->tgl_update)?> 
                    </p>
                    <div class="blog-img-wide">
                        <img src="../../file/berita/<?php echo $data->nama_gambar?>" alt="">
                    </div>
                    <p><?php echo $data->isi_berita ?>.
                    </p>
                   <a href="index.php" class="more">Back</a>
                </div>
            </div>
			<?php }}?>
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

<!--validation initialization -->
<script type="text/javascript" src="../../js/jquery.validate.min.js"></script>
<script src="../../js/validation-init.js"></script>

<!--common scripts for all pages-->
<script src="../../js/scripts.js"></script>
	
</body>
</html>