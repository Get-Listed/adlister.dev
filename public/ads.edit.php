<?php

require_once "../bootstrap.php";

session_start();

<<<<<<< HEAD
// ** Commented faux session variables for debugging
$_SESSION['user_id'] = "4";
=======
>>>>>>> 38f103cd8b1a5fe21c947b802af31b136baa9252

//** Create a variable to capture all ads for given user id

$showAd = $_SESSION['editAd'];

$errors = [];

//** When new input is submitted, pass the current ad id to submit with the 
// updated values, then call update directly

<<<<<<< HEAD
 if (Input::has('edit'))
{
	

 		
 			$newAd = new Ad();
 			$newAd->id = $_SESSION['editAd']->id;
	
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

	if(Input::has('delete'))
	{
		Ad::deleteAd($showAd->id);
		header('location: users.edit.php');
		die();
	}
=======
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
>>>>>>> 38f103cd8b1a5fe21c947b802af31b136baa9252



?>
<<<<<<< HEAD


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
			<input hidden name = "edit" value="true">
			<input type= 'submit'> 
		</form>
		<form method="POST">
			<input hidden name = 'delete' value = "<?= $showAd->id ?>">
			<input type='submit' value="Delete Ad">
		</form>
	</div>
<div id = "errorReturn">
		<? if (!empty($errors)): ?>
		<? foreach ($errors as $error): 
		 echo "$error" . PHP_EOL; ?>
		 <br> 
	<? endforeach; endif; ?>

</div>

</body>
</html>
