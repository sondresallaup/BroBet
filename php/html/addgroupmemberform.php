<?php
function printAddGroupmemberCard($msg){
	echo '<div class="card">
  <div class="item item-text-wrap">
    '. $msg .'
  </div>
</div>';
}

function printAddGroupmemberMsg(){
	$msg = "";
	if(isset($_GET['addgroupmember'])){
		if($_GET['addgroupmember'] === "false"){
			$msg = "User doesn't exist";
		}
    else if($_GET['addgroupmember'] === "input"){
      $msg = "You must enter a username";
    }
    else{
      $msg = $_GET['addgroupmember'] . ' added :)';
    }
		printAddGroupmemberCard($msg);
	}
}
?>

<form method="POST" action="php/post/addgroupmember.php">
<div class="list">
  <div class="item item-input-inset">
    <label class="item-input-wrapper">
      <input type="text" name="username" placeholder="username">
    </label>
    <input type="submit" class="button button-small" value="Add group member">
    <input type="hidden" value="<?php echo $group->getGroup_id();?>" name="group_id">
  </div>

</div></form>

<br><br><?php printAddGroupmemberMsg();?>

<!--- TODO: list all friends with add member button --> 