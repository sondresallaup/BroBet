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
include '../entities/Group.php';

if(isset($_POST['username'])){

$username = $_POST['username'];
$group_id = $_POST['group_id'];

$referer = "";

$user = new User();
$user->constructWithUsername($username);

if($user->isUserExcisting()){
	$user_id = $user->getUser_id();
	mysql_query("INSERT INTO BroBet_groupMembership VALUES('$group_id', '$user_id', '')");
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
	header('Location: ' . $_SERVER['HTTP_REFERER'] . '&addgroupmember=' . $referer);
}

if($testing){
	echo $referer;
}







?>