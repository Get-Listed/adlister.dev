<?php

require_once '../bootstrap.php';

Class Ad extends Model
{
	protected static $table = 'posts'; 

	public function insert()
	{
		$query = '
		INSERT INTO posts (user_id, item, price, location, date, category, duration, image, contactInfo, description)
		VALUES (:user_id, :item, :price, :location, :date, :category, :duration, :image, :contactInfo, :description)
		';
	
		$stmt = self::$dbc->prepare($query);
		$stmt->bindValue(':user_id', $this->attributes['user_id'], PDO::PARAM_STR);
		$stmt->bindValue(':item', $this->attributes['item'], PDO::PARAM_STR);
		$stmt->bindValue(':price', $this->attributes['price'], PDO::PARAM_STR);
		$stmt->bindValue(':location', $this->attributes['location'], PDO::PARAM_STR);
		$stmt->bindValue(':date', $this->attributes['date'], PDO::PARAM_STR);
		$stmt->bindValue(':category', $this->attributes['category'], PDO::PARAM_STR);
		$stmt->bindValue(':duration', $this->attributes['duration'], PDO::PARAM_STR);
		$stmt->bindValue(':image', $this->attributes['image'], PDO::PARAM_STR);
		$stmt->bindValue(':contactInfo', $this->attributes['contactInfo'], PDO::PARAM_STR);
		$stmt->bindValue(':description', $this->attributes['description'], PDO::PARAM_STR);
	
		$stmt->execute();
	}

	public function update()
	{
		 $stmt = self::$dbc->prepare("
            UPDATE posts 
            SET item = :item, price = :price, location = :location, date = :date, category = :category, duration = :duration, image = :image, contactInfo = :contactInfo, description = :description
            WHERE id = :id
            ");
		$stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_STR);
		$stmt->bindValue(':item', $this->attributes['item'], PDO::PARAM_STR);
		$stmt->bindValue(':price', $this->attributes['price'], PDO::PARAM_STR);
		$stmt->bindValue(':location', $this->attributes['location'], PDO::PARAM_STR);
		$stmt->bindValue(':date', $this->attributes['date'], PDO::PARAM_STR);
		$stmt->bindValue(':category', $this->attributes['category'], PDO::PARAM_STR);
		$stmt->bindValue(':duration', $this->attributes['duration'], PDO::PARAM_STR);
		$stmt->bindValue(':image', $this->attributes['image'], PDO::PARAM_STR);
		$stmt->bindValue(':contactInfo', $this->attributes['contactInfo'], PDO::PARAM_STR);
		$stmt->bindValue(':description', $this->attributes['description'], PDO::PARAM_STR);

        $stmt->execute();
	}

	public static function deleteAd($id)

	{
		self::dbConnect();

		$stmt = self::$dbc->prepare("DELETE FROM posts WHERE id = :id");

		$stmt->bindValue('id', $id, PDO::PARAM_STR);
		$stmt->execute();
	}


	public static function allUserAds($user_id)

	{
		self::dbConnect();

		$allUserAds = self::$dbc->query("
			SELECT * FROM posts WHERE user_id = $user_id
			")->fetchAll(PDO::FETCH_ASSOC);
		
		return $allUserAds;
	}


}