<?php

require_once '../controller/mahasiswa-control.php';
$client = new MahasiswaController();
$kode = $_GET['id'];
$action = $client->HapusMahasiswa($kode);
if ($action > 0) {
    echo "<script language='javascript'>alert ('Data Has Been Deleted'); </script>"
    . "<script language='javascript'>document.location.href='mahasiswa_data.php'</script>";
} else {
    echo "<script language='javascript'>alert ('Data Cant Deleted'); </script>"
    . "<script language='javascript'>document.location.href='mahasiswa_data.php'</script>";
}

?>