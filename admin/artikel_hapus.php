<?php

require_once '../controller/artikel-control.php';
$client = new ArtikelController();
$kode = $_GET['id'];
$action = $client->HapusArtikel($kode);
if ($action > 0) {
    echo "<script language='javascript'>alert ('Data Has Been Deleted'); </script>"
    . "<script language='javascript'>document.location.href='artikel.php'</script>";
} else {
    echo "<script language='javascript'>alert ('Data Can't Deleted'); </script>"
    . "<script language='javascript'>document.location.href='artikel.php'</script>";
}

?>