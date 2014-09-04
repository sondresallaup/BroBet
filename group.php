<?php
$group_id = $_GET['id'];
include 'php/html/head.php';

$group = new Group();
$group->constructWithId($group_id);

$TITLE = "BroBet - " . $group->getGroup_name();
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