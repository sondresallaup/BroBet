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
include '../../php/entities/Round.php';

if(getLoggedInUser()->isAdmin()){

$system = $_POST['system'];
$round_open = $_POST['round_open'];
$round_closed = $_POST['round_closed'];

$referer = "";

if(isset($system)){
	$round = new Round();
	$round->setSystemId($system);
	$round->setTimeOpen($round_open);
	$round->setTimeClosed($round_closed);
	$round->saveInDB();

	$referer = "success";
}

else{
	$referer = "input";
}

if(!$testing){
	header('Location: ' . $_SERVER['HTTP_REFERER'] . '?newround=' . $referer);
}

if($testing){
	echo $referer;
}


}
?>