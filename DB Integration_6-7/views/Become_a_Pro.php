<?php
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="css/Become_a_Pro.css">
    <?php include 'headerLinks.php';
        include_once '../helpers/msgs.php'; ?>
    <title>Become A Provider</title>
</head>
<body >
  <div class="container-fluid p-0  main_container">
     
    <!-- HEADER -->
    <div class="container-fluid p-0 banner">
      <?php include_once 'homeNav.php'; ?>
      <div class="container mx-auto form_container" style="overflow-x: hidden;width:30%">
        <h2 class="form-heading">Register Now!</h2>
        <div class="alert alert-danger" id="error-message" style="display: none"></div>
        <div class="alert alert-success"id="success-message" style="display: none"></div>
        <form>
          <?php
     flash('register')
      ?>
          <div class="form-row input-group">
                            <div class="form-group col-12">
                              <input type="text" class="form-control" id="inputFirstName" placeholder="First name" name="usersFirstName" required>
                            </div>
                            <div class="form-group col-12">
                              <input type="text" class="form-control" id="inputLastName" placeholder="Last name" name="usersLastName" required>
                            </div>
                            <div class="form-group col-12">
                              <input type="email" class="form-control" id="email" placeholder="Email Address" name="usersEmail" required>
                              </div>
                             
                            <div class="form-group col-12">
                              <div class="input-group ">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">+49</div>
                                </div>
                                <input type="tel" class="form-control " id="phone1" placeholder="Mobile number" maxlength="10" required>
                              </div>
                            </div>
                            <div class="form-group col-12">
                              <input type="password" class="form-control" id="password1" placeholder="Password" required name="usersPwd">
                            </div>
                            <div class="form-group col-12">
                             <input type="password" class="form-control" id="password2" placeholder="Confirm Password" required name="pwdRepeat">
                            </div>
                             <div class="form-group col-12">
                              <input type="checkbox" class="custom-control-input " id="check" value="1">
                            <label for="check" class="custom-control-label"style="font-weight: normal;font-size: 16px; padding-left:15px;" > I accept <span style="color:#1FB6FF">terms and conditions</span>  & <span style="color:#1FB6FF"> privacy policy</span></label>
                             
                            </div>
                            
                            
                          </div>
                          <div class="row mt-0 " >
                            <div class="col text-center" id="submitbtn">
                              
                              <button type="button" class="sub_btn btn"  onclick="spRegistration()"><span> Get Started  <img class="right-arrow" src="images/Become_a_Pro/right-arrow.png" style="color:white"></span></button>
                            </div>
                            
                          </div>

        </form>
       </div>
      <div class="container ">
        <div class="row m-0">
          <div class="col-12 p-0  text-center"><a href="#how_it_work"><img class="down_arrow" src="images/Become_a_Pro/downarrow.png"></a>
        </div>
      </div>
    </div>
  </div>
  <!-- HEADER END -->
  <!-- MAIN CONTENT -->
  <div class="container-fluid p-0 " id="how_it_work">
    <div class="row mt-5 pt-5">
      <div class="col-2 d-md-visible  p-0"><img src="images/Become_a_Pro/blog-left-bg.png"></div>
      <div class="col-1"></div>
      <div class="col">
        <h1>How it Works</h1>
        <div class="row">
          <div class="col  order-md-first">
            <h3 style="text-align: left;">Register yourself</h3>
            <p>Provide your basic information to register yourself as a service provider</p>
            <p class="readmore">Read more  <span ><img src="images/Become_a_Pro/r_arrow.png" alt="arrow"></span></p>
          </div>
          <div class="col text-md-right text-sm-center order-md-last order-sm-first pt-5"> <img class="register" src="images/Become_a_Pro/helper-img-2.png"> </div>
        </div>
        <div class="row">
          <div class="col text-md-right text-sm-center pt-5"> <img class="register" src="images/Become_a_Pro/group-29.png"> </div>
          <div class="col ">
            <h3 style="text-align: left;">Get service request</h3>
            <p>You will get service requests from customes depends on service area and profile.</p>
            <p class="readmore">Read more  <span ><img src="images/Become_a_Pro/r_arrow.png" alt="arrow"></span></p>
          </div>
        </div>
        <div class="row">
          <div class="col order-md-first ">
            <h3 style="text-align: left;">Complite Service</h3>
            <p>Accept service request from your customers and complete your work.</p>
            <p class="readmore">Read more  <span ><img src="images/Become_a_Pro/r_arrow.png" alt="arrow"></span></p>
          </div>
          <div class="col text-md-right order-md-last order-sm-first text-sm-center pt-5"> <img class="register"  src="images/Become_a_Pro/group-30.png"> </div>
        </div>
      </div>
      <div class="col-1"></div>
      <div class="col-2 pt-0 d-md-visible  right-bg "><img  src="images/Become_a_Pro/blog-right-bg.png"></div>
    </div>
    
  </div>
  
  <!-- MAIN CONTENT END -->
  <!-- FOOTER START -->
<?php 
include_once 'footer.php';
  ?>
<!-- COOKIE END -->


<?php include_once 'become_a_pro_script.php'; 
      include_once 'jsLinks.php';
      ?>


</body>
</html>