<?php

date_default_timezone_set("Europe/Paris");

require_once('config/database.php');

class commentsManager extends dbConfig {

	public function getAllComments($id_photo) {
		$db = parent::dbConnect();
		$rows = $db->prepare('SELECT users.login, comments.id_user, comments.date, comments.comment FROM comments INNER JOIN users ON comments.id_user = users.id_user WHERE comments.id_photo = ? ORDER BY comments.date ASC LIMIT 20');
		$rows->execute(array($id_photo));
		$results = $rows->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	public function addComment($id_photo, $id_user, $comment) {
		$db = parent::dbConnect();
		$comment = htmlentities($comment);
		$statement = $db->prepare("INSERT INTO comments(id_photo, id_user, comment) VALUES(?, ?, ?)");
		$statement->execute(array($id_photo, $id_user, $comment));
	}
}

?>
