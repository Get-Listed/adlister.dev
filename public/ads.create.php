<?php

require_once "../bootstrap.php";

session_start();

//** Ad Submit Logic

$errors = [];

 if (Input::has('insert'))
 	{
 		$newAd = new Ad();

 		try {
 			$newAd->user_id = $_SESSION['user_id'];
 		} catch (Exception $e) {
	    	$errors[] = $e->getMessage();
		}
 		try {
 			$newAd->item =Input::getString('item');
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
 			$newAd->insert();
		}
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
            <a href="index.html" class="logo"><b>Create Post</b></a>
            <!--logo end-->
        <?php include '../views/partials/dash-top-nav.php'; ?>
      
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
                  <div class="form-panel" id = "adEditEntry">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>Add a Post</h4>
                      <form class="form-horizontal style-form" method="POST" action="ads.create.php">


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Item</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="Item" name="item">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Price</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="Price" name="price">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Date</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="Date" name="date">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Location</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="Location" name="location">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Category</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="Category" name="category">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Duration</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="Duration" name="duration">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Image</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="Image" name="image">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Contact Info</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="Contact Info" name="contactInfo" >
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Description</label>
                              <div class="col-sm-10">
                                  <input type="text"  class="form-control" placeholder="Description" name="description">
                              </div>
                          </div>

                          <div class="form-group">
                              
                              <div class="col-sm-10">
                                  <button type="submit" class="btn btn-theme" name="insert">Insert Post</button>
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

                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              J.D. and Max The Monkey 2015
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>