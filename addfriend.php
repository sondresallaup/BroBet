<?php
include 'php/html/head.php';
$TITLE = "BroBet - Add friend";
include 'php/html/titlebar.php';

if(isLoggedIn()){
	//MAINPAGE
	
	include 'php/html/addfriendform.php';


}

else{
// LOGIN
include 'php/html/loginform.php';
}

include 'php/html/foot.php';
?>