<?php
include 'html/head.php';
$TITLE = "BroBet - ADMIN";
include 'html/titlebar.php';

if(!getLoggedInUser()->isAdmin()){
	echo '403';
}

else if(isLoggedIn()){
	//MAINPAGE
	
	//logged in
	include 'html/adminlist.php';


}

else{
// LOGIN
include '../php/html/loginform.php';
}

include 'html/foot.php';
?>
