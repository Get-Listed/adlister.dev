<?php

require_once "Log.php";



class Auth
{	
	public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

	
	public static function attempt($username, $password)
	{
		if ($username == "guest" && $password == static::password)
		{
		$_SESSION["LOGGED_IN_USER"] = $username;
		logInfo("User $username logged in.");
		// exit();
	}

	
	public static function check()
	{
 		if ($_SESSION["LOGGED_IN_USER"])
 		{
 			return true;
 		}
	}

	
	public static function user()
	{
		 return $_SESSION["LOGGED_IN_USER"];
	}

	
	public static function logout()
	{

	}

}
=======
/*** begin our session ***/
session_start();


if(isset( $_SESSION['user_id'] ))
{
	$user = print_r($_SESSION['user_id']);
    $message = "$user is already logged in";
}

    /*** if we are here the data is valid and we can insert it into database ***/
    if (!empty(Input::get('username')) && !empty(Input::get('password'))) {

		$stmt = $dbc->prepare("SELECT username,password FROM users WHERE username = :username AND password = :password");
		$stmt->bindValue(':username',Input::get('username'),PDO::PARAM_STR);
		$stmt->bindValue(':password',Input::get('password'),PDO::PARAM_STR);
		$stmt->execute();

		$output = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$result = $stmt->fetchColumn();
        /*** if we have no result then fail boat ***/
        if($result == false)
        {
                $message = 'Login Failed';
        }
        /*** if we do have a result, all is well ***/
       else
        {
                /*** set the session user_id variable ***/
                $_SESSION['user_id'] = $output;

                /*** tell the user we are logged in ***/
                $message = 'You are now logged in';
                
        }
    }
?>
	<!-- Sign In Modal -->
	<div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
	      </div>
	      <div class="modal-body">
	  
			<form method="POST" action="index.php">
		        <input type="text" name="username" placeholder="Username">
		        <br>
		        <input type="password" name="password"  placeholder="Password">
  			<?php echo $message; ?>
  			<?php if (!empty(Input::get('username'))): ?>
  			<?php print_r($output); ?>	
  			<?php endif ?>
  			
	   
	      </div>
	      <div class="modal-footer">
	       		<input type="submit" class="button special">
			</form>  
	      </div>
	    </div>
	  </div>
	</div>
>>>>>>> 978af43f10c0e94af279c2008ee4523fd0b39720
