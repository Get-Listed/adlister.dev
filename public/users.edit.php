<?php

require_once '../bootstrap.php';


session_start();


//** Commented faux session variable for debugging

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
		
		$_SESSION['editAd'] = Ad::find($_GET['id']);
		header("Location: ads.edit.php");
		var_dump($_SESSION['editAd']);
		die();
	}

?>


<?php include '../views/partials/dash-head.php'; ?>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="users.edit.php" class="logo"><b>Change Your Password</b></a>

           <?php include '../views/partials/dash-top-nav.php'; ?>
        </header>
      <!--header end-->
      
      <?php include '../views/partials/dash-nav.php'; ?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->







      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">

			           <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel" id="changePass">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>Change Your Password</h4>
                      <form class="form-horizontal style-form" method="POST" action="users.edit.php">


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Old Password</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" name='oldPass' placeholder='Enter current Password'>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">New Password</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" name='enterPass' placeholder='Select a New Password'>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Confirm Password</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" name='confirmPass' placeholder='Confirm  New Password'>
                              </div>
                          </div>

                          <div class="form-group">     
                              <div class="col-sm-10">
                                  <button type="submit" class="btn btn-theme">Update Password</button>
                              </div>
                          </div>                                                                                                     
                      </form>
                <? if (!empty($errors)): ?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<? foreach ($errors as $error): ?>
						 <? echo "$error" . PHP_EOL; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				 		 <br> 
                  	</div>
                <? endforeach; endif; ?>
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->
		</section>
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
<?php include '../views/partials/dash-footer.php'; ?>

  </body>
</html>