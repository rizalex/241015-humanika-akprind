<?php
session_start();
error_reporting(0);
$nopeserta=$_GET['peserta'];
$nim=$_GET['nim'];
$thn=$_GET['tahun'];
$ket=$_GET['keg'];
$hal=$_GET['hal'];

if(empty($nim)){
echo "<script type='text/javascript'>alert('Halaman tidak dapat diakses');
            document.location.href='../index.php'</script>";
}


include '../../controller/konversi.php';
include '../../controller/mahasiswa-control.php';
include '../../controller/peserta-control.php';	
include '../../controller/batas-control.php';
include '../../controller/bayar-control.php';
include '../../controller/bank-control.php';
include '../../controller/keg-control.php';
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
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/style-responsive.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../css/style1.css" media="all" />
  <!--file upload-->
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap-fileupload.min.css" />
  
  <link rel="stylesheet" type="text/css" href="../../js/bootstrap-datepicker/css/datepicker-custom.css" />
  
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
								<?php
									$batas = new BatasController();
									$bayar = new BayarController();
									$bank = new BankController();
									$app = new MahasiswaController();
									$pes=new PesertaController();
									$jen=new JenisController();
									$number=$bayar->DaftarPesertaLimit();
									foreach($number as $num){ $no= $num->id_konfirmasi; }
									$dpstat=$pes->DaftarKegjen($ket, $thn);
									foreach($dpstat as $dat){$d=$dat->dp; $t=$dat->biaya;}
									
									$folderbukti="../../file/peserta/bukti/";
									if (isset($_POST['submit_konfirm'])) {
										$no++;
										$jum = $_POST['jumlah'];
										$banka= $_POST['namabank'];
										$tgl= $_POST['tgl'];
										$namapemilik= $_POST['namapemilik'];
										$bankt = $_POST['banktujuan'];
										$namabukti =$_FILES['bukti']['name'];
										$size =$_FILES['bukti']['size'];
										$type =$_FILES['bukti']['type'];
										$statver="Belum Verifikasi";
										
										if($jum<=$t){
											if($jum>=$dp){									
											if (!empty($_FILES["bukti"]["tmp_name"])){
													$bukti = $folderbukti . basename($_FILES['bukti']['name']);
													if($type=="image/jpeg" || $type=="image/jpg" || $type=="image/gif" || $type=="image/png"){
														$bukti = $folderbukti . basename($_FILES['bukti']['name']);
														move_uploaded_file($_FILES['bukti']['tmp_name'], $bukti); 
														$result = $bayar->TambahKonfirmasi($no, $nopeserta, $tgl, $banka, $namapemilik, $bankt, $jum, $bukti, $namabukti, $type, $size, $statver);
														if ($result > 0) {?>
															<script language="javascript">alert('Konfirmasi pembayaran anda akan kami proses'); document.location.href='konfirmasi_pembayaran.php?hal=notif&keg=<?php echo $ket?>&nim=<?php echo $nim?>&id=<?php echo $no?>&peserta=<?php echo $nopeserta?>&tahun=<?php echo $thn?>'</script>
															<?php 
														} else { echo "Failed"; } 	
													}
												} else{ echo"<div class='alert alert-block alert-danger fade in'>
															<button type='button' class='close close-sm' data-dismiss='alert'>
															<i class='fa fa-times'></i>
															</button>
															<strong>Warning!</strong> Masukkan Bukti Pembayaran
															</div>"; }
											} else{ echo"<div class='alert alert-block alert-danger fade in'>
																		<button type='button' class='close close-sm' data-dismiss='alert'>
																		<i class='fa fa-times'></i>
																		</button>
																		<strong>Maaf!</strong> Jumlah transferan anda kurang dari DP yang ditentukan
																		</div>"; }
										} else if($jum>$t){echo"<div class='alert alert-block alert-danger fade in'>
																	<button type='button' class='close close-sm' data-dismiss='alert'>
																	<i class='fa fa-times'></i>
																	</button>
																	<strong>Maaf!</strong> Jumlah transferan anda lebih dari biaya kegiatan yang ditentukan
																	</div>";}
									
								}
								
								if(empty($hal)){
								
								?>
								
                                <center><h3>KONFIRMASI PEMBAYARAN</h3>
								<?php
									
									$bat = $batas->DaftarBatasKeg($ket, $thn);
									foreach($bat as $dat){
									?>
								<span><?php $k=$dat->nama_kegiatan; echo "$k"; ?></span></center>
                                </br>
								
								<div class="alert alert-success fade in">
									<button type="button" class="close close-sm" data-dismiss="alert">
										<i class="fa fa-times"></i>
									</button>
									
									<strong>Penting!</strong><span> Batas pembayaran <?php echo "".DateToIndo($dat->tgl_byr_awal)." - ". DateToIndo($dat->tgl_byr_akhir)."" ; ?></span>
								</div><?php } ?>
								<form class="cmxform form-horizontal adminex-form" id="signupForm" method="post" action="" enctype="multipart/form-data">
									<?php 
									$mhs=$app->TampilEditMahasiswa($nim);	
									foreach($mhs as $data){ ?>
									<div class="form-group ">
										  <label for="nim" class="control-label col-lg-2">NIM</label>
										  <div class="col-md-2">
											<input type="text"  name="nim" id="nim" class="form-control" value="<?php echo $data->nim ?>" readonly="">
										  </div>
										   <label for="nama_mhs" class="control-label col-lg-2">Nama Mahasiswa</label>
										  <div class="col-md-5">
											<input type="text"  name="nama_mhs" id="nama_mhs" class="form-control" value="<?php echo $data->nama_mhs?>"readonly="">
										  </div>
									</div>
									<?php } ?>
									
									<div class="form-group">
										<label for="jumlah" class="control-label col-lg-4">Jumlah Transferan</label>
											<div class="col-lg-5">
											  <input type="text"  name="jumlah" id="jumlah" class="form-control" placeholder="Masukkan Jumlah Uang Yang Ditransfer">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-4">Tanggal Pembayaran</label>
										<div class="col-lg-3">
											<input class="form-control form-control-inline input-medium default-date-picker" readonly="" type="text" id="tgl" name="tgl" size="16" type="text" />
										</div>
									</div>
									<div class="form-group">
										<label for="namabank" class="control-label col-lg-4">Bank Pengirim</label>
										<div class="col-lg-3">
											<select class="form-control m-bot15" name="namabank" id="namabank">
												<option>Pilih Bank</option>
												<option value="BRI">BRI</option>
												<option value="BNI">BNI</option>
												<option value="BCA">BCA</option>
												<option value="BUKOPIN">BUKOPIN</option>
												<option value="MANDIRI">MANDIRI</option>
												<option value="CIMB NIAGA">CIMB NIAGA</option>
												<option value="DANAMON">DANAMON</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="namapemilik" class="control-label col-lg-4">Nama Pemilik Rekening Pengirim</label>
											<div class="col-lg-5">
											  <input type="text"  name="namapemilik" id="namapemilik" class="form-control" placeholder="Masukkan Nama Pemilik Rekening Pengirim">
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-lg-4 control-label">Bank Tujuan</label>
										<div class="col-lg-4">
										 <select class="form-control m-bot15" name="banktujuan" id="banktujuan">
											<option value=''>Pilih Bank Tujuan</option>
											<?php
											$opsi=$bank->DaftarBankSE($thn);
											foreach($opsi as $d){
											echo "<option value='$d->no_rekening'>$d->no_rekening - $d->nama_bank</option>";}?>
										  </select>
										</div>
									</div>
									<div class="form-group ">
										<label class="control-label col-lg-4">Bukti Pembayaran</label>
										<div class="col-lg-3">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												 <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"></div>
												 <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
												   <div>		
													 <span class="btn btn-default btn-file">
													 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
													 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
													   <input type="file" id="bukti" name="bukti" class="default" />
													   <input name="MAX_FILE_SIZE" type="hidden" value="100000"/>
													 </span>
													 <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
												   </div>
											</div>
										</div>				
									</div>
									
									<div class="form-group">
										<div class="col-lg-offset-4 col-lg-9">
										   <button class="btn btn-info" type='submit' name='submit_konfirm'>Save</button>
										</div>
									</div>
								</form>
								<?php } 
								else if($hal=='notif'){
																			
									$ver=$bayar->Bayar($_GET['id'], $ket);
									$byr=$pes->PesertaStatus($_GET['peserta']);
									$st=$ver->status; 
									$stl=$byr->status_bayar;
									
									if($st=='Belum Verifikasi'){echo"<div class='alert alert-danger fade in'>
											<button type='button' class='close close-sm' data-dismiss='alert'>
												<i class='fa fa-times'></i>
											</button>	
											<strong>Notify! </strong><span> Status pembayaran anda belum kami verifikasi tunggulah beberapa menit kami sedang memproses.</span>
										</div>";}
									else if($st=='Verifikasi'){ 
										if($stl=='Belum Lunas'){
											echo"<div class='alert alert-success fade in'>
												<button type='button' class='close close-sm' data-dismiss='alert'>
													<i class='fa fa-times'></i>
												</button>	
												<strong>Notify! </strong><span> Status pembayaran anda telah kami verifikasi. Jangan lupa dilunasi yah ;)</span>
											</div>";}	
										else if($stl=='Lunas'){
											echo"<div class='alert alert-success fade in'>
												<button type='button' class='close close-sm' data-dismiss='alert'>
													<i class='fa fa-times'></i>
												</button>	
												<strong>Notify! </strong><span> Status pembayaran anda telah kami verifikasi. Silahkan klik tombol dibawah ini untuk mencetak kwitansi anda.</br></br></span>
											<center><a href='kwitansi_pembayaran.php?keg=$_GET[keg]&peserta=$_GET[peserta]&tahun=$_GET[tahun]' target='_blank'><button class='btn btn-primary' type='button' ><i class='fa fa-print'></i> Cetak Kwitansi</button></a></center>
											</div>";}
									}
								}
								?>
								
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

<!--pickers plugins-->
<script type="text/javascript" src="../../js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!--pickers initialization-->
<script src="../../js/pickers-init.js"></script>

<!--validation initialization -->
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script src="../js/validation-init.js"></script>

<!--file upload-->
<script type="text/javascript" src="../../js/bootstrap-fileupload.min.js"></script>

	<!--common scripts for all pages-->
	<script src="../../js/scripts.js"></script>
	
</body>
</html>