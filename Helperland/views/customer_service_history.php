<?php 
    session_start(); 
?>


<!doctype html>
<html lang="en">
  <head>
    
  <?php include_once 'headerLinks.php'; ?>
  <link rel="stylesheet" href="css/cust_service_history.css">
  <title>Service History </title>

  
</head>
<body >
  <div class="container-fluid p-0  main_container" style="overflow-y: hidden">
    <header>
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
    </header>
  
  <!-- HEADER END -->
  <!-- MAIN CONTENT -->
  <section>

  <div class="container container2 p-0" >
    

 <div class="row m-0 justify-content-center">
  <div class="col d-none d-lg-block sidebar_col p-0" >
    
  <div class="sidebar">
  <a  href="#">Dashboard</a>
  <a href="#" class="active">Service History</a>
  <a  href="#">Service Schedule</a>
  <a href="#">Favourite Pros</a>
  <a href="#">Invoices</a>
  <a href="#">Notifications</a>
</div>
</div>

<!-- TABLE -->
<div class="col table-responsive-md d-none d-sm-block">
  <div class="row">
      <div class="col service_history">Service History</div>
      <div class="col  text-right"><button class="mt-0 btn nav_btn" onclick="exportToExcel('tblexportData', 'Service-history')">Export</button></div>
    </div>

