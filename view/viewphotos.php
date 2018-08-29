<?php

require_once('helpers/timeago.php');
require('model/photosmanager.php');

$db = new photosManager();

if (isset($_GET['page']) && !empty($_GET['page'])) {
	$no_page = $_GET['page'];
} else {
	$no_page = 1;
}

$photos = $db->getAllPhotos($no_page);
if (isset($_GET['like']) && !empty($_GET['like']) && isset($_SESSION['user'])) {
	$db->like($_SESSION['user'], $_GET['like']);
}
if (isset($_GET['dislike']) && !empty($_GET['dislike']) && isset($_SESSION['user'])) {
	$db->dislike($_SESSION['user'], $_GET['dislike']);
}

$nb_pages = ceil($db->countNbPhotos() / 10);
displayPhotos($photos, $nb_pages, $no_page);

function displayPhotos($array, $nb_pages, $no_page) {
	foreach ($array as $line) {
?>
	<div id='image_post'>
		<div class='img_data'><img src=' <?= $line['link'] ?> ' class='pic'>
				<?php
					if (isset($_SESSION['user'])) {
						$test = new photosManager();
						$like = $test->isLiked($line['id_photo'], $_SESSION['user']);
						if ($like == 1)
							echo "<a href='?dislike=".$line['id_photo']."' class='heart_icon liked'><i class='fas fa-heart'></i></a>";
						else
							echo "<a href='?like=".$line['id_photo']."' class='heart_icon'><i class='far fa-heart'></i></a>";
						echo "<a href='?action=comment&id=".$line['id_photo']."' class='comments_icon'><i class='far fa-comment-dots'></i> ".$line['nb_comment']."</a>";
					} else {
						?>
						<a href='?action=login' class='heart_icon'><i class='far fa-heart'></i></a>
						<a href='?action=login' class='comments_icon'><i class='far fa-comment-dots'></i></a>
						<?php
					}
				?>
		</div>
		<p id='img_info'>Posted from <b><?= htmlspecialchars($line['login']) ?></b>
		<span class='com_date'><?=strtoupper(get_timeago(strtotime($line['date']))); ?> </span></p>
	</div>
	<?php
	}
	echo "<p class='pagination'>";
	if ($nb_pages <= 5) {
		$i = 0;
		while (++$i <= $nb_pages) {
			if ($i == $no_page) 
				echo "<a href='?page=".$i."' class='pagination_item current_page'>".$i."</a>";
			else
				echo "<a href='?page=".$i."' class='pagination_item'>".$i."</a>";
		}
	} else {
		$i = ($no_page - 2 < 1 ) ? 1 : $_GET['page'] - 2;
		$max = ($no_page + 2 >= $nb_pages) ? $nb_pages - 1 : $no_page + 2;
		while ($i <= $max) {
			if ($i == $no_page) 
				echo "<a href='?page=".$i."' class='pagination_item current_page'>".$i."</a>";
			else
				echo "<a href='?page=".$i."' class='pagination_item'>".$i."</a>";
			$i++;
		}
		if ($i != $nb_pages) {
			echo " <span class='pagination_points'>...</span> ";
		}
		if ($i == $no_page) 
			echo "<a href='?page=".$nb_pages."' class='pagination_item current_page'>".$nb_pages."</a>";
		else
			echo "<a href='?page=".$nb_pages."' class='pagination_item'>".$nb_pages."</a>";
	}
	echo "</p>";
}
?>
