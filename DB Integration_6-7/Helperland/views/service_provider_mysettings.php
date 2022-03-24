<?php 
    session_start(); 
    
?>


<!doctype html>
<html lang="en">
  <head>
    
  <?php include_once 'headerLinks.php'; ?>

  <link rel="stylesheet" href="css/sp_mysettings.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <title>My Settings </title>

  
</head>
<body >
  <div class="container-fluid p-0  main_container" style="overflow-y: hidden">
    <header>
    <!-- HEADER -->
     <?php if(isset($_SESSION['userid'])){ 
        include_once 'login_nav.php';}else{?>
        <meta http-equiv = "refresh" content = "0.5; url =../controllers/Users.php?q=logout_login" />
       <?php } ?>




      <div class="row row_welcome">
        <div class="col">
          <p class="p_welcome">Welcome,
            <?php 
      if(isset($_SESSION['FirstName']))
      {
        echo "<strong>".$_SESSION['FirstName']."</strong>";
        } 
        else
          echo 'Guest';
    ?></h1>
           </p>
        </div>
      </div>
    </header>
  
  <!-- HEADER END -->
  <!-- MAIN CONTENT -->
  <section>

  <div class="container container2 p-0" >
    

 <div class="row m-0 justify-content-center">
    <div class="col d-none d-lg-block sidebar_col p-0" >
        
      <div class="sidebar">
      <a  href="#">Dashboard</a>
  <a href="new_service_request_sp.php">New Service Requests</a>
  <a href="upcoming_service.php">Upcoming Services</a>
  <a href="service_schedule_sp.php">Service Schedule</a>
  <a href="service_provider_history.php">Service History</a>
  <a href="MyRetings.php">My Ratings</a>
  <a href="block_customer.php">Block Customer</a>
      </div>
    </div>

