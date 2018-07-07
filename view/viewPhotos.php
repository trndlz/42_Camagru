<?php
require_once('helpers/timeago.php');

function displayPhotos($array) {
	foreach ($array as $line) {
?>
	<div id='image_post'>
		<div class='img_data'><img src=" <?= $line['link'] ?> ">
			<div class="heart_layer">
	  			<a href="#" class="heart_icon">
		  			<i class="fa fa-heart"></i>
	  			</a>
			</div>
		</div>
		<p class='img_info'>Posted from <a href='#'><?= htmlspecialchars($line['auteur']) ?></a>
		<?= get_timeago(strtotime($line['date'])); ?></p>

		<p>&hearts; - Comment - Share - Love</p>
	</div>
<?php
	}
}
?>
