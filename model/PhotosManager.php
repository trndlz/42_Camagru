<?php

date_default_timezone_set("Europe/Paris");

require_once('config/database.php');

class photosManager extends dbConfig {

	public function getAllPhotos() {
		$db = parent::dbConnect();
		$rows = $db->query('SELECT photos.photo_id, photos.link, photos.date, users.login FROM photos INNER JOIN users ON photos.user_id = users.user_id ORDER BY photos.date DESC LIMIT 20');
		$results = $rows->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	public function addPhoto($id_user, $file) {
		$db = parent::dbConnect();
		$statement = $db->prepare("INSERT INTO photos(user_id, link) VALUES(?, ?)");
		$statement->execute(array($id_user, $file));
	}

	public function isLiked($id_photo, $id_user) {
		$db = parent::dbConnect();
		$stmt = $db->prepare("SELECT id_like FROM likes WHERE id_photo = ? AND id_user = ?");
		$stmt->execute(array($id_photo, $id_user));
		$like = $stmt->fetchColumn();
		if ($like) {
			return (1);
		}
		return (0);
	}

	public function like($id_user, $id_photo) {
		$db = parent::dbConnect();
		$statement = $db->prepare("INSERT INTO likes(id_photo, id_user) VALUES(?, ?)");
		$statement->execute(array($id_user, $id_photo));
	}
}
