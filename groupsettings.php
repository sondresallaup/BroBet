<?php
$group_id = $_GET['id'];
include 'php/html/head.php';

$group = new Group();
$group->constructWithId($group_id);

$TITLE = "BroBet - " . $group->getGroup_name() ." settings";
$GROUP_PAGE_BOOL = TRUE;
include 'php/html/titlebar.php';

if(isLoggedIn()){
	//MAINPAGE
	include 'php/html/groupsettingslist.php';
}

else{
// LOGIN
include 'php/html/loginform.php';
}

include 'php/html/foot.php';
?>