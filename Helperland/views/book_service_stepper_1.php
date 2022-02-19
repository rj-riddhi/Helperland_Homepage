<?php 
include_once 'jsLinks.php';
include_once '../helpers/msgs.php'  ?>
<script>
var extrahrs = 0;
var extraservices =" ";

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
          show_msg('error',"Sorry,On this area no service provider is available");
          
        }
      })
      .catch((error)=>{
        console.log(error);
      });

  }
}
function showform(){
  var new_add = document.getElementsByClassName("form_container");
  new_add[0].classList.add("form_show");
}
function closeform(){
  var new_add = document.getElementsByClassName("form_container");
  new_add[0].classList.remove("form_show");
}

function spselected(id,id2){
    document.getElementById(id).classList.add('btn3_active');
    document.getElementById(id).innerHTML = "Selected";
    document.getElementById(id2).classList.add('favourite_sp_active');
    // <?php 
    // $_SESSION['selectedsp'] = id2?>;
    // alert(<?php 
    // echo $_SESSION['selectedsp']?>);
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
                  <?php $_SESSION['extras'] = "selected"; ?>;
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
        document.getElementById("addlist").innerHTML +=result;
      })
      .catch((error)=>{
        console.log(error);
        
      });
  }
    getAddresses();
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
  function yourdetails(){
    var element = document.querySelectorAll(".progress-step");
                    (element[2].classList.remove("progress-step-active"));
                    element[2].classList.add("progress-step");
                    element[3].classList.add("progress-step-active");
                    var formelement = document.querySelectorAll(".form-step");
                    formelement[2].classList.remove("form-step-active");
                    formelement[2].classList.add("form-step");
                    formelement[3].classList.add("form-step-active");
  }   
  function promocode(){
    show_msg('success',"Currently no any promocodes are avilable");
  }  
  function bookingcomplete(){
    var pattern = /^(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})/;
    var cardnumber = document.getElementById('cardnumber').value;
    var expdate = document.getElementById('expdate').value;
    var cvv = document.getElementById('cvv').value;

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
    if(!pattern.test(expdate)){
      show_msg("error","Exp date is not valid try MM/YYYY formate");
      return false;
    }
    // if(cvv.lenght != 3){
    //   show_msg("error","CVV must be of 3 digit");
    //   return false;
    // }
    if(cvv.lenght == 3 && cvv == 0){
      show_msg("error","Enter valid cvv");
      return false;
    }
    else{
      var username =<?php echo $_SESSION['FirstName']?> ;
      var postalcode =<?php echo $_SESSION['postalcode']?>;
      var bed = document.getElementById('bed').value;
      var bath = document.getElementById('bath').value;
      var time = document.getElementById('time').value;
      var hrs = document.getElementById('hrs').value;
      var extrahour =  extrahrs;
      var servicehourate = document.getElementById("hrrate").value;
      
      var subtotal = document.getElementById("subtotal").value;
      var discount = document.getElementById("discount").value;
      var totalcost = document.getElementById("hrrate").value;
      var effectivecost = document.getElementById("effectiveprice").value;
      var extraservice = extraservices;
      var paymentrefno = Math.random();
      var paymentdue = 0;
      var comments = document.getElementById('comment').value;
      var street = document.getElementById('street').value;
      var housenumber = document.getElementById('housenumber').value;
      var phone = document.getElementById("phone").value;
      var city = document.getElementById("location").value;
                    var addressidval = document.getElementsByName('add');
                    for(var i = 0; i < ele.length; i++) {
                        if(addressidval[i].checked){
      var addid = addressidval[i].value;
                          }
                        }
      var pets =<?php echo $_SESSION['pets']?>;
      var selectedsp =<?php echo $_SESSION['selectedsp']?>;
      var formdata = {
        'username' : username,
        'postalcode' : postalcode,
        'bed' : bed,
        'bath' : bath,
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
          show_msg('Success',"Your Address is saved");
          var modal = document.getElementById("myModal");
          document.getElementById("requestid").innerHTML = result.addressid;
          modal.style.display = "block";
          
                
        }
        else
        {
          show_msg('error',"Your booking is not submitted");
          
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
                    
<?php } ?>

  <?php if(isset($_SESSION['hrs']))
  { ?>

      // For selecting Services
     var hrs = <?php echo $_SESSION['hrs'] ?>;
     // var selectedhrs = document.getElementById("hrs").value; 
     var bed = <?php echo $_SESSION['bed'] ?>;
     var bath= <?php echo $_SESSION['bath'] ?>; 
     var time= "<?php echo $_SESSION['time'] ?>";
     var date = "<?php echo $_SESSION['date'] ?>";
     
     var table = document.getElementById("service_name");
     var services ="";
     function selectextraservices(id)
     {
      selectextras(id);
      document.getElementById("hrs").value = hrs;
      document.getElementById("total_hrs").innerHTML = hrs+" Hrs";
      document.getElementById("bed_bath").innerHTML =  bed+" Bed, "+bath+" Bath";
      document.getElementById("date_time").innerHTML =  date+" @ "+time;

      
     }


     function selected(service){
       hrs += (0.5);
       extrahrs += (0.5);
     }
     function notselected(service,id){
      table.deleteRow(id);
      hrs -= (0.5);
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
                    removeservice(service,add);
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
                  }
             }
      }
      document.getElementById("button").style.display="none";
      document.getElementById("button2").style.display="block";
      document.getElementById("button2").addEventListener("click" , ()=>{
    event.preventDefault();
       
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
                  });

                <?php } ?>
                <?php if(isset($_SESSION['extras'])){ ?>
                
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
                <?php } ?>
                

                <?php if(isset($_SESSION['userid'])) {?>
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
                <?php } ?>

                
                    
function show_msg(type,text){
  if(type == 'error'){
    var message_box = document.getElementById("error-message");
  }else{
    var message_box = document.getElementById("success-message");
  }
  message_box.innerHTML = text;
  message_box.style.display = "block";
  setTimeout(function(){
    message_box.style.display = "none";
  },3000);
}



   
 
</script>
