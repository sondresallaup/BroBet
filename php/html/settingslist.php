<div class="list">

  <div class="item item-divider">
    Profile
  </div>
  <a class="item" href="#">
    Name: <?php echo getLoggedInUser()->getName(); ?>
  </a>
  <div class="item item-divider">
    BettingGroups
  </div>
  <a class="item" href="newgroup.php">
    Create new group
  </a>
  <!--- loop listing all groups -->
  <?php printGroupList();?>

  <div class="item item-divider">
    Friends
  </div>
  <a class="item" href="addfriend.php">
    Add friend
  </a>
  <a class="item" href="friends.php">
    All friends
  </a>


  <a class="button button-full button-assertive" href="php/functions/logout.php">Log out</a>

</div>