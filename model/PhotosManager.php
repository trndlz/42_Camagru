<?php

date_default_timezone_set("Europe/Paris");

require_once('config/database.php');

class photosManager extends dbConfig {

	public function getPhotos() {
		$db = parent::dbConnect();
		$rows = $db->query('SELECT photos.link, photos.date, users.login FROM photos INNER JOIN users ON photos.user_id = users.user_id ORDER BY photos.date DESC');
		$results = $rows->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	public function addPhoto($id_user, $file) {
		$db = parent::dbConnect();
		$statement = $db->prepare("INSERT INTO photos(user_id, link) VALUES(?, ?)");
		$statement->execute(array($id_user, $file));
	}
}
