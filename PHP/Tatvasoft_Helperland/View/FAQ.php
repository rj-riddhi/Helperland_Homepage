<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php include 'headerLinks.php'; ?>
    <!-- External css -->
    <link rel="stylesheet" href="css/FAQ.css">
    
    <title>FAQ</title>
  </head>
  <body>
    <div class="container-fluid p-0  main_container">
      <!-- Header start -->
      <?php
      require_once 'header.php';
      ?>
      <!-- Header End -->
      <!-- Main Content start-->
       <section>
        <div class="row ">
          <div class="col">
          <img class="banner"src="images/FAQ's/banner.png"></div>
        </div>
        <p class="text-center faq">FAQs</p>
        
        
        <div class="row text-center">
          <div class="col">
            <img  src="images/FAQ's/faq_star.png">
          </div>
        </div>
        <div class="container container2 mx-auto" >
          <div class="row">
            <div class="col"></div>
            <div class="col-md-auto text-center" style="max-width:498px;">
              <p>Whether you are Customer or Service provider, We have tried our best to solve all your queries and questions.</p>
            </div>
            <div class="col"></div>
            
          </div>
          <div class="row text-center">
            <div class="col p-0 "><a href="#headingOne" style="text-decoration: none;"><p style="background-color: #1D7A8C ; color:#FFFFFF ; line-height: 52px; border-bottom: 2px solid #1D7A8C">FOR CUSTOMER</p></a></div>
            <div class="col p-0"  ><a href="#headingFive"  style="text-decoration: none;"><p style="background-color:  #F6F6F6; color:#525252  ; line-height: 52px; border-bottom: 2px solid #1D7A8C">FOR SERVICE PROVIDER</p></a></div>
            <hr>
          </div>
          <div class="row ">
            <div class="col p-0">
              <div class="card ">
                <div class="card-header pl-0 d-flex border-0" id="headingOne" >
                  <a class="btn-link collapsed"data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><span class="icon"><img src="images/FAQ's/right-arrow.png"></span></a>
                  <p class="mb-0 ml-4" style="font-weight: bold;">
                    What's included in a cleaning?
                  </p>
                </div>
                <div id="collapseOne"  class="collapse collapsed" aria-labelledby="headingOne" >
                  <div class="card-body ml-4">
                    Bedroom, Living Room & Common Areas, Bathrooms, Kitchen, Extras
                  </div>
                </div>
                
              </div>
              <div class="card ">
                <div class="card-header pl-0 d-flex border-0" id="headingTwo" >
                  
                  <a class="btn-link collapsed"data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><span class="icon"><img src="images/FAQ's/right-arrow.png"></span></a>
                  
                  <p class="mb-0 ml-4" style="font-weight: bold;">
                    Which Helperland professional will come to my place?
                  </p>
                </div>
                <div id="collapseTwo" class="collapse collapsed" aria-labelledby="headingTwo">
                  <div class="card-body ml-4">
                    Helperland has a vast network of experienced, top-rated cleaners. Based on the time and date of your request, we work to assign the best professional available. Like working with a specific pro? Add them to your Pro Team from the mobile app and they'll be requested first for all future bookings. You will receive an email with details about your professional prior to your appointment.
                  </div>
                </div>
              </div>
              <div class="card ">
                <div class="card-header pl-0 d-flex border-0" id="headingThree" >
                  <!-- <button class="btn btn-link" > -->
                  <a class="btn-link collapsed"data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"><span class="icon"><img src="images/FAQ's/right-arrow.png"></span></a>
                  <!-- </button> -->
                  <p class="mb-0 ml-4" style="font-weight: bold;">
                    Can I skip or reschedule bookings?
                  </p>
                </div>
                <div id="collapseThree" class="collapse collapsed" aria-labelledby="headingThree">
                  <div class="card-body ml-4">
                    You can reschedule any booking for free at least 24 hours in advance of the scheduled start time. If you need to skip a booking within the minimum commitment, we’ll credit the value of the booking to your account. You can use this credit on future cleanings and other Helperland services.


                  </div>
                </div>
              </div>
              <div class="card ">
                <div class="card-header pl-0 d-flex border-0" id="headingFour" >
                  <!-- <button class="btn btn-link" > -->
                  <a class="btn-link collapsed"data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour"><span class="icon"><img src="images/FAQ's/right-arrow.png"></span></a>
                  <!-- </button> -->
                  <p class="mb-0 ml-4" style="font-weight: bold;">
                    Do I need to be home for the booking?
                  </p>
                </div>
                <div id="collapseFour" class="collapse collapsed" aria-labelledby="headingFour">
                  <div class="card-body ml-4">
                    We strongly recommend that you are home for the first clean of your booking to show your cleaner around. Some customers choose to give a spare key to their cleaner, but this decision is based on individual preferences.
                  </div>
                </div>
              </div>


              <!-- For Service Provider -->
              
            </div>
            <div class="col p-0" style="visibility: hidden">
              <div class="card ">
                <div class="card-header pl-0 d-flex border-0" id="haddingFive" >
                  <a class="btn-link collapsed"data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive"><span class="icon"><img src="images/FAQ's/right-arrow.png"></span></a>
                  <p class="mb-0 ml-4" style="font-weight: bold;">
                    What's included in a cleaning?
                  </p>
                </div>
                <div id="collapseFive"  class="collapse collapsed" aria-labelledby="haddingFive" >
                  <div class="card-body ml-4">
                    Bedroom, Living Room & Common Areas, Bathrooms, Kitchen, Extras
                  </div>
                </div>
                
              </div>
              <div class="card ">
                <div class="card-header pl-0 d-flex border-0" id="headingSix" >
                  
                  <a class="btn-link collapsed"data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix"><span class="icon"><img src="images/FAQ's/right-arrow.png"></span></a>
                  
                  <p class="mb-0 ml-4" style="font-weight: bold;">
                    Which Helperland professional will come to my place?
                  </p>
                </div>
                <div id="collapseSix" class="collapse collapsed" aria-labelledby="headingSix">
                  <div class="card-body ml-4">
                    Helperland has a vast network of experienced, top-rated cleaners. Based on the time and date of your request, we work to assign the best professional available. Like working with a specific pro? Add them to your Pro Team from the mobile app and they'll be requested first for all future bookings. You will receive an email with details about your professional prior to your appointment.
                  </div>
                </div>
              </div>
              <div class="card ">
                <div class="card-header pl-0 d-flex border-0" id="headingSeven" >
                  <!-- <button class="btn btn-link" > -->
                  <a class="btn-link collapsed"data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven"><span class="icon"><img src="images/FAQ's/right-arrow.png"></span></a>
                  <!-- </button> -->
                  <p class="mb-0 ml-4" style="font-weight: bold;">
                    Can I skip or reschedule bookings?
                  </p>
                </div>
                <div id="collapseSeven" class="collapse collapsed" aria-labelledby="headingSeven">
                  <div class="card-body ml-4">
                    You can reschedule any booking for free at least 24 hours in advance of the scheduled start time. If you need to skip a booking within the minimum commitment, we’ll credit the value of the booking to your account. You can use this credit on future cleanings and other Helperland services.


                  </div>
                </div>
              </div>
              <div class="card ">
                <div class="card-header pl-0 d-flex border-0" id="headingEight" >
                  <!-- <button class="btn btn-link" > -->
                  <a class="btn-link collapsed"data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight"><span class="icon"><img src="images/FAQ's/right-arrow.png"></span></a>
                  <!-- </button> -->
                  <p class="mb-0 ml-4" style="font-weight: bold;">
                    Do I need to be home for the booking?
                  </p>
                </div>
                <div id="collapseEight" class="collapse collapsed" aria-labelledby="headingFour">
                  <div class="card-body ml-4">
                    We strongly recommend that you are home for the first clean of your booking to show your cleaner around. Some customers choose to give a spare key to their cleaner, but this decision is based on individual preferences.
                  </div>
                </div>
              </div>

              <!-- For Service Provider -->
              
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