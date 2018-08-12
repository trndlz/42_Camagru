<?php
	require_once('controller/controller.php');
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
	  <h1 id="header_text">PASSION.<br>DENDROPHILE.</h1>
	</div>

	<div class="header" id="stickyHeader">
		<ul class="navbar">
			<a href="index.php?action=add"><i class="fas fa-camera-retro"></i></a>
			<i class="camagru_title">&hearts;<span class="gru"></span></i>
			<i class="far fa-user-circle"></i>
		</ul>
	</div>
	<div class="content">
	  <?php $controller = new Controller();
	  $controller->loadModel(); ?>
  </div>
  <div class="footer">
		Copyright 2018. VBNTMLP.
	</div>
	<script src="public/js/sticky_header.js"></script>
	<script src="public/js/webcam.js"></script>
</body>
</html>
