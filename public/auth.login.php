<?php

require_once "Log.php";



class Auth
{	
	public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

	
	public static function attempt($username, $password)
	{
		if ($username == "guest" && $password == static::password)
		{
		$_SESSION["LOGGED_IN_USER"] = $username;
		logInfo("User $username logged in.");
		// exit();
	}

	
	public static function check()
	{
 		if ($_SESSION["LOGGED_IN_USER"])
 		{
 			return true;
 		}
	}

	
	public static function user()
	{
		 return $_SESSION["LOGGED_IN_USER"];
	}

	
	public static function logout()
	{

	}

}