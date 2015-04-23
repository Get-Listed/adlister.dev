<<<<<<< HEAD
<!DOCTYPE HTML>
<?php 
require '../bootstrap.php';
require '../db_connect.php'; 
 ?>
<html>
	<head>
		<title>Get Listed</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

	<link rel="stylesheet" href="css/style.css" />
	</head>
	<body class="landing">

		<!-- Page Wrapper -->
			<div id="page-wrapper">


				<!-- Banner -->
					<section id="banner">
						<div class="inner">
							<h2>Get Listed</h2>
							<p>Got a Listing?<br />
							Post it and we'll take care of the rest.<br />
							</p>
							<ul class="actions">

								<!-- Button trigger modal -->
								<li><a href="#" class="button special" data-toggle="modal" data-target="#signIn">Sign In</a></li>
								<li><a href="#" class="button special" data-toggle="modal" data-target="#signUp">Sign Up</a></li>
							</ul>
						</div>
						<a href="#one" class="more scrolly">How it works</a>
					</section>
					

					<?php include 'auth.login.php'; ?>

					<!-- Sign Up Modal -->
					<div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
					      </div>
					      <div class="modal-body">
					        ...
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					        <button type="button" class="btn btn-primary">Save changes</button>
					      </div>
					    </div>
					  </div>
					</div>
				<!-- One -->
					<section id="one" class="wrapper style1 special">
						<div class="inner">
							<header class="major">
								<h2>you post your listing<br />
								and it is displayed for the world to see </h2>
								<p>On the site you can add a post and we filter it based on the category that was selected by the people searching.</p>
							</header>
							<ul class="icons major">
								<li><span class="icon fa-diamond major style1"><span class="label">Lorem</span></span></li>
								<li><span class="icon fa-heart-o major style2"><span class="label">Ipsum</span></span></li>
								<li><span class="icon fa-code major style3"><span class="label">Dolor</span></span></li>
							</ul>
						</div>
					</section>



				<!-- Two -->
					<section id="three" class="wrapper style3 special">
						<div class="inner">
							<header class="major">
								<h2>what you will see on Get Listed</h2>
							</header>
							<ul class="features">
								<li class="fa fa-motorcycle">
									<h3>Automotive</h3>
									<p>There is many vehicles on in the listings that are waiting to be sold.</p>
								</li>
								<li class="icon fa-laptop">
									<h3>Technology</h3>
									<p>It's overwhelming the amount of electronics for sale on this site...seriously</p>
								</li>
								<li class="icon fa-code">
									<h3>Developers</h3>
									<p>Yes... another platform for developers to offer their services to those in need.</p>
								</li>
								<li class="icon fa-headphones">
									<h3>Music</h3>
									<p>Need to sell an intrument? Have a vinyl? Post it! Not suprisingly vinyl's tend to sell out very quickly...apparently hipsters really like Get Listed.</p>
								</li>
							</ul>
						</div>
					</section>

				<!-- CTA -->
					<section id="cta" class="wrapper style4">
						<div class="inner">
							<header>
								<h2>Arcue ut vel commodo</h2>
								<p>Aliquam ut ex ut augue consectetur interdum endrerit imperdiet amet eleifend fringilla.</p>
							</header>
							<ul class="actions vertical">
								<li><a href="#" class="button fit special">Activate</a></li>
								<li><a href="#" class="button fit">Learn More</a></li>
							</ul>
						</div>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
						</ul>
						<ul class="copyright">
							<li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->

			<script src="js/jquery.min.js"></script>
			<script src="js/jquery.scrollex.min.js"></script>
			<script src="js/jquery.scrolly.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/init.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</body>
</html>
=======
<?php

// 1 // Begin User session

session_start();

$sessionId = session_id();


var_dump($_POST);
var_dump($_GET);

// 2 // Requiring boostrap for necessary models

require '../bootstrap.php';
	

// 3 // Display all items from database

	
$showAds = Ad::all();

?>


<!-- // 4 //  Begin site HTML -->


<html>
<head>
	<title></title>
</head>
<body>


<!-- // 5 // Ad entry form -->


<?php include "../views/partials/post.index.php" ?>


<!-- // 6 // Add Display / Sort-->


<?php include "../views/partials/ads.index.php" ?>


</body>
</html>
>>>>>>> 4e59dcc0972b95044c20055e2d9ebd8b8beff524
