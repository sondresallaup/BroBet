<?php
include 'php/html/head.php';
$TITLE = "BroBet - Create group";
include 'php/html/titlebar.php';

if(isLoggedIn()){
	//MAINPAGE
	
	include 'php/html/newgroupform.php';
}

else{
// LOGIN
include 'php/html/loginform.php';
}

include 'php/html/foot.php';
?>