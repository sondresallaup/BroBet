<?php
class System{
	private $system_id;
	private $system_name;

	public function constructWithId($system_id){
		$this->system_id = $system_id;
		$constructQuery = mysql_query("SELECT * FROM BroBet_system WHERE system_id = '$system_id'");
		while ($constructRow = mysql_fetch_assoc($constructQuery)){
			$this->system_name = $constructRow['system_name'];
		}
	}

	public function setSystemName($system_name){
		$this->system_name = $system_name;
	}

	public function getSystemName(){
		return $this->system_name;
	}

	public function getSystemId(){
		return $this->system_id;
	}

	public function saveInDB(){
		mysql_query("INSERT INTO BroBet_system VALUES ('', '$this->system_name')");
	}

	public function getLastRound(){
		$round = null;
		$lastRoundQuery = mysql_query("SELECT round_id FROM BroBet_round WHERE system_id = '$this->system_id' ORDER BY round_id DESC LIMIT 1");
		while($lastRoundRow = mysql_fetch_assoc($lastRoundQuery)){
			$round = $lastRoundRow['round_id'];
		}
		return $round;
	}

	public function printLatestBetRound(){
		$round_id = $this->getLastRound();
		echo '<ul class="list">';
		$i = 1;
		$matchesQuery = mysql_query("SELECT * FROM BroBet_Match WHERE round_id = '$round_id'");
		while($matchesRow = mysql_fetch_assoc($matchesQuery)){
			$homeTeam = new Team($matchesRow['home_team']);
			$awayTeam = new Team($matchesRow['away_team']);
			echo '<li class="item item-toggle">'. $i .'. ' . $homeTeam->getShortName() . ' - ' . $awayTeam->getShortName();
			echo '<label class="toggle toggle-dark">
			       <input type="checkbox">
			       <div class="track">
			         <div class="handle"></div>
			       </div>
			     </label>
			  </li>';
			  $i++;
		}

		echo '</ul>';
	}

	public function getSystemLogo(){
		echo '<img height="50" src="media/pics/systemlogos/'. $this->system_id .'.jpg">';
	}
}



?>