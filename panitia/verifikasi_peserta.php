		<?php
		require_once '../controller/bayar-control.php';
		$client = new BayarController();
		$kode = $_GET['id'];	
		$status = $_GET['stat'];
		$ver="Lunas";
		$belver="Belum Lunas";
			
		if($status=='Belum Lunas'){
			$result = $client->EditPeserta($kode, $ver);
			if ($result > 0) {?>
				<script language="javascript"> document.location.href='peserta_status.php'</script>
				<?php
			} else { echo "Failed"; }
		}
		 
		?>