<?php

include '../bootstrap.php';


if (!empty($_POST))
{
	$errors = [];
	if (!empty($_POST['username']) && !empty($_POST['enterPass']) && !empty($_POST['confirmPass']) && !empty($_POST['email']))
	{
		if ($_POST['enterPass'] == $_POST['confirmPass'])	
		{
			$nameAttempt = User::findByUsername($_POST['username']);
			$emailAttempt = User::findByEmail($_POST['email']);
	
			if (!$nameAttempt && !$emailAttempt)
			{
				$newUser = new User();
				
				try {
					$newUser->username = Input::getString('username');
				} catch (Exception $e) {
		    		$errors[] = $e->getMessage();
				}
	
				try {
				$newUser->email = Input::getString('email');
				} catch (Exception $e) {
		    		$errors[] = $e->getMessage();
				}
	
				try {
				$newUser->password = Input::getString('enterPass');
				} catch (Exception $e) {
		    		$errors[] = $e->getMessage();
    			}
	
				$newUser->save();
				header("Location:auth.login.php");
				die();
	
			} else {
				$errors[] = "Your username or email is not available";
			}
			
		} else {
			$errors[] = "Your passwords do not match";
		}
	} else {
		$errors[] = "All fields required";
	}

}



?>



<!-- //** Create User form -->

<div id="user create">Sign Up
	<form action "#" method="POST">
	<input type='text' name='username' placeholder='Select a Username'>
	<input type='text' name='enterPass' placeholder='Select a Password'>
	<input type='text' name='confirmPass' placeholder='Cofirm a Password'>
	<input type='text' name='email' placeholder='Enter your Email'>
	<input type='submit'>

</div>

<!--  //** Echo errors -->

<div id = "errorReturn">
		<? if (!empty($errors))
		foreach ($errors as $error):
		 echo "$error" . PHP_EOL;?>
		 <br> 
	<? endforeach ?>

