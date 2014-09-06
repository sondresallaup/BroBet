<div class="bar bar-header bar-positive">
	<a class="button button-clear" href="javascript:history.back()">Back</a>
  <h1 class="title"><?php echo $TITLE; ?></h1>
  	<?php if (isset($GROUP_PAGE_BOOL)){
	echo '<a class="button button-icon icon ion-navicon" href="groupsettings.php?id='. $group_id .'"></a>';
} 
else{
	echo '<a class="button button-icon icon ion-home" href="index.php"></a>';
}

?>
</div><br><br><br>