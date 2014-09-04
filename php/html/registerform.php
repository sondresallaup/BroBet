<?php
function printRegisterCard($msg){
	echo '<div class="card">
  <div class="item item-text-wrap">
    '. $msg .'
  </div>
</div>';
}

function printRegisterMsg(){
	$msg = "";
	if(isset($_GET['register'])){
		if($_GET['register'] === "username"){
			$msg = "Username is already existing";
		}
		else if($_GET['register'] === "badpassword"){
			$msg = "Bad password";
		}
		else if($_GET['register'] === "repeatpassword"){
			$msg = "Passwords doesn't match";
		}
		else if($_GET['register'] === "success"){
			$msg = "You are now registered!";
		}
    else if($_GET['register'] === "fields"){
      $msg = "You must fill all inputs";
    }
		printRegisterCard($msg);
	}
}
?>

<form method="POST" action="php/post/register.php">
<div class="list">
  <label class="item item-input">
    <span class="input-label">Name</span>
    <input type="text" name="name">
  </label>
  <label class="item item-input">
    <span class="input-label">Username</span>
    <input type="text" name="username">
  </label>
  <label class="item item-input">
    <span class="input-label">Password</span>
    <input type="password" name="password">
  </label>
  <label class="item item-input">
    <span class="input-label">Repeat password</span>
    <input type="password" name="repeat_password">
  </label>
  <?php printRegisterMsg();?>
  <input type="submit" class="button button-block button-positive" value="Register">
</div></form>