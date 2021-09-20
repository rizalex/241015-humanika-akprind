<?php
session_start();
if($_SESSION['jenis']==1) {
    unset ($_SESSION['peserta_se']);
	unset ($_SESSION['jenis']);
	unset ($_SESSION['nama_peserta']);
    
}else if($_SESSION['jenis']==2) {
    unset ($_SESSION['peserta_ldkm']);
	unset ($_SESSION['jenis']);
	unset ($_SESSION['nama_peserta']);
}

if(empty ($_SESSION['jenis_se']) || empty ($_SESSION['peserta_se']) ) {
    header("location: index.php");
} else{
if(empty ($_SESSION['jenis_ldkm']) || empty ($_SESSION['peserta_ldkm']) ) {
    header("location: index.php");
}
}

?>
