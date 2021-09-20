<?php
session_start();
error_reporting(0);
$nim=$_GET['id'];
$ket=$_GET['keg'];
$thn=$_GET['tahun'];
if(empty ($nim)){
echo "<script type='text/javascript'>alert('Halaman tidak dapat diakses');
            document.location.href='../index.php'</script>";
}
$tahun=date("Y");
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">
  
  <title>Humanika | Formulir</title>
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/style-responsive.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../css/style1.css" media="all" />
  <!--file upload-->
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap-fileupload.min.css" />
  
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
									include_once '../../controller/mahasiswa-control.php';
									include_once '../../controller/peserta-control.php';
									include_once '../../controller/batas-control.php';
									$app = new MahasiswaController();
									$pes=new PesertaController();
									$batas=new BatasController();
									$number=$pes->DaftarPesertaLimit();
									$detail=$pes->DaftarKegjen($ket, $thn);
									$folderktm="../../file/peserta/ktm/";
									$folderkrs="../../file/peserta/krs/";
									$folderfoto="../../file/peserta/foto/";
									$maxsize=1024*1024;
									foreach($detail as $det){ $keg= $det->id_detail;  }
									foreach($number as $num){ $no= $num->id_peserta;  }
									$idbatas=$batas->BukaID($keg); foreach($idbatas as $data){ $idbts=$data->id;}
									
									if (isset($_POST['submit_daftar'])) {
										$no++;
										$id = $_POST['nim'];
										$ukuran= $_POST['ukuran'];
										$penyakit= $_POST['penyakit'];
										$alamat= $_POST['alamat_jogja'];
										$pass = $_POST['password'];
										$notelp=$_POST['no_telp'];
										$tgl=date("Y-m-d");
										$status="Belum Lunas";
										$verif="Unvalid";
										$keter="-";
										$nktm =$_FILES['ktm']['name'];
										$sktm =$_FILES['ktm']['size'];
										$tktm =$_FILES['ktm']['type'];
										$nkrs =$_FILES['krs']['name'];
										$skrs =$_FILES['krs']['size'];
										$tkrs =$_FILES['krs']['type'];
										$nfoto =$_FILES['foto']['name'];
										$sfoto =$_FILES['foto']['size'];
										$tfoto =$_FILES['foto']['type'];
										$x=$app->Mahasiswa($nim);
										if($nim==$x->nim){
											$_SESSION['nim'] = $x->nim;
											$_SESSION['jenis']=2;
											$_SESSION['nama_peserta']=$x->nama_mhs;
											$_SESSION['id_peserta']=$no;
											}
										
										if (!empty($_FILES["krs"]["tmp_name"]) || !empty($_FILES["ktm"]["tmp_name"]) || !empty($_FILES["foto"]["tmp_name"])){
												
												if($tktm=="image/jpeg" || $tktm=="image/jpg" || $tktm=="image/gif" || $tktm=="image/png" || $tkrs=="image/jpeg" || $tkrs=="image/jpg" || $tkrs=="image/gif" || $tkrs=="image/png" || $tfoto=="image/jpeg" || $tfoto=="image/jpg" || $tfoto=="image/gif" || $tfoto=="image/png"){
													if($skrs<=$maxsize || $sktm<=$maxsize || $sfoto<=$maxsize){
													$ktm = $folderktm . basename($_FILES['ktm']['name']);
													$krs = $folderkrs . basename($_FILES['krs']['name']);
													$foto = $folderfoto . basename($_FILES['foto']['name']);
													move_uploaded_file($_FILES['ktm']['tmp_name'], $ktm); 
													move_uploaded_file($_FILES['krs']['tmp_name'], $krs);
													move_uploaded_file($_FILES['foto']['tmp_name'], $foto); 
														$result = $pes->TambahPeserta($no, $id, $keg, $ukuran, $penyakit, $notelp, $ktm, $nktm, $sktm, $tktm, $krs, $nkrs, $skrs, $tkrs, $foto, $nfoto, $sfoto, $tfoto, $pass, $tgl, $alamat, $status, $verif, $keter);
														if ($result > 0) {?>
														<script language="javascript">alert('Pendaftaran Anda telah kami terima'); document.location.href='../optional.php?keg=<?php echo $ket?>&nim=<?php echo $id?>&peserta=<?php echo $no?>&tahun=<?php echo $thn?>'</script>
														<?php } else { echo "Failed"; } 
														$peserta = $batas->DaftarIndexLDKM($tahun); foreach($peserta as $data){ $jumpes=$data->jumlah;}
														$editjumpes = $batas->EditJumpes($idbts, $jumpes); if ($editjumpes > 0) { echo "";} else { echo ""; }
														
													} else {
																echo"
																	<div class='alert alert-block alert-danger fade in'>
																	<button type='button' class='close close-sm' data-dismiss='alert'>
																	<i class='fa fa-times'></i>
																	</button>
																	<strong>Warning!</strong> Ukuran maksimum gambar 1MB
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
										
										} else{ echo"<div class='alert alert-block alert-danger fade in'>
																	<button type='button' class='close close-sm' data-dismiss='alert'>
																	<i class='fa fa-times'></i>
																	</button>
																	<strong>Warning!</strong> Masukkan KTM, KRS atau Foto...
																	</div>"; }
								}
								$mhs=$app->TampilEditMahasiswa($nim);	
								?>
                                <center><h3>FORMULIR PENDAFTARAN</h3>
                                <span>Latihan Dasar Kepemimpinan Mahasiswa</span></center>
                                </br>
								<div class="alert alert-success fade in">
                                <button type="button" class="close close-sm" data-dismiss="alert">
                                    <i class="fa fa-times"></i>
                                </button>
								
                                <strong>Penting!</strong> <span>Untuk foto gunakan foto formal 
									</br>(format nama gambar untuk KRS: KRSNamaNIM.(formatgambar) cth-> KRSParamithaDahlan121051017.jpg)</br>
									(format nama gambar untuk KTM: KTMNamaNIM.(formatgambar) cth-> KTMParamithaDahlan121051017.jpg)</span></br>
									(format nama gambar untuk Foto: NamaNIM.(formatgambar) cth-> ParamithaDahlan121051017.jpg)</span>
									
								</div>
								<form class="cmxform form-horizontal adminex-form" id="signupForm" method="post" action="" enctype="multipart/form-data">
									<?php foreach($mhs as $data){?>
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
									<div class="form-group ">
										<label for="password" class="control-label col-lg-3">Password</label>
										<div class="col-lg-3">
											<input class="form-control " id="password" name="password" type="password" placeholder="Masukkan Password"/>
										</div>
									</div>
									<div class="form-group ">
										<label for="confirm_password" class="control-label col-lg-3">Konfirmasi Password</label>
										<div class="col-lg-3">
											<input class="form-control " id="confirm_password" name="confirm_password" type="password" placeholder="Ulangi Password"/>
										</div>
									</div> 
									<div class="form-group ">
										<label for="ukuran" class="control-label col-lg-3">Ukuran Kaos</label>
										<div class="col-md-1 icheck minimal">
											<div class="radio single-row">
												<input tabindex="2" type="radio"  name="ukuran" value="S" checked>
												<label>S</label>
											</div>                                         
										</div>
										<div class="col-md-1 icheck minimal">
											<div class="radio single-row">
												<input tabindex="2" type="radio"  name="ukuran" value="M">
												<label>M</label>
											</div>                                         
										</div>
										<div class="col-md-1 icheck minimal">
											<div class="radio single-row">
												<input tabindex="2" type="radio"  name="ukuran" value="L">
												<label>L</label>
											</div>                                         
										</div>
										<div class="col-md-1 icheck minimal">
											<div class="radio single-row">
												<input tabindex="2" type="radio"  name="ukuran" value="XL">
												<label>XL</label>
											</div>                                         
										</div>
									</div>
									<div class="form-group">
										<label for="penyakit" class="control-label col-lg-3">Penyakit Bawaan</label>
											<div class="col-lg-8">
											  <textarea class="form-control" name="penyakit" id="penyakit" placeholder="Masukkan Penyakit Bawaan"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="alamat_jogja" class="control-label col-lg-3">Alamat Di Jogja</label>
											<div class="col-lg-8">
											  <textarea class="form-control" name="alamat_jogja" id="alamat_jogja" placeholder="Masukkan Alamat"></textarea>
										</div>
									</div>
									<div class="form-group ">
										<label for="no_telp" class="control-label col-lg-3">No Telp</label>
										<div class="col-lg-4">
											<input type="text"  name="no_telp" id="no_telp" class="form-control" placeholder="Masukkan No Telpon">
										</div>
									</div>
									
									<div class="form-group ">
																		
										<label class="control-label col-lg-3">KTM</label>
										<div class="col-lg-3">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												 <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"></div>
												 <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
												   <div>
												  
													 <span class="btn btn-default btn-file">
													 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
													 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
													   <input type="file" id="ktm" name="ktm" class="default" />
													   <input name="MAX_FILE_SIZE" type="hidden" value="100000"/>
													 </span>
													 <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
												   </div>
											</div>
										</div>
										<label class="control-label col-lg-2">KRS</label>
										<div class="col-lg-3">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												 <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"></div>
												 <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
												   <div>		
													 <span class="btn btn-default btn-file">
													 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
													 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
													   <input type="file" id="krs" name="krs" class="default" />
													   <input name="MAX_FILE_SIZE" type="hidden" value="100000"/>
													 </span>
													 <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
												   </div>
											</div>
										</div>										
									</div>
									
									<div class="form-group ">
										<label class="control-label col-lg-3">Foto</label>
										<div class="col-lg-3">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												 <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"></div>
												 <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
												   <div>
													 <span class="btn btn-default btn-file">
													 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
													 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
													   <input type="file" id="foto" name="foto" class="default" />
													   <input name="MAX_FILE_SIZE" type="hidden" value="100000"/>
													 </span>
													 <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
												   </div>
											</div>
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

<!--file upload-->
<script type="text/javascript" src="../../js/bootstrap-fileupload.min.js"></script>

	<!--common scripts for all pages-->
	<script src="../../js/scripts.js"></script>
	
</body>
</html>