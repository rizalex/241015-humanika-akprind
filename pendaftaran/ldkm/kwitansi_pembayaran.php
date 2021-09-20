<?php
session_start();
$thn=$_GET['tahun'];;
$keg=$_GET['keg'];
$peserta=$_GET['peserta'];
if(empty ($thn) || empty ($peserta)){
echo "<script type='text/javascript'>alert('Sorry, you have to login first');
            document.location.href='../login.html'</script>";
}

include '../../controller/konversi.php';
include_once '../../controller/peserta-control.php';
include_once '../../controller/bayar-control.php';
$clientpes = new PesertaController();
$clientbyr = new BayarController();
$rincian=$clientbyr->Rincian($peserta, $keg);
$peserta=$clientpes->DaftarDetail($peserta, $keg);
$no=1;
$tgl=date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="../image/png">

  <title>Kwitansi Latihan Dasar Kepemimpinan Mahasiswa <?php echo $thn?></title>

  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/style-responsive.css" rel="stylesheet">

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
                         <img class="inv-logo" src="../../images/humanikak.png"/>
                    </div>
                    <div class="col-md-8 col-sm-10">
                        <h4 align="right">PANITIA LDKM <?php echo $thn?><br/>
                            INSTITUT SAINS & TEKNOLOGI AKPRIND<br/>
                            YOGYAKARTA
						</h4>
						<p align="right">Sekretariat : Ruang T106 Jl. Kalisahak 28 Komp. Balapan Tromol Pos 45</br>
						Telp. (0274) 563029 - 563847 Yogyakarta</p>
                    </div>
                </div>
				<hr> 
				
                <div class="invoice-address">
                    <div class="row">
                        <div class="col-md-8 col-sm-9">
                            <center>Kwitansi LDKM <?php echo $thn?> Mahasiswa Teknik Informatika</br>
							Institut Sains & Teknologi AKPRIND Yogyakarta</center></br>	
							<?php foreach($peserta as $data){
							echo "NIM			 : $data->nim </br>";
							echo "Nama Mahasiswa : $data->nama_mhs";
							}?>
                        </div>
                    </div>
                </div>
				</br>
                <table class="table table-bordered table-invoice" >
                    <thead>
					<tr>
						<td>Tahapan Pembayaran</td>
						<td align="center">Jumlah Bayar</td>
						<td align="center" >Tanggal Pembayaran</td>
						
          
					</tr>
					</thead>
						
						<tbody>
						 <?php
						 $jumlah=0;
						foreach($rincian as $data){
						echo "
						<tr class='gradeX'>
							<td width='50px'>".$no++."</td>
							<td align='center' >Rp. $data->jumlah,-</td>
							<td align='center' >".DateToIndo($data->tgl_pembayaran)."</td> 
							
						</tr>";  $jumlah=$jumlah+$data->jumlah;
						} ?>
						</tbody>
				</table>
				<div class="invoice-address">
                    <div class="row">
                        <div class="col-md-8 col-sm-9">
							Total Pembayaran : Rp.<?php echo $jumlah?>,-</br>
							Status Pembayaran Anda LUNAS!</br>
							NB : Gunakan kwitansi ini sebagai bukti bahwa anda telah melunasi biaya untuk kegiatan Latihan Dasar Kepemimpinan Mahasiswa tahun <?php echo $thn?>.
                            <p align="right">Mengetahui,</br>
							Panitia Pelaksana</br></br>tertanda</br></br>
							(Panitia)</p>
							
                        </div>
                    </div>
                </div>
            </div>    
    </div>
    <!--body wrapper end

</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="../../js/jquery-1.10.2.min.js"></script>
<script src="../../js/jquery-migrate-1.2.1.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/modernizr.min.js"></script>


<!--common scripts for all pages-->
<script src="../../js/scripts.js"></script>

<script type="text/javascript">
    window.print();
</script>

</body>
</html>
