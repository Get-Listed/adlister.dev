<?php

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

	<!-- Sign Up Modal -->
	<div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
	        <br>
	        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
	      </div>
	      <div class="modal-body">
	        	<form action "login.php" method="POST">
					<input type='text' name='username' placeholder='Select a Username'>
					<br>
					<input type='text' name='enterPass' placeholder='Select a Password'>
					<br>
					<input type='text' name='confirmPass' placeholder='Confirm a Password'>
					<br>
					<input type='text' name='email' placeholder='Enter your Email'>
	      </div>
	      <div class="modal-footer">
	        		<input type="submit" class="button special">
	        	</form>
	      </div>
	    </div>
	  </div>
	</div>


<div id = "errorReturn">
		<? if (!empty($errors))
		foreach ($errors as $error):
		 echo "$error" . PHP_EOL;?>
		 <br> 
	<? endforeach ?>

