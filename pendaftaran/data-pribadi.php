<?php
session_start();
error_reporting(0);
if(empty ($_SESSION['nim']) || empty ($_SESSION['jenis']) ){
echo "<script type='text/javascript'>alert('Sorry, you have to login first');
            document.location.href='../login.php'</script>";
}
$ambil=$_GET['hal'];
$kode=$_GET['id'];
$nim=$_GET['nim'];
if($_SESSION['jenis']==1){ $keg="SE";}elseif($_SESSION['jenis']==2){$keg="LDKM";}
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
   
  <title>Humanika | Data Pribadi Mahasiswa</title>
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/style1.css" media="all" />
  
    <!--file upload-->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-fileupload.min.css" />

  
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
					<?php if($keg=='SE'){?>
					<li ><a href="se/index.php"><i class="fa fa-home"></i>  Home</a></li><?php }
					else if($keg=='LDKM'){
					?> <li><a href="ldkm/index.php"><i class="fa fa-home"></i>  Home</a></li><?php } ?>
					<li><a href="daftar-peserta.php?keg=<?php echo $keg?>&tahun=<?php echo $tahun?>"><i class="fa fa-users"></i>  Daftar Peserta</a></li>
					<li><a href="cara-pembayaran.php"><i class="fa fa-money"></i>  Cara Pembayaran</a></li>
					<li>
						<a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-user"></i>
							Welcome, <?php
								
									echo $_SESSION['nama_peserta']." ".$_SESSION['nim'];
								
								?> 
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu dropdown-menu-usermenu pull-right">
							<li class="active"><a href="data-pribadi.php?nim=<?php echo $_SESSION['id_peserta']; ?>"><i class="fa fa-user"></i> Profile</a></li>
							<li><a href="history.php?id=<?php echo $_SESSION['id_peserta']; ?>&keg=<?php echo $keg ?>&tahun=<?php echo $tahun ?>"><i class="fa fa-money"></i> History Pembayaran</a></li>
							<li><a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
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
		

					
           
			
         <!--collapse end-->                     
        </div>

        <div class="col-md-12">        
						   
		<section class="panel">
        <header class="panel-heading">
           Data Pendaftaran Mahasiswa
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
        </header>
		
        <div class="panel-body">
				<?php
				include_once '../controller/peserta-control.php';
				include_once '../controller/konversi.php';
				$client = new PesertaController();
				$namafolderkrs="../file/peserta/krs";
				$namafolderktm="../file/peserta/ktm";
				$namafolderfoto="../file/peserta/foto";					
				$tampil = $client->PesertaData($kode);
								
				foreach($tampil as $data){
				echo "<table class='table table-hover'>";
				echo "<tr><td>NIM </td><td>:</td><td> $data->nim</td></tr>";
				echo "<tr><td>Nama Peserta</td><td>:</td><td> $data->nama_mhs</td></tr>";
				echo "<tr><td>Ukuran Kaos</td><td>:</td><td> $data->ukuran_kaos</td></tr>";
				echo "<tr><td>Penyakit Bawaan</td><td>:</td><td> $data->penyakit_bawaan</td></tr>";
				echo "<tr><td>No Telp</td><td>:</td><td> $data->no_telp</td></tr>";
				echo "<tr><td>Tgl Pendaftaran</td><td>:</td><td> ".DateToIndo($data->tgl_pendaftaran)."</td></tr>";
				echo "<tr><td>KRS </td><td>:</td><td><div class='col-md-6'><div class='blog-img-sm'> <img src='../file/peserta/krs/$data->nama_krs' title='$data->nama_krs'></div></div></td></tr>";
				echo "<tr><td>KTM</td><td>:</td><td><div class='col-md-6'><div class='blog-img-sm'> <img src='../file/peserta/ktm/$data->nama_ktm' title='$data->nama_ktm'></div></div></td></tr>";
				echo "<tr><td>Foto</td><td>:</td><td><div class='col-md-6'><div class='blog-img-sm'> <img src='../file/peserta/foto/$data->nama_foto' title='$data->nama_foto'></div></div></td></tr>";
				echo "<tr><td>Password</td><td>:</td><td> $data->password</td></tr>";
				echo "<tr><td>Status Pembayaran</td><td>:</td><td> $data->status_bayar</td></tr>";
				echo "<tr><td>Status Berkas</td><td>:</td><td> $data->status_berkas</td></tr>";
				echo "<tr><td>Keterangan</td><td>:</td><td> $data->keterangan</td></tr>";
				$status=$data->status_berkas; $keter=$data->keterangan;
				
				echo "</table>";
				}
				if($status=='Unvalid'){
					if($keter=='Unvalid KTM'){ 
					?>
					<section class="panel">
                        <div class="panel-body">
                            <a class="btn btn-primary" data-toggle="modal" href="#myModal2">
                                Edit Berkas
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Edit Berkas Administrasi</h4>
                                        </div>
                                        <div class="modal-body">
										<?php
											
											if (isset($_POST['submit_ktm'])) {
												if (!empty($_FILES["ktm"]["tmp_name"])){
													$ktm_type=$_FILES['ktm']['type'];
													$ktm_size=$_FILES['ktm']['size'];
													$ktm_nama=$_FILES['ktm']['name'];
													
														if($ktm_type=="image/jpeg" || $ktm_type=="image/jpg" || $ktm_type=="image/gif" || $ktm_type=="image/png"){
															$ktm = $namafolderktm . basename($_FILES['ktm']['name']);
															move_uploaded_file($_FILES['ktm']['tmp_name'], $ktm); 
																$result = $client->EditKTM($kode, $ktm, $ktm_type, $ktm_size, $ktm_nama);
																if ($result > 0) {?>
																<script language="javascript">alert('Success'); document.location.href='data-pribadi.php?id=<?php echo $kode?>'</script>
																<?php } else { echo "Failed"; } 

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
                                            <form action="" class="form-horizontal" method="post">
                                                <div class="form-group ">							
													<label class="control-label col-lg-3">KTM</label>
													<div class="col-lg-3">
														<div class="fileupload fileupload-new" data-provides="fileupload">
															 <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"></div>
															 <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 30px;"></div>
															   <div>
															  
																 <span class="btn btn-default btn-file">
																 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
																 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
																   <input type="file" id="ktm" name="ktm" class="default" />
																   
																 </span>
																 <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
															   </div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button class="btn btn-info" type="submit" name="submit_ktm">Save</button>
													<button data-dismiss="modal" class="btn btn-primary" type="button">Close</button>
													 
												</div>
                                            </form>
                                        </div>
                                        
										
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                        </div>
                    </section>
					<?php
					}
					else if($keter=='Unvalid KRS'){
					?>
					<section class="panel">
                        <div class="panel-body">
                            <a class="btn btn-primary" data-toggle="modal" href="#myModal2">
                                Edit Berkas
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Edit Berkas Administrasi</h4>
                                        </div>
                                        <div class="modal-body">
										<?php
											
											if (isset($_POST['submit_krs'])) {
												if (!empty($_FILES["krs"]["tmp_name"])){
													$krs_type=$_FILES['krs']['type'];
													$krs_size=$_FILES['krs']['size'];
													$krs_nama=$_FILES['krs']['name'];
													
														if($krs_type=="image/jpeg" || $krs_type=="image/jpg" || $krs_type=="image/gif" || $krs_type=="image/png"){
															$krs = $namafolderkrs . basename($_FILES['krs']['name']);
															move_uploaded_file($_FILES['krs']['tmp_name'], $krs);
																$result = $client->EditKRS($kode, $krs, $krs_type, $krs_size, $krs_nama);
																if ($result > 0) {?>
																<script language="javascript">alert('Success'); document.location.href='data-pribadi.php?id=<?php echo $kode?>'</script>
																<?php } else { echo "Failed"; } 

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
                                            <form action="" class="form-horizontal" method="post">
                                                <div class="form-group ">							
													<label class="control-label col-lg-3">KRS</label>
													<div class="col-lg-3">
														<div class="fileupload fileupload-new" data-provides="fileupload">
															 <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"></div>
															 <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 30px;"></div>
															   <div>
															  
																 <span class="btn btn-default btn-file">
																 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
																 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
																   <input type="file" id="krs" name="krs" class="default" />
																   
																 </span>
																 <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
															   </div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button class="btn btn-info" type="submit" name="submit_krs">Save</button>
													<button data-dismiss="modal" class="btn btn-primary" type="button">Close</button>
													 
												</div>
                                            </form>
                                        </div>
                                        
										
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                        </div>
                    </section>
					<?php
					}
					else if($keter=='Unvalid Foto'){
					?>
					<section class="panel">
                        <div class="panel-body">
                            <a class="btn btn-primary" data-toggle="modal" href="#myModal2">
                                Edit Berkas
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Edit Berkas Administrasi</h4>
                                        </div>
                                        <div class="modal-body">
										<?php
											
											if (isset($_POST['submit_foto'])) {
												if (!empty($_FILES["foto"]["tmp_name"])){
													$foto_type=$_FILES['foto']['type'];
													$foto_size=$_FILES['foto']['size'];
													$foto_nama=$_FILES['foto']['name'];
													
														if($foto_type=="image/jpeg" || $foto_type=="image/jpg" || $foto_type=="image/gif" || $foto_type=="image/png"){
															$foto = $namafolderfoto . basename($_FILES['foto']['name']);
															move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
																$result = $client->EditFoto($kode, $foto, $foto_type, $foto_size, $foto_nama);
																if ($result > 0) {?>
																<script language="javascript">alert('Success'); document.location.href='data-pribadi.php?id=<?php echo $kode?>'</script>
																<?php } else { echo "Failed"; } 
																
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
                                            <form action="" class="form-horizontal" method="post">
                                                <div class="form-group ">							
													<label class="control-label col-lg-3">Foto</label>
													<div class="col-lg-3">
														<div class="fileupload fileupload-new" data-provides="fileupload">
															 <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"></div>
															 <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 30px;"></div>
															   <div>
															  
																 <span class="btn btn-default btn-file">
																 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
																 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
																   <input type="file" id="foto" name="foto" class="default" />
																   
																 </span>
																 <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
															   </div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button class="btn btn-info" type="submit" name="submit_foto">Save</button>
													<button data-dismiss="modal" class="btn btn-primary" type="button">Close</button>
													 
												</div>
                                            </form>
                                        </div>
                                        
										
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                        </div>
                    </section>
					<?php
					}
					else if($keter=='Unvalid KRS & Foto'){
					?>
					<section class="panel">
                        <div class="panel-body">
                            <a class="btn btn-primary" data-toggle="modal" href="#myModal2">
                                Edit Berkas
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Edit Berkas Administrasi</h4>
                                        </div>
                                        <div class="modal-body">
										<?php
											
											if (isset($_POST['submit_fk'])) {
												if (!empty($_FILES["foto"]["tmp_name"]) || !empty($_FILES["krs"]["tmp_name"])){
													$foto_type=$_FILES['foto']['type'];
													$foto_size=$_FILES['foto']['size'];
													$foto_nama=$_FILES['foto']['name'];
													$krs_type=$_FILES['krs']['type'];
													$krs_size=$_FILES['krs']['size'];
													$krs_nama=$_FILES['krs']['name'];
													
														if($foto_type=="image/jpeg" || $foto_type=="image/jpg" || $foto_type=="image/gif" || $foto_type=="image/png" || $krs_type=="image/jpeg" || $krs_type=="image/jpg" || $krs_type=="image/gif" || $krs_type=="image/png"){
															$foto = $namafolderfoto . basename($_FILES['foto']['name']);
															$krs = $namafolderkrs . basename($_FILES['krs']['name']);
															move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
															move_uploaded_file($_FILES['krs']['tmp_name'], $krs);
																$result = $client->EditFotoKRS($kode, $foto, $foto_type, $foto_size, $foto_nama, $krs, $krs_type, $krs_size, $krs_nama);
																if ($result > 0) {?>
																<script language="javascript">alert('Success'); document.location.href='data-pribadi.php?id=<?php echo $kode?>'</script>
																<?php } else { echo "Failed"; } 

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
                                            <form action="" class="form-horizontal" method="post">
                                                <div class="form-group ">							
													<label class="control-label col-lg-3">KRS</label>
													<div class="col-lg-3">
														<div class="fileupload fileupload-new" data-provides="fileupload">
															 <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"></div>
															 <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 30px;"></div>
															   <div>
															  
																 <span class="btn btn-default btn-file">
																 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
																 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
																   <input type="file" id="krs" name="krs" class="default" />
																   
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
															 <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 30px;"></div>
															   <div>
															  
																 <span class="btn btn-default btn-file">
																 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
																 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
																   <input type="file" id="foto" name="foto" class="default" />
																   
																 </span>
																 <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
															   </div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button class="btn btn-info" type="submit" name="submit_fk">Save</button>
													<button data-dismiss="modal" class="btn btn-primary" type="button">Close</button>
													 
												</div>
                                            </form>
                                        </div>
                                        
										
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                        </div>
                    </section>
					<?php
					}
					else if($keter=='Unvalid KTM & Foto'){
					?>
					<section class="panel">
                        <div class="panel-body">
                            <a class="btn btn-primary" data-toggle="modal" href="#myModal2">
                                Edit Berkas
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Edit Berkas Administrasi</h4>
                                        </div>
                                        <div class="modal-body">
										<?php
											
											if (isset($_POST['submit_fkt'])) {
												if (!empty($_FILES["foto"]["tmp_name"]) || !empty($_FILES["ktm"]["tmp_name"])){
													$foto_type=$_FILES['foto']['type'];
													$foto_size=$_FILES['foto']['size'];
													$foto_nama=$_FILES['foto']['name'];
													$ktm_type=$_FILES['ktm']['type'];
													$ktm_size=$_FILES['ktm']['size'];
													$ktm_nama=$_FILES['ktm']['name'];
													
														if($foto_type=="image/jpeg" || $foto_type=="image/jpg" || $foto_type=="image/gif" || $foto_type=="image/png" || $ktm_type=="image/jpeg" || $ktm_type=="image/jpg" || $ktm_type=="image/gif" || $ktm_type=="image/png"){
															$foto = $namafolderfoto . basename($_FILES['foto']['name']);
															$ktm = $namafolderktm . basename($_FILES['ktm']['name']);
															move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
															move_uploaded_file($_FILES['ktm']['tmp_name'], $ktm);
																$result = $client->EditFotoKTM($kode, $foto, $foto_type, $foto_size, $foto_nama, $ktm, $ktm_type, $ktm_size, $ktm_nama);
																if ($result > 0) {?>
																<script language="javascript">alert('Success'); document.location.href='data-pribadi.php?id=<?php echo $kode?>'</script>
																<?php } else { echo "Failed"; } 

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
                                            <form action="" class="form-horizontal" method="post">
                                                <div class="form-group ">							
													<label class="control-label col-lg-3">KTM</label>
													<div class="col-lg-3">
														<div class="fileupload fileupload-new" data-provides="fileupload">
															 <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"></div>
															 <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 30px;"></div>
															   <div>
															  
																 <span class="btn btn-default btn-file">
																 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
																 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
																   <input type="file" id="ktm" name="ktm" class="default" />
																   
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
															 <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 30px;"></div>
															   <div>
															  
																 <span class="btn btn-default btn-file">
																 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
																 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
																   <input type="file" id="foto" name="foto" class="default" />
																   
																 </span>
																 <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
															   </div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button class="btn btn-info" type="submit" name="submit_fkt">Save</button>
													<button data-dismiss="modal" class="btn btn-primary" type="button">Close</button>
													 
												</div>
                                            </form>
                                        </div>
                                        
										
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                        </div>
                    </section>
					<?php
					}
					else if($keter=='Unvalid KRS & KTM'){
					?>
					<section class="panel">
                        <div class="panel-body">
                            <a class="btn btn-primary" data-toggle="modal" href="#myModal2">
                                Edit Berkas
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Edit Berkas Administrasi</h4>
                                        </div>
                                        <div class="modal-body">
										<?php
											
											if (isset($_POST['submit_kk'])) {
												if (!empty($_FILES["krs"]["tmp_name"]) || !empty($_FILES["ktm"]["tmp_name"])){
													$krs_type=$_FILES['krs']['type'];
													$krs_size=$_FILES['krs']['size'];
													$krs_nama=$_FILES['krs']['name'];
													$ktm_type=$_FILES['ktm']['type'];
													$ktm_size=$_FILES['ktm']['size'];
													$ktm_nama=$_FILES['ktm']['name'];
													
														if($krs_type=="image/jpeg" || $krs_type=="image/jpg" || $krs_type=="image/gif" || $krs_type=="image/png" || $ktm_type=="image/jpeg" || $ktm_type=="image/jpg" || $ktm_type=="image/gif" || $ktm_type=="image/png"){
															$krs = $namafolderkrs . basename($_FILES['krs']['name']);
															$ktm = $namafolderktm . basename($_FILES['ktm']['name']);
															move_uploaded_file($_FILES['krs']['tmp_name'], $krs);
															move_uploaded_file($_FILES['ktm']['tmp_name'], $ktm);
																$result = $client->EditKRSKTM($kode, $krs, $krs_type, $krs_size, $krs_nama, $ktm, $ktm_type, $ktm_size, $ktm_nama);
																if ($result > 0) {?>
																<script language="javascript">alert('Success'); document.location.href='data-pribadi.php?id=<?php echo $kode?>'</script>
																<?php } else { echo "Failed"; } 

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
                                            <form action="" class="form-horizontal" method="post">
                                                <div class="form-group ">							
													<label class="control-label col-lg-3">KTM</label>
													<div class="col-lg-3">
														<div class="fileupload fileupload-new" data-provides="fileupload">
															 <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"></div>
															 <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 30px;"></div>
															   <div>
															  
																 <span class="btn btn-default btn-file">
																 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
																 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
																   <input type="file" id="ktm" name="ktm" class="default" />
																   
																 </span>
																 <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
															   </div>
														</div>
													</div>
												</div>
												<div class="form-group ">							
													<label class="control-label col-lg-3">KRS</label>
													<div class="col-lg-3">
														<div class="fileupload fileupload-new" data-provides="fileupload">
															 <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"></div>
															 <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 30px;"></div>
															   <div>
															  
																 <span class="btn btn-default btn-file">
																 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
																 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
																   <input type="file" id="krs" name="krs" class="default" />
																   
																 </span>
																 <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
															   </div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button class="btn btn-info" type="submit" name="submit_kk">Save</button>
													<button data-dismiss="modal" class="btn btn-primary" type="button">Close</button>
													 
												</div>
                                            </form>
                                        </div>
                                        
										
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                        </div>
                    </section>
					<?php
					}
					else if($keter=='Unvalid KTM, KRS & Foto'){
					?>
					<section class="panel">
                        <div class="panel-body">
                            <a class="btn btn-primary" data-toggle="modal" href="#myModal2">
                                Edit Berkas
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Edit Berkas Administrasi</h4>
                                        </div>
                                        <div class="modal-body">
										<?php
											
											if (isset($_POST['submit'])) {
												if (!empty($_FILES["krs"]["tmp_name"]) || !empty($_FILES["ktm"]["tmp_name"]) || !empty($_FILES["foto"]["tmp_name"])){
													$krs_type=$_FILES['krs']['type'];
													$krs_size=$_FILES['krs']['size'];
													$krs_nama=$_FILES['krs']['name'];
													$ktm_type=$_FILES['ktm']['type'];
													$ktm_size=$_FILES['ktm']['size'];
													$ktm_nama=$_FILES['ktm']['name'];
													$foto_type=$_FILES['foto']['type'];
													$foto_size=$_FILES['foto']['size'];
													$foto_nama=$_FILES['foto']['name'];
													
														if($krs_type=="image/jpeg" || $krs_type=="image/jpg" || $krs_type=="image/gif" || $krs_type=="image/png" || $ktm_type=="image/jpeg" || $ktm_type=="image/jpg" || $ktm_type=="image/gif" || $ktm_type=="image/png" || $foto_type=="image/jpeg" || $foto_type=="image/jpg" || $foto_type=="image/gif" || $foto_type=="image/png"){
															$krs = $namafolderkrs . basename($_FILES['krs']['name']);
															$ktm = $namafolderktm . basename($_FILES['ktm']['name']);
															$foto = $namafolderfoto . basename($_FILES['foto']['name']);
															move_uploaded_file($_FILES['krs']['tmp_name'], $krs);
															move_uploaded_file($_FILES['ktm']['tmp_name'], $ktm);
															move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
																$result = $client->EditBerkas($kode, $krs, $krs_type, $krs_size, $krs_nama, $ktm, $ktm_type, $ktm_size, $ktm_nama, $foto, $foto_type, $foto_size, $foto_nama);
																if ($result > 0) {?>
																<script language="javascript">alert('Success'); document.location.href='data-pribadi.php?id=<?php echo $kode?>'</script>
																<?php } else { echo "Failed"; } 

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
                                            <form action="" class="form-horizontal" method="post">
                                                <div class="form-group ">							
													<label class="control-label col-lg-3">KTM</label>
													<div class="col-lg-3">
														<div class="fileupload fileupload-new" data-provides="fileupload">
															 <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"></div>
															 <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 30px;"></div>
															   <div>
															  
																 <span class="btn btn-default btn-file">
																 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
																 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
																   <input type="file" id="ktm" name="ktm" class="default" />
																   
																 </span>
																 <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
															   </div>
														</div>
													</div>
												</div>
												<div class="form-group ">							
													<label class="control-label col-lg-3">KRS</label>
													<div class="col-lg-3">
														<div class="fileupload fileupload-new" data-provides="fileupload">
															 <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"></div>
															 <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 30px;"></div>
															   <div>
															  
																 <span class="btn btn-default btn-file">
																 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
																 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
																   <input type="file" id="krs" name="krs" class="default" />
																   
																 </span>
																 <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
															   </div>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button class="btn btn-info" type="submit" name="submit">Save</button>
													<button data-dismiss="modal" class="btn btn-primary" type="button">Close</button>
													 
												</div>
                                            </form>
                                        </div>
                                        
										
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                        </div>
                    </section>
					<?php
					}
				}
				?>
        </section>	   
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

<!--common scripts for all pages-->
<script src="../../js/scripts.js"></script>

<!--dynamic table-->
<script type="text/javascript" language="javascript" src="../js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../js/data-tables/DT_bootstrap.js"></script>

<!--pickers plugins-->
<script type="text/javascript" src="../js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!--pickers initialization-->
<script src="../js/pickers-init.js"></script>

<!--dynamic table initialization -->
<script src="../js/dynamic_table_init.js"></script>

<!--file upload-->
<script type="text/javascript" src="../js/bootstrap-fileupload.min.js"></script>

<!--validation initialization -->
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script src="../js/validation-init.js"></script>



	
</body>
</html>