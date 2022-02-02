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
     <?php
     flash('register')
      ?>
    <!-- HEADER -->
    <div class="container-fluid p-0 banner">
      <?php include_once 'homeNav.php'; ?>
      <div class="container mx-auto p-0 form_container" style="overflow-x: hidden">
        <h2 class="form-heading">Register Now!</h2>
        <form method="post" action="../controllers/Users.php">
                <input type="hidden" name="type" value="service_provider">
          <div class="form-row align-items-center">
            <div class="form-group col-12 p-0">
              <input type="text" class="form-control" id="inputFirstName" placeholder="First name" name="usersFirstName" required>
            </div>
            <div class="form-group col-12 p-0">
              <input type="text" class="form-control" id="inputLastName" placeholder="Last name" name="usersLastName" required>
            </div>
            <div class="form-group col-12 p-0">
              <input type="email" class="form-control" id="email" placeholder="Email Address" name="usersEmail" required>
            </div>
            
            
            <div class="col-12 p-0">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">+46</div>
                </div>
                <input type="tel" class="form-control" id="inlineFormInputGroup" placeholder="Mobile number" name="phone" required>
              </div>
            </div>
            <div class="form-group col-12 p-0">
              <input type="password" class="form-control" id="password1" placeholder="Password" required name="usersPwd">
            </div>
            <div class="form-group col-12 p-0">
              <input type="password" class="form-control" id="password2" placeholder="Confirm Password" required name="pwdRepeat">
            </div>
            <div class="form-group col-12 p-0">
              <div class="checkbox">
                <label><input type="checkbox" class="check"> Send me newsletters from Helperland</label>
                <label><input type="checkbox" class="check"> I accept <span style="color:#1FB6FF">terms and conditions</span>  & <span style="color:#1FB6FF"> privacy policy</span></label>
              </div>
            </div>
            <div class="form-group col-12 p-0">
              <div class="col text-center" style="margin-top : 0.93rem;">
                <button class="sub_btn btn" onclick="#"><span> Get Started  <img class="right-arrow" src="images/Become_a_Pro/right-arrow.png" style="color:white"></span></button>
              </div>
            </div>
          </div>
        </form>
        <!-- <form method="post" action="../controllers/Users.php">
                <input type="hidden" name="type" value="service_provider">
                <div class="form-row" style="border-style: none;">
                  <div class="form-group col-12">
                    <input type="email" name="Email" class="form-control  user" placeholder="Email"required>
                  </div>
                  <div class="form-group col-12">
                    <input type="password" name="password" class="form-control  lock" placeholder="Password"required>
                  </div>
                  <div class="form-group col">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value=""required>
                      <label class="form-check-label ml-2">
                        <p class="p">Remember me</p>
                      </label>
                      
                    </div>
                  </div>
                  
                  
                  <div class="col-12 text-center">
                    <button type="submit" name="submit" class="btn book_btn">Login</button>
                  </div>
                  <div class="col-12 mt-2">
                    <p class="text-center"><span> <a class="forgot-password" href="#" data-toggle="modal" data-target="#ForgotModal" data-dismiss="modal">Forgot password?</a></span></p>
                    <p class="text-center p"><span class="span"> Don't have an account?<a href="./customerRegister.php" title=""> Create one account</a></span></p>
                  </div>
                  
                </div>
                
              </form> -->
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
<?php include_once 'footer.php'; ?>
<!-- COOKIE END -->


<?php include_once 'jsLinks.php'; ?>

</body>
</html>