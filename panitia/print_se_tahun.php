<?php
session_start();
if(empty ($_SESSION['nm_usr_panitia']) |empty ($_SESSION['lvl_user'])){
echo "<script type='text/javascript'>alert('Sorry, you have to login first');
            document.location.href='../login.html'</script>";
}
error_reporting(0);
$thn=$_GET['tahun'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="../image/png">

  <title>Studi Ekskursi <?php echo "$thn";?></title>

  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="print-body">

<section>

    <!--body wrapper start-->
    <div class="wrapper">
        <div class="panel">
            <div class="panel-body invoice">
				<div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                         <img class="inv-logo" src="../images/humanika.png"/>
                    </div>
					
                    <div class="col-md-10 col-sm-10">
                        <h4 align="right">PANITIA STUDI EKSKURSI <?php echo "$thn"; ?><br/>
                            INSTITUT SAINS & TEKNOLOGI AKPRIND<br/>
                            YOGYAKARTA
						</h4>
						<p align="right">Sekretariat : Ruang T106 Jl. Kalisahak 28 Komp. Balapan Tromol Pos 45</br>
						Telp. (0274) 563029 - 563847 Yogyakarta</p>
                    </div>
                </div>
				<hr></hr>
                <div class="invoice-address">
                    <div class="row">
                        <div class="col-md-9 col-sm-9">
                            Daftar Peserta Studi Ekskursi <?php echo "$thn"; ?>
                        </div>
                    </div>
                </div></br>
				<div class="adv-table">
                <table class="table table-bordered table-invoice">
                    <thead>
					<tr>
						<th>No</th>
						<th>NIM</th>
						<th>Nama Peserta</th>
						<th>No Telepon</th>
						<th>Ukuran Kaos</th>
						<th>Status Pembayaran</th>
						<th>Angkatan</th>
						
          
					</tr>
					</thead>
						<?php
							include '../controller/konversi.php';
							include_once '../controller/peserta-control.php';
							$client = new PesertaController();
							$hasil = $client->DaftarSETahun($thn);
							$no=1;
						?>
						<tbody>
						 <?php
						foreach($hasil as $dat){
						echo "
						<tr class='gradeX'>
							<td>".$no++."</td>
							<td>$dat->nim</td>
							<td>$dat->nama_mhs</td>           	
							<td>$dat->notelp</td>
							<td class='center hidden-phone'>$dat->ukuran_kaos</td>
							<td>$dat->status_bayar</td>
							<td>$dat->angkatan</td>
							
						</tr>";
						}?>
						</tbody>
				</table>
			</div>
            </div>    
    </div>
    <!--body wrapper end

</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="../js/jquery-1.10.2.min.js"></script>
<script src="../js/jquery-migrate-1.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/modernizr.min.js"></script>


<!--common scripts for all pages-->
<script src="../js/scripts.js"></script>

<script type="text/javascript">
    window.print();
</script>

</body>
</html>
