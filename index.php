<?php
include 'php/html/head.php';
$TITLE = "BroBet - Log in";
include 'php/html/titlebar.php';

if(isLoggedIn()){
	//MAINPAGE
	echo 'Logget inn!';
}

else{
// LOGIN
include 'php/html/loginform.php';
}

include 'php/html/foot.php';
?>