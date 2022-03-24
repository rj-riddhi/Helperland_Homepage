<?php 
    session_start(); 
    
?>
<!doctype html>
<html lang="en">
<head>
  <?php include_once 'headerLinks.php'; ?>
  

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>

  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/new_service_request.css">
  <title>Service schedule</title>
</head>
<body >
  <div class="container-fluid p-0  main_container">
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


  <!-- HEADER END -->
  <!-- MAIN CONTENT -->

  <div class="container container2 p-0" >
<div class="row m-0 justify-content-center">
  <div class="col d-none d-lg-block sidebar_col p-0" >
    
  <div class="sidebar">
  <a  href="#">Dashboard</a>
  <a href="new_service_request_sp.php">New Service Requests</a>
  <a href="upcoming_service.php">Upcoming Services</a>
  <a class="active" href="#">Service Schedule</a>
  <a href="service_provider_history.php">Service History</a>
  <a href="MyRetings.php">My Ratings</a>
  <a href="block_customer.php">Block Customer</a>
</div>
</div>


  
  <div class=" col container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="calendar " id="calendar"></div>
      </div>
    </div>
  </div>
</div>
    

</div>
</div>
<!-- Summarymodel -->
<div class="modal fade " id="summaryModal3"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow-y: hidden">
        <div class="modal-dialog" style="min-width: 200%">
          <div class="modal-content">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <!-- Modal Header -->
        <div class="modal-header pb-0">
          <h4 class="modal-title">Service Details</h4>
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>
        
        <!-- Modal body -->
        <div class="modal-body row">
          <div class="col-md-3 pr-0">
          <div class="row summary_row" >
            <div class="col-12 avatar_name2" style="font-size:1.5rem"><strong id="date_time"></strong></div>
            <div class="col-12 ">
                <strong>Duration:</strong> <span id="duration"></span> Hrs  
            </div>
          </div>
          
          <div class="row summary_row">
            <div class="col-12"><strong>Service Id:</strong> <span class="avatar_name2" id="serviceid"></span></div>
            <div class="col-12">
              <strong>Extras:</strong> <span id="extra"></span>
            </div>
            <div class="col-4"><strong>Net Amount:</strong></div>
            <div class="col-8 payment_fonts "><span id="payment"></span>  € </div>
          </div>
          <div class="row summary_row">
            <div class="col-12 "><strong>Service Address:</strong> <span class="avatar_name2" id="address"></span></div>
            
            <div class="col-12">
              <strong>Customer:</strong> <span id="custname"></span>
            </div>
            
          </div>
          <div class="row">
            <div class="col-12 avatar_name2">Comments <span id="comments"></span></div>
            <div class="col-12 d-none " id="pets" >
             <i class="fa fa-times  icon-background"></i> I don't have pets at home
            </div>
            
          </div>
        </div>
        <div class="col-md-9">
            
            <iframe max-width="50%" height="100%" class="googlemap1" frameBorder="0"></iframe>
          
          </div>
        
        <!-- Modal footer -->
        <div class="modal-footer justify-content-start">
          <!-- <div class="row"> -->
            <span class="badge_complete " onclick="accept(this.id)" data-dismiss="modal">
              <i class="fa fa-check"></i> Accept</span>
            <!-- <span class="badge_complete d-none" onclick="accept(this.id)" data-dismiss="modal">
              <i class="fa fa-check"></i> Accept</span> -->
            
         <!--  </div> -->
        </div>
        
          </div>
        </div>
</div>
  
  
  <!-- MAIN CONTENT END -->
  <!-- FOOTER START -->
  
<!-- <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script>
<script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>
 -->

    <?php 
    include_once 'jsLinks.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
  <!-- ✅ load jQuery ✅ -->
    <!-- <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script> -->

    <!-- ✅ load moment.js ✅ -->
    <!-- <script
      src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
      integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script> -->

    <!-- ✅ load FullCalendar ✅ -->
    <!-- <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script> -->

    <!-- <script
      src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"
      integrity="sha512-o0rWIsZigOfRAgBxl4puyd0t6YKzeAw9em/29Ag7lhCQfaaua/mDwnpE2PVzwqJ08N7/wqrgdjc2E0mwdSY2Tg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
 -->
    <!-- ✅ Load your JS file ✅ -->

        <!-- <script src = "JavaScripts/dore.script.js"></script> -->
        <!-- <script src="JavaScripts/calender.js"></script> -->
        
    <?php include_once 'service_provider_script.php';

        include_once 'footer.php'; ?>
        

</body>
</html>







