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
include '../../php/entities/System.php';

if(getLoggedInUser()->isAdmin()){

$systemName = $_POST['system_name'];

$referer = "";

if(isset($systemName)){
	$system = new System();
	$system->setSystemName($systemName);
	$system->saveInDB();

	$referer = "success";
}

else{
	$referer = "input";
}

if(!$testing){
	header('Location: ' . $_SERVER['HTTP_REFERER'] . '?newsystem=' . $referer);
}

if($testing){
	echo $referer;
}


}
?>