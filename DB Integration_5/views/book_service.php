<!doctype html>
<html lang="en">
  <head>
    <?php include_once 'headerLinks.php';
    include_once '../helpers/msgs.php' ;
    
     ?>
    <link rel="stylesheet" href="css/book_service.css">
    <title>Book Services</title>
    <!-- Success -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    
  </head>
  <body >
    <div class="container-fluid p-0  main_container">
      
      <!-- HEADER -->
      
      <?php if(isset($_SESSION['userid'])){ 
        include_once 'login_nav.php';}else{?>
        <meta http-equiv = "refresh" content = "0.5; url =../controllers/Users.php?q=logout_login" />
       <?php } ?>
      
      <!-- HEADER END -->
      <!-- MAIN CONTENT -->
    <section>
      <div class="row ">
        <div class="col banner">
          <img src="images/Book_Service/banner.png" alt="">
        </div>
      </div>
      <div class="container-fluid">
        <h1>Set Up Your Cleaning Service</h1>
        <div class="row m-0 justify-content-center">
          <div class="col p-0 mr-1" style="max-width:4rem">
            <hr style="width:3.87rem ; border:1px solid #CCCCCC">
          </div>
          <div class="col p-0" style="max-width:1.5rem">
            <img  src="images/Book_Service/faq_star.png">
          </div>
          <div class="col p-0 ml-1" style="max-width:4rem">
            <hr style="width:3.87rem ; border:1px solid #CCCCCC">
          </div>
        </div>
        
        <div class="container" >
          <div class="row">
            <div class="col-md-9">
              <!-- Stepper Code -->
              <form action="#" class="form">
                
                <!-- Progress bar -->
                <div class="progressbar ">
                  
                  
                  <div class="progress-step progress-step-active"data-title="Intro">
                    <span><img src="images/Book_Service/setup-service.png" alt=""></span>
                    <p>Setup Service</p>
                  </div>
                  <div class="progress-step" data-title="Contact">
                    <span><img src="images/Book_Service/schedule-plan.png" alt=""></span>
                    <p>Schedule & Plan</p>
                  </div>
                  <div class="progress-step" data-title="ID">
                    <span><img src="images/Book_Service/user-details.png" alt=""></span>
                    <p>Your Details</p>
                  </div>
                  <div class="progress-step" data-title="Password">
                    <span><img src="images/Book_Service/payment.png" alt=""></span>
                    <p>Make Payment</p>
                  </div>
                </div>
                <!-- Steps -->
                <!-- Step 1 -->
                <div class="alert alert-danger" id="error-message" style="display: none"></div>
                <div class="alert alert-success"id="success-message" style="display: none"></div>
                <?php flash('book_service'); ?>
              <form>
                <div class="form-step form-step-active" id="first_step">
                  <div class="form-row input-group">
                    <div class="form-group col-md-6">
                      <label for="postalcode">Enter Your PostalCode</label>
                      <input type="tel"class="form-control" id="postalcode" placeholder="142536" maxlength="6" required>
                    </div>
                    <div class="input-group row justify-content-end" >
                      <div class="col-auto">
                        <button onclick="postalbutton()" class="btn btn1 btn-next">Check Availability</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
                <!-- Step 2 -->
           
                 <!-- <form> -->
                  <!-- <input type="hidden" name="type" value="book_service_schedule_plan" required> -->
                  <form>
                  <div class="form-step second_step" id="second_step">
                    <div class="input-group form-row" >
                      <div class="col form-group">
                         <label for="bed">Select Number of rooms and bath</label>
                        <div class="row form-row">
                          <div class="col-md-2 col form-group">
                            <div class="input-group m-0">
                              <input type="number" class="form-control"name="bed"id="bed" placeholder="1 bed" value="<?php if(isset($_SESSION['bed'])) echo $_SESSION['bed'] ?>" onchange="bedchanged(this.value)" required>
                              
                            </div>
                          </div>
                          <div class="col-md-2 col">
                            <div class="input-group m-0">
                              <input type="number" class="form-control"name="bath"id="bath" placeholder="1 bath" value="<?php if(isset($_SESSION['bath'])) echo $_SESSION['bed'] ?>" onchange="bathchanged(this.value)"required>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="input-group row" >
                      <div class="col ">
                        <label for="">When do you need the cleaner?</label>
                        <div class="row form-row">
                          <div class="col">
                            <div class="input-group m-0">
                              <input type="text" id = "datepicker-5" name="date"  class="form-control  datepicker-7" placeholder="01/01/2018" value="<?php if(isset($_SESSION['date'])) echo $_SESSION['date'] ?>"required>
                            </div>
                          </div>
                          <div class="col">
                            <div class="input-group m-0">
                              <input placeholder="Selected time" name="time" type="time" id="time" placeholder="Select Time" value="<?php if(isset($_SESSION['time'])) echo $_SESSION['time'] ?>" class="form-control" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col ">
                        <label for="">How long do you need the cleaner to stay?</label>
                        <div class="row form-row w-50">
                          <div class="col">
                            <div class="input-group m-0">
                              <input type="number" name="hrs"id="hrs" class="form-control" placeholder="3 Hrs" step="0.5" value="<?php if(isset($_SESSION['hrs'])) echo $_SESSION['hrs'];?>" onchange="hrschanged(this.value)"required>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="row mx-auto "style="margin-top:2.43rem">
                      <div class="col text-center"  >
                        <div class="container services " id="cabinate" onclick="selectextraservices(this.id)"  name="Inside cabinets">
                          <img src="images/Book_Service/5.png"  >

                        </div>
                        <p>Inside cabinets </p>
                      </div>
                      <div class="col text-center" >
                        <div class="container services " id="fridge" onclick="selectextraservices(this.id)"name="Inside fridge">
                          <img src="images/Book_Service/6.png">
                        </div>
                        <p>Inside fridge </p>
                      </div>
                      <div class="col text-center" >
                        <div class="container services " id="oven"onclick="selectextraservices(this.id)" name="Inside oven">
                          <img src="images/Book_Service/7.png">
                        </div>
                        <p>Inside oven </p>
                      </div>
                      <div class="col text-center" >
                        <div class="container services " id="wash" onclick="selectextraservices(this.id)" name="Laundry wash & Dry">
                          <img src="images/Book_Service/8.png">
                        </div>
                        <p>Laundry wash & Dry </p>
                      </div>
                      <div class="col text-center">
                        <div class="container services "id="windows"onclick="selectextraservices(this.id)" name="Interior windows">
                          <img src="images/Book_Service/9.png">
                        </div>
                        <p>Interior windows </p>
                      </div>
                    </div>
                    <hr>
                    <div class="input-group row" >
                      <div class="col ">
                        <label for="comment">Commnets</label>
                        <textarea id="comment" name="comment"class="form-control"><?php if(isset($_SESSION['comment'])) echo $_SESSION['comment'] ?></textarea>
                      </div>
                    </div>
                    <div class="input-group row mt-0" >
                      <div class="col">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" name="pets"<?php if(isset($_SESSION['pets'])) echo 'checked'?>  class="custom-control-input pets" id="defaultUnchecked" >
                          <label class="custom-control-label" name="pets" for="defaultUnchecked" style="font-weight: normal;font-size: 16px" >I have pets at home</label>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="input-group row justify-content-end" >
                      
                      <div class="col-md-2 btns-group" >
                        <button onclick="scheduleplan()" type="button"class="btn btn1 btn-next" id="button" >Next</button>
                      </div>
                    </div>
                  </div>
                </form>

                <!-- Step 3 -->
                <div class="form-step">
                  <div class="input-group row" >
                    <div class="col ">
                      <label for="">Enter your contact details, so we can serve you in better way!</label>
                      
                      <div id="addlist"></div>
                      
                      <div class="row form-row p-2 form_container" style="border:1px solid #ccc;margin-top:1.5rem;">
                    <form>
                          <div class="form-row input-group">
                            <div class="form-group col-md-6">
                              <label for="streetname">Streat Name</label>
                              <input type="text" class="form-control" id="street" placeholder="Street name" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="housenumber">House Number</label>
                              <input type="text" class="form-control" id="housenumber" placeholder="House number" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="postalcode">Postal code</label>
                              <input type="text" class="form-control" id="pincode"  placeholder="99897" value="<?php echo $_SESSION['postalcode'];?>" disabled>
                              </div>
                              <div class="form-group col-md-6">
                                
                                <label class="location" id="city">City</label>
                                    <select id="location" class="form-control">
                                    </select>
                              </div>
                            <div class="form-group col-md-6">
                              <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">+49</div>
                                </div>
                                <input type="tel" class="form-control " id="phone" placeholder="Mobile number" required>
                              </div>
                            </div>
                            <div class="input-group m-2 row justify-content-start" >
                            <div class="col-md-2 ">
                              
                              <button onclick="saveaddress()" class="btn btn1 btn-next" id="addressbtn">Save</button>
                            </div>
                            <div class="col-md-2 ">
                              <button type="reset" onclick="closeform()" class="btn btn1">Cancel</button>
                            </div>
                          </div>
                          </div>
                          
                        </form>
                      </div>
                      <div class="row form-row" style="margin-top:1.5rem;">
                        <div class="col-auto  m-2 p-3">
                          <button type="submit" onclick="showform()" class="btn btn2 " id="btn2">
                            <img src="images/Book_Service/add1.png" alt=""> Add New Services
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="input-group row">
                    <div class="col">
                      <label>Your Favourite Service Provider</label><br>
                      <hr>
                      <p>You can choose your favourite service provider from below list</p>
                      
                      <div class="container">
                        <div class="row" id="favsplist">
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  
                  <hr>
                  <div class="input-group row justify-content-between" >
                    
                    <div class="col-md-2 btns-group">
                      <button type="submit" onclick="yourdetails()" class="btn btn1 btn-next">Next</button>
                    </div>
                  </div>
                </div>
                <!-- Step 4 -->
                <form>
                <div class="form-step form-step-4">
                  <div class="input-group row" >
                    <div class="col ">
                      <label for="">Pay Securly with Helperland payment Gateway!</label>
                      <p>Promo code (optional)</p>
                      <div class="row">
                        <div class="col-auto"><input type="text" id="code"name="promocode" class="form-control" placeholder="Promo code (optional)"></div>
                        <div class="col-auto"> <button type="submit" onclick="promocode()" class="cancel btn "> Apply </button></div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="input-group row" >
                    <div class="col ">
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <img src="https://files.readme.io/d1a25b4-generic-card.png" height="20px">
                          </div>
                        </div>
                        <input type="tel" class="form-control" id="cardnumber" placeholder="Card number" maxlength="12"  style="border-right:none;" required>
                        <div class="input-group-prepend" style="border-left:none">
                          <input style="border-right:none;border-left:none;border-radius: 0%" type="tel" class="form-control" id="expdate" name="Expirytime"placeholder="MM/YYYY" maxlength="7" minlength="7" pattern="/^(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})$/" required>
                          <input style="border-left:none;border-radius: 0%"  type="tel" class="form-control" id="cvv" name="cvc"placeholder="CVC" maxlength="3" minlength="3" required>
                        </div>
                      </div>
                      <div class="row mt-2 mx-auto">
                        <div class="col text-md-right">
                          <p style="font-size: 10px;color:#ccc;margin-bottom: 1.5px">Accepted Cards</p>
                          <img  src="images/Book_Service/cards.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="input-group row mt-0" >
                    <div class="col">
                      <div class="custom-control custom-checkbox">
                        <input  type="checkbox" class="custom-control-input"id="terms_and_conditions" value="1"  onclick="terms_changed(this)" required >
                        <label class="custom-control-label" for="terms_and_conditions" style="font-weight: normal;font-size: 16px" >I accepted <span style="color:#1D7A8C">terms abd conditions,</span>the <span style="color:#1D7A8C">cancelation policy and privacy policy.</span>I confirm that helperland starts to execute the contract before the expiry of withdrawal period and I lost my right of withdrawal as a consumer with full performanc eof the contract.</label>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="input-group row justify-content-end" >
                    <div class="col-auto" id="complete_booking">

                      
                     <button type="submit" onclick="bookingcomplete()" class="btn1 btn trigger-btn" id="submit_button">Complete Booking</button>
                    </div>
                    <!-- Success model -->
                    <div class="modal fade" id="successmodal"style="overflow-y: hidden">
                        
                          <div class="modal-dialog modal-confirm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <div class="icon-box">
                                  <i class="material-icons">&#xE876;</i>
                                </div>
                                <h4 class="modal-title">Booking has been succesfully submitted</h4>
                              </div>
                              <div class="modal-body">
                                <p class="text-center">Service Request id : <span id="requestid"></span></p>
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-block" id="sucess_ok" href="customer_service_history.php" data-dismiss="modal">OK</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    <!-- Failde model -->
                   
                        <div id="Faild_modal" class="modal fade">
                          <div class="modal-dialog modal-confirm">
                            <div class="modal-content">
                              <div class="modal-header">
                                <div class="icon-box" style="background-color:#ce2029">
                                  <i class="material-icons">&#xE5CD;</i>
                                </div>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              </div>
                                <h4 class="text-center">Ooops!</h4> 
                              <div class="modal-body text-center">
                                <p id="errormsg"></p>
                                <button class="btn btn-block" id="failed_ok" data-dismiss="modal" style="background-color: #ce2029">OK</button>
                              </div>
                            </div>
                          </div>
                        </div>

                  </div>
                </div>
              </form>
      
            </div>
            <div class="col-md-3 p-0 ">
              <div class="container-fluid sidebar_col p-0">
                <div class="sidebar" >
                  <h6 class="text-center pt-3">Payment Summary</h6>
                </div>
                <div class="container pt-4">
                    <p id="date_time"></p>
                    <p id="bed_bath"></p><br>
                    <p><strong>Duration</strong></p>
                    <table class="w-100">
                      <tbody>
                        <tr >
                          <td>Basic</td>
                          <td id="basic"></td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="w-100" id="service_name">
                    </table>
                        <table>
                        <tr>
                          <td><strong>Total Service Time</strong></td>
                          <td > <strong id="total_hrs"></strong></td>
                        </tr>
                        <tr >
                          <td>Per cleaning </td>
                          <td id="hrrate">$87</td>
                        </tr>
                        <tr >
                          <td class="border_bottom">Discount</td>
                          <td class="border_bottom" id="discount"> - $27</td>
                        </tr>
                        <tr >
                          <td class="total">Total Payment</td>
                          <td class="total" id="subtotal">$63</td>
                        </tr>
                        <tr>
                          <td>Effective Price</td>
                          <td id="effectiveprice">$50.4</td>
                        </tr>
                      </tbody>
                    </table>
                    <p style="font-size: 12px"><span style="color:red">*</span>You will save 20% according to §35a EStG.</p>
                  </div>
                <div class="container smiley_div">
                  <p>
                    <span><img src="images/Book_Service/smiley.png" alt=""></span>  
                    See what is always included
                  </p>
                </div>
                

              </div>

              <h3>Questions?</h3>
                  <div class="card ">
                    <div class="card-header pl-1 d-flex border-0" id="headingOne" >
                      <a class="btn-link collapsed"data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><span class="icon"><img src="images/Book_Service/right_arrow.png"></span></a>
                      <p class="mb-0 ml-2">
                       Which Helperland professional will come to my place?
                      </p>
                    </div>
                    <div id="collapseOne"  class="collapse collapsed" aria-labelledby="headingOne" >
                      <div class="card-body ml-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id diam tincidunt, fringilla ante vitae, dapibus velit
                      </div>
                    </div>
          
                  </div>
                  <div class="card ">
                    <div class="card-header pl-1 d-flex border-0" id="headingTwo" >
                      
                      <a class="btn-link collapsed"data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><span class="icon"><img src="images/Book_Service/right_arrow.png"></span></a>
                      
                      <p class="mb-0 ml-2">
                       Which Helperland professional will come to my place?
                      </p>
                    </div>
                    <div id="collapseTwo" class="collapse collapsed" aria-labelledby="headingTwo">
                      <div class="card-body ml-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id diam tincidunt, fringilla ante vitae, dapibus velit
                      </div>
                    </div>
                  </div>
                  <div class="card ">
                    <div class="card-header pl-1 d-flex border-0" id="headingThree" >
                      <!-- <button class="btn btn-link" > -->
                      <a class="btn-link collapsed"data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"><span class="icon"><img src="images/Book_Service/right_arrow.png"></span></a>
                      <!-- </button> -->
                      <p class="mb-0 ml-2">
                       Which Helperland professional will come to my place?
                      </p>
                    </div>
                    <div id="collapseThree" class="collapse collapsed" aria-labelledby="headingThree">
                      <div class="card-body ml-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id diam tincidunt, fringilla ante vitae, dapibus velit
                      </div>
                    </div>
                  </div>
                  <div class="card ">
                    <div class="card-header pl-1 d-flex border-0" id="headingFour" >
                      <!-- <button class="btn btn-link" > -->
                      <a class="btn-link collapsed"data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour"><span class="icon"><img src="images/Book_Service/right_arrow.png"></span></a>
                      <!-- </button> -->
                      <p class="mb-0 ml-2">
                       Which Helperland professional will come to my place?
                      </p>
                    </div>
                    <div id="collapseFour" class="collapse collapsed" aria-labelledby="headingFour">
                      <div class="card-body ml-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id diam tincidunt, fringilla ante vitae, dapibus velit
                      </div>
                    </div>
                  </div>
                  <div class="card ">
                    <div class="card-header pl-1 d-flex border-0" id="headingFive" >
                      <!-- <button class="btn btn-link" > -->
                      <a class="btn-link collapsed"data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive"><span class="icon"><img src="images/Book_Service/right_arrow.png"></span></a>
                      <!-- </button> -->
                      <p class="mb-0 ml-2">
                       Which Helperland professional will come to my place?
                      </p>
                    </div>
                    <div id="collapseFive" class="collapse collapsed" aria-labelledby="headingFive">
                      <div class="card-body ml-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id diam tincidunt, fringilla ante vitae, dapibus velit
                      </div>
                    </div>
                  </div>
              <p style="color:#1D7A8C;font-weight: bold;">For more help</p>
            </div>
          </div>
         
        </div>
        <!-- Container end -->
      </div> 
      <!--  container-fluid end -->
    </section>
    <!-- MAIN CONTENT END -->
      <!-- FOOTER START -->
      <?php include_once 'footer.php' ;
      ?>


    <?php
    include_once 'book_service_stepper_1.php';
      include_once 'jsLinks.php' ;
    ?>
        
      </body>
  </html>