<?php
function printNewRoundCard($msg){
	echo '<div class="card">
  <div class="item item-text-wrap">
    '. $msg .'
  </div>
</div>';
}

function printNewRoundMsg(){
	$msg = "";
	if(isset($_GET['newround'])){
		if($_GET['newround'] === "username"){
			$msg = "System name already exists";
		}
		else if($_GET['newround'] === "success"){
			$msg = "Round created";
		}
		printNewRoundCard($msg);
	}
}
?>

<form method="POST" action="post/newround.php">
<div class="list">
	<?php createSystemSelectBox();?>
  <label class="item item-input">
    <span class="input-label">Opens</span>
    <input type="text" name="round_open">
  </label>
  <label class="item item-input">
    <span class="input-label">Closes</span>
    <input type="text" name="round_closed">
  </label>
  <?php printNewRoundMsg();?>
  <input type="submit" class="button button-block button-positive" value="Create round">
</div></form>