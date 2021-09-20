		<?php
		require_once '../controller/artikel-control.php';
		$client = new ArtikelController();
		$kode = $_GET['id'];	
		$status = $_GET['stat'];
		$pub=0;
		$unpub=1;
			
				
		if($status==0){
			$result = $client->EditStatus($kode, $unpub);
			if ($result > 0) {?>
				<script language="javascript"> document.location.href='artikel.php'</script>
				<?php
			} else { echo "Failed"; }
		}
		else if($status==1){ 
			$result = $client->EditStatus($kode, $pub);
			if ($result > 0) {?>
			<script language="javascript"> document.location.href='artikel.php'</script>
			<?php
			} else { echo "Failed"; }
		} 
		?>