<?php
class Round{
	private $round_id;
	private $system_id;
	private $time_open;
	private $time_closed;

	public function construct($round_id){
		$this->round_id = $round_id;
		$constructQuery = mysql_query("SELECT * FROM BroBet_round WHERE round_id = '$round_id'");
		while($constructRow = mysql_fetch_assoc($constructQuery)){
			$this->system_id = $constructRow['system_id'];
			$this->time_open = $constructRow['time_open'];
			$this->time_closed = $constructRow['time_closed'];
		}
	}

	public function getRoundId(){
		return $this->round_id;
	}

	public function getSystemId(){
		return $this->system_id;
	}

	public function getTimeOpen(){
		return $this->time_open;
	}

	public function getTimeClosed(){
		return $this->time_closed;
	}

	public function setSystemId($system_id){
		$this->system_id = $system_id;
	}

	public function setTimeOpen($time_open){
		$this->time_open = $time_open;
	}

	public function setTimeClosed($time_closed){
		$this->time_closed = $time_closed;
	}

	public function saveInDB(){
		mysql_query("INSERT INTO BroBet_round VALUES ('', '$this->system_id', '$this->time_open', '$this->time_closed')");
	}


}


?>