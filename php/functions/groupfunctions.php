<?php
function printGroupMembers($group){
	$groupMembers = $group->getGroupMembers();
	echo '<ul class="list">';
	for($i = 0; $i < sizeof($groupMembers); $i++){
		$groupMember = new User();
		$groupMember->constructWithUserId($groupMembers[$i]);
		echo '<a class="item" href="#?id='. $groupMember->getUser_id() .'">' . $groupMember->getName() . '</a>';
	}
	echo '</ul>';
}


?>