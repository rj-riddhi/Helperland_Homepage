<?php 
    session_start(); 
?>


<!doctype html>
<html lang="en">
  <head>
    
  <?php include_once 'headerLinks.php'; ?>

  <link rel="stylesheet" href="../views/css/cust_mysetting.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <title>My Settings </title>

  
</head>
<body >
  <div class="container-fluid p-0  main_container" style="overflow-y: hidden">
    <header>
    <!-- HEADER -->
     <?php include_once 'login_nav.php'; ?>




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
      <a  href="../controllers/Users.php?q=cust_dashboard">Dashboard</a>
      <a href="../controllers/Users.php?q=cust_servicehistory" >Service History</a>
      <a  href="#">Service Schedule</a>
      <a href="#">Favourite Pros</a>
      <a href="#">Invoices</a>
      <a href="#">Notifications</a>
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
                  <div class="progress-step  " onclick="address()" data-title="addresses">
                    <p>My Addresses</p>
                  </div>
                  <div class="progress-step " onclick="password()" data-title="ID">
                    <p>Change Password</p>
                  </div>
                </div>

                <div class="alert alert-danger" id="error-message" style="display: none"></div>
                <div class="alert alert-success"id="success-message" style="display: none"></div>
                

                <!-- Details -->
              <form>
                <div class="form-step form-step-active">
                  <div class="form-row input-group">
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
                    <div class="form-group col-md-8 "  >
                      <label for="" class="col-12">Date of Birth</label> 
                      <div class="col-md-12  d-flex">
                        <select name="day" id="day" class="form-control mr-2" required>
                          <option value="day">day</option>
                        </select>


                      <select name="month" id="month" class="form-control mr-2">
                        <option value="month">month</option>
                      </select>

                      <select name="Year" id="year" class="form-control mr-2">
                        <option value="year">year</option>
                      </select>
                      </div>
                      
                            
                    </div>
                    <hr style="border:0.1px solid #ccc;width:97% ; margin-left=1rem">

                    <div class="form-group col-md-4">
                      <label for="email">My preferred language</label>
                      <select name="language" id="language" class="form-control">
                        <option value="language">language</option>
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

              <!-- Addresses -->

              <form>
                <div class="form-step ">
                

                      <table class="table table-hover table-bordered" id="myTable">
                        <thead class="thead-light"style="position: sticky;top: 0">
                          <tr>
                            <th class="header pl-4"scope="col">Addresse</th>
                            <th class="header text-center"scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody class="tbody" id="tabledata">
                        
                        </tbody>
                       

                      </table>
                    <div class="col pl-0 text-left">
                        <button type="button" class="mt-0 ml-0 btn nav_btn" 
                        data-toggle="modal" data-target="#addAddressModal">Add New Address</button></div>
                    </div>
          </form>

              <!-- Password -->
              <form>

                <div class="form-step">
                  <div class="form-row input-group mb-0 ">
                    <div class="form-group col-md-5 ">
                      <label for="oldpassword">Old password</label>
                      <input type="password"class="form-control" id="oldpassword"required>
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

 <?php include_once 'customer_settings_script.php'; 
      include_once 'footer.php';
         ?>
 

<!-- COOKIE END -->

      
<?php include_once 'jsLinks.php'; ?>



</body>
</html>


    





