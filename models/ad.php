<?php

require_once '../bootstrap.php';

Class Ad extends Model
{

	protected function insert()
	{
		$query = '
		INSERT INTO posts (item, price, location, date, category, duration, image, contactInfo, description)
		VALUES (:item, :price, :location, :date, :category, :duration, :image, :contactInfo, :description)
		';
	
		$stmt = self::$dbc->prepare($query);
	
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

	protected function update()
	{
		 $stmt = self::$dbc->prepare("
            UPDATE posts 
            SET item = :item, price = :price, location = :location, date = :date, category = :category, duration = :duration, image = :image, contactInfo = :contactInfo, description = :description
            WHERE id = :id
            ");
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
}