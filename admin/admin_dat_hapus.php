<?php

require_once '../controller/admin-control.php';
$client = new UserController();
$kode = $_GET['username'];
$action = $client->HapusUser($kode);
if ($action > 0) {
    echo "<script language='javascript'>alert ('Data Has Been Deleted'); </script>"
    . "<script language='javascript'>document.location.href='admin_dat.php'</script>";
} else {
    echo "<script language='javascript'>alert ('Data Cant Deleted'); </script>"
    . "<script language='javascript'>document.location.href='admin_dat.php'</script>";
}

?>