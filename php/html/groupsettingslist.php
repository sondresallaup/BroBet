<div class="list">

  <div class="item item-divider">
    Members
  </div>
   <!--- loop listing all members -->
  <a class="item" href="addgroupmember.php?id=<?php echo $group_id;?>">Add new member</a>
  <?php printGroupMembers($group);?>

  
  <a class="button button-full button-assertive" href="#">Delete group</a>

</div>