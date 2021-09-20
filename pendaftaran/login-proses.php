<?php
session_start();
require_once '../controller/login-control.php';
$app = new ProgramUtama();

if(isset ($_POST['submit_login'])) {

    
        $x=$app->CekPeserta($_POST['nim'], $_POST['password']);

        if($x==null) {
            echo "<script type='text/javascript'>alert('Login Failed!,\\n Please try again');
            document.location.href='index.php'</script>";
        }else {
            if($_POST['nim'] == $x->nim && $_POST['password'] == $x->password) {
                if($x->id_keg==1) {
                    $_SESSION['nim'] = $x->nim;
                    $_SESSION['jenis']=$x->id_keg;
					$_SESSION['nama_peserta']=$x->nama_mhs;
					$_SESSION['id_peserta']=$x->id_peserta;
                    header("location:se/index.php");
                }else if($x->id_keg==2) {
                    $_SESSION['nim'] = $x->nim;
                    $_SESSION['jenis'] = $x->id_keg;
					$_SESSION['nama_peserta']=$x->nama_mhs;
					$_SESSION['id_peserta']=$x->id_peserta;
                    header("location:ldkm/index.php"); 
                }
            }else {
                echo "gagal";
            }
        }
    
}


?>
