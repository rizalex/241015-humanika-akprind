		<?php
		require_once '../controller/bayar-control.php';
		$client = new BayarController();
		$kode = $_GET['id'];	
		$status = $_GET['stat'];
		$ver="Verifikasi";
		$belver="Belum Verifikasi";
			
				
		if($status=='Belum Verifikasi'){
			$result = $client->EditStatus($kode, $ver);
			if ($result > 0) {?>
				<script language="javascript"> document.location.href='peserta_verifikasi.php'</script>
				<?php
			} else { echo "Failed"; }
		}
		 
		?>