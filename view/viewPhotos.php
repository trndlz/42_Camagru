<?php

require_once('helpers/timeago.php');

$db = new photosManager();

if (isset($_GET['like']) && !empty($_GET['like']) && isset($_SESSION['user'])) {
	$db->like($_GET['like'], $_SESSION['user']);
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
						$like = $test->isLiked($line['photo_id'], $_SESSION['user']);
						if ($like == 1) {
							?>
							<a href='?like=<?=$line['photo_id'];?>' class='heart_icon'><i class='fas fa-heart'></i></a>
							<?php
						}
						else {
							?>
							<a href='?like=<?=$line['photo_id'];?>' class='heart_icon'><i class='far fa-heart'></i></a>
							<?php
						}
						?>
						<?php
					} else {
						?>
						<a href='#' class='heart_icon'><i class='far fa-heart'></i></a>
						<a href='#' class='comments_icon'><i class='far fa-comment-dots'></i></a>
						<?php
					}
				?>
			</div>
		</div>
		<p id='img_info'>Posted from <a href='#'><?= htmlspecialchars($line['login']) ?></a>
		<?= get_timeago(strtotime($line['date'])); ?></p>
	</div>
<?php
	}
}
?>