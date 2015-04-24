<?php

include '../bootstrap.php';


session_start();


//** Commented faux session variable for debugging
$_SESSION['user_id'] = "4";


//** Edit Password Logic

//** Ensure user is logged in a current session

if (isset($_SESSION['user_id']))

{
	//** Verify that the form has been submitted
	if (!empty($_POST))
	{
		//** Create an errors array for echoing incorrect inputs
		$errors = [];
		//** Verify that all fields are set 
		if (!empty($_POST['oldPass']) && !empty($_POST['enterPass']) && !empty($_POST['confirmPass'])) 
		{	
			//** Verify that new password matches its confirmation
			if($_POST['enterPass'] == $_POST['confirmPass'])
			{
				//** Create a User object from array based on user_id passed in session
				$userEdit= User::findByUserId($_SESSION['user_id']);
				var_dump($userEdit);
			
				//** Verify that current password matches logged in user's password
				if ($userEdit->password == $_POST['oldPass'])
				{
					//** Attempt to reset logged in user's password in db
					try {
					$userEdit->password = Input::getString('enterPass');
					} catch (Exception $e) {
		    			$errors[] = $e->getMessage();
	    			}
					
	    			$userEdit->save();
				} else {
					$errors[] = "Incorrect current password";
				}
			} else {
			
			$errors[] = "Your passwords do not match";
			
			}
		} else {
			$errors[] = "All fields required";
		}
		
	}
}

//** Edit ads logic
//** Get all ads for current user
$showAds = Ad::allUserAds($_SESSION['user_id']);

if (!empty($_GET))

	{
		var_dump($_GET);
		$_SESSION['editAd'] = $_GET;
		header("Location: ads.edit.php");
		die();
	}

?>

<html>
<head>
	<title></title>
</head>
<body>


<!-- //** Form displaying current user ads for editing -->

	<div id = "adDisplay">Edit My Ads
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
				<? foreach($showAds as $ad): ?>
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
				<td> <form action ='#' method = 'GET'><button name='<?=($ad['id'])?>' value="value" type="submit"></button>Edit</form></td>
				</tr>
				<?endforeach; ?>
			</tbody>
		</table>
	</div>


<!-- //** Form for changing password -->

<div id="changePass">Change Password
	<form action "#" method="POST">
	<input type='text' name='oldPass' placeholder='Enter current Password'>
	<input type='text' name='enterPass' placeholder='Select a New Password'>
	<input type='text' name='confirmPass' placeholder='Confirm  New Password'>
	<input type='submit'>
</div>

<!-- //** Return any errors if exist -->

<div id = "errorReturn">
		<? if (!empty($errors))
		foreach ($errors as $error):
		 echo "$error" . PHP_EOL;?>
		 <br> 
	<? endforeach ?>
</div>

</body>
</html>

</body>
</html>