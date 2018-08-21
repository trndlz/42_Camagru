<?php

require_once('helpers/timeago.php');
require('model/commentsmanager.php');
require('model/photosmanager.php');

$photo = new photosManager();
$comments = new commentsManager();

$single_photo = $photo->getOnePhoto($_GET['id']);
$comment_data = $comments->getAllComments($_GET['id']);
displayComments($single_photo, $comment_data);

if (isset($_POST['message'])) {
	$comments->addComment($_GET['id'], $_SESSION['user'], $_POST['message']);
}

function displayComments($photo, $data) {
		print_r($photo);
		print_r($data);
		?>
		<img src=' <?= $photo[0]['link'] ?> '>
		<form action="" method="post">
		<textarea rows="4" cols="50" name="message"></textarea>
		<input type="submit" value="Send">
		<?php
}
