<?php
function printAddFriendCard($msg){
	echo '<div class="card">
  <div class="item item-text-wrap">
    '. $msg .'
  </div>
</div>';
}

function printAddFriendMsg(){
	$msg = "";
	if(isset($_GET['addfriend'])){
		if($_GET['addfriend'] === "false"){
			$msg = "User doesn't exist";
		}
    else if($_GET['addfriend'] === "input"){
      $msg = "You must enter a username";
    }
    else{
      $msg = $_GET['addfriend'] . ' added :)';
    }
		printAddFriendCard($msg);
	}
}
?>

<form method="POST" action="php/post/addfriend.php">
<div class="list">
  <div class="item item-input-inset">
    <label class="item-input-wrapper">
      <input type="text" name="username" placeholder="username">
    </label>
    <input type="submit" class="button button-small" value="Add friend">
  </div>

</div></form>

<br><br><?php printAddFriendMsg();?>