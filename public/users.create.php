<?php
if (Input::has('signup'))
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
				header("Location:index.php");
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
	<!-- Sign Up Modal -->
	<div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
	        <br>
	        <h4 class="modal-title" id="myModalLabel">Get Started With Get Listed</h4>
	      </div>
	      <div class="modal-body">
	        	<form action "index.php" method="POST">
					<input type='text' name='username' placeholder='Select a Username'>
					<br>
					<input type='text' name='enterPass' placeholder='Select a Password'>
					<br>
					<input type='text' name='confirmPass' placeholder='Confirm your Password'>
					<br>
					<input type='text' name='email' placeholder='Enter your Email'>
	      </div>
	      <div class="modal-footer">
	        		<input type="submit" class="button special" name="signup">

			<? if (!empty($errors)): ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
				<? foreach ($errors as $error): ?>
					 <? echo "$error" . PHP_EOL; ?>
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			 		 <br> 
          		</div> 
          	<? endforeach; endif; ?>
	        	</form>
	      </div>
	    </div>
	  </div>
	</div>
		
<!--  //** Echo errors -->


