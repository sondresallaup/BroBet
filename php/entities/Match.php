<?php
class Match{
	private $match_id;
	private $home_team;
	private $away_team;
	private $h_odds;
	private $x_odds;
	private $a_odds;
	private $round_id;
	private $time;

	public function construct($match_id){
		$this->match_id = $match_id;
		$constructQuery = mysql_query("SELECT * FROM BroBet_Match WHERE match_id = '$this->match_id'");
		while($constructRow = mysql_fetch_assoc($constructQuery)){
			$this->home_team = $constructRow['home_team'];
			$this->away_team = $constructRow['away_team'];
			$this->h_odds = $constructRow['h_odds'];
			$this->x_odds = $constructRow['x_odds'];
			$this->a_odds = $constructRow['a_odds'];
			$this->round_id = $constructRow['round_id'];
			$this->time = $constructRow['time'];
		}
	}

	public function getMatchId(){
		return $this->match_id;
	}

	public function getHomeTeam(){
		return $this->home_team;
	}

	public function getAwayTeam(){
		return $this->away_team;
	}

	public function getHOdds(){
		return $this->h_odds;
	}

	public function getXOdds(){
		return $this->x_odds;
	}

	public function getAOdds(){
		return $this->a_odds;
	}

	public function getRoundId(){
		return $this->round_id;
	}

	public function getTime(){
		return $this->time;
	}

	//setters
	public function setHomeTeam($home_team){
		$this->home_team = $home_team;
	}

	public function setAwayTeam($away_team){
		$this->away_team = $away_team;
	}

	public function setHOdds($h_odds){
		$this->h_odds = $h_odds;
	}

	public function setXOdds($x_odds){
		$this->x_odds = $x_odds;
	}

	public function setAOdds($a_odds){
		$this->a_odds = $a_odds;
	}

	public function setRoundId($round_id){
		$this->round_id = $round_id;
	}

	public function setTime($time){
		$this->time = $time;
	}

	public function saveInDB(){
		mysql_query("INSERT INTO BroBet_Match VALUES ('', '$this->home_team', '$this->away_team', '$this->h_odds', '$this->x_odds', '$this->a_odds', '$this->round_id', '$this->time')");
	}

}





?>