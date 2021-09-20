<?php

require_once '../controller/arsip-control.php';
$client = new ArsipController();
$kode = $_GET['id'];
$action = $client->HapusArsip($kode);
$hasil=$client->TampilEditArsip($kode);

if ($action > 0) {
    echo "<script language='javascript'>alert ('Data Has Been Deleted'); </script>"
    . "<script language='javascript'>document.location.href='arsip.php'</script>";
} else {
    echo "<script language='javascript'>alert ('Data Can't Deleted'); </script>"
    . "<script language='javascript'>document.location.href='arsip.php'</script>";
}
foreach($hasil as $data){
$file=$data->file;
}
unlink($file);
?>