<table class="table table-hover table-bordered" id="myTable">
  <thead style="position: sticky;top: 0">
    <tr>
      <th class="header"scope="col">Service Details <img class="sort" src="images/Service_History/sort.png"></th>
      <th class="header"scope="col">Service Provider <img class="sort" src="images/Service_History/sort.png"></th>
      <th class="header col-2"scope="col">Payment<img class="sort" src="images/Service_History/sort.png"></th>
      <th class="header"scope="col">Status <img class="sort" src="images/Service_History/sort.png"></th>
      <th class="header"scope="col">Rate SP</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Service_History/calendar.png"><span class="date"><strong>31/03/2018</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><span class="time">12:00 - 18:00</span>
            </div>
          </div>
      </td>



      <td>
        <div class="row">
           <div class="col-auto avatar">
              <img src="images/Service_History/cap.png">
            </div>
            <div class="col"><span >Lyum Weston</span><br>
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star2.png">
              <span>4</span>
            </div>
        </div>
      </td>
      <td class="text-style-1"><span style="font-size:20px;"> €</span>63</td>
      <td><span class="badge_complete" data-toggle="modal-1" data-target="#myModal-1">Completed</span></td>

      <td><span class=" badge_rate1"data-toggle="modal" data-target="#myModal">Rate SP</span></td>

      <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header pb-0">
          <h4 class="modal-title">
            <div class="row">
              <div class="col-auto avatar1" ><img  src="images/Service_History/cap.png"></div>
              <div class="col-auto"><span class="avatar_name">Lyum Weston</span><br>
                  <img src="images/Service_History/star1.png">
                  <img src="images/Service_History/star1.png">
                  <img src="images/Service_History/star1.png">
                  <img src="images/Service_History/star1.png">
                  <img src="images/Service_History/star2.png">
                  <span style="font-size:16px;color:#646464">4</span>
              </div>
              <div class="col-12 pt-3"><span class="avatar_name"><p>Rate your service Provider</p></span> </div>
            </div>



          </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-4 avatar_name2">On time arrival</div>
            <div class="col pl-0"><img src="images/Service_History/star1.png">
                  <img src="images/Service_History/star1.png">
                  <img src="images/Service_History/star1.png">
                  <img src="images/Service_History/star1.png">
                  <img src="images/Service_History/star2.png">
            </div>
          </div>
          <div class="row">
            <div class="col-4 avatar_name2">Friendly</div>
            <div class="col pl-0"><img src="images/Service_History/star1.png">
                  <img src="images/Service_History/star1.png">
                  <img src="images/Service_History/star1.png">
                  <img src="images/Service_History/star1.png">
                  <img src="images/Service_History/star2.png">
            </div>
          </div>
          <div class="row">
            <div class="col-4 avatar_name2">Quality of service</div>
            <div class="col pl-0"><img src="images/Service_History/star1.png">
                  <img src="images/Service_History/star1.png">
                  <img src="images/Service_History/star1.png">
                  <img src="images/Service_History/star1.png">
                  <img src="images/Service_History/star2.png">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <p class="avatar_name2 mt-2 mb-1">Feedback on service provider</p>
              
              <textarea rows="4" cols="50" name="comment" form="usrform"></textarea>
            </div>
          </div>
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer mx-auto">
          <button class="btn badge_rate1" data-dismiss="modal">Submit</button>
        </div>
        
          </div>
        </div>
      </div>
    </tr>

    <tr>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Service_History/calendar.png"><span class="date"><strong>31/03/2018</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><span class="time">12:00 - 18:00</span>
            </div>
          </div>
      </td>

      <td>
        <div class="row">
           <div class="col-auto avatar">
              <img src="images/Service_History/cap.png">
            </div>
            <div class="col">Lyum Weston<br>
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star2.png">
              <span>4</span>
            </div>
        </div>
      </td>
      <td class="text-style-1 price "><span style="font-size:20px;">€</span>63</td>
      <td><span class="badge_cancel">Cancelled</span></td>
      <td><span class=" badge_rate2 disabled"data-toggle="modal" data-target="#myModal">Rate SP</span></td>
    </tr>

    <tr>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Service_History/calendar.png"><span class="date"><strong>31/03/2018</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><span class="time">12:00 - 18:00</span>
            </div>
          </div>
      </td>

      <td>
        <div class="row">
           <div class="col-auto avatar">
              <img src="images/Service_History/cap.png">
            </div>
            <div class="col">Lyum Weston<br>
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star2.png">
              <span>4</span>
            </div>
        </div>
      </td>
      <td class="text-style-1"><span style="font-size:20px;">€</span>63</td>
      <td><span class="badge_complete">Completed</span></td>
      <td><span class=" badge_rate1"data-toggle="modal" data-target="#myModal">Rate SP</span></td>
    </tr>

    <tr>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Service_History/calendar.png"><span class="date"><strong>31/03/2018</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><span class="time">12:00 - 18:00</span>
            </div>
          </div>
      </td>

      <td>
        <div class="row">
           <div class="col-auto avatar">
              <img src="images/Service_History/cap.png">
            </div>
            <div class="col">Lyum Weston<br>
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star2.png">
              <span>4</span>
            </div>
        </div>
      </td>
      <td class="text-style-1"><span style="font-size:20px;">€</span>63</td>
      <td><span class="badge_cancel">Cancelled</span></td>
      <td><span class=" badge_rate2 disabled"data-toggle="modal" data-target="#myModal">Rate SP</span></td>
    </tr>

    <tr>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Service_History/calendar.png"><span class="date"><strong>31/03/2018</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><span class="time">12:00 - 18:00</span>
            </div>
          </div>
      </td>

      <td>
        <div class="row">
           <div class="col-auto avatar">
              <img src="images/Service_History/cap.png">
            </div>
            <div class="col">Lyum Weston<br>
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star2.png">
              <span>4</span>
            </div>
        </div>
      </td>
      <td class="text-style-1"><span style="font-size:20px;">€</span>63</td>
      <td><span class="badge_complete">Completed</span></td>
      <td><span class=" badge_rate1"data-toggle="modal" data-target="#myModal">Rate SP</span></td>
    </tr>

    <tr>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Service_History/calendar.png"><span class="date"><strong>31/03/2018</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><span class="time">12:00 - 18:00</span>
            </div>
          </div>
      </td>

      <td>
        <div class="row">
           <div class="col-auto avatar">
              <img src="images/Service_History/cap.png">
            </div>
            <div class="col">Lyum Weston<br>
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star2.png">
              <span>4</span>
            </div>
        </div>
      </td>
      <td class="text-style-1"><span style="font-size:20px;">€</span>63</td>
      <td><span class="badge_cancel">Cancelled</span></td>
      <td><span class=" badge_rate2 disabled"data-toggle="modal" data-target="#myModal">Rate SP</span></td>
    </tr>

    <tr>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Service_History/calendar.png"><span class="date"><strong>31/03/2018</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><span class="time">12:00 - 18:00</span>
            </div>
          </div>
      </td>

      <td>
        <div class="row">
           <div class="col-auto avatar">
              <img src="images/Service_History/cap.png">
            </div>
            <div class="col">Lyum Weston<br>
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star2.png">
              <span>4</span>
            </div>
        </div>
      </td>
      <td class="text-style-1"><span style="font-size:20px;">€</span>63</td>
      <td><span class="badge_complete">Completed</span></td>
      <td><span class=" badge_rate1"data-toggle="modal" data-target="#myModal">Rate SP</span></td>
    </tr>

    <tr>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Service_History/calendar.png"><span class="date"><strong>31/03/2018</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><span class="time">12:00 - 18:00</span>
            </div>
          </div>
      </td>

      <td>
        <div class="row">
           <div class="col-auto avatar">
              <img src="images/Service_History/cap.png">
            </div>
            <div class="col">Lyum Weston<br>
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star2.png">
              <span>4</span>
            </div>
        </div>
      </td>
      <td class="text-style-1"><span style="font-size:20px;">€</span>63</td>
      <td><span class="badge_cancel">Cancelled</span></td>
      <td><span class=" badge_rate2 disabled"data-toggle="modal" data-target="#myModal">Rate SP</span></td>
    </tr>

    <tr>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Service_History/calendar.png"><span class="date"><strong>31/03/2018</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><span class="time">12:00 - 18:00</span>
            </div>
          </div>
      </td>

      <td>
        <div class="row">
           <div class="col-auto avatar">
              <img src="images/Service_History/cap.png">
            </div>
            <div class="col">Lyum Weston<br>
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star2.png">
              <span>4</span>
            </div>
        </div>
      </td>
      <td class="text-style-1"><span style="font-size:20px;">€</span>63</td>
      <td><span class="badge_complete">Completed</span></td>
      <td><span class=" badge_rate1"data-toggle="modal" data-target="#myModal">Rate SP</span></td>
    </tr>

    <tr>
      <td>
        <div class="row">
           <div class="col">
              <img src="images/Service_History/calendar.png"><span class="date"><strong>31/03/2018</strong></span>
            </div>
        </div>
          <div class="row">
            <div class="col"><span class="time">12:00 - 18:00</span>
            </div>
          </div>
      </td>

      <td>
        <div class="row">
           <div class="col-auto avatar">
              <img src="images/Service_History/cap.png">
            </div>
            <div class="col">Lyum Weston<br>
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star2.png">
              <span>4</span>
            </div>
        </div>
      </td>
      <td class="text-style-1"><span style="font-size:20px;">€</span>63</td>
      <td><span class="badge_cancel">Cancelled</span></td>
      <td><span class=" badge_rate2 disabled"data-toggle="modal" data-target="#myModal">Rate SP</span></td>
    </tr>

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


  <table class="table card table-hover d-sm-none d-block " >
  
  <tbody class="card_body ">

      

      <tr>
        <td class="row">
          <div class="col">
            <div class="row">
              <div class="col-auto pr-0"><img src="images/Service_History/calendar.png"></div>
              <div class="col-auto "><strong>04/12/2022</strong></div>
              <div class="col-auto "><strong>08:00 - 11:00</strong></div>
            </div>
          </div>
        </td>
      </tr>

      <tr>
        <td class="row">
          <div class="col-auto pr-0"><img src="images/Service_History/cap.png"></div>
          <div class="col-auto">Lyum Weston<br>
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star1.png">
              <img src="images/Service_History/star2.png">
              <span>4</span></div>
          
        </td>
      </tr>

      <tr>
      <td class="text-style-1"><span style="font-size:20px;">€</span>63</td>
      </tr>

      <tr>
      <td><span class="badge_complete">Completed</span></td>
      <td><span class=" badge_rate1"data-toggle="modal" data-target="#myModal">Rate SP</span></td>
      </tr>
  </tbody>
</table>

</div>

<!-- Card view end -->
    

</div>
</section>
</div>
  
  
  <!-- MAIN CONTENT END -->
  <!-- FOOTER START -->
 <?php include_once 'footer.php'; ?>


<!-- COOKIE END -->
<?php include_once 'jsLinks.php'; ?>


</body>
</html>


    





