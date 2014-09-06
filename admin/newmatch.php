<?php
include 'html/head.php';
$TITLE = "BroBet - ADMIN - new match";
include 'html/titlebar.php';

if(!getLoggedInUser()->isAdmin()){
	echo '403';
}

else if(isLoggedIn()){
	//MAINPAGE
	
	include 'html/newmatchform.php';

}

else{
// LOGIN
include '../php/html/loginform.php';
}

include 'html/foot.php';
?>
