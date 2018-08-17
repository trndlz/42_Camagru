<?php

require_once('config/database.php');

class userManager extends dbConfig {

	public function newUser($fullname, $email, $login, $password, $code) {
		$db = parent::dbConnect();
		$statement = $db->prepare("INSERT INTO users(fullname, mail) VALUES(?, ?)");
		$statement->execute(array($fullname, $email));
		$statement->errorCode();
	}
}
