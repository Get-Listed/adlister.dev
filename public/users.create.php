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
			$newUser->username = Input::getString('username');
			$newUser->email = Input::getString('email');
			$newUser->password = Input::getString('enterPass');

			print_r($newUser);
			$newUser->save();
			var_dump($newUser);
		}	
		
	} else {
		$errors[] = "Your passwords do not match";
	}
}



?>



<html>
<head>
	<title></title>
</head>
<body>

<div id="user create">
	<form action "#" method="POST">
	<input type='text' name='username' placeholder='Select a Username'>
	<input type='text' name='enterPass' placeholder='Select a Password'>
	<input type='text' name='confirmPass' placeholder='Cofirm a Password'>
	<input type='text' name='email' placeholder='Enter your Email'>
	<input type='submit'>




</body>
</html>