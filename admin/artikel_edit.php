<?php
session_start();
if(empty ($_SESSION['nm_user']) || empty ($_SESSION['lvl_user'])){
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

  <script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
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
                <li class="active"> Edit Artikel</li>
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
					$id = $_POST['id_detail'];
					$judul = $_POST['judul'];
					$isi = $_POST['isiberita'];
					$tgl= $_POST['tgl'];
					$jam= $_POST['jam'];
					$admin= $_POST['admin'];
					$stat= $_POST['status'];

					$result = $client->EditArtikel($kode, $id, $judul, $isi, $tgl, $jam, $admin, $stat);
					if ($result > 0) {?>
						<script language="javascript">alert('Edit Success'); document.location.href='artikel.php'</script>
							<?php } else { echo "Failed"; }
				}
			
			$tampil = $client->TampilEditArtikel($kode);
			?>

		<form class="cmxform form-horizontal adminex-form" id="signupForm" method="post" action="" enctype="multipart/form-data">
		<?php
			foreach($tampil as $data){
		?>
			<div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Jenis Kegiatan</label>
                <div class="col-sm-4">
				 <select class="form-control m-bot15" name="id_detail" id="id_detail">
				    <option value='<?php echo $data->id_detail ?>'><?php echo "$data->nama_kegiatan - $data->tahun";?></option>
					<?php
					$opsi=$client->DaftarKegjen();
					foreach($opsi as $d){
					echo "<option value='$d->id_detail'>$d->nama_kegiatan - $d->tahun</option>";}?>
                  </select>
                </div>
            </div>
			<div class="form-group ">
                    <label for="judul" class="control-label col-lg-2">Judul</label>
					<div class="col-lg-10">
					  <input type="text" class="form-control " name="judul" id="judul" value="<?php echo $data->judul ?>"/>
                    </div>
            </div>
			<div class="form-group">
                <label for="isiberita" class="control-label col-lg-2">Isi Berita</label>
					<div class="col-lg-10">
					  <textarea class="form-control " name="isiberita" id="isiberita"><?php echo $data->isi_berita ?></textarea>
                      <script>
                        CKEDITOR.replace('isiberita');
                    </script>
                </div>
            </div>
			<div class="form-group">
                <label class="control-label col-lg-2">Tanggal Update</label>
			    <div class="col-md-4">
                    <input class="form-control form-control-inline input-medium default-date-picker"  readonly="" type="text" id="tgl" name="tgl" value="<?php echo $data->tgl_update ?>"/>
                </div> 
            </div>
			<div class="form-group">
				<label class="control-label col-lg-2">Jam Update</label>
                <div class="col-md-3">
                    <div class="input-group bootstrap-timepicker">
                        <input type="text" class="form-control timepicker-24" readonly=""  id="jam" name="jam"  value="<?php echo $data->jam_update ?>"/>
                        <span class="input-group-btn">
							<button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                        </span>
                    </div>
                </div>
            </div>
			<div class="form-group ">
				<label for="admin" class="control-label col-lg-2">Admin</label>
                <div class="col-md-4">
                    <select class="form-control m-bot15" name="admin" id="admin">
				    <option value='<?php echo $data->admin ?>'><?php echo $data->admin ?></option>
					<?php
					$opsi=$client->DaftarAdmin();
					foreach($opsi as $d){
					echo "<option value='$d->nama'>$d->nama</option>";}?>
                  </select>
                </div>
			</div>
			<div class="form-group">
                <label class="col-lg-2 control-label">Status</label>
                <div class="col-sm-9 icheck ">
                    <?php if($data->publish==0){ echo "
					<div class='minimal-yellow single-row'>
						<div class='radio '>
							<input tabindex='3' type='radio'  name='status' value='0' checked>
							<label>Publish </label>
						</div>
					</div>
					<div class='minimal-yellow single-row'>
						<div class='radio '>
							<input tabindex='3' type='radio'  name='status' value='1'>
							<label>Unpublish </label>
						</div>
					</div>";}
					else {echo"
					<div class='minimal-yellow single-row'>
						<div class='radio '>
							<input tabindex='3' type='radio'  name='status' value='0' >
							<label>Publish </label>
						</div>
					</div>
					<div class='minimal-yellow single-row'>
						<div class='radio '>
							<input tabindex='3' type='radio'  name='status' value='1'checked>
							<label>Unpublish </label>
						</div>
					</div>";
					
					}?>
                </div>
            </div>	
			<div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                   <button class="btn btn-info" type='submit' name='submit_edit'>Simpan</button>
                </div>
            </div>	
			<?php
			     }
			?>
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
