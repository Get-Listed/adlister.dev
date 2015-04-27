<?php

require_once 'BaseModel.php';




class User extends Model

{

	protected static $table = 'users';



	public function save()
    {
        if (!empty($this->attributes['user_id']))

        {
            $this->update();
        } else {
            $this->insert();
        }

    }

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
		UPDATE users
		SET password = :password
		WHERE user_id = :user_id
		';
	
		$stmt = self::$dbc->prepare($query);
	
		$stmt->bindValue(':password', $this->attributes['password'], PDO::PARAM_STR);
		$stmt->bindValue('user_id', ($_SESSION['user_id']), PDO::PARAM_STR);
	
		$stmt->execute();

	}

	// ** Searches by username and returns user id if exists;
	// Allows Create User attempt to verify if username already exists

	public static function findByUserId($user_id)
    {
        // Get connection to the database
        self::dbConnect();

        // @TODO: Create select statement using prepared statements

        // @TODO: Store the resultset in a variable named $result

        $stmt = self::$dbc->prepare("SELECT * FROM " . static::$table . " WHERE user_id = :user_id");
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // The following code will set the attributes on the calling object based on the result variable's contents

        $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
    }

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

    public static function findByPassword($passwordAttempt)
    {
        self::dbConnect();

        $stmt = self::$dbc->prepare('SELECT * FROM users WHERE password = :password');
        $stmt->bindValue(':password', $passwordAttempt, PDO::PARAM_STR);
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

    public static function sessionName($name)
    {
        self::dbConnect();
        $stmt = self::$dbc->prepare('SELECT username FROM users WHERE username = :username');
        $stmt->bindValue(':username',$name,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result[0]['username'];
        
    }
    
        public static function sessionId($id)
    {
        self::dbConnect();
        $stmt = self::$dbc->prepare('SELECT user_id FROM users WHERE username = :username');
        $stmt->bindValue(':username',$id,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result[0]['user_id'];
        
    }

    public static function sessionImage($id)
    {
        self::dbConnect();
        $stmt = self::$dbc->prepare('SELECT user_image FROM users WHERE username = :username');
        $stmt->bindValue(':username',$id,PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result[0]['user_image'];
        
    }  
}
