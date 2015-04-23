<?php
<<<<<<< HEAD
define('DB_USER', 'parks_user');
define('DB_NAME', 'get_listed_db');
define('DB_PASS', 'tokyo3');
define('DB_HOST', '127.0.0.1');

$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
=======

$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

>>>>>>> 4e59dcc0972b95044c20055e2d9ebd8b8beff524
