<?php
function printLoginCard($msg){
	echo '<div class="card">
  <div class="item item-text-wrap">
    '. $msg .'
  </div>
</div>';
}

function printLoginMsg(){
	$msg = "";
	if(isset($_GET['login'])){
		if($_GET['login'] === "username"){
			$msg = "Username doesn't exist";
		}
		else if($_GET['login'] === "password"){
			$msg = "Incorrect password";
		}
		else if($_GET['login'] === "success"){
			$msg = "You are now logged in!";
		}
		printLoginCard($msg);
	}
}
?>

<form method="POST" action="php/post/login.php">
<div class="list">
  <label class="item item-input">
    <span class="input-label">Username</span>
    <input type="text" name="username">
  </label>
  <label class="item item-input">
    <span class="input-label">Password</span>
    <input type="password" name="password">
  </label>
  <?php printLoginMsg();?>
  <input type="submit" class="button button-block button-positive" value="Log in">
</div></form>

<br><br><br><br><br><br>
Not registered? <a class="button button-clear button-balanced" href="register.php">Register new user</a>