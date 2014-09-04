<?php
include 'php/html/head.php';
$TITLE = "BroBet - Friends";
include 'php/html/titlebar.php';

if(isLoggedIn()){
	//MAINPAGE
	
	include 'php/html/friendslist.php';


}

else{
// LOGIN
include 'php/html/loginform.php';
}

include 'php/html/foot.php';
?>