<?php

require_once "../bootstrap.php";

session_start();

// ** Commented faux session variables for debugging
$_SESSION['user_id'] = "4";
$_SESSION['editAd'] = "2";


//** Create a variable to capture all ads for given user id

$showAd = Ad::find($_SESSION['editAd']);

$errors = [];

//** When new input is submitted, pass the current ad id to submit with the 
// updated values, then call update directly

 if (!empty($_POST))
 	{
 		$newAd = new Ad();
 		$newAd->id = $_SESSION['editAd'];

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
 			$newAd->update();
 			//** Upon completing updates, reload page to display new values
			header("Location: #");
			die();
		}


	}

?>


<html>
<head>
	<title></title>
</head>
<body>


<!-- //** Display Ad that is being edited -->

	<div id = "adEditDisplay">
		<table>
			<thead>
				<th>Item</th>
				<th>Price</th>
				<th>Date</th>
				<th>Location</th>
				<th>Category</th>
				<th>Duration</th>
				<th>Image</th>
				<th>Contact Info</th>
				<th>Description</th>
			</thead>
			<tbody>
				<? foreach($showAd as $ad): ?>
				<tr>

				<td> <?= htmlspecialchars(strip_tags($ad['item'])); ?></td>
				<td> <?= htmlspecialchars(strip_tags($ad['price'])); ?></td>
				<td> <?= htmlspecialchars(strip_tags($ad['date'])); ?></td>
				<td> <?= htmlspecialchars(strip_tags($ad['location'])); ?></td>
				<td> <?= htmlspecialchars(strip_tags($ad['category'])); ?></td>
				<td> <?= htmlspecialchars(strip_tags($ad['duration'])); ?> </td>
				<td> <?= htmlspecialchars(strip_tags($ad['image'])); ?></td>
				<td> <?= htmlspecialchars(strip_tags($ad['contactInfo'])); ?></td>
				<td> <?= htmlspecialchars(strip_tags($ad['description'])); ?></td>
				</tr>
				<?endforeach; ?>
			</tbody>
		</table>
	</div>


<!-- //** Fields for selected ad, populated with original values -->

	<div id = "adEditEntry"> Edit Ad 
		<form action ="#" method = "POST">
			Item<br>
			<input type = 'text' name = 'item' value="<?=$showAd->item?>"><br>
			Price<br>
			<input type = 'text' name = 'price' value="<?=$showAd->price?>"><br>
			Date<br>
			<input type = 'text' name = 'date' value="<?=$showAd->date?>"><br>
			Location<br>
			<input type = 'text' name = 'location' value="<?=$showAd->location?>"><br>
			Category<br>
			<input type = 'text' name = 'category' value="<?=$showAd->category?>"><br>
			Duration<br>
			<input type = 'text' name = 'duration' value="<?=$showAd->duration?>"><br>
			Image<br>
			<input type = 'text' name = 'image' value="<?=$showAd->image?>"><br>
			Contact Info<br>
			<input type = 'text' name = 'contactInfo' value="<?=$showAd->contactInfo?>"><br>
			Description<br>
			<input type = 'text' name = 'description' value="<?=$showAd->description?>"><br>
			<input type= 'submit'>
		</form>
	</div>
<div id = "errorReturn">
		<? if (!empty($errors))
		foreach ($errors as $error):
		 echo "$error" . PHP_EOL;?>
		 <br> 
	<? endforeach ?>
</div>

</body>
</html>
