<?php

var_dump($_POST);
var_dump($_GET);

// 1 // Requiring boostrap for necessary models

require '../bootstrap.php';
	

// 2 // Display all items from database

	
// $showAds = Ad::all();

?>


<!-- // 3 //  Begin site HTML -->


<html>
<head>
	<title></title>
</head>
<body>

<h2>hello world!</h2>
<!-- // 4 // Ad entry form -->


<?php include "../views/partials/post.index.php" ?>


<!-- // 5 // Add Display / Sort-->


<?php include "ads.index.php" ?>


</body>
</html>
