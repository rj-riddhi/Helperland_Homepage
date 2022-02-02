<?php 
    session_start(); 
?>
<!doctype html>
<html lang="en">
<head>
  <?php include_once 'headerLinks.php'; ?>
  <link rel="stylesheet" href="css/upcoming_service.css">
  <title>Service History </title><title>Upcomming Services</title>
</head>
<body >
  <div class="container-fluid p-0  main_container">
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


  <!-- HEADER END -->
  <!-- MAIN CONTENT -->

  <div class="container container2 p-0" >
<div class="row m-0 justify-content-center">
  <div class="col d-none d-lg-block sidebar_col p-0" >
    
  <div class="sidebar">
  <a  href="#">Dashboard</a>
  <a href="#">New Service Requests</a>
  <a class="active" href="#">Upcoming Services</a>
  <a href="#">Service Schedule</a>
  <a href="#">Service History</a>
  <a href="#">My Ratings</a>
  <a href="#">Block Customer</a>
</div>
</div>

<!-- TABLE -->
<div class="col table-responsive-md d-none d-sm-block">
  

<table class="table table-hover table-bordered" id="myTable">
  <thead style="position: sticky;top: 0">
    <tr>
      <th class="header"scope="col">Service ID <img class="sort" src="images/Upcoming_Service/sort.png"></th>
      <th class="header"scope="col">Service date <img class="sort" src="images/Upcoming_Service/sort.png"></th>
      <th class="header"scope="col">Customer details <img class="sort" src="images/Upcoming_Service/sort.png"></th>
      <th class="header"scope="col">Distance <img class="sort" src="images/Upcoming_Service/sort.png"></th>
      <th class="header"scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>323436</td>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Upcoming_Service/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><img src="images/Upcoming_Service/layer-14.png"><span class="time">12:00 - 18:00</span>
            </div>
          </div>
      </td>

      <td>
        <div class="row">
           <div class="col">
              David Bough 
            </div>
        </div>
          <div class="row">
            <div class="col"><img src="images/Upcoming_Service/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
            </div>
          </div>
      </td>
      <td>15km</td>
      <td><span class="badge_cancel" onclick="deleteRow(this)">Cancel</span></td>
    </tr>

    <tr>
      <td>323436</td>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Upcoming_Service/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><img src="images/Upcoming_Service/layer-14.png"><span class="time">12:00 - 18:00</span>
            </div>
          </div>
      </td>

      <td>
        <div class="row">
           <div class="col">
              David Bough 
            </div>
        </div>
          <div class="row">
            <div class="col"><img src="images/Upcoming_Service/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
            </div>
          </div>
      </td>
      <td>15km</td>
      <td><span class="badge_cancel" onclick="deleteRow(this)">Cancel</span></td>
    </tr>

    <tr>
      <td>323436</td>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Upcoming_Service/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><img src="images/Upcoming_Service/layer-14.png"><span class="time">12:00 - 18:00</span>
            </div>
          </div>
      </td>

      <td>
        <div class="row">
           <div class="col">
              David Bough 
            </div>
        </div>
          <div class="row">
            <div class="col"><img src="images/Upcoming_Service/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
            </div>
          </div>
      </td>
      <td>15km</td>
      <td><span class="badge_cancel" onclick="deleteRow(this)">Cancel</span></td>
    </tr>

    <tr>
      <td>323436</td>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Upcoming_Service/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><img src="images/Upcoming_Service/layer-14.png"><span class="time">12:00 - 18:00</span>
            </div>
          </div>
      </td>

      <td>
        <div class="row">
           <div class="col">
              David Bough 
            </div>
        </div>
          <div class="row">
            <div class="col"><img src="images/Upcoming_Service/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
            </div>
          </div>
      </td>
      <td>15km</td>
      <td><span class="badge_cancel" onclick="deleteRow(this)">Cancel</span></td>
    </tr>

    <tr>
      <td>323436</td>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Upcoming_Service/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><img src="images/Upcoming_Service/layer-14.png"><span class="time">12:00 - 18:00</span>
            </div>
          </div>
      </td>

      <td>
        <div class="row">
           <div class="col">
              David Bough 
            </div>
        </div>
          <div class="row">
            <div class="col"><img src="images/Upcoming_Service/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
            </div>
          </div>
      </td>
      <td>15km</td>
      <td><span class="badge_cancel" onclick="deleteRow(this)">Cancel</span></td>
    </tr>

    <tr>
      <td>323436</td>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Upcoming_Service/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><img src="images/Upcoming_Service/layer-14.png"><span class="time">12:00 - 18:00</span>
            </div>
          </div>
      </td>

      <td>
        <div class="row">
           <div class="col">
              David Bough 
            </div>
        </div>
          <div class="row">
            <div class="col"><img src="images/Upcoming_Service/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
            </div>
          </div>
      </td>
      <td>15km</td>
      <td><span class="badge_cancel" onclick="deleteRow(this)">Cancel</span></td>
  
    </tr>
  </tbody>
</table>

</div>
<!-- TABLE END -->

<!-- CARD VIEW -->


  <table class="table card table-hover d-sm-none d-block " >
  
  <tbody class="card_body ">
      <tr>
        <td>323436</td>
      </tr>

      <tr>
        <td class="row">
          <div class="col">
            <div class="row">
              <div class="col-auto pr-0"><img src="images/Upcoming_Service/calendar2.png"></div>
              <div class="col-auto "><strong>04/12/2022</strong></div>
              <div class="col-auto pr-0"><img src="images/Upcoming_Service/layer-14.png"></div>
              <div class="col-auto "><strong>08:00 - 11:00</strong></div>
            </div>
          </div>
        </td>
      </tr>

      <tr>
        <td class="row">
          <div class="col-auto pr-0"><img src="images/Upcoming_Service/layer-15.png"></div>
          <div class="col-auto">David Bough
          <p>Musterstrabe 5,12345 Bonn</p></div>
          
        </td>
      </tr>

      <tr>
        <td>15 km</td>
      </tr>

      <tr>
        <td class="text-center" ><span class="badge_cancel">Cancel</span></td>
      </tr>
  </tbody>
</table>

</div>

<!-- Card view end -->
    

</div>
</div>
  
  
  <!-- MAIN CONTENT END -->
  <!-- FOOTER START -->
  <?php include_once 'footer.php'; ?>


<script>
function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  console.log(i);
  document.getElementById("myTable").deleteRow(i);
}
</script>

    <?php include_once 'jsLinks.php'; ?>

</body>
</html>








