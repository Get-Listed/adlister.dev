<?php

require_once "../bootstrap.php";

session_start();

//** Create a variable to capture all ads for given user id


$showAd = Ad::allUserAds($_SESSION['user_id']);


$errors = [];

//** When new input is submitted, pass the current ad id to submit with the 
// updated values, then call update directly

 if (Input::has('edit'))
{
	

 		
 			$newAd = new Ad();
 			$newAd->id = Input::getString('id');

 			try {
 				$newAd->item = Input::getString('item');
 			} catch (Exception $e) {
		    	$errors[] = $e->getMessage();
			}
			try {
 			$newAd->price =Input::getString('price');
 			} catch (Exception $e) {
		    	$errors[] = $e->getMessage();
			}
 			try {
 			$newAd->location =Input::getString('location');
 			} catch (Exception $e) {
		    	$errors[] = $e->getMessage();
			}
 			try {
 			$newAd->date =Input::getString('date');
 			} catch (Exception $e) {
		    	$errors[] = $e->getMessage();
			}
 			try {
 			$newAd->category =Input::getString('category');
 			} catch (Exception $e) {
		    	$errors[] = $e->getMessage();
			}
 			try {
 			$newAd->duration =Input::getString('duration');
 			} catch (Exception $e) {
		    	$errors[] = $e->getMessage();
			}
 			try {
 			$newAd->image =Input::getString('image');
 			} catch (Exception $e) {
		    	$errors[] = $e->getMessage();
			}
 			try {
 			$newAd->contactInfo =Input::getString('contactInfo');
 			} catch (Exception $e) {
		    	$errors[] = $e->getMessage();
			}
 			try {
 			$newAd->description =Input::getString('description');
 			} catch (Exception $e) {
		    	$errors[] = $e->getMessage();
			}
	
			if (empty($errors))
			{
 				$newAd->update();
 				//** Upon completing updates, reload page to display new values
				header("Location: #");
				die();
			}

		
	}
 
	if(Input::has('delete'))
	{
		Ad::deleteAd($showAd->id);
		header('location: users.edit.php');
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
            <a href="index.html" class="logo"><b>Edit Post</b></a>

      <?php include '../views/partials/dash-top-nav.php'; ?>
      
      <?php include '../views/partials/dash-nav.php'; ?>
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
  					<div class="row mt">
	                  <div class="col-lg-12 ">
	                  	<div class="content-panel">
	                          <table class="table table-hover" id="mstrTable">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Your Listings</h4>
	                  	  	  <hr>
	                              <thead>
	                              <tr>
	                              	<th>Id</th>
							        <th>Item</th>
							        <th>Price</th>
							        <th>Date</th>
							        <th>Location</th>
							        <th>Category</th>
							        <th>Duration</th>
							        <th>Image</th>
							        <th>Contact Info</th>
							        <th>Description</th>
							        <th>User</th>
	                              </tr>
	                              </thead>
	                              <tbody>
							        <? foreach($showAd as $ad): ?>
								       <tr onclick="test()" value = "testme">
								       		<td> <?= htmlspecialchars(strip_tags($ad['id'])); ?></td>
									        <td> <?= htmlspecialchars(strip_tags($ad['item'])); ?></td>
									        <td> <?= htmlspecialchars(strip_tags($ad['price'])); ?></td>
									        <td> <?= htmlspecialchars(strip_tags($ad['date'])); ?></td>
									        <td> <?= htmlspecialchars(strip_tags($ad['location'])); ?></td>
									        <td> <?= htmlspecialchars(strip_tags($ad['category'])); ?></td>
									        <td> <?= htmlspecialchars(strip_tags($ad['duration'])); ?> </td>
									        <td> <?= htmlspecialchars(strip_tags($ad['image'])); ?></td>
									        <td> <?= htmlspecialchars(strip_tags($ad['contactInfo'])); ?></td>
									        <td> <?= htmlspecialchars(strip_tags($ad['description'])); ?></td>
									        <td> <?= htmlspecialchars(strip_tags($ad['user_id'])); ?></td>
								        </tr>
							        <?endforeach; ?>
	                              </tbody>
	                          </table>
	                  	  </div>
	                  </div><!-- /col-md-12 -->
				</div><!-- row -->


			           <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel" id = "adEditEntry">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>Edit Your Post Here!</h4>
                      <form class="form-horizontal style-form" method="POST" action="ads.edit.php">

                                  <input type="hidden" name="id" id="id">


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Item</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="Item" name="item" id="item">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Price</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="Price" name="price" id="price">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Date</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="Date" name="date" id="date">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Location</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="Location" name="location" id="location">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Category</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="Category" name="category" id="category">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Duration</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="Duration" name="duration" id="duration">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Image</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="Image" name="image" id="image">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Contact Info</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="Contact Info" name="contactInfo" id="contactInfo">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Description</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="Description" name="description" id="description">
                              </div>
                          </div>

                          <div class="form-group">
                              
                              <div class="col-sm-10">
                                  <button type="submit" class="btn btn-theme" name="edit">Update</button>
                              </div>
                          </div>                                                                                                     
                      </form>
                <? if (!empty($errors)): ?>
						<? foreach ($errors as $error): ?>
						<div class="alert alert-danger alert-dismissible" role="alert">
						 <? echo "$error" . PHP_EOL; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				 		 <br> 
                  	</div>
                <? endforeach; endif; ?>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
<?php include '../views/partials/dash-footer.php'; ?>
  </body>
</html>