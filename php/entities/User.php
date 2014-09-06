<?php
class User{
	private $user_id;
	private $name;
	private $username;
	private $date_created;
	private $password;
	private $role;

	public function constructWithUserId($user_id){
		$this->user_id = $user_id;
		$constructQueryOfUsers = mysql_query("SELECT * FROM BroBet_users WHERE user_id = '$user_id'");
		while($constructRowOfUsers = mysql_fetch_array($constructQueryOfUsers)){
			$this->name = $constructRowOfUsers['name'];
			$this->username = $constructRowOfUsers['username'];
			$this->date_created = $constructRowOfUsers['date_created'];
			$this->password = $constructRowOfUsers['password'];
			$this->role = $constructRowOfUsers['role'];
		}
	}

	public function constructWithUsername($username){
		$this->username = $username;
		$constructQueryOfUsers = mysql_query("SELECT * FROM BroBet_users WHERE username = '$username'");
		while($constructRowOfUsers = mysql_fetch_array($constructQueryOfUsers)){
			$this->user_id = $constructRowOfUsers['user_id'];
			$this->name = $constructRowOfUsers['name'];
			$this->date_created = $constructRowOfUsers['date_created'];
			$this->password = $constructRowOfUsers['password'];
			$this->role = $constructRowOfUsers['role'];
		}
	}

	public function getFriends(){
		$friendsQuery = mysql_query("SELECT * FROM BroBet_friends WHERE user1 = '$this->user_id' OR user2 = '$this->user_id'");
		$friends = array();
		$i = 0;
		while ($friendsSQLRow = mysql_fetch_assoc($friendsQuery)){
			if($friendsSQLRow['user1'] != $this->user_id){
				$friends[$i] = $friendsSQLRow['user1'];
			}
			else{
				$friends[$i] = $friendsSQLRow['user2'];
			}
			$i++;
		}
		return $friends;
	}

	public function getGroups(){
		$groupsQuery = mysql_query("SELECT group_id FROM BroBet_groupMembership WHERE user_id = '$this->user_id'");
		$groups = array();
		$i = 0;
		while($groupsRow = mysql_fetch_assoc($groupsQuery)){
			$groups[$i] = $groupsRow['group_id'];
			$i++;
		}

		return $groups;
	}

	public function login(){
		$_SESSION['logged_in_user'] = $this->user_id;
	}

	public function isCorrectPassword($password){
		include '../functions/passwordfunctions.php';
		return $this->password == cryptPassword($password);
	}

	public function isUserExcisting(){
		return $this->name != null;
	}	

	public function getUser_id(){
		return $this->user_id;
	}

	public function getName(){
		return $this->name;
	}

	public function getUsername(){
		return $this->username;
	}
	public function getDate_created(){
		return $this->date_created;
	}
	public function getPassword(){
		return $this->password;
	}
	public function getRole(){
		return $this->role;
	}

	public function isAdmin(){
		return $this->role == "ADMIN";
	}

	public function setName($name){
		$this->name = $name;
	}

	public function setUsername($username){
		$this->username = $username;
	}

	public function setPassword($password){
		$this->password = crypt($password);
	}

	public function saveInDB(){
		mysql_query("INSERT INTO BroBet_users VALUES('','$this->name', '$this->username', '$this->date_created', '$this->password', 'BASIC')");
	}
}




?>