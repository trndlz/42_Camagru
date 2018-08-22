<?php

require_once('config/database.php');

class userManager extends dbConfig {

	public function newUser($fullname, $mail, $login, $password1) {
		$db = parent::dbConnect();
		$statement = $db->prepare("INSERT INTO users(fullname, mail, login, password, active, code) VALUES(?, ?, ?, ?, ?, ?)");
		$code = substr(md5(mt_rand()), 0, 15);
		$statement->execute(array($fullname, $mail, $login, $password1, '0', $code));
		$this->sendConfEmail($fullname, $mail, $code, $login);
	}

	public function checkVerifCode($login, $code) {
		$db = parent::dbConnect();
		$stmt = $db->prepare("SELECT code FROM users WHERE login = ? AND code = ?");
		$stmt->execute(array($login, $code));
		$db_code = $stmt->fetchColumn();
		if ($db_code) {
			$sql = "UPDATE users SET active = 1 WHERE login = ? AND code = ?";
			$db->prepare($sql)->execute(array($login, $code));
			return (1);
		}
		return (0);
	}

	public function updateEmail($new_email, $id_user) {
		$db = parent::dbConnect();
		$sql = "UPDATE users SET mail = ? WHERE id_user = ?";
		$db->prepare($sql)->execute(array($new_email, $id_user));
	}

	public function updateLogin($new_login, $id_user) {
		$db = parent::dbConnect();
		$sql = "UPDATE users SET login = ? WHERE id_user = ?";
		$db->prepare($sql)->execute(array($new_login, $id_user));
	}

	public function updatePass($new_pass, $id_user) {
		$db = parent::dbConnect();
		$sql = "UPDATE users SET password = ? WHERE id_user = ?";
		$db->prepare($sql)->execute(array($new_pass, $id_user));
	}

	public function getUserData($id_user) {
		$db = parent::dbConnect();
		$stmt = $db->prepare("SELECT login, mail FROM users WHERE id_user = ?");
		$stmt->execute(array($id_user));
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return ($results);
	}

	public function loginExists($login) {
		$db = parent::dbConnect();
		$stmt = $db->prepare("SELECT id_user FROM users WHERE login = ?");
		$stmt->execute(array($login));
		$id_u = $stmt->fetchColumn();
		return ($id_u);
	}

	public function loginUser($login, $password) {
		$db = parent::dbConnect();
		$stmt = $db->prepare("SELECT id_user, active FROM users WHERE login = ? AND password = ?");
		$stmt->execute(array($login, $password));
		$id_u = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if ($id_u['0']['active'] == 0) {
			return (-1);
		}
		if ($id_u['0']['id_user']) {
			return ($id_u['0']['id_user']);
		}
		return (0);
	}

	public function loginUserId($id_user, $password) {
		$db = parent::dbConnect();
		$stmt = $db->prepare("SELECT id_user FROM users WHERE id_user = ? AND password = ?");
		$stmt->execute(array($id_user, $password));
		$id_u = $stmt->fetchColumn();
		if ($id_u) {
			return ($id_u);
		}
		return (0);
	}

	public function sendConfEmail($fullname, $email, $code, $login) {
		$subject = 'Welcome to Camagreen !';
		$message = '
		<html>
			<head></head>
			<body>
				<p>Dear ' . $fullname . ', thanks for registering to Cama&hearts;green !</p>
				<p>To activate your account click on the following link : <a href="http://localhost:8080/camagru/index.php?action=activate&login=' . $login . '&code=' . $code .'">Here</a></p>
			</body>
		</html>';
		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1';
		mail($email, $subject, $message, implode("\r\n", $headers));
	}
}

?>
