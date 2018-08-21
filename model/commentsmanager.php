<?php

date_default_timezone_set("Europe/Paris");

require_once('config/database.php');

class commentsManager extends dbConfig {

	public function getAllComments($id_photo) {
		$db = parent::dbConnect();
		$rows = $db->query('SELECT users.login, comments.date, comments.comment FROM comments INNER JOIN users ON comments.id_user = users.id_user ORDER BY comments.date DESC LIMIT 20');
		$results = $rows->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	public function addComment($id_photo, $id_user, $comment) {
		$db = parent::dbConnect();
		$statement = $db->prepare("INSERT INTO comments(id_photo, id_user, comment) VALUES(?, ?, ?)");
		$statement->execute(array($id_photo, $id_user, $comment));
	}
}

?>
