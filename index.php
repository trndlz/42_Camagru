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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="top-container">
	  <h1>PASSION.<br>DENDROPHILE.</h1>
	</div>

	<div class="header" id="stickyHeader">
		<ul class="navbar">
			<lu><img src="public/img/cam.svg" width="30px" class="h2_icos"></lu>
			<lu class="camagru_title">cama&hearts;<span class="gru">green</span></lu>
	  		<lu><img src="public/img/user.svg" width="30px" class="h2_icos"></lu>
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
