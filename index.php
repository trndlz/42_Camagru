<?php
	require_once('model/PhotosManager.php');
	require_once('view/viewPhotos.php');

	$db = new photosManager();
	$photos = $db->getPhotos();
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<title>Camagru</title>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Quicksand:400,700');
	</style>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
	<div class="top-container">
	  <h1>PASSION.<br>DENDROPHILE.</h1>
	</div>

	<div class="header" id="stickyHeader">
		<ul class="navbar">
			<i class="fas fa-camera-retro"></i>
			<i class="camagru_title">&hearts;<span class="gru"></span></i>
			<i class="far fa-user-circle"></i>
		</ul>
	</div>
	<div class="content">
	  <?php displayPhotos($photos); ?>
  </div>
  <div class="footer">
		Copyright 2018. VBNTMLP.
	</div>
	<script src="public/js/sticky_header.js"></script>
</body>
</html>
