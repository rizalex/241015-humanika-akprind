<?php
session_start();
require_once 'login-control.php';
$app = new ProgramUtama();

if(isset ($_POST['submit_login'])) {

    if($_POST['username']=='' | $_POST['password']=='') {
        echo "<script type='text/javascript'>alert('Field can't be empty,\\n Please try again');
            document.location.href='../login.html'</script>";
    }else {
        $x=$app->CekLogin($_POST['username'], $_POST['password']);


        if($x==null) {
            echo "<script type='text/javascript'>alert('Login Failed!,\\n Please try again');
            document.location.href='../login.html'</script>";
        }else {
            $x=$app->CekLogin($_POST['username'], $_POST['password']);
            if($_POST['username'] == $x->username && $_POST['password'] == $x->password) {
                if($x->id_level==1) {
                    $_SESSION['nm_user'] = $x->nama;
					$_SESSION['usernamea'] = $x->username;
                    $_SESSION['lvl_user']=$x->id_level;
                    header("location:../admin/index.php");
                }else if($x->id_level==2) {
                    $_SESSION['nm_usr_panitia'] = $x->nama;
					$_SESSION['usernamep'] = $x->username;
                    $_SESSION['lvl_user'] = $x->id_level;
                    header("location:../panitia/index.php"); 
                }
            }else {
                echo "gagal";
            }
        }
    }
}
?>
