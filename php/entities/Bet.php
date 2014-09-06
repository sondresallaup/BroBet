<?php
class Bet{
	private $bet_id;
	private $user_id;
	private $match_id;
	private $bet;

	public function construct($bet_id){
		$this->bet_id = $bet_id;
		$constructQuery = mysql_query("SELECT * FROM BroBet_bet WHERE bet_id = '$bet_id'");
		while($constructRow = mysql_fetch_assoc($constructQuery)){
			$this->user_id = $constructRow['user_id'];
			$this->match_id = $constructRow['match_id'];
			$this->bet = $constructRow['bet'];
		}
	}

	public function getBetId(){
		return $this->bet_id;
	}

	public function getUser_id(){
		return $this->user_id;
	}

	public function getMatch_id(){
		return $this->match_id;
	}

	public function getBet(){
		return $this->bet;
	}

	public function setUser_id($user_id){
		$this->user_id = $user_id;
	}

	public function setMatch_id($match_id){
		$this->match_id = $match_id;
	}

	public function setBet($bet){
		$this->bet = $bet;
	}

	public function saveInDB(){
		mysql_query("INSERT INTO BroBet_bet VALUES ('', '$user_id', '$match_id', '$bet')");
	}
}

?>