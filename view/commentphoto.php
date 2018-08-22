<?php

require_once('helpers/timeago.php');
require('model/commentsmanager.php');
require('model/photosmanager.php');

$photo = new photosManager();
$comments = new commentsManager();

if (isset($_POST['message'])) {
	$comments->addComment($_GET['id'], $_SESSION['user'], $_POST['message']);
	header("Location: ?action=comment&id=".$_GET['id']."&message=Comment successfully sent!&message_type=success");
}

$single_photo = $photo->getOnePhoto($_GET['id']);
$comment_data = $comments->getAllComments($_GET['id']);
displayComments($single_photo, $comment_data);

function displayComments($photo, $data) { ?>
		<img src='<?= $photo[0]['link'];?>' class="img_comment">
		<div class="comment_box">
			<?php
			foreach ($data as $ind_com) {
				echo "<p class='comment'><b>".$ind_com['login']." </b>";
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
