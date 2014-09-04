<?php
include 'php/html/head.php';
$TITLE = "BroBet - Settings";
include 'php/html/titlebar.php';

if(isLoggedIn()){
	//MAINPAGE
	
	include 'php/html/settingslist.php';


}

else{
// LOGIN
include 'php/html/loginform.php';
}

include 'php/html/foot.php';
?>
