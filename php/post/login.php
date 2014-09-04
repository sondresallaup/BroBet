<?php
session_start();

$testing = false;

if($testing){
  error_reporting(-1);
  ini_set('display_errors', 'On');
}

include '../../../php/functions/phpmyadmin_connect.php';
include '../php/functions/passwordfunctions.php';
include '../entities/User.php';

$username = $_POST['username'];
$password = $_POST['password'];

if(isset($username) && isset($password)){

$referer = "";

$user = new User();
$user->constructWithUsername($username);

if($user->isUserExcisting()){
	if($user->isCorrectPassword($password)){
		$user->login();
		$referer = "success";
	}
	else{
		$referer = "password";
	}
}
else{
	$referer = "username";
}


if(!$testing){
	header('Location: ' . $_SERVER['HTTP_REFERER'] . '?login=' . $referer);
}

if($testing){
	echo $referer;
}




}


?>