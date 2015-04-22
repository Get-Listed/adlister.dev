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


<?php include 'post.index.php' ?>


<!-- // 6 // Add Display / Sort-->


<?php include 'ads.index.php' ?>


</body>
</html>
