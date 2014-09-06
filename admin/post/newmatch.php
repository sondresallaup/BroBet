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
include '../../php/entities/Match.php';
include '../../php/entities/System.php';
include '../../php/functions/systemfunctions.php';

if(getLoggedInUser()->isAdmin()){

$home_team = $_POST['home_team'];
$away_team = $_POST['away_team'];
$h_odds = $_POST['h_odds'];
$x_odds = $_POST['x_odds'];
$a_odds = $_POST['a_odds'];
$system_id = $_POST['system'];
$time = $_POST['time'];

$referer = "";

if(isset($home_team) && isset($away_team) && isset($h_odds) && isset($x_odds)&& isset($a_odds)&& isset($system_id)&& isset($time)){
	$match = new Match();
	$match->setHomeTeam($home_team);
	$match->setAwayTeam($away_team);
	$match->setHOdds($h_odds);
	$match->setXOdds($x_odds);
	$match->setAOdds($a_odds);
	$match->setTime($time);
	//finne round_id
	$system = new System();
	$system->constructWithId($system_id);
	$round_id = $system->getLastRound();
	$match->setRoundId($round_id);
	$match->saveInDB();

	$referer = "success";
}

else{
	$referer = "input";
}

if(!$testing){
	header('Location: ' . $_SERVER['HTTP_REFERER'] . '?newmatch=' . $referer);
}

if($testing){
	echo $referer;
}


}
?>