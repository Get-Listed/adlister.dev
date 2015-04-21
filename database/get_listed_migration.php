<?php

define('DB_USER', 'codeup');
define('DB_NAME', 'get_listed_db');
define('DB_PASS', 'password');
define('DB_HOST', '127.0.0.1');

require '../db_connect.php';

$query = 'DROP TABLE IF EXISTS posts;
		CREATE TABLE posts (
		id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		price VARCHAR(50) NOT NULL,
		category VARCHAR(50) NOT NULL,
		location VARCHAR(50) NOT NULL,
		date DATE NOT NULL,
		duration VARCHAR(50) NOT NULL,
		image VARCHAR(50) NOT NULL,
		contactInfo VARCHAR(50) NOT NULL,
		description TEXT,
		PRIMARY KEY (id)
		)';


$dbc->exec($query);