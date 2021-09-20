<?php

require_once '../controller/keg-control.php';
$client = new JenisController();
$kode = $_GET['id'];
$action = $client->HapusDetail($kode);
if ($action > 0) {
    echo "<script language='javascript'>alert ('Data Has Been Deleted'); </script>"
    . "<script language='javascript'>document.location.href='keg_detail.php'</script>";
} else {
    echo "<script language='javascript'>alert ('Data Cant Deleted'); </script>"
    . "<script language='javascript'>document.location.href='keg_detail.php'</script>";
}

?>