<?php
define('DB_USER', 'parks_user');
define('DB_NAME', 'get_listed_db');
define('DB_PASS', 'tokyo3');
define('DB_HOST', '127.0.0.1');

require 'db_connect.php';
require 'Input.php';
require 'models/BaseModel.php';
require 'models/User.php';
require 'models/ad.php';


// This will be one file containing all of our necessary included 
// files (models etc) for easy requiring within index.php