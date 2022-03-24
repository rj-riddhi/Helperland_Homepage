<?php 
    session_start(); 
    
?>
<!doctype html>
<html lang="en">
<head>
  <?php include_once 'headerLinks.php'; ?>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/new_service_request.css">
  <title>Service History</title>
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
  <a class="active" href="#">Service History</a>
  <a href="MyRetings.php">My Ratings</a>
  <a href="block_customer.php">Block Customer</a>
</div>
</div>

<!-- TABLE -->
<div class="col table-responsive-md ">
  
<div class="col service_history">Service History</div>
      <div class="col  text-right"><button class="mt-0 btn  nav_btn" onclick="exportToExcel('tblexportData', 'Service-history')">Export</button></div>
<table class="table table-hover table-bordered" id="myTable">
  <thead style="position: sticky;top: 0">
    <tr >
      <th class="header"scope="col">Service ID </th>
      <th class="header"scope="col">Service date </th>
      <th class="header"scope="col">Customer details </th>
    </tr>
  </thead>
  <tbody id="tabledata3">
    

    
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

<!-- Summary modal -->
<div class="modal fade " id="summaryModal2"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="overflow-y: hidden">
        <div class="modal-dialog" style="min-width: 200%">
          <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- Modal Header -->
        <div class="modal-header ">
          <h4 class="modal-title">Service Details</h4>
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>
        
        <!-- Modal body -->
        <div class="modal-body row">
         <div class="col-md-3 pr-0">
          <div class="row summary_row" >
            <div class="col-12 avatar_name2" style="font-size:1.5rem"><strong id="date_time2"></strong></div>
            <div class="col-12 ">
                <strong>Duration:</strong> <span id="duration2"></span> Hrs  
            </div>
          </div>
          
          <div class="row summary_row">
            <div class="col-12"><strong>Service Id:</strong> <span class="avatar_name2" id="serviceid2"></span></div>
            <div class="col-12">
              <strong>Extras:</strong> <span id="extra2"></span>
            </div>
            <div class="col-4"><strong>Net Amount:</strong></div>
            <div class="col-8 payment_fonts "><span id="payment2"></span>  € </div>
          </div>
          <div class="row summary_row">
            <div class="col-12 "><strong>Service Address:</strong> <span class="avatar_name2" id="address2"></span></div>
            
            <div class="col-12">
              <strong>Customer:</strong> <span id="custname2"></span>
            </div>
            
          </div>
          <div class="row">
            <div class="col-12 avatar_name2">Comments <span id="comments2"></span></div>
            <div class="col-12 d-none " id="pets2" >
             <i class="fa fa-times  icon-background"></i> I don't have pets at home
            </div>
            
          </div>
        
        
        <!-- Modal footer -->
        <div class="modal-footer justify-content-start">
          <!-- <div class="row"> -->
            <span class="badge_cancel d-none" onclick="cancel(this.id)" data-dismiss="modal">
              <i class="fa fa-times"></i> Cancel</span>
            <span class="badge_complete d-none" onclick="complete(this.id)" data-dismiss="modal">
              <i class="fa fa-check"></i> Complete</span>
            
         <!--  </div> -->
        </div>
      </div>
          <div class="col-md-9">
            
            <iframe max-width="50%" height="100%" class="googlemap2" frameBorder="0"></iframe>
          
          </div>
      </div>
        
        
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







