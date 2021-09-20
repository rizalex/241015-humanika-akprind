<?php

require_once '../controller/bank-control.php';
$client = new BankController();
$kode = $_GET['id'];
$action = $client->HapusBank($kode);
if ($action > 0) {
    echo "<script language='javascript'>alert ('Data Has Been Deleted'); </script>"
    . "<script language='javascript'>document.location.href='ref-bank.php'</script>";
} else {
    echo "<script language='javascript'>alert ('Data Cant Deleted'); </script>"
    . "<script language='javascript'>document.location.href='ref-bank.php'</script>";
}

?>