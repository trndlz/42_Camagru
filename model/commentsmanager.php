<?php

date_default_timezone_set("Europe/Paris");

require_once('config/database.php');

class commentsManager extends dbConfig {

	public function getAllComments($id_photo) {
		$db = parent::dbConnect();
		$rows = $db->prepare('SELECT users.login, comments.id_user, comments.date, comments.comment
								FROM comments
								INNER JOIN users ON comments.id_user = users.id_user
								WHERE comments.id_photo = ?
								ORDER BY comments.date ASC');
		$rows->execute(array($id_photo));
		$results = $rows->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	public function addComment($id_photo, $id_user, $comment) {
		$db = parent::dbConnect();
		$comment = htmlentities($comment);
		$statement = $db->prepare("INSERT INTO comments(id_photo, id_user, comment) VALUES(?, ?, ?)");
		$statement->execute(array($id_photo, $id_user, $comment));
		$id_comment = $db->lastInsertId();
		return $id_comment;
	}

	public function getCommentData($id_comment) {
		$db = parent::dbConnect();
		$rows = $db->prepare('SELECT comments.comment, comments.date, users.login, users.mail, users.notification
								FROM comments
								INNER JOIN users ON users.id_user = comments.id_user
								WHERE id_comment = ?
								LIMIT 1');
		$rows->execute(array($id_comment));
		$results = $rows->fetchAll(PDO::FETCH_ASSOC);
		if ($results[0]['notification'] == 0) {
			return (0);
		}
		return $results;
	}

	public function sendCommentNotif($id_comment) {
		$data = $this->getCommentData($id_comment);
		if ($data != 0) {
			$subject = 'Notification from Camagreen !';
			$message = '
			<html>
				<head></head>
				<body>
					<p>Someone commented your post !</p>
					<p><b>'.$data[0]['login'].'</b> : <i>"'.$data[0]['comment'].'"</i></p>
				</body>
			</html>';
			$headers[] = 'MIME-Version: 1.0';
			$headers[] = 'Content-type: text/html; charset=iso-8859-1';
			mail($data[0]['mail'], $subject, $message, implode("\r\n", $headers));
		}	
	}
}

?>
