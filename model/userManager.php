<?php

require_once('config/database.php');

class userManager extends dbConfig {

	public function newUser($fullname, $mail, $login, $password1) {
		$db = parent::dbConnect();
		$statement = $db->prepare("INSERT INTO users(fullname, mail, login, password, active, code) VALUES(?, ?, ?, ?, ?, ?)");
		$code = substr(md5(mt_rand()), 0, 15);
		$statement->execute(array($fullname, $mail, $login, $password1, '0', $code));
		$this->sendConfEmail($fullname, $mail, $code);
	}

	public function checkVerifCode($email, $code) {
		$db = parent::dbConnect();
		$stmt = $db->prepare("SELECT code FROM users WHERE mail = ? AND code = ?");
		$stmt->execute(array($email, $code));
		$db_code = $stmt->fetchColumn();
		if ($db_code) {
			$sql = "UPDATE users SET active = 1 WHERE mail = ? AND code = ?";
			$db->prepare($sql)->execute(array($email, $code));
			return (1);
		}
		return (0);
	}

	public function loginUser($login, $password) {
		$db = parent::dbConnect();
		$stmt = $db->prepare("SELECT user_id FROM users WHERE login = ? AND password = ?");
		$stmt->execute(array($login, $password));
		$id_u = $stmt->fetchColumn();
		if ($id_u) {
			return ($id_u);
		}
		return (0);
	}

	public function sendConfEmail($fullname, $email, $code) {
		$subject = 'Welcome to Camagreen !';
		$message = '
		<html>
			<head></head>
			<body>
				<p>Dear ' . $fullname . ', thanks for registering to Cama&hearts;green !</p>
				<p>To activate your account click on the following link : <a href="http://localhost:8080/camagru/index.php?action=activate&email=' . $email . '&code=' . $code .'">Here</a></p>
			</body>
		</html>';
		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1';
		mail($email, $subject, $message, implode("\r\n", $headers));
	}
}

?>