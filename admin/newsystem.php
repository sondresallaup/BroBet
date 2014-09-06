<?php
include 'html/head.php';
$TITLE = "BroBet - ADMIN - new system";
include 'html/titlebar.php';

if(!getLoggedInUser()->isAdmin()){
	echo '403';
}

else if(isLoggedIn()){
	//MAINPAGE
	
	include 'html/newsystemform.php';

}

else{
// LOGIN
include '../php/html/loginform.php';
}

include 'html/foot.php';
?>
