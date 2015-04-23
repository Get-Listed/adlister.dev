<?php

include '../bootstrap.php';

if (!empty($_POST))
{
	$errors = [];

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

		} else {
			$errors[] = "Your username or email is not available";
		}
		
	} else {
		$errors[] = "Your passwords do not match";
	}
}



?>





<div id="user create">
	<form action "#" method="POST">
	<input type='text' name='username' placeholder='Select a Username'>
	<input type='text' name='enterPass' placeholder='Select a Password'>
	<input type='text' name='confirmPass' placeholder='Cofirm a Password'>
	<input type='text' name='email' placeholder='Enter your Email'>
	<input type='submit'>

</div>


<div id = "errorReturn">
		<? if (!empty($errors))
		foreach ($errors as $error):
		 echo "$error" . PHP_EOL;?>
		 <br> 
	<? endforeach ?>

