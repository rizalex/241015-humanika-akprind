<?php
require_once '../controller/arsip-control.php';
$client = new ArsipController();
$kode = $_GET['id'];
$hasil=$client->TampilEditArsip($kode);
foreach($hasil as $data){
$size=$data->file_size;
$type=$data->file_type;
$name=$data->file_name;
$file=$data->file;
}
header("Content-Disposition:attachment;filename=".$name);
header("Content-length:".$size);
header("Content-type:".$type);

readfile($file);
?>