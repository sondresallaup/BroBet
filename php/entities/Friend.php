<?php
class Friend{
	private $user1;
	private $user2;
	private $date_created;

	public function __construct($user1, $user2){
		$constructQueryOfFriends = mysql_query("SELECT * FROM BroBet_friends WHERE user1 = '$user1' AND user2 = '$user2'");
		if(mysql_num_rows($constructQueryOfFriends) === 0){
			$constructQueryOfFriends = mysql_query("SELECT * FROM BroBet_friends WHERE user1 = '$user2' AND user2 = '$user1'");
		}
		if(mysql_num_rows($constructQueryOfFriends) != 0){
		while($constructRowOfFriends = mysql_fetch_array($constructQueryOfFriends)){
			$this->user1 = $constructRowOfFriends['user1'];
			$this->user2 = $constructRowOfFriends['user2'];
			$this->date_created = $constructRowOfFriends['date_created'];
		}
	}
		else{
			$this->user1 = $user1;
			$this->user2 = $user2;
		}

	}
	

	public function isExcisting(){
		return $this->user1 != null;
	}	

	public function saveInDB(){
		mysql_query("INSERT INTO BroBet_friends VALUES('$this->user1','$this->user2', '')");
	}
}




?>