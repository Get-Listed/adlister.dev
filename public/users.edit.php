<?php

session_start();

// ** Ensure user is logged in a current session

if isset($_SESSION['user_id'])

{
	// ** Verify that the form has been submitted
	if (!empty($_POST))
	{
		// ** Create an errors array for echoing incorrect inputs
		$errors = [];
	
			// ** Verify that new password matches its confirmation
			if($_POST['enterPass'] == $_POST['confirmPass'])
			{
				// ** Create a User object from array based on user_id passed in session
				$userEdit= User::find($_SESSION['user_id'])
				// ** Verify that current password matches logged in user's password
				if ($userEdit['password'] == $_POST['oldPass'])
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
	
		
	}
}
?>

<html>
<head>
	<title></title>
</head>
<body>


<!-- // ** Form for changing password -->

<div id="changePass">
	<form action "#" method="POST">
	<input type='text' name='oldPass' placeholder='Enter current Password'>
	<input type='text' name='enterPass' placeholder='Select a New Password'>
	<input type='text' name='confirmPass' placeholder='Confirm  New Password'>
	<input type='submit'>
</div>

<!-- // ** Return any errors if exist -->

<div id = "errorReturn">
		<? if isset($errors)
		foreach ($errors as $error):
		 echo "$error" . PHP_EOL;?>
		 <br> 
	<? endforeach ?>
</div>

</body>
</html>

</body>
</html>