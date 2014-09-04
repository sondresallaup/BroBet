<?php
session_start();

$testing = false;

if($testing){
  error_reporting(-1);
  ini_set('display_errors', 'On');
}

include '../../../php/functions/phpmyadmin_connect.php';
include '../functions/passwordfunctions.php';
include '../functions/userfunctions.php';
include '../entities/User.php';
include '../entities/Friend.php';

if(isset($_POST['username'])){

$username = $_POST['username'];

$referer = "";

$user = new User();
$user->constructWithUsername($username);

if($user->isUserExcisting()){
		$friend = new Friend(getLoggedInUser()->getUser_id(), $user->getUser_id());
		$friend->saveInDB();
		$referer = $username;
}
else{
	$referer = "false";
}

}
else{
	$referer = "input";
}
if(!$testing){
	header('Location: ' . $_SERVER['HTTP_REFERER'] . '?addfriend=' . $referer);
}

if($testing){
	echo $referer;
}







?>