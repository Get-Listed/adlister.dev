<?php

$_ENV = include '.env.php';

require 'db_connect.php';
require 'Input.php';
require 'models/BaseModel.php';
require 'models/User.php';
require 'models/ad.php';
require 'log.php';

// This will be one file containing all of our necessary included 
// files (models etc) for easy requiring within index.php