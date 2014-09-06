<?php
session_start();

$testing = false;

if($testing){
  error_reporting(-1);
  ini_set('display_errors', 'On');
}

include '../../../php/functions/phpmyadmin_connect.php';
include '../../php/entities/User.php';
include '../../php/functions/userfunctions.php';
include '../../php/entities/Team.php';

if(getLoggedInUser()->isAdmin()){

$team_id = $_POST['team_id'];
$full_name = $_POST['full_name'];
$short_name = $_POST['short_name'];
$initials = $_POST['initials'];

$referer = "";

if(isset($team_id) && isset($full_name) && isset($short_name) && isset($initials)){
	$team = new Team($team_id);
	$team->setFullName($full_name);
	$team->setShortName($short_name);
	$team->setInitials($initials);
	$team->saveInDB();

	$referer = "success";
}

else{
	$referer = "input";
}

if(!$testing){
	header('Location: ' . $_SERVER['HTTP_REFERER'] . '?newteam=' . $referer);
}

if($testing){
	echo $referer;
}


}
?>