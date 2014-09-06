<?php
$group_id = $_GET['id'];
include 'php/html/head.php';

$group = new Group();
$group->constructWithId($group_id);

$TITLE = "BroBet - " . $group->getGroup_name();
$GROUP_PAGE_BOOL = TRUE;
include 'php/html/titlebar.php';

//TODO: sjekke om tilgang
if(isLoggedIn()){
	//MAINPAGE
	$system = new System();
	$system->constructWithId($group->getSystem());
	$system->getSystemLogo();

	include 'php/html/bettingform.php';
}

else{
// LOGIN
include 'php/html/loginform.php';
}

include 'php/html/foot.php';
?>