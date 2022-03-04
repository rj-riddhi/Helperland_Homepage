<?php 
include_once 'jsLinks.php';
include_once '../helpers/msgs.php';  ?>
<script>
var extrahrs = 0;
var extraservices = "";
var selectedserviceprovider = "";
var extraselected="No";
var street = "";
var housenumber = "";

	function postalbutton(){
    var postalcode = document.getElementById('postalcode').value;

    if(postalcode == ''){
      show_msg('error',"Please fill all details");
      return false;
    }
    if(postalcode.length != 6){
      show_msg('error',"Please enter 6 digit postalcode");
      return false;
    }
    if(postalcode.length == 6 && postalcode == 0){
      show_msg('error',"Please avoid spaces");
      return false;
    }
    else{
      var formdata = {
        'postalcode': postalcode
        }
      var jsondata = JSON.stringify(formdata);
      fetch('http://localhost/Helperland/controllers/Book_Service.php?q=book_service_postal',{
        method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        }
      })
      .then((response) => response.json())
      .then((result)=> {
        if(result.insert == 'success')
        {
                    var element = document.querySelectorAll(".progress-step");
                    (element[0].classList.remove("progress-step-active"));
                    element[0].classList.add("progress-step");
                    element[1].classList.add("progress-step-active");
                    var formelement = document.querySelectorAll(".form-step");
                    formelement[0].classList.remove("form-step-active");
                    formelement[0].classList.add("form-step");
                    formelement[1].classList.add("form-step-active");
                    // City();
                    
                
        }
        else
        {
          show_msg('error',"We are not providing service in this area. We’ll notify you if any helper would start working near your area.");
          
        }
      })
      .catch((error)=>{
        console.log(error);
      });

  }
}
<?php if(isset($_SESSION['postalcode']))
                     { ?>
                      var element = document.querySelectorAll(".progress-step");
                    (element[0].classList.remove("progress-step-active"));
                    element[0].classList.add("progress-step");
                    element[1].classList.add("progress-step-active");
                    var formelement = document.querySelectorAll(".form-step");
                    formelement[0].classList.remove("form-step-active");
                    formelement[0].classList.add("form-step");
                    formelement[1].classList.add("form-step-active");
                    fetch('http://localhost/Helperland/controllers/Book_Service.php?q=City')
      .then((response) => response.json())
      .then((result)=> {
         Text = result[0];
         Value = result[0];
         var html = `<option value=${Value} selected>${Text}</option>`;
         // console.log(html);
        document.getElementById('location').innerHTML = html;
      })
      .catch((error)=>{
        console.log(error);
        
      });

      var table = document.getElementById("service_name");
     var services ="";
     var bed = document.getElementById('bed').value;
     var bath = document.getElementById('bath').value;
     var date = document.getElementById('datepicker-5').value;
     var time = document.getElementById('time').value;
      function selectextraservices(id)
     {
      
      // extraselected = "yes";
      selectextras(id);
      var hrs = document.getElementById("hrs").value;
      document.getElementById("total_hrs").innerHTML = hrs+" Hrs";
      document.getElementById("bed_bath").innerHTML =  bed+" Bed, "+bath+" Bath";
      document.getElementById("date_time").innerHTML =  date+" @ "+time;

      
     }


     function selected(service){

       document.getElementById("hrs").stepUp();
       extrahrs += (0.5);
     }
     function notselected(service,id){
      table.deleteRow(id);
      document.getElementById("hrs").stepDown();
      extrahrs -= (0.5);
     }
      function addservice(service,id){
        var html = "<tr class='"+id+"'><td class='border_bottom '>"+service+"</td><td class='border_bottom '>30 Mins</td></tr>"
       document.getElementById("service_name").innerHTML += html;
       extraservices += service;
      }
      function removeservice(service,id){
        table.deleteRow(id);
        extraservices -= service;
      }
      function selectextras(id)
      {
        
             if(id == "cabinate"){
              var Services = document.getElementById("cabinate");
                if(Services.classList.contains('services-active') == false)
                  {
                  
                   Services.classList.add('services-active');
                   Services.innerHTML = "<img src='images/Book_Service/0.png'>";
                   var service = Services.getAttribute("name");
                   addservice(service,id);
                   selected(service);
                  }
                  else
                  {
                    Services.classList.remove('services-active');
                    Services.innerHTML ="<img src='images/Book_Service/5.png'>";
                    var service = Services.getAttribute("name");
                    // removeservice(service,id);
                    notselected(service,id);
                  }
             }
             else if(id == "fridge"){
              var Services = document.getElementById("fridge");
                if(Services.classList.contains('services-active') == false)
                  {
                  
                   Services.classList.add('services-active');
                   Services.innerHTML = "<img src='images/Book_Service/1.png'>";
                   var service = Services.getAttribute("name");
                   addservice(service,id);
                    selected(service);
                  }
                  else
                  {
                    Services.classList.remove('services-active');
                    Services.innerHTML ="<img src='images/Book_Service/6.png'>";
                    var service = Services.getAttribute("name");
                    // removeservice(service,id);
                    notselected(service,id);
                  }
             }
             else if(id == "oven"){
              var Services = document.getElementById("oven");
                if(Services.classList.contains('services-active') == false)
                  {
                  
                   Services.classList.add('services-active');
                   Services.innerHTML = "<img src='images/Book_Service/2.png'>";
                   var service = Services.getAttribute("name");
                   addservice(service,id);
                  selected(service);
                  }
                  else
                  {
                    Services.classList.remove('services-active');
                    Services.innerHTML ="<img src='images/Book_Service/7.png'>";
                    var service = Services.getAttribute("name");
                    // removeservice(service,id);
                    notselected(service,id);
                  }
             }
             else if(id == "wash"){
              var Services = document.getElementById("wash");
                if(Services.classList.contains('services-active') == false)
                  {
                  
                   Services.classList.add('services-active');
                   Services.innerHTML = "<img src='images/Book_Service/3.png'>";
                   var service = Services.getAttribute("name");
                   addservice(service,id);
                    selected(service,id);
                  }
                  else
                  {
                    Services.classList.remove('services-active');
                    Services.innerHTML ="<img src='images/Book_Service/8.png'>";
                    var service = Services.getAttribute("name");
                    // removeservice(service,id);
                    notselected(service,id);
                  }
             }
             else if(id == "windows"){
              var Services = document.getElementById("windows");
                if(Services.classList.contains('services-active') == false)
                  {
                  
                   Services.classList.add('services-active');
                   Services.innerHTML = "<img src='images/Book_Service/4.png'>";
                   var service = Services.getAttribute("name");
                   addservice(service,id);
                   selected(service);
                  }
                  else
                  {
                    Services.classList.remove('services-active');
                    Services.innerHTML ="<img src='images/Book_Service/9.png'>";
                    var service = Services.getAttribute("name");
                    notselected(service,id);
                    // removeservice(service,id);
                  }
             }
      }
    <?php } ?>
    function scheduleplan(){

      var hrs = document.getElementById("hrs").value;
     var bed = document.getElementById('bed').value;
     var bath = document.getElementById('bath').value;
     var time = document.getElementById('time').value;
     var date = document.getElementById('datepicker-5').value;
     var comment = document.getElementById('comment').value;
     var pets = document.getElementById('defaultUnchecked');
     if(hrs == "" || bed == "" || bath == "" || time == "" || date == "" ){
      show_msg("error","Please fill all details");

      
     }
     if(bed < 1){
      show_msg("error","Min 1 bed should be selected");
     }
     if(bath < 1){
      show_msg("error","Min 1 bath should be selected");
      
     }
     var currentdate = "<?php 
     echo date('m/d/Y') ?>";
     if(date != "" && date < currentdate){
      show_msg("error","Please select valid date");
      
     }
     if(time == ""){
      show_msg("error","Please select time");
     }
     if(hrs < 3 || hrs == ""){
      show_msg("error","Minimum selected hours should be three");
      
     }
     if(pets.checked == true){
      pets = 1;
     }
      var data = {
        'bed' : bed,
        'bath' : bath,
        'hrs' : hrs,
        'time'  : time,
        'date' : date,
        'comment' : comment,
        'pets' : pets

      };
      var jsondata = JSON.stringify(data);
      fetch("http://localhost/Helperland/controllers/Book_Service.php?q=book_service_schedule_plan" , {
        method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        }
      })
      .then((response) =>response.json())
      .then((result)=>console.log(result))
      .catch((error)=>{
      console.log(error);
    });
                    
                    
                    var element = document.querySelectorAll(".progress-step");
                    (element[1].classList.remove("progress-step-active"));
                    element[1].classList.add("progress-step");
                    element[2].classList.add("progress-step-active");
                    var formelement = document.querySelectorAll(".form-step");
                    formelement[1].classList.remove("form-step-active");
                    formelement[1].classList.add("form-step");
                    formelement[2].classList.add("form-step-active");
                    getAddresses();
                    getFavouritesp();

    
  }
                    

