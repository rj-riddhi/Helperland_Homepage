<?php
session_start();
  $base_url = "http://localhost/Helperland/"

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php include 'headerLinks.php'; ?>
    <!-- External css -->
    <link rel="stylesheet" href="css/Contact.css">
    
    <title>Contact Us</title>
  </head>
  <body>
    <div class="container-fluid p-0  main_container">
      <!-- Header start -->
      <?php
      require_once 'header.php';
      ?>
      <!-- Header End -->
      <!-- Main Content start-->
      <section >
      <div class="row">
        <div class="col ">
          <img class="banner"src="images/Contact/contact-bg.png" alt="Workers">
        </div>
      </div>
      <div class="container mx-auto p-0" >
        <h1>Contact us</h1>
        <div class="row m-0 justify-content-center">
          <div class="col p-0 mr-1" style="max-width:4rem"><hr style="width:3.87rem ; border:1px solid #CCCCCC"></div>
          <div class="col p-0" style="max-width:1.5rem">
            <img  src="images/Contact/faq_star.png">
          </div>
          <div class="col p-0 ml-1" style="max-width:4rem"><hr style="width:3.87rem ; border:1px solid #CCCCCC"></div>
        </div>
      </div>
      <div class="container">
        <div class="row  justify-content-around contact_logo_row">
        <div class="col text-center">
          <img  src="images/Contact/location.png">
          <p class="contact_logo_para">1111 Lorem ipsum text 100,<br> Lorem ipsum AB</p>
        </div>
        <div class="col text-center  ">
          <img  src="images/Contact/phone-call.png">
          <p class="contact_logo_para">+49 (40) 123 56 7890 <br>+49 (40) 123 56 7890</p>
        </div>
        <div class="col text-center">
          <img  src="images/Contact/mail.png">
          <p class="contact_logo_para mail">info@helperland.com</p>
        </div>
      </div>
      </div>
      
      <div class="container mx-auto p-0 form_container">
        <h2>Get in touch with us</h2>
        <form method="post" action="http://localhost/Tatvasoft_Helperland/?controller=Main&function=ContactUs">
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" name="firstname" id="inputFirstName" placeholder="First name" required>
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control" name="lastname" id="inputLastName" placeholder="Last name" required>
            </div>
          </div>
          <div class="form-row align-items-center">
            <div class="col-md-6">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">+49</div>
                </div>
                <input type="tel" name="mobile" class="form-control" id="inlineFormInputGroup" placeholder="Mobile number" required>
              </div>
            </div>
            <div class="col-md-6">
              <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email address" required>
            </div>
          </div>
          <div class="form-row">
            
            <div class="form-group col">
              <select id="inputState" name="sub" class="form-control" placeholder="Subject" required>
                   <option value="Select">Select</option>
                    <option value="Subscription">Subscription</option>
                    <option value="Feedback">Feedback</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3" placeholder="Message" required></textarea>
          </div>
          <div class="form-group">
            <div class="col text-center" style="margin-top : 0.93rem;">
            <button type="submit" class="sub_btn p-0" >Submit</button></div>
          </div>
        </form>
        
      </div>

      <div class="container-fluid map_container ">
        <img class="map"src="images/Contact/map.png">
        <div class="row">
          <div class="col p-0  pin">
              <img  src="images/Contact/pin.png">
          </div>
        </div>
        
      </div>
      
      
      
    </section>
    <!--  Main Content End -->
    <!-- Footer start -->
    <?php
    require_once 'footer.php';
    ?>
    <!-- Footer End -->
    <!-- JS links -->
    <?php
    require_once 'jsLinks.php';
    ?>
  </body>
</html>