<!doctype html>
<html lang="en">
  <head>
    <?php include_once 'headerLinks.php';
          include_once '../helpers/msgs.php'; ?>
    <link rel="stylesheet" href="css/Contact.css">
    <title>Contact Us</title>
</head>
<body >
  <div class="container-fluid p-0  main_container">
    <!-- HEADER -->
    <?php include_once 'navbar.php'; ?>
    
    <!-- HEADER END -->
    <!-- MAIN CONTENT -->
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
     <!--  <?php 
      //if(isset($_SESSION['message'])){ flash('succesmsg');
   // }?> -->
      
      <div class="container mx-auto p-0 form_container">
        
        <h2>Get in touch with us</h2>
        
          
        
        
        <?php 
    flash('contact')
     ?> 
        <form method="post" action="../controllers/Users.php">
          <input type="hidden" name="type" value="contact">
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" name="FirstName" id="inputFirstName" placeholder="First name">
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control" name="LastName" id="inputLastName" placeholder="Last name">
            </div>
          </div>
          <div class="form-row align-items-center">
            <div class="col-md-6">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">+49</div>
                </div>
                <input type="text" class="form-control" name="phone" id="inlineFormInputGroup" placeholder="Mobile number">
              </div>
            </div>
            <div class="col-md-6">
              <input type="email" class="form-control" name="Email" id="inputEmail4" placeholder="Email address">
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
            <textarea class="form-control" name="msg"id="exampleFormControlTextarea1" rows="3" placeholder="Message"></textarea>
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
    <!-- MAIN CONTENT END -->
    <!-- FOOTER START -->
    <?php include_once 'footer.php'; ?>
    <!-- COOKIE END -->
    
    <?php include_once 'jsLinks.php'; ?>
    
  </body>
</html>