<?php 
if(isset($_SESSION['hrs']))
                  { ?> 
                
                  var element = document.querySelectorAll(".progress-step");
                    (element[1].classList.remove("progress-step-active"));
                    element[1].classList.add("progress-step");
                    element[2].classList.add("progress-step-active");
                    var formelement = document.querySelectorAll(".form-step");
                    formelement[1].classList.remove("form-step-active");
                    formelement[1].classList.add("form-step");
                    formelement[2].classList.add("form-step-active");
                    getAddresses();
                    getFavouritesp();
                <?php  
                } ?>
   
  function yourdetails(){
    var addressidval = document.getElementsByName('add');

                    for(var i = 0; i < addressidval.length; i++) {
                        if(addressidval[i].checked){
      var addid = addressidval[i].value;
      street =  document.getElementById(addid+" street").innerHTML;
      housenumber = document.getElementById(addid+" housenumber").innerHTML;
      break;
     
                          }
                        }
      var addressid = {
        'addid' : addid 
      };
      var jsondata = JSON.stringify(addressid);
    fetch('http://localhost/Helperland/controllers/Book_Service.php?q=service_address' ,{
        method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        }
      })
    .then((response) =>response.text())
    .then((result) => {
      if(result == 1){
                    var element = document.querySelectorAll(".progress-step");
                    (element[2].classList.remove("progress-step-active"));
                    element[2].classList.add("progress-step");
                    element[3].classList.add("progress-step-active");
                    var formelement = document.querySelectorAll(".form-step");
                    formelement[2].classList.remove("form-step-active");
                    formelement[2].classList.add("form-step");
                    formelement[3].classList.add("form-step-active");
      }
      else{
        show_msg('error','Please select valid address');
        return false;
      }
    })
    .catch((error)=>{
      console.log(error);
    });
    
  }
  <?php 
                if(isset($_SESSION['addid']))
                 {?>
                  var element = document.querySelectorAll(".progress-step");
                    (element[2].classList.remove("progress-step-active"));
                    element[2].classList.add("progress-step");
                    element[3].classList.add("progress-step-active");
                    var formelement = document.querySelectorAll(".form-step");
                    formelement[2].classList.remove("form-step-active");
                    formelement[2].classList.add("form-step");
                    formelement[3].classList.add("form-step-active");
                <?php
                 }
                  ?>

  
 
  



  
                
                
