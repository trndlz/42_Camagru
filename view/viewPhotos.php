<?php

function displayPhotos($array) {
	foreach ($array as $line) {
		echo "<div id='image_post'>\n";
		echo "<p class='img_data'><img src=".$line['link']."></p>\n";
		echo "<p class='img_info'>Posted from <a href='#'>".$line['auteur']."\n";
		echo "</a> &hearts; - Comment - Share - Love</p>\n";
		echo "</div>\n";
	}
}
?>
