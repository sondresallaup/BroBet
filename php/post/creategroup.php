<?php
session_start();

$testing = true;

if($testing){
  error_reporting(-1);
  ini_set('display_errors', 'On');
}

include '../../../php/functions/phpmyadmin_connect.php';
include '../functions/passwordfunctions.php';
include '../functions/userfunctions.php';
include '../entities/User.php';
include '../entities/Friend.php';
include '../entities/Group.php';

if(isset($_POST['group_name'])){

$group_name = $_POST['group_name'];
$system = $_POST['system'];

$referer = "";

$group = new Group();
$group->constructWithName($group_name);

$group->setSystem($system);
$group->setAdmin(getLoggedInUser()->getUser_id());
$group->saveInDB();

$referer = "success";

}
else{
	$referer = "input";
}

if(!$testing){
	header('Location: ' . $_SERVER['HTTP_REFERER'] . '?creategroup=' . $referer);
}

if($testing){
	echo $referer;
}







?>