function bookingcomplete()
  {
    var cardnumber = document.getElementById('cardnumber').value;
    var expdate = document.getElementById('expdate').value;
    var cvv = document.getElementById('cvv').value;
    var terms = document.getElementById("terms_and_conditions");
    // console.log(terms);
    if(cardnumber =='' || expdate =='' || cvv ==''){
      show_msg("error","Please enter all details");
      return false;
    }
    if(cardnumber.length < 12){
      show_msg("error","Please add 12 digit valid card-number");
      return false;
    }
    if(cardnumber.length == 12 && cardnumber == 0){
      show_msg("error","please enter valid card number");
      return false;
    }
    var filledmonth = expdate.substring(0,(expdate.indexOf('/')));
    var currentmonth = new Date().getMonth();
    if(filledmonth > 12 || filledmonth < 01 || filledmonth <= currentmonth){
      document.getElementById('cardnumber').value = cardnumber;
      show_msg("error","Month should be from '01' to '12' or should greater than current month");
      return false;
    }
    var currentyear = new Date().getFullYear();
    var filledyear = expdate.substring(expdate.indexOf('/')+1);
    // alert(currentyear +" " + filledyear +" "+filledmonth);
    if(filledyear < currentyear){
    document.getElementById("expdate").value = filledmonth+'/';
      show_msg("error","Exp date year is not valid ");
      return false;
    }
    if(cvv.lenght == 3 && cvv == 0){
      document.getElementById('expdate').value = expdate; 
      show_msg("error","Enter valid cvv");
      return false;
    }
    document.getElementById("cvv").value = cvv;
    if(terms.checked != true){
          show_msg('error' , '✔ Please accept terms & Conditions ');
        }
    else{
      var username ="<?php echo $_SESSION['FirstName'] ?>";
      var Serviceid =Math.floor(Math.random() * 100000) + 1; 
      
      <?php if(isset($_SESSION['postalcode'])){ ?>
      var postalcode = "<?php echo $_SESSION['postalcode'] ?>";
    <?php } else {?>
      var postalcode =document.getElementById("postalcode").value;
    <?php } ?>
      var bed = document.getElementById('bed').value;
      var bath = document.getElementById('bath').value;
      <?php if(isset($_SESSION['date'])){ ?>
      var date = "<?php echo $_SESSION['date'] ?>";
    <?php } else {?>
      var date =document.getElementById("date").value;
    <?php } ?>
      
      // alert(date);
      var time = document.getElementById('time').value;
      var hrs = document.getElementById('hrs').value;
      var extrahour =  extrahrs;
      var servicehourate = document.getElementById("hrrate").innerHTML;
      var subtotal = document.getElementById("subtotal").innerHTML;
      var discount = document.getElementById("discount").innerHTML;
      var totalcost = document.getElementById("hrrate").innerHTML;
      var effectivecost = document.getElementById("effectiveprice").innerHTML;
      var extraservice = extraservices;
      var paymentrefno = Math.random();
      var paymentdue = 0;
      var comments = document.getElementById('comment').value;

      var phone = document.getElementById("phone").value;
      var city = document.getElementById("location").value;
      <?php if(isset($_SESSION['addid'])) { ?>
      var addid = "<?php echo $_SESSION['addid'] ?>";
    <?php } else {?>
      var addressidval = document.getElementsByName('add');

                    for(var i = 0; i < addressidval.length; i++) {
                        if(addressidval[i].checked){
      var addid = addressidval[i].value;
      // console.log(housenumber);
      
                          }
                        }
     <?php } ?>
     console.log(street+" "+housenumber);
      <?php if(isset($_SESSION['pets'])) {?>
                       
      var pets = 1;
                       <?php }
                        else
                        { ?>
      var pets = 0;
                        <?php } ?>
      var selectedsp = selectedserviceprovider;
      // alert(selectedsp);
      var formdata = {
        'username' : username,
        'Serviceid' : Serviceid,
        'postalcode' : postalcode,
        'bed' : bed,
        'bath' : bath,
        'date' : date,
        'time' : time,
        'hrs' : hrs,
        'extrahour' : extrahour,
        'servicehourate' : servicehourate,
        'subtotal' : subtotal,
        'discount' : discount,
        'totalcost' : totalcost,
        'effectivecost' : effectivecost,
        'extraservice' : extraservice,
        'paymentrefno' : paymentrefno,
        'paymentdue' : paymentdue,
        'comments' : comments,
        'street' : street,
        'housenumber' : housenumber,
        'phone' : phone,
        'city' : city,
        'addid' : addid,
        'pets' : pets,
        'selectedsp' : selectedsp,
        'cardnumber': cardnumber,
        'expdate' : expdate
// "addservicerequest": 11,
        };

      var jsondata = JSON.stringify(formdata);


      let loader = `<div class="btn btn-primary" id="loader" type="button" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Loading...
</div>`;
document.getElementById('complete_booking').innerHTML = loader;
      fetch('http://localhost/Helperland/controllers/Book_Service.php?q=addrequest',{
        method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        }
      })
      .then((response) => response.json())
      .then((result)=> {
        if(result.insert == 'success')
        {
           document.getElementById("requestid").innerHTML = result.serviceid;
           document.getElementById("complete_booking").innerHTML += '<a href="#successmodal" id="successbtn" data-toggle="modal" data-target="#successmodal"  >Complete booking 1 </a>';

           var elem = document.getElementById("successbtn");
           elem.click();
           elem.parentNode.removeChild(elem);
           document.getElementById("loader").remove();
           
           var ok = document.getElementById("sucess_ok");
           ok.onclick = 
            function(){
              window.location = "customer_dashboard.php";
            }
           
          
                
        }
        else
        {
          show_msg('error',result.msg);
           document.getElementById("complete_booking").innerHTML += '<a href="#Faild_modal" id="failedbtn" data-toggle="modal" data-target="#Faild_modal"  >Complete booking 1 </a>';

           var elem = document.getElementById("failedbtn");
           document.getElementById("errormsg").innerHTML = result.msg;
           elem.click();
           elem.parentNode.removeChild(elem);
           document.getElementById("loader").remove();
           
           var ok = document.getElementById("failed_ok");
           ok.onclick = 
            function(){
              window.location = "customer_dashboard.php";
            }
          
        }
      })
      .catch((error)=>{
        console.log(error);
        
      });
    }
  } 
                
                

  function promocode(){
    show_msg('success',"Currently no any promocodes are avilable");
    document.getElementById("code").value="";
  }                

 function showform(){
  var new_add = document.getElementsByClassName("form_container");
  new_add[0].classList.add("form_show");
  document.getElementById("btn2").style.display = "none";
}
function closeform(){
  var new_add = document.getElementsByClassName("form_container");
  new_add[0].classList.remove("form_show");
  document.getElementById("btn2").style.display = "block";
}