<!-- TABLE -->
<div class="col">
  <div class="row">
       
    <div class="col"  >
                <div class="progressbar ">
                  <div class="progress-step progress-step-active" onclick="details()" data-title="Details">
                    <p>My Details</p>
                  </div>
                  <div class="progress-step " onclick="password()" data-title="ID">
                    <p>Change Password</p>
                  </div>
                </div>

                <div class="alert alert-danger" id="error-message" style="display: none"></div>
                <div class="alert alert-success"id="success-message" style="display: none"></div>
                
                  <!-- <h6 >Account Status: <span style="color:green">Active</span></h6> -->
                <!-- Details -->
              <form>
                  <div class="form-step form-step-active">
                  <div class="form-row input-group">
                    <div class="form-group col-md-11 pb-2 " style="border-bottom:0.1px solid #ccc;width:100% ; margin-left=1rem">
                      <h5 class="pb-3">Account Status: <span style="color:green" id="status"></span></h5>
                     
                      <div class="d-md-none dp d-block mt-0">
                          <img src="images/AvatarImages/car.png"  >
                      </div>

                      <label for="details" class="pb-0 mb-0">Basic Details</label>
                      </div>
                    <div class="col-md-1 d-md-block d-none form-group pt-0 mt-0"  >
                      <div class="services dp">
                          <img src="images/AvatarImages/car.png"  >
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="firstname">First name</label>
                      <input type="text"class="form-control" id="firstname"required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="lastname">Last name</label>
                      <input type="text"class="form-control" id="lastname"required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="email">E-mail address</label>
                      <input type="email"class="form-control" id="email"required>
                    </div>
                    <div class="form-group col-md-4"  >
                      <label for="phone">Mobile number</label>
                              <div class="input-group mt-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">+49</div>
                                </div>
                                <input type="tel" class="form-control " id="phone"required>
                              </div>
                    </div>
                    <div class="form-group col-md-4 "  >
                      <label for="" class="col-12">Date of Birth</label> 
                      <div class="col-md-12  d-flex">
                        <select name="day" id="day" class="form-control mr-2" required>
                          <option value="day" id="setday">day</option>
                        </select>


                      <select name="month" id="month" class="form-control mr-2">
                        <option value="month" id="setmonth">month</option>
                      </select>

                      <select name="Year" id="year" class="form-control mr-2">
                        <option value="year" id="setyear">year</option>
                      </select>
                      </div>
                      
                            
                    </div>
                    <div class="form-group col-md-4">
                      <label for="nationality">Nationality</label>
                      <select name="Ntionality" id="Ntionality" class="form-control mr-2">
                        <option value="Ntionality">Nationality</option>
                      </select>

                    </div>
                    

                    <div class="form-group col-md-6">
                      <label for="email" id="gender">Gender</label>
                      <!-- Default inline 1-->
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="1" name="gender">
                          <label class="custom-control-label " style="font-weight: 100" for="1">Male</label>
                        </div>

                        <!-- Default inline 2-->
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="2" name="gender">
                          <label class="custom-control-label" style="font-weight: 100" for="2">Female</label>
                        </div>

                        <!-- Default inline 3-->
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="3" name="gender">
                          <label class="custom-control-label" style="font-weight: 100" for="3">Rather not to say</label>
                        </div>
                      
                    </div>


                    <div class="form-group col-md-12">
                      <label class="mt-2"for="nationality">Select Avatar</label>
                      <div class="row mt-0"style="margin-top:2.43rem">
                        <div class="col">
                          <img class="p-0  avtar services-active" id="car" onclick="selectavtar(this.id)" src="images/AvatarImages/car.png"  >
                        </div>
                        <div class="col ">
                          <img class="p-0 avtar" id="female"onclick="selectavtar(this.id)" src="images/AvatarImages/female.png"  > 
                        </div>
        
                        <div class="col">
                            <img class="p-0 avtar"  id="cap" onclick="selectavtar(this.id)" src="images/AvatarImages/cap.png"  >
                        </div>
                        <div class="col">
                            <img class="p-0 avtar"  id="iron" onclick="selectavtar(this.id)" src="images/AvatarImages/iron.png"  >
                        </div>
                        <div class="col">
                            <img class="p-0 avtar"  id="male" onclick="selectavtar(this.id)" src="images/AvatarImages/male.png"  >
                        </div>
                        <div class="col">
                            <img class="p-0 avtar"  id="ship" onclick="selectavtar(this.id)" src="images/AvatarImages/ship.png"  >
                        </div>
                    </div>
                      

                    </div>
                    <label class="mt-2 mb-0 ">My Address</label>
                    <hr style="border:0.1px solid #ccc;width:97% ; margin-left=1rem ; margin-top: 0.5rem">

                    <!-- Address -->
                    <div class="form-group col-md-4">
                      <label for="streetname">Street name</label>
                      <input type="text"class="form-control" id="streetname"required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="housenumber">House number</label>
                      <input type="text"class="form-control" id="housenumber"required>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="postalcode">Postalcode</label>
                      <input type="tel"class="form-control" id="postalcode" placeholder="142536" maxlength="6" onchange="postalchanged()" required>
                    </div>
                    <div class="form-group col-md-4 pb-4" style="border-bottom:0.1px solid #ccc">
                                
                                <label class="location" >City</label>
                                    <select class="form-control" id="city">
                                      <option selcted id="location"></option>
                                    </select>
                              </div>
                  
                  
                  <div class="input-group row justify-content-start" >
                    <div class="col-auto">
                      <button type="button"  onclick="savedetails()" class="btn btn1 btn-next">save</button>
                    </div>
                  </div>
                </div>
                </div>
              </form>

              <!-- Password -->
              <form>

                <div class="form-step">
                  <div class="form-row input-group mb-0 ">
                    <div class="form-group col-md-5 ">
                      <label for="oldpassword">Old password</label>
                      <input type="password"class="form-control" id="oldpassword" onchange="checkoldpassword(this.value)" required>
                    </div>
                  </div>
                  <div class="form-row input-group mt-0 mb-0">
                    <div class="form-group col-md-5">
                      <label for="newpassword">New password</label>
                      <input type="password"class="form-control" id="newpassword"required>
                    </div>
                  </div>
                  <div class="form-row input-group mt-0 mb-0">
                    <div class="form-group col-md-5">
                      <label for="confirmpassword">Confirm password</label>
                      <input type="password"class="form-control" id="confirmpassword"required>
                    </div>
                  </div>
                
            <div class="row">      
        <div class="col">
            <button type="button" onclick="resetpassword()" class="btn btn1 btn-next " style="width:20%" >Save</button>
        </div>
      </div>
                </div>
              </form>
    </div>
  </div>



