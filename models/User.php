<?php

require_once 'BaseModel.php';




class User extends Model

{

	protected static $table = 'users';



	protected function insert()
	{
		$query = '
		INSERT INTO users (username, password, email)
		VALUES (:username, :password, :email)
		';
	
		$stmt = self::$dbc->prepare($query);
	
		$stmt->bindValue(':username', $this->attributes['username'], PDO::PARAM_STR);
		$stmt->bindValue(':password', $this->attributes['password'], PDO::PARAM_STR);
		$stmt->bindValue(':email', $this->attributes['email'], PDO::PARAM_STR);

	
		$stmt->execute();

	}

		protected function update()
	{
		$query = '
		UPDATE users (password)
		SET (:username, :password, :email)
		WHERE user_id = :loggedInId
		';
	
		$stmt = self::$dbc->prepare($query);
	
		$stmt->bindValue(':password', $this->attributes['password'], PDO::PARAM_STR);
		$stst->bindValue('user_id', ($_SESSION["LOGGED_IN_USER_ID"], PDO::PARAM_STR);
	
		$stmt->execute();

	}

	// ** Searches by username and returns user id if exists;
	// Allows Create User attempt to verify if username already exists


	public static function findByUsername($nameAttempt)
	{
		self::dbConnect();

        $stmt = self::$dbc->prepare('SELECT user_id FROM users WHERE username = :nameAttempt');
       	$stmt->bindValue(':nameAttempt', $nameAttempt, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
        
	}

	public static function findByEmail($emailAttempt)
	{
		self::dbConnect();

        $stmt = self::$dbc->prepare('SELECT * FROM users WHERE username = :emailAttempt');
       	$stmt->bindValue(':emailAttempt', $emailAttempt, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
        
	}


}
