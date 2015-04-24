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
		$_SESSION['editAd'] = Ad::find($_GET['id']);
		header("Location: ads.edit.php");
		var_dump($_SESSION['editAd']);
		die();
	}

?>

<<<<<<< HEAD
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
				<td> <form action ='#' method = 'GET'><button name='id' value='<?=($ad['id'])?>' type="submit"></button>Edit</form></td>
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
=======
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
                      <form class="form-horizontal style-form" method="POST" action="ads.edit.php">


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
                      <div id = "errorReturn">
                          <? if (!empty($errors))
                          foreach ($errors as $error):
                           echo "$error" . PHP_EOL;?>
                           <br> 
                          <? endforeach ?>
                      </div>
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
<?php include '../views/partials/dash-footer.php'; ?>

  </body>
>>>>>>> 38f103cd8b1a5fe21c947b802af31b136baa9252
</html>