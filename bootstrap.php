<?php

define('DB_USER', 'codeup');
define('DB_NAME', 'get_listed_db');
define('DB_PASS', 'password');
define('DB_HOST', '127.0.0.1');

require 'db_connect.php';
require 'Input.php';
require 'models/BaseModel.php';
require 'models/User.php';
require 'models/ad.php';
require 'log.php';
// require 'auth.login.php';

// This will be one file containing all of our necessary included 
// files (models etc) for easy requiring within index.php