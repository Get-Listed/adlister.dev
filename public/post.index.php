<?php

require_once "../bootstrap.php";



$errors = [];

 if (!empty($_POST))
 	{
 		$newAd = new Ad();

 		try {
 			$newAd->item =Input::getString('item');
 		} catch (Exception $e) {
	    	$errors[] = $e->getMessage();
		}
		try {
 		$newAd->price =Input::getString('price');
 		} catch (Exception $e) {
	    	$errors[] = $e->getMessage();
		}
 		try {
 		$newAd->location =Input::getString('location');
 		} catch (Exception $e) {
	    	$errors[] = $e->getMessage();
		}
 		try {
 		$newAd->date =Input::getString('date');
 		} catch (Exception $e) {
	    	$errors[] = $e->getMessage();
		}
 		try {
 		$newAd->category =Input::getString('category');
 		} catch (Exception $e) {
	    	$errors[] = $e->getMessage();
		}
 		try {
 		$newAd->duration =Input::getString('duration');
 		} catch (Exception $e) {
	    	$errors[] = $e->getMessage();
		}
 		try {
 		$newAd->image =Input::getString('image');
 		} catch (Exception $e) {
	    	$errors[] = $e->getMessage();
		}
 		try {
 		$newAd->contactInfo =Input::getString('contactInfo');
 		} catch (Exception $e) {
	    	$errors[] = $e->getMessage();
		}
 		try {
 		$newAd->description =Input::getString('description');
 		} catch (Exception $e) {
	    	$errors[] = $e->getMessage();
		}

		if (empty($errors))
		{
 			$newAd->save();
		}
	}

?>

<!-- Ad form -->

	<div id = "adEntry">
		<form action ="/index.php" method = POST>
			Item<br>
			<input type = 'text' name = 'item'><br>
			Price<br>
			<input type = 'text' name = 'price'><br>
			Date<br>
			<input type = 'text' name = 'date'><br>
			Location<br>
			<input type = 'text' name = 'location'><br>
			Category<br>
			<input type = 'text' name = 'category'><br>
			Duration<br>
			<input type = 'text' name = 'duration'><br>
			Image<br>
			<input type = 'text' name = 'image'><br>
			Contact Info<br>
			<input type = 'text' name = 'contactInfo'><br>
			Description<br>
			<input type = 'text' name = 'description'><br>
			<input type= 'submit'>
		</form>
	</div>
	<div id = "errorReturn">
		<? foreach ($errors as $error):
		 echo "$error" . PHP_EOL;?>
		 <br> 
	<? endforeach?>
	</div>
