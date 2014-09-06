<?
class Team{
	private $team_id;
	private $full_name;
	private $short_name;
	private $initials;

	public function __construct($team_id){
		$this->team_id = $team_id;
		if($this->getFromDB() != FALSE){
			$teamQuery = mysql_query("SELECT * FROM BroBet_team WHERE team_id = '$this->team_id'");
			while($teamRow = mysql_fetch_assoc($teamQuery)){
				$this->full_name = $teamRow['full_name'];
				$this->short_name = $teamRow['short_name'];
				$this->initials = $teamRow['initials'];
			}
		}
	}

	public function getFromDB(){
		$savedQuery = mysql_query("SELECT * FROM BroBet_team WHERE team_id = '$this->team_id'");
		if(mysql_num_rows($savedQuery) != 0){
			return $savedQuery;
		}
		else{
			return FALSE;
		}
	}

	public function saveInDB(){
		mysql_query("INSERT INTO BroBet_team VALUES('$this->team_id', '$this->full_name', '$this->short_name', '$this->initals')");
	}

	public function getTeam_id(){
		return $this->team_id;
	}

	public function getFullName(){
		return $this->full_name;
	}

	public function getShortName(){
		return $this->short_name;
	}

	public function getInitials(){
		return $initals;
	}

	public function getTeamLogo(){
		echo '<img src="'. $team_id . '">';
	}

	public function setTeam_id($team_id){
		$this->team_id = $team_id;
	}

	public function setFullName($full_name){
		$this->full_name = $full_name;
	}

	public function setShortName($short_name){
		$this->short_name = $short_name;
	}

	public function setInitials($initials){
		$this->initals = $initials;
	}
}



?>