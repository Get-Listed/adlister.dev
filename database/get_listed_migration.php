<?php

require_once "../bootstrap.php";

// 1 Create table for ads


$query = 'DROP TABLE IF EXISTS posts;
		CREATE TABLE posts (
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
		user_id INT UNSIGNED NOT NULL,
		PRIMARY KEY (id)
		)';


$dbc->exec($query);


// 2 Create user table 


$query2 = 	'DROP TABLE IF EXISTS users;
			CREATE TABLE IF NOT EXISTS users (
			user_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
			username VARCHAR(25) NOT NULL,
			password VARCHAR(25) NOT NULL,
			email VARCHAR(50) NOT NULL,
			PRIMARY KEY (user_id)
			)';

$dbc->exec($query2);