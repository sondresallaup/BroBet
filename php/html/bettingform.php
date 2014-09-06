<?php
function printBetCard($msg){
  echo '<div class="card">
  <div class="item item-text-wrap">
    '. $msg .'
  </div>
</div>';
}

function printBetMsg(){
  $msg = "";
  if(isset($_GET['placebet'])){
    if($_GET['placebet'] === "input"){
      $msg = "You must give the group a name";
    }
    printBetCard($msg);
  }
}
?>

<form method="POST" action="php/post/placebet.php">
<div class="list">
  <?php $system->printLatestBetRound(); ?>



  <?php printBetMsg(); ?>
  <input type="submit" class="button button-block button-positive" value="Place bet">
</div></form>