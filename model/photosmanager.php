<?php

date_default_timezone_set("Europe/Paris");

require_once('config/database.php');

class photosManager extends dbConfig {

	public function getAllPhotos() {
		$db = parent::dbConnect();
		$rows = $db->query('SELECT photos.id_photo, photos.link, photos.date, users.login FROM photos INNER JOIN users ON photos.id_user = users.id_user ORDER BY photos.date DESC LIMIT 20');
		$results = $rows->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	public function getOnePhoto($id_photo) {
		$db = parent::dbConnect();
		$rows = $db->prepare('SELECT photos.id_photo, photos.link, photos.date, users.login FROM photos INNER JOIN users ON photos.id_user = users.id_user WHERE photos.id_photo = ? ORDER BY photos.date DESC LIMIT 20');
		$rows->execute(array($id_photo));
		$results = $rows->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	public function addPhoto($id_user, $file) {
		$db = parent::dbConnect();
		$statement = $db->prepare("INSERT INTO photos(id_user, link) VALUES(?, ?)");
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
		$statement = $db->prepare("INSERT INTO likes(id_user, id_photo) VALUES(?, ?)");
		$statement->execute(array($id_user, $id_photo));
	}

	public function dislike($id_user, $id_photo) {
		$db = parent::dbConnect();
		$statement = $db->prepare("DELETE FROM likes WHERE id_user = ? AND id_photo = ?");
		$statement->execute(array($id_user, $id_photo));
	}
}
