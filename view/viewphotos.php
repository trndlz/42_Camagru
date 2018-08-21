<?php

require_once('helpers/timeago.php');

$db = new photosManager();

if (isset($_GET['like']) && !empty($_GET['like']) && isset($_SESSION['user'])) {
	$db->like($_SESSION['user'], $_GET['like']);
}

if (isset($_GET['dislike']) && !empty($_GET['dislike']) && isset($_SESSION['user'])) {
	$db->dislike($_SESSION['user'], $_GET['dislike']);
}

function displayPhotos($array) {
	foreach ($array as $line) {
?>
	<div id='image_post'>
		<div class='img_data'><img src=' <?= $line['link'] ?> '>
			<div class='heart_layer'>
				<?php
					if (isset($_SESSION['user'])) {
						$test = new photosManager();
						$like = $test->isLiked($line['id_photo'], $_SESSION['user']);
						if ($like == 1)
							echo "<a href='?dislike=".$line['id_photo']."' class='heart_icon liked'><i class='fas fa-heart'></i></a>";
						else
							echo "<a href='?like=".$line['id_photo']."' class='heart_icon'><i class='far fa-heart'></i></a>";
						echo "<a href='?action=comment&id=".$line['id_photo']."' class='comments_icon'><i class='far fa-comment-dots'></i></a>";
					} else {
						?>
						<a href='?action=login' class='heart_icon'><i class='far fa-heart'></i></a>
						<a href='?action=login' class='comments_icon'><i class='far fa-comment-dots'></i></a>
						<?php
					}
				?>
			</div>
		</div>
		<p id='img_info'>Posted from <b><?= htmlspecialchars($line['login']) ?></b>
		<?= get_timeago(strtotime($line['date'])); ?></p>
	</div>
<?php
	}
}
?>
