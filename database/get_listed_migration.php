<?php

require_once "../bootstrap.php";

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
		user_id INT UNSIGNED,
		PRIMARY KEY (id)
		)';


$dbc->exec($query);