<?php

require_once('helpers/timeago.php');

function displayPhotos($array) {
	foreach ($array as $line) {
?>
	<div id='image_post'>
		<div class='img_data'><img src=" <?= $line['link'] ?> ">
			<div class="heart_layer">
	  			<a href="#" class="heart_icon">
		  			<i class="far fa-heart"></i>
	  			</a>
				<a href="#" class="comments_icon">
		  			<i class="far fa-comment-dots"></i>
	  			</a>
			</div>
		</div>
		<p id='img_info'>Posted from <a href='#'><?= htmlspecialchars($line['login']) ?></a>
		<?= get_timeago(strtotime($line['date'])); ?></p>
	</div>
<?php
	}
}
?>
