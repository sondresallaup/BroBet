<?php
function printGroupCard($msg){
  echo '<div class="card">
  <div class="item item-text-wrap">
    '. $msg .'
  </div>
</div>';
}

function printGroupMsg(){
  $msg = "";
  if(isset($_GET['creategroup'])){
    if($_GET['creategroup'] === "input"){
      $msg = "You must give the group a name";
    }
    printGroupCard($msg);
  }
}
?>

<form method="POST" action="php/post/creategroup.php">
<div class="list">
  <label class="item item-input">
    <span class="input-label">Group name</span>
    <input type="text" name="group_name">
  </label>
  <label class="item item-input item-select">
    <div class="input-label">
      System
    </div>
    <select name="system">
      <option value="0">Premier League</option>
      <option value="1" selected>Tippeligaen</option>
      <option value="2">Editor's choices</option>
    </select>
  </label>
  <?php printGroupMsg(); ?>
  <input type="submit" class="button button-block button-positive" value="Create group">
</div></form>