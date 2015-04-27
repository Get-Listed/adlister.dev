<?php

require_once '../bootstrap.php';
/*** begin our session ***/
session_start();


if (isset($_SESSION['user_id'])) {
	header('Location: ads.edit.php');
}
if (Input::has('login'))
{
	$errors = [];
		$nameAttempt = User::findByUsername($_POST['username']);
		$passwordAttempt = User::findByPassword($_POST['password']);
	
	if (!empty($_POST['username']) && !empty($_POST['password']))
	{


			if (!$nameAttempt && !$passwordAttempt)
			{
				$signIn = new User();
				
				try {
					$signIn->username = Input::getString('username');
				} catch (Exception $e) {
		    		$errors[] = $e->getMessage();
				}
	
				try {
				$signIn->password = Input::getString('password');
				} catch (Exception $e) {
		    		$errors[] = $e->getMessage();
				}
			} else {
				$errors[] = "Your username or email is not valid";
			}
			
	} else {
		$errors[] = "All fields required";
	}
	if ($nameAttempt && $passwordAttempt)
	 {
	 	$name = User::sessionName(Input::get('username'));
		$_SESSION['user_name'] = $name;

		$id = User::sessionId(Input::get('username'));
		$_SESSION['user_id'] = $id;

		$image = User::sessionImage(Input::get('username'));
		$_SESSION['user_image'] = $image;
        header("Location: users.edit.php");
        die();

    }
}
    
?>
	<!-- Sign In Modal -->
	<div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
	        <br>
	        <h4 class="modal-title" id="myModalLabel">Sign In</h4>
	      </div>
	      <div class="modal-body">
	  
			<form method="POST" action="index.php">
		        <input type="text" name="username" placeholder="Username">
		        <br>
		        <input type="password" name="password"  placeholder="Password">  
	      </div>
	      <div class="modal-footer">
	       		<input type="submit" class="button special" name="login">
			</form> 
			<? if (!empty($errors)): ?>
				<? foreach ($errors as $error): ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					 <? echo "$error" . PHP_EOL; ?>
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			 		 <br> 
          		</div> 
          	<? endforeach; endif; ?>
	      </div>
	    </div>
	  </div>
	</div>
