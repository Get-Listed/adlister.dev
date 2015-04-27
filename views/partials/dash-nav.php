      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="<?php echo $_SESSION['user_image']; ?>" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['user_name']; ?></h5>
              	  	
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>User</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="users.edit.php">Change Password</a></li>

                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Ad's</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a  href="ads.edit.php">Edit Ad's</a></li>
                          <li class="active"><a  href="ads.create.php">Create Ad</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                    <a href="ad-show.php">
                        <i class="fa fa-buysellads"></i>
                        <span>View All Ad's</span>
                    </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      