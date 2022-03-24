<script>
 function spRegistration(){

  var firstname = document.getElementById('inputFirstName').value;
  var lastname = document.getElementById('inputLastName').value;
  var email = document.getElementById('email').value;
  var phone = document.getElementById('phone1').value;
  var pass = document.getElementById('password1').value;
  var confirmpass = document.getElementById('password2').value;
  var termsCheckBox = document.getElementById('check');

  if(firstname==""){
  	show_msg("error","Please fill FirstName");
  	$("#inputFirstName").focus();
  	return false;
  }
  document.getElementById('inputFirstName').value = firstname;
  if(lastname==""){
  	show_msg("error","Please fill LastName");
  	$("#inputLastName").focus();
  	return false;
  }
  document.getElementById('inputLastName').value = lastname;
  if(email==""){
  	show_msg("error","Please Enter Emaill");
  	$("#email").focus();
  	return false;
  }
  

  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if(!email.match(validRegex)){
  	show_msg("error","Please Enter Valid Emaill in the form of abc@gmail.com");
  	$("#email").focus();
  	return false;
  }
  document.getElementById('email').value = email;
  if(phone==""){
  	show_msg("error","Please Enter 10 digit number");
  	$("#phone1").focus();
  	return false;
  }
  document.getElementById('phone1').value = phone;
   
  var passmatch = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,14}$/;
  if(pass==""){
  	show_msg("error","Enter password");
  	$("#password1").focus();
  	return false;
  }
  if(!pass.match(passmatch) )
  {
  	show_msg("error","Please Enter strong Password which contains Password must contain at least 1 capital letter, 1 small letter, 1 number and one special character. Password length must be in between 6 to 14 characters.");
  	$("#password1").focus();
  	return false;
  }
  document.getElementById('password1').value = pass;
  if(pass != confirmpass){
  	show_msg("error","Confirm password is not matched ");
  	$("#password2").focus();
  	return false;
  }
  if(termsCheckBox.checked != true){
  	show_msg('error' , '✔ Please accept terms & Conditions ');
  	$("#check").focus();
  	return false;

  }
  var formdata = {
  	'firstname' : firstname,
  	'lastname' : lastname,
  	'email' : email,
  	'phone' : phone,
  	'pass' : pass,
  	'confirmpass' : confirmpass
  };
  var jsondata = JSON.stringify(formdata);
  let loader = `<div class="btn btn-primary" id="loader" type="button" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Loading...
</div>`;
document.getElementById('submitbtn').innerHTML = loader;
console.log(document.getElementById('submitbtn').innerHTML);
fetch("../controllers/Book_Service.php?q=serviceprovider_Register",{
				method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        } 
			})
    .then((response)=>response.json())
    .then((data)=>{
    	if(data.insert == "success"){
    		show_msg("success","Check your Email ");
    		document.getElementById("loader").remove();
        // window.location = "upcoming_service.php";
    	}
    	else
    	{
    		alert("failed");
    		show_msg("Sorry Your account is not created");
    	}
    })

 }

 function adminregister(){
 	var firstname = document.getElementById('inputFirstName').value;
  var lastname = document.getElementById('inputLastName').value;
  var email = document.getElementById('email').value;
  var phone = document.getElementById('phone1').value;
  var pass = document.getElementById('password1').value;
  var confirmpass = document.getElementById('password2').value;
  var termsCheckBox = document.getElementById('invalidCheck2');

  if(firstname==""){
  	show_msg("error","Please fill FirstName");
  	$("#inputFirstName").focus();
  	return false;
  }
  document.getElementById('inputFirstName').value = firstname;
  if(lastname==""){
  	show_msg("error","Please fill LastName");
  	$("#inputLastName").focus();
  	return false;
  }
  document.getElementById('inputLastName').value = lastname;
  if(email==""){
  	show_msg("error","Please Enter Emaill");
  	$("#email").focus();
  	return false;
  }
  

  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if(!email.match(validRegex)){
  	show_msg("error","Please Enter Valid Emaill in the form of abc@gmail.com");
  	$("#email").focus();
  	return false;
  }
  document.getElementById('email').value = email;
  if(phone==""){
  	show_msg("error","Please Phone number");
  	$("#phone1").focus();
  	return false;
  }
  if(phone.length < 10){
  	show_msg("error","Phone number feild should have 10 digits");
  	$("#phone1").focus();
  	return false;
  }
  document.getElementById('phone1').value = phone;
   
  var passmatch = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,14}$/;
  if(pass==""){
  	show_msg("error","Enter password");
  	$("#password1").focus();
  	return false;
  }
  if(!pass.match(passmatch) )
  {
  	show_msg("error","Please Enter strong Password which contains Password must contain at least 1 capital letter, 1 small letter, 1 number and one special character. Password length must be in between 6 to 14 characters.");
  	$("#password1").focus();
  	return false;
  }
  document.getElementById('password1').value = pass;
  if(pass != confirmpass){
  	show_msg("error","Confirm password is not matched ");
  	$("#password2").focus();
  	return false;
  }
  if(termsCheckBox.checked != true){
  	show_msg('error' , '✔ Please accept terms & Conditions ');
  	$("#invalidCheck2").focus();
  	return false;

  }
  

  var formdata = {
  	'firstname' : firstname,
  	'lastname' : lastname,
  	'email' : email,
  	'phone' : phone,
  	'pass' : pass,
  	'confirmpass' : confirmpass
  };
  var jsondata = JSON.stringify(formdata);
document.getElementById('submitbtn2').innerHTML = "Loading....";
fetch("../controllers/Service_Provider.php?q=Admin",{
		method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        } 
			})
    .then((response)=>response.json())
    .then((data)=>{
    	
    	if(data.insert == "success"){
    		show_msg("success","Registration successfull!!!");
    		window.location = "admin_user_management.php";
    	}
    	else
    	{
    		show_msg("Sorry Your account is not created");
    	}
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
</script>