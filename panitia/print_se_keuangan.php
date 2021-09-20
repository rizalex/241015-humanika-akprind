<?php
session_start();
if(empty ($_SESSION['nm_usr_panitia']) |empty ($_SESSION['lvl_user'])){
echo "<script type='text/javascript'>alert('Sorry, you have to login first');
            document.location.href='../login.html'</script>";
}
$keg="SE";
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
				<?php
					include '../controller/konversi.php';
					include_once '../controller/bayar-control.php';
					$client = new BayarController();
					
				?>
                <div class="invoice-address">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            Laporan Keuangan Studi Ekskursi  <?php echo "$thn"; ?>
                        </div>
                    </div>
                </div></br>
				<div class="adv table">
                <table class="table table-bordered table-invoice">
                    <thead>
					<tr>
						<th>No</th>
						<th>NIM</th>
						<th>Nama Peserta</th>
						<th>Tanggal Pembayaran</th>
						<th>Bank Pengirim</th>
						<th>No Rekening Penerima</th>
						<th>Jumlah</th>
          
					</tr>
					</thead>
						<?php
							
							$hasil = $client->DaftarKeuangan($keg, $thn);
							$hasil1 = $client->DaftarBank($keg, $thn);
							$jumlahbank=0;
							$jumlahseluruh=0;
							$no=1;
							$jumlah=0;
							$sisajumlah=0;
							$tot=0;
						?>
						<tbody>
						 <?php
						foreach($hasil as $dat){
						echo "
						<tr class='gradeX'>
							<td>".$no++."</td>
							<td>$dat->nim</td>
							<td>$dat->nama_mhs</td>
							<td>".DateToIndo($dat->tgl_pembayaran)."</td>           	
							<td>$dat->bank_asal</td>
							<td>$dat->bank_tujuan</td>
							<td>Rp. $dat->jumlah,-</td>
						</tr>"; $jumlahseluruh=$jumlahseluruh+$dat->jumlah;
						$rinci=$client->RincianBiaya($dat->id_peserta, $keg);
						foreach($rinci as $data){ $jumlah=$jumlah+$data->jumlah; $sisa=$data->biaya-$jumlah;} 
						$jumlah=0;
						$sisajumlah=$sisajumlah+$sisa;
						$tot=$dat->biaya*$dat->kuota;
						$sis=$tot-$jumlahseluruh;
						}?>
						</tbody>
				</table>
				
				<?php foreach($hasil1 as $dat){
							echo"<p align='right'>Jumlah Keseluruhan Pada Bank $dat->nama_bank - $dat->no_rekening ($dat->nama_pemilik) = Rp.";
							$hasil2=$client->DaftarKeuanganBank($keg, $dat->no_rekening, $thn);
							foreach($hasil2 as $dat){ $jumlahbank=$jumlahbank+$dat->jumlah; }
							echo "$jumlahbank,-</br>";
							$jumlahbank=0;
							} ?>
							<p align="right">Jumlah Keseluruhan Dana Yang Telah Masuk = Rp.<?php echo $jumlahseluruh?>,-</p>
							<p align="right">Jumlah Kekurangan Dana (Dari semua peserta yang telah terdaftar) = Rp.<?php echo $sisajumlah?>,-</p>
							<p align="right">Jumlah Kekurangan Dana (Dari total kuota) = Rp.<?php echo $sis?>,-</p>
							<p align="right">Total Dana (Dari total kuota) = Rp.<?php echo $tot?>,-</p>
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
