<?php 
require '../bootstrap.php';

$showAds = Ad::all();
 ?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Ad's</title>
		<meta name="viewport" content="width=1200,user-scalable=no" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/ad-jquery.min.js"></script>
		<script src="js/ad-jquery.poptrox.min.js"></script>
		<script src="js/ad-skel.min.js"></script>
		<script src="js/ad-init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/ad-skel.css" />
			<link rel="stylesheet" href="css/ad-style.css" />
			<link rel="stylesheet" href="css/ad-style-desktop.css" />
			<link rel="stylesheet" href="css/ad-style-noscript.css" />
		</noscript>
	</head>
	<body>

		<div id="wrapper">

			<div id="main">
				<div id="reel">

					<!-- Header Item -->

						<div id="header" class="item" data-width="400">
							<div class="inner">
								<h1>Get Listed</h1>
								<p>Please list through the ad's<br />
								if you see something you like click on the link.</p>
							</div>
						</div>

				<? foreach($showAds as $ad): ?>
					<article class="item thumb" data-width="348">
					 <p>Item: </p><h2><?= htmlspecialchars(strip_tags($ad['item'])); ?></h2>
					 <a href="<?= htmlspecialchars(strip_tags($ad['image'])); ?>"><img src="<?= htmlspecialchars(strip_tags($ad['image'])); ?>" alt=""></a>
					 <ul>
					 	 <li><p>,</p></li>
						 <li><p>price: </p><p><?= "$".htmlspecialchars(strip_tags($ad['price'])); ?></p></li>
						 <li><p>Date Listed: </p><p><?= htmlspecialchars(strip_tags($ad['date'])); ?></p>, </li>
						 <li><p>Location: </p><p><?= htmlspecialchars(strip_tags($ad['location'])); ?></p>, </li>
						 <li><p>Category: </p><p><?= htmlspecialchars(strip_tags($ad['category'])); ?></p>, </li>
						 <li><p>Duration: </p><p><?= htmlspecialchars(strip_tags($ad['duration'])); ?> </p>, </li>
						 <li><p>Contact Info: </p><p><?= htmlspecialchars(strip_tags($ad['contactInfo'])); ?></p>, </li>
						 <li><p>Description: </p><p><?= htmlspecialchars(strip_tags($ad['description'])); ?></p></li>
					 </ul>
					</article>
				<?endforeach; ?>

					<!-- Filler Thumb Items (just for demonstration purposes) -->
						<article class="item thumb" data-width="476"><h2>Turkey</h2><a href="images/fulls/05.jpg"><img src="images/thumbs/05.jpg" alt=""></a></article>
						<article class="item thumb" data-width="232"><h2>Chicken</h2><a href="images/fulls/06.jpg"><img src="images/thumbs/06.jpg" alt=""></a></article>
						<article class="item thumb" data-width="352"><h2>Ping Pong</h2><a href="images/fulls/07.jpg"><img src="images/thumbs/07.jpg" alt=""></a></article>
						<article class="item thumb" data-width="348"><h2>Foosball</h2><a href="images/fulls/08.jpg"><img src="images/thumbs/08.jpg" alt=""></a></article>
						<article class="item thumb" data-width="282"><h2>Vinyl</h2><a href="images/fulls/01.jpg"><img src="images/thumbs/01.jpg" alt=""></a></article>
						<article class="item thumb" data-width="384"><h2>Star War Action Figure</h2><a href="images/fulls/02.jpg"><img src="images/thumbs/02.jpg" alt=""></a></article>
						<article class="item thumb" data-width="274"><h2>Anaconda</h2><a href="images/fulls/03.jpg"><img src="images/thumbs/03.jpg" alt=""></a></article>
						<article class="item thumb" data-width="282"><h2>Fish</h2><a href="images/fulls/04.jpg"><img src="images/thumbs/04.jpg" alt=""></a></article>

				</div>
			</div>

			<div id="footer">
				<div class="left">lorem ipsum dolor</a>.lorem ipsum<br />
					dolor.</p>
				</div>
				<div class="right">
<!-- 					<ul class="contact">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
						<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
					</ul> -->
					<ul class="copyright">
						<li>&copy; Max the Monkey and J.D. Design and Development 2015</li><li></a></li>
					</ul>
				</div>
			</div>

		</div>

	</body>
</html>