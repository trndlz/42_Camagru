<?php

require_once('config/database.php');

class photosManager extends dbConfig {

	public function getPhotos() {
		$db = parent::dbConnect();
		$rows = $db->query('SELECT * FROM photos');
		$results = $rows->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}
}
