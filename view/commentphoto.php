<?php

require_once('helpers/timeago.php');
require('model/commentsmanager.php');
require('model/photosmanager.php');

$photo = new photosManager();
$comments = new commentsManager();

if (isset($_POST['message'])) {
	$id_comment = $comments->addComment($_GET['id'], $_SESSION['user'], $_POST['message']);
	$_SESSION['message'] = 'Comment successfully sent!';
	$_SESSION['message_type'] = 'success';
	$comments->sendCommentNotif($id_comment);
	header("Location: ?action=comment&id=".$_GET['id']);
}

$single_photo = $photo->getOnePhoto($_GET['id']);
$comment_data = $comments->getAllComments($_GET['id']);
displayComments($single_photo, $comment_data);

function displayComments($single_photo, $data) { ?>
	<div id="image_post_comment">
		<img src='<?= $single_photo[0]['link'];?>' class="img_comment">
		<p id='img_info'>Posted from <b><?= htmlspecialchars($single_photo[0]['login']) ?></b>
		<span class='com_date'><?=strtoupper(get_timeago(strtotime($single_photo[0]['date']))); ?> </span></p>
</div>
		<div class="comment_box">
			<?php
			foreach ($data as $ind_com) {
				echo "<p class='comment'><b>".htmlentities($ind_com['login'])." </b>";
				echo "<span class='com_date'>".strtoupper(get_timeago(strtotime($ind_com['date'])))." </span>";
				echo $ind_com['comment'] ."</p>";
			}
			?>
			
		<form action="" class="comment_form" method="post">
		<textarea class="textbox" rows="4" maxlength="250" name="message" placeholder="Type your comment here !" required></textarea>
		<input type="submit" class="textbox" value="Send">
		</form>
		</div>
		<?php
}
