<?php
	require_once('config/database.php');

	// $controller = DEFAULT_CONTROLLER;
  	// $action = DEFAULT_ACTION;
  	// $parameter = null;

  	if (isset($_GET['controller']) && isset($_GET['action']))
  	{
		$controller = strtolower($_GET['controller']);
    	$action = strtolower($_GET['action']);
	}
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
	<?php echo "<p>salut</p>"; print_r($_GET); ?>
	<div class="content">
	  <div id="image_post">
		  <p class="img_data"><img src="public/img/posts/chene.jpg"</p>
		  <p class="img_info">Posted from <a href="#">User 1</a> &hearts; - Comment - Share - Love</p>
	  </div>
	  <div id="image_post">
		  <p class="img_data"><img src="public/img/posts/bouleau.jpg"</p>
		  <p class="img_info">Posted from <a href="#">User 1</a> &hearts; - Comment - Share - Love</p>
	  </div>
	  <div id="image_post">
		  <p class="img_data"><img src="public/img/posts/sapin.jpg"</p>
		  <p class="img_info">Posted from <a href="#">User 1</a> &hearts; - Comment - Share - Love</p>
	  </div>
	  <div id="image_post">
		  <p class="img_data"><img src="public/img/posts/chene.jpg"</p>
		  <p class="img_info">Posted from <a href="#">User 1</a> &hearts; - Comment - Share - Love</p>
	  </div>
	  <div id="image_post">
		  <p class="img_data"><img src="public/img/posts/bouleau.jpg"</p>
		  <p class="img_info">Posted from <a href="#">User 1</a> &hearts; - Comment - Share - Love</p>
	  </div>
	  <div id="image_post">
		  <p class="img_data"><img src="public/img/posts/sapin.jpg"</p>
		  <p class="img_info">Posted from <a href="#">User 1</a> &hearts; - Comment - Share - Love</p>
	  </div>
  </div>
  <div class="footer">
		Copyright 2018. VBNTMLP.
	</div>
	<script src="public/js/sticky_header.js"></script>
</body>
</html>
