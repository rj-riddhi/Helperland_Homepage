<?php 
    session_start(); 
    
?>
<!doctype html>
<html lang="en">
<head>
  <?php include_once 'headerLinks.php'; ?>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/new_service_request.css">
  <title>Block Customer</title>
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
  <a href="service_schedule_sp.php">Service Schedule</a>
  <a href="service_provider_history.php">Service History</a>
  <a href="MyRetings.php">My Ratings</a>
  <a href="#" class="active">Block Customer</a>
</div>
</div>

<!-- TABLE -->
<div class="col table-responsive-md ">
 <div class="alert alert-danger" id="error-message" style="display: none"></div>
 <div class="alert alert-success"id="success-message" style="display: none"></div> 
<table class="table table-hover table-bordered" id="myTable">
  
  <tbody >
    
  <div class="row" id="tabledata4">

    </div>
    

    
  </tbody>
</table>
<div class="row form-row justify-content-between ">
                    <section class="col-md-10">
                      <span style="color:#646464">Show</span>
                      <select name="" id="select">
                        <option value="2" >2</option>
                        <option value="4">4</option>
                        <option value="6">6</option>
                        <option value="8">8</option>
                        <option value="10" selected>10</option>
                        <option value="12">12</option>
                        <option value="12">14</option>
                        <option value="12">16</option>
                      </select>
                      <span style="color:#646464">Entries</span>
                      <ul class="pagination  col-md-2 ml-auto  text-right">
                        <li class="prev"><a href="#" id="prev"><img src='images/Service_History/first-page.png' alt='first'/></a></li>
                        <li class="next"><a href="#" id="next"><img src='images/Service_History/first-page.png' alt='first' style='transform: rotate(180deg)' /></a></li>
                      </ul>
                    </section>
                  </div>

</div>
<!-- TABLE END -->



</div>
    

</div>
</div>

  
  <!-- MAIN CONTENT END -->
  <!-- FOOTER START -->

      <script src="JavaScripts/export_data.js"></script>
  <?php include_once 'service_provider_script.php';
        include_once 'footer.php'; ?>



    <?php include_once 'jsLinks.php'; ?>

</body>
</html>







