<?php
class Group{
	private $group_id;
	private $group_name;
	private $system;
	private $admin;
	private $date_created;

	public function constructWithId($group_id){
		$this->group_id = $group_id;
		$constructQueryOfGroups = mysql_query("SELECT * FROM BroBet_group WHERE group_id = '$group_id'");
		while($constructRowOfGroups = mysql_fetch_array($constructQueryOfGroups)){
			$this->group_name = $constructRowOfGroups['group_name'];
			$this->system = $constructRowOfGroups['system'];
			$this->admin = $constructRowOfGroups['admin'];
			$this->date_created = $constructRowOfGroups['date_created'];
		}
	}

	public function constructWithName($group_name){
		$this->group_name = $group_name;
	}

	public function getGroup_id(){
		return $this->group_id;
	}

	public function getGroup_name(){
		return $this->group_name;
	}

	public function getSystem(){
		return $this->system;
	}

	public function getAdmin(){
		return $this->admin;
	}

	public function getDate_created(){
		return $this->date_created;
	}

	public function setGroup_name($group_name){
		$this->group_name = $group_name;
	}

	public function setSystem($system){
		$this->system = $system;
	}

	public function setAdmin($admin){
		$this->admin = $admin;
	}

	public function setDate_created($date_created){
		$this->date_created = $date_created;
	}

	public function hasAccess($user_id){
		//TODO
	}

	public function saveInDB(){
		mysql_query("INSERT INTO BroBet_group VALUES('','$this->group_name', '$this->system', '$this->admin', '$this->date_created')");
		$group_id_query = mysql_query("SELECT MAX(group_id) FROM BroBet_group");
		$group_id = mysql_fetch_array($group_id_query);
		$user_id = getLoggedInUser()->getUser_id();
		mysql_query("INSERT INTO BroBet_groupMembership VALUES('$group_id[0]', '$user_id', '')");
	}
}




?>