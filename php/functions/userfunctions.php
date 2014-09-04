<?php

function isLoggedIn(){
	if(isset($_SESSION['logged_in_user'])){
		return TRUE;
	}
	else{
		return FALSE;
	}
}

function getLoggedInUser(){
	$user = new User();
	$user->constructWithUserId($_SESSION['logged_in_user']);
	return $user;
}

function printLogOutToast(){
	if(isset($_GET['referer'])){
		if($_GET['referer'] == "logout"){
			echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Du er nå logget ut!</div>';
		}
	}
}

function printLogInToast(){
	if(isset($_GET['referer'])){
		if($_GET['referer'] == "login"){
			echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>Du er nå logget inn!</div>';
		}
	}
}

function isUsernameExisting($username){
	$numberEmailsQuery = mysql_query("SELECT * FROM BroBet_users WHERE username = '$username'");
	$numberEmails = mysql_num_rows($numberEmailsQuery);
	if($numberEmails != 0){
		return TRUE;
	}
	else{
		return FALSE;
	}
}

function printFriendsList(){
	$friends = getLoggedInUser()->getFriends();
	echo '<ul class="list">';
	for($i = 0; $i < sizeof($friends); $i++){
		$friend = new User();
		$friend->constructWithUserId($friends[$i]);
		echo '<li class="item">' . $friend->getName() . '</li>';
	}
	echo '</ul>';

}

function printGroupList(){
	$groups = getLoggedInUser()->getGroups();
	echo '<ul class="list">';
	for($i = 0; $i < sizeof($groups); $i++){
		$group = new Group();
		$group->constructWithId($groups[$i]);
		echo '<a class="item" href="group.php?id='. $group->getGroup_id() .'">' . $group->getGroup_name() . '</a>';
	}
	echo '</ul>';
}

?>