<?php
class Club{
	private $club_id;
	private $club_name;
	private $country;

	public __construct($club_id){
		$this->club_id = $club_id;
		$constructQuery = mysql_query("SELECT * FROM BroBet_clubs WHERE club_id = '$club_id");
		while($constructRow = mysql_fetch_assoc($constructQuery)){
			$this->club_name = $constructRow['club_name'];
			$this->country = $constructQuery['country'];
		}
	}

	public function getClub_id(){
		return $this->club_id;
	}

	public function getClub_name(){
		return $this->club_name;
	}

	public function getCountry(){
		return $this->country;
	}

	public function setClub_id(){
		$this->club_id = club_id;
	}

	public function setClub_name($club_name){
		$this->club_name = $club_name;
	}

	public function setCountry($country){
		$this->country = $country;
	}

	public function saveInDB(){
		mysql_query("INSERT INTO BroBet_clubs VALUES('$this->club_id', '$this->name', '$this->country')");
	}
}



?>