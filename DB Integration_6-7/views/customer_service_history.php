<?php 
    session_start(); 
    
?>


<!doctype html>
<html lang="en">
  <head>
    
  <?php include_once 'headerLinks.php';
         ?>
  <link rel="stylesheet" href="../views/css/customer_service_history.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
  <title>Service History </title>

  
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
  <a  href="../controllers/Users.php?q=cust_dashboard">Dashboard</a>
  <a href="#" class="active">Service History</a>
  <a  href="#">Service Schedule</a>
  <a href="block_service_provider.php">Favourite Pros</a>
  <a href="#">Invoices</a>
  <a href="#">Notifications</a>
</div>
</div>

<!-- TABLE -->
<div class="col table-responsive-md">
  <div class="row">
      <div class="col service_history">Service History</div>
      <div class="col  text-right"><button class="mt-0 btn nav_btn" onclick="exportToExcel('tblexportData', 'Service-history')">Export</button></div>
    </div>

<table class="table table-hover table-bordered" id="myTable">
  <thead style="position: sticky;top: 0">
    <tr>
      <th class="header"scope="col">Service Details </th>
      <th class="header"scope="col">Date and Time </th>
      <th class="header"scope="col">Service Provider </th>
      <th class="header"scope="col">Payment</th>
      <th class="header"scope="col">Status </th>
      <th class="header"scope="col">Rate SP</th>
    </tr>
  </thead>
  <tbody id="tabledata">
   

    <!-- Summary modal -->
<div class="modal fade" id="summaryModal">
        <div class="modal-dialog">
          <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header pb-0">
          <h4 class="modal-title">Service Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
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
              <strong>Billing Address:</strong> <span class="avatar_name2">Same as cleaning Address</span>
            </div>
            <div class="col-12">
              <strong>Phone:</strong> <span class="avatar_name2">+49 <span id="phone"></span></span>
            </div>
            <div class="col-12">
              <strong>Email:</strong> <span class="avatar_name2" id="email"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-12 avatar_name2">Comments <span id="comments"></span></div>
            <div class="col-12 d-none " id="pets" >
             <i class="fa fa-times  icon-background"></i> I don't have pets at home
            </div>
            
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer justify-content-center">
          <!-- <div class="row"> -->
            <span class="badge_rate1" data-dismiss="modal">OK</span>
         <!--  </div> -->
        </div>
        
          </div>
        </div>
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

<!-- CARD VIEW -->



</div>

<!-- Card view end -->
    

</div>
</section>
</div>
  
  
  <!-- MAIN CONTENT END -->
  <!-- FOOTER START -->
 <?php include_once 'customer_script_service_history.php'; 
      include_once 'footer.php';

         ?>
 

<!-- COOKIE END -->

      <script src="JavaScripts/export_data.js"></script>
<?php include_once 'jsLinks.php';
      include_once 'export_data.php';
      include_once 'ratemodal.php'
       ?>


</body>
</html>


    





