<?php
function printNewTeamCard($msg){
	echo '<div class="card">
  <div class="item item-text-wrap">
    '. $msg .'
  </div>
</div>';
}

function printNewTeamMsg(){
	$msg = "";
	if(isset($_GET['newteam'])){
		if($_GET['newteam'] === "username"){
			$msg = "Team id already exists";
		}
		else if($_GET['newteam'] === "success"){
			$msg = "Team created";
		}
		printNewTeamCard($msg);
	}
}
?>

<form method="POST" action="post/newteam.php">
<div class="list">
  <label class="item item-input">
    <span class="input-label">Team id</span>
    <input type="text" name="team_id">
  </label>
  <label class="item item-input">
    <span class="input-label">Full name</span>
    <input type="text" name="full_name">
  </label>
  <label class="item item-input">
    <span class="input-label">Short name</span>
    <input type="text" name="short_name">
  </label>
  <label class="item item-input">
    <span class="input-label">Initals</span>
    <input type="text" name="initials">
  </label>
  <?php printNewTeamMsg();?>
  <input type="submit" class="button button-block button-positive" value="Create team">
</div></form>