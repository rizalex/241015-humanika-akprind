<?php

require_once '../controller/keg-control.php';
$client = new JenisController();
$kode = $_GET['id'];
$action = $client->HapusJenis($kode);
if ($action > 0) {
    echo "<script language='javascript'>alert ('Data Has Been Deleted'); </script>"
    . "<script language='javascript'>document.location.href='keg_jenis.php'</script>";
} else {
    echo "<script language='javascript'>alert ('Data Cant Deleted'); </script>"
    . "<script language='javascript'>document.location.href='keg_jenis'</script>";
}

?>