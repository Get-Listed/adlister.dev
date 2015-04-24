
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


					<?php include '../views/partials/header.php'; ?>

					<?php include 'auth.login.php'; ?>

					<?php include 'users.create.php' ?>

					<?php include '../views/partials/navbar.php'; ?>

					<?php include '../views/partials/footer.php'; ?>

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

