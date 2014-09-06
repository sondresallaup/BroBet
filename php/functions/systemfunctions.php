<?php
function createSystemSelectBox(){
	$systemsQuery = mysql_query("SELECT * FROM BroBet_system");
	echo '
  <label class="item item-input item-select">
    <div class="input-label">
      System
    </div>';
	echo '<select name="system">';
	while ($systemsRow = mysql_fetch_assoc($systemsQuery)){
		echo '<option value="'.$systemsRow['system_id'].'">';
		echo $systemsRow['system_name'] . '</option>';
	}
	echo '</select>
  </label>';
}


?>