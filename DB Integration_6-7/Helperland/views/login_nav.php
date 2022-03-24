 
          <?php if($_SESSION['usertypeid'] == 1) {?>
 <nav class="row  m-0 nav_row  navbar-expand-md navbar-light" id="navbar" >
        <div class="col " style=" margin-top:4px;">
          <img class="logo" src="images/Service_History/logo-small.png">
        </div>
        <div class="d-md-none d-block col text-right my-auto">

            <li style="list-style: none"><a href="" class="pr-0 d-md-none d-block"><img src="images/Service_History/icon-notification.png"><span class="badge badge-light">2</span></a></li>
            
          </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        
        <div class="col-md-auto  text-center pt-4 pt-md-0 collapse navbar-collapse p-0 "  id="navbarSupportedContent">
          <ul class="navabr-right ml-auto">
            <li><a href="../controllers/Users.php?q=book_now"  class="btn nav_btn active">Book Now </a></li>
            <li ><a href="../controllers/Users.php?q=prices" class="btn">Prices & services</a></li>
            <li><a href="#" class="btn">Warranty </a></li>
            <li><a href="#" class="btn">Blog</a></li>
            <li><a  href="../controllers/Users.php?q=contact" class="btn">Contact</a></li>
            <span  style="border:1px solid #fff"></span>
            <li><a href="" class="pr-0 d-none d-md-inline" style="border-style: none;" ><img src="images/Service_History/icon-notification.png"><span class="badge badge-light">2</span></a></li> 
            <span style="border:1px solid #fff" ></span>
            
            <li><a href="../controllers/Users.php?q=logout" class="btn">Logout</a></li>
            <li><a href="../controllers/Users.php?q=mysettings" class="btn">My Settings</a></li>
              
            


          </ul>


            <hr class="mx-auto d-block d-md-none">
          <div class="row navbar">
            <ul class="navabr-right navbar2 mx-auto d-block d-md-none">
            <div class="col-12  p-2"><li ><a  href="../controllers/Users.php?q=cust_dashboard" >Dashboard</a></li></div>
            <div class="col-12  p-2"><li><a href="../controllers/Users.php?q=cust_servicehistory"  >Service History </a></li></div>
            <div class="col-12  p-2"><li><a href='' >Service Schedule</a></li></div>
            <div class="col-12  p-2"> <li><a href="../controllers/Users.php?q=block_service_provider" >Favourite Pros</a></li></div>
            <div class="col-12  p-2"><li><a href="" >Invoices</a></li></div>
            <div class="col-12  p-2" ><li><a href="" >Notifications</a></li></div>
            
            </ul>
          </div>
      <?php } else if($_SESSION['usertypeid'] == 2) {?>


        <nav class="row  m-0 nav_row  navbar-expand-md navbar-light" id="navbar" >
        <div class="col " style=" margin-top:4px;">
          <img class="logo" src="images/Service_History/logo-small.png">
        </div>
        <div class="d-md-none d-block col text-right my-auto">

            <li style="list-style: none"><a href="" class="pr-0 d-md-none d-block"><img src="images/Service_History/icon-notification.png"><span class="badge badge-light">2</span></a></li>
            
          </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        
        <div class="col-md-auto  text-center pt-4 pt-md-0 collapse navbar-collapse p-0 "  id="navbarSupportedContent">
          <ul class="navabr-right ml-auto">
            <li><a href="../controllers/Users.php?q=logout_login"  class="btn nav_btn active">Book Now </a></li>
            <li ><a href="../controllers/Users.php?q=prices" class="btn">Prices & services</a></li>
            <li><a href="#" class="btn">Warranty </a></li>
            <li><a href="#" class="btn">Blog</a></li>
            <li><a  href="../controllers/Users.php?q=contact" class="btn">Contact</a></li>
            <span  style="border:1px solid #fff"></span>
            <li><a href="" class="pr-0 d-none d-md-inline" style="border-style: none;" ><img src="images/Service_History/icon-notification.png"><span class="badge badge-light">2</span></a></li> 
            <span style="border:1px solid #fff" ></span>
            
            <li><a href="../controllers/Users.php?q=logout" class="btn">Logout</a></li>
            <li><a href="../controllers/Users.php?q=sp_mysettings" class="btn">My Settings</a></li>
              


            


          </ul>

            <hr class="mx-auto d-block d-md-none">
          <div class="row navbar">
            <ul class="navabr-right navbar2 mx-auto d-block d-md-none">
            <div class="col-12  p-2"><li ><a  href="#" >Dashboard</a></li></div>
            <div class="col-12  p-2"><li><a href="../controllers/Users.php?q=new_service_request"  >New Service Request </a></li></div>
            <div class="col-12  p-2"><li><a href="../controllers/Users.php?q=upcomingservice"  >Upcoming Service</a></li></div>
            <div class="col-12  p-2"><li><a href="../controllers/Users.php?q=serviceschedule" >Service Schedule</a></li></div>
            <div class="col-12  p-2"> <li><a href="../controllers/Users.php?q=serviceproviderhistory" >Service History</a></li></div>
            <div class="col-12  p-2"><li><a href="../controllers/Users.php?q=MyRetings" >My Ratings</a></li></div>
            <div class="col-12  p-2" ><li><a href="../controllers/Users.php?q=block_customer" >Block Customer</a></li></div>
            <div class="col-12  p-2" ><li><a href="" >Invoices</a></li></div>
            <div class="col-12  p-2" ><li><a href="" >Notifications</a></li></div>
            
            </ul>
          </div>
      <?php } else {?>

            
          
          <nav class="navbar nav_row navbar-expand-lg navbar-light" id="navbar">
            <a class="navbar-brand text-white" href="#">helperland</a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="col-md-auto text-center pt-4 pt-md-0 collapse navbar-collapse p-0 "  id="navbarSupportedContent">
              <ul class="navabr-right ml-auto ">
                <li>
                  <a><img class="img1" src="images/Admin_User_Management/admin-user.png"><span><?php echo $_SESSION['FirstName'] ?></span></a>
                </li>
                <li>
                  <a  href="../controllers/Users.php?q=logout"><img class="img2" src="images/Admin_User_Management/logout.png"></a>
                </li>
              </ul>
              <hr class="mx-auto d-block d-md-none">
          <div class="row navbar">
            <ul class="navabr-right navbar2 mx-auto d-block d-md-none">
            <div class="col-12  p-2"><li ><a  href="#"  >Service Rquests</a></li></div>
            <div class="col-12  p-2"><li ><a  href="#" >User Management</a></li></div>
            
            
            </ul>
          
        

            
          </div>
            </div>
          </nav>
          
      <?php } ?>
          
        </div>
      </nav>