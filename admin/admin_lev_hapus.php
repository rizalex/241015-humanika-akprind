<?php

require_once '../controller/admin-control.php';
$client = new UserController();
$kode = $_GET['id'];
$action = $client->HapusLevel($kode);
if ($action > 0) {
    echo "<script language='javascript'>alert ('Data Has Been Deleted'); </script>"
    . "<script language='javascript'>document.location.href='admin_lev.php'</script>";
} else {
    echo "<script language='javascript'>alert ('Data Cant Deleted'); </script>"
    . "<script language='javascript'>document.location.href='admin_lev.php'</script>";
}

?>