<?php

$_ENV = include '../.env.php';

require '../db_connect.php';

$dbc->exec('TRUNCATE posts');

//** Query and inserts for user table

$query = '
		INSERT INTO users (username, password, email)
		VALUES (:username, :password, :email)
		';

$values = [["username"=>'MyUser', "password"=>'password', "email"=>'me@email.com'],
		   ["username"=>'MyUser2', "password"=>'password2', "email"=>'me2@email.com']];

$stmt = $dbc->prepare($query);

foreach ($values as $value)
{
		$stmt->bindValue(':username', $value['username'], PDO::PARAM_STR);
		$stmt->bindValue(':password', $value['password'], PDO::PARAM_STR);
		$stmt->bindValue(':email', $value['email'], PDO::PARAM_STR);

		$stmt->execute();
}





//** Query and inserts for posts table

$query = '
		INSERT INTO posts (item, price, category, location, date, duration, image, contactInfo, description, user_id)
		VALUES (:item, :price, :category, :location, :date, :duration, :image, :contactInfo, :description, :user_id)
		';

$values = [
	["item"=>'Car',         
	"price"=>'1000', "category"=>'Auto',          
	"location"=>'Texas',      
	"date"=>'1999-01-01', 
	"duration"=>'1999-02-01', 
	"image"=>'01.img', 
	"contactInfo"=>'me1@email', 
	"description"=>'Four wheels, one engine',
	"user_id"=>'1'],

	["item"=>'TV',          
	"price"=>'500',  
	"category"=>'Electronics',   
	"location"=>'Minnesota',  
	"date"=>'1999-02-02', 
	"duration"=>'1999-03-02', 
	"image"=>'02.img', 
	"contactInfo"=>'me2@email',
	"description"=>'Liquid Crystals and a remote',
	"user_id"=>'1'],

	["item"=>'Pool Table',  
	"price"=>'700',  
	"category"=>'Recreation',    
	"location"=>'Alabama',    
	"date"=>'1999-03-03', 
	"duration"=>'1999-04-03', 
	"image"=>'03.img', 
	"contactInfo"=>'me3@email', 
	"description"=>'Felt and balls, no sticks',
	"user_id"=>'1'],
	
	["item"=>'Dish Washer', 
	"price"=>'400',  
	"category"=>'Appliances',    
	"location"=>'Washington', 
	"date"=>'1999-04-04', 
	"duration"=>'1999-05-04', 
	"image"=>'04.img', 
	"contactInfo"=>'me4@email', 
	"description"=>'Ivory white, touch display',
	"user_id"=>'2'],
	
	["item"=>'Guitar',      
	"price"=>'900',  
	"category"=>'Musical Items', 
	"location"=>'Maryland',   
	"date"=>'1999-05-05', 
	"duration"=>'1999-06-05', 
	"image"=>'05.img', 
	"contactInfo"=>'me5@email', 
	"description"=>'New strings, no scratches',
	"user_id"=>'2']
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
		$stmt->bindValue(':user_id', $value['user_id'], PDO::PARAM_STR);

		$stmt->execute();
	}

?>