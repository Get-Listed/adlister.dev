<?php
define('DB_USER', 'parks_user');
define('DB_NAME', 'get_listed_db');
define('DB_PASS', 'tokyo3');
define('DB_HOST', '127.0.0.1');

require '../db_connect.php';

$dbc->exec('TRUNCATE posts');

$query = '
		INSERT INTO posts (item, price, category, location, date, duration, image, contactInfo, description)
		VALUES (:item, :price, :category, :location, :date, :duration, :image, :contactInfo, :description)
		';

$values = [
	["item"=>'Car',         "price"=>'1000', "category"=>'Auto',          "location"=>'Texas',      "date"=>'1999-01-01', "duration"=>'1999-02-01', "image"=>'01.img', "contactInfo"=>'me1@email', "description"=>'Four wheels, one engine'],
	["item"=>'TV',          "price"=>'500',  "category"=>'Electronics',   "location"=>'Minnesota',  "date"=>'1999-02-02', "duration"=>'1999-03-02', "image"=>'02.img', "contactInfo"=>'me2@email', "description"=>'Liquid Crystals and a remote'],
	["item"=>'Pool Table',  "price"=>'700',  "category"=>'Recreation',    "location"=>'Alabama',    "date"=>'1999-03-03', "duration"=>'1999-04-03', "image"=>'03.img', "contactInfo"=>'me3@email', "description"=>'Felt and balls, no sticks'],
	["item"=>'Dish Washer', "price"=>'400',  "category"=>'Appliances',    "location"=>'Washington', "date"=>'1999-04-04', "duration"=>'1999-05-04', "image"=>'04.img', "contactInfo"=>'me4@email', "description"=>'Ivory white, touch display'],
	["item"=>'Guitar',      "price"=>'900',  "category"=>'Musical Items', "location"=>'Maryland',   "date"=>'1999-05-05', "duration"=>'1999-06-05', "image"=>'05.img', "contactInfo"=>'me5@email', "description"=>'New strings, no scratches']
	];
	
$stmt = $dbc->prepare($query);

foreach ($values as $value)
	{
		$stmt->bindValue(':item', $value['item'], PDO::PARAM_STR);
		$stmt->bindValue(':price', $value['price'], PDO::PARAM_STR);
		$stmt->bindValue(':category', $value['category'], PDO::PARAM_STR);
		$stmt->bindValue(':location', $value['location'], PDO::PARAM_STR);
		$stmt->bindValue(':date', $value['date'], PDO::PARAM_STR);
		$stmt->bindValue(':duration', $value['duration'], PDO::PARAM_STR);
		$stmt->bindValue(':image', $value['image'], PDO::PARAM_STR);
		$stmt->bindValue(':contactInfo', $value['contactInfo'], PDO::PARAM_STR);
		$stmt->bindValue(':description', $value['description'], PDO::PARAM_STR);


		$stmt->execute();
	}

?>