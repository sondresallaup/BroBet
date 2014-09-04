<?php
session_start();

$testing = false;

if($testing){
  error_reporting(-1);
  ini_set('display_errors', 'On');
}

include '../php/functions/phpmyadmin_connect.php';
include 'php/entities/User.php';
include 'php/entities/Group.php';
include 'php/functions/userfunctions.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>BroBet</title>
        	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                
        <meta name="viewport" content="width=device-width, initial-scale=1.0" content="text/html; charset=UTF-8">
        <link href = "css/ionic.min.css" rel = "stylesheet">
	</head>
    <body>