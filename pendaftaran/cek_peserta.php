<?php
session_start();
error_reporting(0);
if(empty($_GET['id'])){
echo "<script type='text/javascript'>alert('Halaman tidak dapat diakses');
            document.location.href='index.php'</script>";
}
	include_once '../controller/peserta-control.php';
	$app = new PesertaController();
	$nim=$_GET['id'];
	$keg=$_GET['keg'];
	$thn=$_GET['tahun'];
	$x=$app->DaftarTersedia($nim, $keg);
	if($x!=null) {
				?>
					<script language="javascript">alert('Anda Telah Terdaftar'); document.location.href='index.php'</script>
				<?php
				}else {
					if($keg=='SE'){ 
						?>
							<script language="javascript">alert('Silahkan isi formulir pendaftaran'); document.location.href='se/formulir.php?keg=<?php echo $keg;?>&tahun=<?php echo $thn;?>&id=<?php echo $nim;?>'</script>
						<?php }
					else if($keg=='LDKM'){ 
						?>
							<script language="javascript">alert('Silahkan isi formulir pendaftaran'); document.location.href='ldkm/formulir.php?keg=<?php echo $keg;?>&tahun=<?php echo $thn;?>&id=<?php echo $nim;?>'</script>
						<?php }
				}		
?>

