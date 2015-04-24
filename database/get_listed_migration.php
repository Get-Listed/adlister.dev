<?php

require_once "../bootstrap.php";


//** Drop any pre-existing tables


$query = "DROP TABLE IF EXISTS posts";
$dbc->exec($query);

$query = "DROP TABLE IF EXISTS users";
$dbc->exec($query);



//** Create table for users

$query = 	'CREATE TABLE users (
			user_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
			username VARCHAR(25) NOT NULL,
			password VARCHAR(25) NOT NULL,
			email VARCHAR(50) NOT NULL,
			PRIMARY KEY (user_id)
			)';

$dbc->exec($query);



//** Create table for ads


$query = 'CREATE TABLE posts (
		id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		item VARCHAR(50) NOT NULL,
		price VARCHAR(50) NOT NULL,
		category VARCHAR(50) NOT NULL,
		location VARCHAR(50) NOT NULL,
		date DATE NOT NULL,
		duration VARCHAR(50) NOT NULL,
		image VARCHAR(50) NOT NULL,
		contactInfo VARCHAR(50) NOT NULL,
		description TEXT,
		user_id INT UNSIGNED,
		PRIMARY KEY (id),
		KEY user_id (user_id),
		CONSTRAINT posts_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (user_id) ON DELETE CASCADE 
		)';

		//KEY user_id (user_id),

$dbc->exec($query);