function spselected(id,id2,id3){
    var button = document.getElementById(id);
    if(button.innerHTML != "Selected"){
    button.classList.add('btn3_active');
    button.innerHTML = "Selected";
    id2.classList.add('favourite_sp_active');
    selectedserviceprovider = id3.id;
  }
  else
  {
    button.classList.remove('btn3_active');
    button.innerHTML = "Select";
    id2.classList.remove('favourite_sp_active');
    selectedserviceprovider = "";
  }
  
  } 
function terms_changed(termsCheckBox){
    if(termsCheckBox.checked){
        document.getElementById("submit_button").disabled = false;
        
    } else{
        var btn = document.getElementById("submit_button");
        btn.disabled = true;
        btn.style.cursor = "none";
        if(document.getElementById('submit_button').clicked == true){
          show_msg('error' , '✔ Please accept terms & Conditions ');
        }


    }
} 
function saveaddress(){
                  var originalpostalcode = document.getElementById('pincode').value;
                  var street = document.getElementById('street').value;
                  var housenumber = document.getElementById('housenumber').value;
                  var pincode = document.getElementById('pincode').value;
                  var phone = document.getElementById("phone").value;
                  var city = document.getElementById("location").value;
    if(street == '' || housenumber == '' || pincode == '' || phone== '' ){
      show_msg('error',"Please fill all details");
      return false;
    }
    if(pincode.length != 6){
      show_msg('error',"Please enter 6 digit postalcode");
      return false;
    }
    if(pincode.length == 6 && pincode == 0){
      show_msg('error',"Please avoid spaces");
      return false;
    }
    if(pincode != originalpostalcode){
      show_msg('error','Please enter valid postalcode wich you filled in first step');
      return false;
    }
    else{
      var formdata = {
        'street': street,
        'housenumber' : housenumber,
        'postalcode' : pincode,
        'phone': phone,
        'city' : city
        };
      var jsondata = JSON.stringify(formdata);
      fetch('http://localhost/Helperland/controllers/Book_Service.php?q=saveaddress',{
        method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        }
      })
      .then((response) => response.json())
      .then((result)=> {
        if(result.insert == 'success')
        {
          show_msg('Success',"Your Address is saved");
          document.getElementById("addressbtn").style.display = "none";
          getAddresses();
                
        }
        else
        {
          show_msg('error',"Your address is not saved try again");
          
        }
      })
      .catch((error)=>{
        console.log(error);
        
      });
  }
}

  function getAddresses(){
    fetch('http://localhost/Helperland/controllers/Book_Service.php?q=getAddresses')
      .then((response) => response.text())
      .then((result)=> {
        // console.log(result);
        if(result!=0){
        document.getElementById("addlist").innerHTML +=result;
      }
      else{
        showform();
      }
      })
      .catch((error)=>{
        console.log(error);
        
      });
  }
    // getAddresses();
  function getFavouritesp(){
    fetch('http://localhost/Helperland/controllers/Book_Service.php?q=getFavouritesp')
    .then((response) => response.text())
      .then((result)=> {
        // console.log(result);
        document.getElementById("favsplist").innerHTML +=result;
      })
      .catch((error)=>{
        console.log(error);
        
      });
  }               
                    
function show_msg(type,text){
  if(type == 'error'){
    var message_box = document.getElementById("error-message");
  }else{
    var message_box = document.getElementById("success-message");
  }
  message_box.innerHTML = text;
  // message_box.classList.add('animated', 'fadeInDown');
  message_box.style.display = "block";
  setTimeout(function(){
    // message_box.classList.remove('fadeInDown');
    message_box.style.display = "none";
  },3000);
}
$(function() {
            $( ".datepicker-7" ).datepicker({
               defaultDate:+9,
               dayNamesMin: [ "So", "Mo", "Di", "Mi", "Do", "Fr", "Sa" ],
               duration: "slow"
            });
         });



   
 
</script>
