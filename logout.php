<?php
session_start();
if($_SESSION['lvl_user']==1 && !empty($_SESSION['usernamea'])) {
    unset ($_SESSION['nm_user']);
    unset ($_SESSION['lvl_user']);
	unset ($_SESSION['usernamea']);
}else if($_SESSION['lvl_user']==2 && !empty($_SESSION['usernamep'])) {
    unset ($_SESSION['nm_usr_panitia']);
    unset ($_SESSION['lvl_user']);
	unset ($_SESSION['usernamep']);
}

if(empty ($_SESSION['nm_user']) |empty ($_SESSION['lvl_user']) ) {
    header("location: login.html");
}

?>
