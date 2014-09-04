<?php
	function cryptPassword($password){
		return md5($password);
	}

	function isPasswordGood($password){
		return TRUE;
	}

	function isRepeatPasswordTheSameAsPassword($password, $repeatPassword){
		return $password == $repeatPassword;
	}

?>