<?php

require_once 'BaseModel.php';




class User extends Model

{

	protected static $table = 'users';


	// ** Function to allow a Create User attempt to verify if username already exists

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

	
	public static function findByUsername($nameAttempt)
	{
		self::dbConnect();

        $stmt = self::$dbc->prepare('SELECT * FROM users WHERE username = :nameAttempt');
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
