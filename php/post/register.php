<?php
session_start();

$testing = false;

if($testing){
  error_reporting(-1);
  ini_set('display_errors', 'On');
}

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeat_password'];

include '../../../php/functions/phpmyadmin_connect.php';
include '../functions/passwordfunctions.php';
include '../functions/userfunctions.php';
include '../entities/User.php';

$referer = "";

if(isset($name) && isset($username) && isset($password) && isset($repeatPassword)){

if(!isUsernameExisting($username)){
	if(isPasswordGood($password)){
		if(isRepeatPasswordTheSameAsPassword($password, $repeatPassword)){
			$user = new User();
			$user->setName($name);
			$user->setUsername($username);
			$user->setPassword($password);
			$user->saveInDB();
			$user->constructWithUsername($username);
			$user->login();
			$referer = "success";
		}
		else{
			$referer = "repeatpassword";
		}
	}
	else{
		$referer = "badpassword";
	}
}
else{
	$referer = "username";
}

}
else{
	$referer = "fields";
}


if(!$testing){
	header('Location: ' . $_SERVER['HTTP_REFERER'] . '?register=' . $referer);
}

if($testing){
	echo $referer;
}

?>