<?php

var_dump($_POST);
var_dump($_GET);

// 1 // PDO Constant definitions and required files...will move to bootstrap.php post-debug

define('DB_USER', 'codeup');
define('DB_NAME', 'get_listed_db');
define('DB_PASS', 'password');
define('DB_HOST', '127.0.0.1');

require '../db_connect.php';
require '../Input.php';


// 2 // Form entry query


$errors = [];
$fields = [];

if (!empty($_POST))
{

	try {
		$fields['price'] = Input::getString('adPrice');
	} catch (Exception $e) {
	    $errors[] = $e->getMessage();
	}
	
	try {
		$fields['location'] =  Input::getString('adLocation');
	} catch (Exception $e) {
	 $errors[] = $e->getMessage();
	}

	try {
		$fields['date'] = Input::getString('adDate');
	} catch (Exception $e) {
	 $errors[] = $e->getMessage();
	}

	try {
		$fields['category'] = Input::getString('adCategory');
	} catch (Exception $e) {
	 $errors[] = $e->getMessage();
	}

	try {
		$fields['duration'] = Input::getString('adDuration');
	} catch (Exception $e) {
	 $errors[] = $e->getMessage();
	}

	try {
		$fields['image'] = Input::getString('adImage');
	} catch (Exception $e) {
	 $errors[] = $e->getMessage();
	}

	try {
		$fields['contactInfo'] = Input::getString('adContactInfo');
	} catch (Exception $e) {
	 $errors[] = $e->getMessage();
	}

	try {
		$fields['description'] = Input::getString('adDescription');
	} catch (Exception $e) {
	 $errors[] = $e->getMessage();
	}
		

// var_dump($fields);
// var_dump($errors);

	if (empty($errors)) {
		$query2 = '
		INSERT INTO posts (price, location, date, category, duration, image, contactInfo, description)
		VALUES (:price, :location, :date, :category, :duration, :image, :contactInfo, :description)
		';
	
		$stmt = $dbc->prepare($query2);
	
		
		$stmt->bindValue(':price', $fields['price'], PDO::PARAM_STR);
		$stmt->bindValue(':location', $fields['location'], PDO::PARAM_STR);
		$stmt->bindValue(':date', $fields['date'], PDO::PARAM_STR);
		$stmt->bindValue(':category', $fields['category'], PDO::PARAM_STR);
		$stmt->bindValue(':duration', $fields['duration'], PDO::PARAM_STR);
		$stmt->bindValue(':image', $fields['image'], PDO::PARAM_STR);
		$stmt->bindValue(':contactInfo', $fields['contactInfo'], PDO::PARAM_STR);
		$stmt->bindValue(':description', $fields['description'], PDO::PARAM_STR);
	
		$stmt->execute();
	};

}

$query3 = "SELECT * FROM MyTable";

if ($_GET['sort'] == 'type')
{
    $query3 .= " ORDER BY type";
}
elseif ($_GET['sort'] == 'desc')
{
    $query3 .= " ORDER BY Description";
}
elseif ($_GET['sort'] == 'recorded')
{
    $query3 .= " ORDER BY DateRecorded";
}
elseif($_GET['sort'] == 'added')
{
    $query3 .= " ORDER BY DateAdded";
}
	
?>

<!-- // 3 //  Begin site HTML -->



<html>
<head>
	<title></title>
</head>
<body>

<!-- // 4 // Ad entry form -->

	<div id = "adEntry">
		<form action ="/index.php" method = POST>
			Price<br>
			<input type = 'text' name = 'adPrice'><br>
			Date<br>
			<input type = 'text' name = 'adDate'><br>
			Location<br>
			<input type = 'text' name = 'adLocation'><br>
			Category<br>
			<input type = 'text' name = 'adCategory'><br>
			Duration<br>
			<input type = 'text' name = 'adDuration'><br>
			Image<br>
			<input type = 'text' name = 'adImage'><br>
			Contact Info<br>
			<input type = 'text' name = 'adContactInfo'><br>
			Description<br>
			<input type = 'text' name = 'adDescription'><br>
			<input type= 'submit'>
		</form>
	</div>


<!-- // 5 // Add Display / Sort-->

	<div id = "display">
		<table>
			<thead>
				<th><a href="index.php?sort=Price">Price:</a></th>
				<th><a href="index.php?sort=Date">Date:</a></th>
				<th><a href="index.php?sort=Location">Location:</a></th>
				<th><a href="index.php?sort=Category">Category:</a></th>
			</thead>
	</table>
	</div>

</body>
</html>
