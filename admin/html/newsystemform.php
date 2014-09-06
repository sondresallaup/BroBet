<?php
function printNewSystemCard($msg){
	echo '<div class="card">
  <div class="item item-text-wrap">
    '. $msg .'
  </div>
</div>';
}

function printNewSystemMsg(){
	$msg = "";
	if(isset($_GET['newsystem'])){
		if($_GET['newsystem'] === "username"){
			$msg = "System name already exists";
		}
		else if($_GET['newsystem'] === "success"){
			$msg = "System created";
		}
		printNewSystemCard($msg);
	}
}
?>

<form method="POST" action="post/newsystem.php">
<div class="list">
  <label class="item item-input">
    <span class="input-label">System name</span>
    <input type="text" name="system_name">
  </label>
  <?php printNewSystemMsg();?>
  <input type="submit" class="button button-block button-positive" value="Create system">
</div></form>