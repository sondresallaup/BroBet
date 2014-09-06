<?php
function printNewMatchCard($msg){
	echo '<div class="card">
  <div class="item item-text-wrap">
    '. $msg .'
  </div>
</div>';
}

function printNewMatchMsg(){
	$msg = "";
	if(isset($_GET['newmatch'])){
		if($_GET['newmatch'] === "username"){
			$msg = "Team id already exists";
		}
		else if($_GET['newmatch'] === "success"){
			$msg = "Match created";
		}
		printNewMatchCard($msg);
	}
}
?>

<form method="POST" action="post/newmatch.php">
<div class="list">
  <div class="item item-divider">Teams</div>
  <label class="item item-input">
    <span class="input-label">Home team</span>
    <input type="text" name="home_team">
  </label>
  <label class="item item-input">
    <span class="input-label">Away team</span>
    <input type="text" name="away_team">
  </label>
  <div class="item item-divider">Odds</div>
  <label class="item item-input">
    <span class="input-label">Home odds</span>
    <input type="text" name="h_odds">
  </label>
  <label class="item item-input">
    <span class="input-label">Tie odds</span>
    <input type="text" name="x_odds">
  </label>
  <label class="item item-input">
    <span class="input-label">Away odds</span>
    <input type="text" name="a_odds">
  </label>
  <div class="item item-divider">etc.</div>
  <label class="item item-input">
    <span class="input-label">When</span>
    <input type="text" name="time">
  </label>
  <?php createSystemSelectBox();?>
  <?php printNewMatchMsg();?>
  <input type="submit" class="button button-block button-positive" value="Create match">
</div></form>