</div>
<!-- TABLE END -->
</div>
</div>
</section>
</div>

  

<!-- Edit Address -->

<div class="modal fade" id="editModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">

            
      
        <!-- Modal Header -->
        <div class="modal-header pb-0">
          <h4 class="modal-title avatar_name2"><strong>Edit Address</strong></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
         <form>

                          <div class="form-row input-group">
                            <div class="form-group col-md-6">
                              <label for="streetname">Streat Name</label>
                              <input type="text" class="form-control" id="street" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="housenumber">House Number</label>
                              <input type="text" class="form-control" id="housenumber" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="postalcode">Postal code</label>
                              <input type="text" onchange="postalchanged()" class="form-control" id="pincode" maxlength="6" required>
                              </div>
                              <div class="form-group col-md-6">
                                
                                <label class="location" >City</label>
                                    <select class="form-control">
                                      <option selcted id="location"></option>
                                    </select>
                              </div>
                            <div class="form-group col-md-6">
                              <labe for="phone1">Phone number</labe>
                              <div class="input-group ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">+49</div>
                                </div>
                                <input type="tel" class="form-control " id="phone1" placeholder="Mobile number" required>
                              </div>
                            </div>
                          </div>

                            <div class="row mt-0 " >
                            <div class="col">
                              
                              <button onclick="saveeditedaddress()" class="btn btn1 btn-next w-100" id="addressbtn">Edit</button>
                            </div>
                            
                          </div>
                          
                        </form>
          
        </div>
        
        
          </div>
        </div>
</div>

<!-- Add Service Modal -->
<div class="modal fade" id="addAddressModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">

            
      
        <!-- Modal Header -->
        <div class="modal-header pb-0">
          <h4 class="modal-title avatar_name2"><strong>Add New Address</strong></h4>
          <button type="button" id="newaddbtn" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" >
         <form>

                          <div class="form-row input-group">
                            <div class="form-group col-md-6">
                              <label for="street2">Streat Name</label>
                              <input type="text" class="form-control" id="street2" placeholder="Street" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="housenumber2">House Number</label>
                              <input type="text" class="form-control" id="housenumber2" placeholder="House" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="pincode2">Postal code</label>
                              <input type="text" class="form-control" onchange="postalchanged2()" id="pincode2" maxlength="6" placeholder="Postalcode" required>
                              </div>
                              <div class="form-group col-md-6">
                                
                                <label class="location2" >City</label>
                                    <select class="form-control">
                                      <option selcted id="location2"></option>
                                    </select>
                              </div>
                            <div class="form-group col-md-6">
                              <labe for="phone2">Phone number</labe>
                              <div class="input-group ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">+49</div>
                                </div>
                                <input type="tel" class="form-control " id="phone2" placeholder="Mobile number" maxlength="10" placeholder="phone" required>
                              </div>
                            </div>
                          </div>

                            <div class="row " >
                            <div class="col text-center ">
                              
                              <button type="button"  onclick="saveaddress()" class="btn btn1 btn-next">Add</button>
                            </div>
                            
                          </div>
                          
                        </form>
          
        </div>
        
        
          </div>
        </div>
</div>

  
  
  <!-- MAIN CONTENT END -->
  <!-- FOOTER START -->

 <?php include_once 'service_provider_mysettings_script.php'; 
      include_once 'footer.php';
         ?>
 

<!-- COOKIE END -->

      
<?php include_once 'jsLinks.php'; ?>



</body>
</html>


    





