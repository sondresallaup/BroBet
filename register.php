<?php
include 'php/html/head.php';
$TITLE = "BroBet - Register";
include 'php/html/titlebar.php';

//MAINPAGE
if(!isLoggedIn()){
include 'php/html/registerform.php';

}
else{
	echo 'Gratulerer, du er registrert!';
}

include 'php/html/foot.php';
?>