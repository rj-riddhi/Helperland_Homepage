<script>
    var addressid ='';
	var elements = document.querySelectorAll(".progress-step");
	var forms = document.querySelectorAll(".form-step");
	function details(){
	
	if(elements[0].classList.contains("progress-step-active")){
		elements[0].classList.remove("progress-step-active");
		forms[0].classList.remove("form-step-active");
	}
	else{
		elements[0].classList.add("progress-step-active");
		forms[0].classList.add("form-step-active");
		elements[1].classList.remove("progress-step-active");
		elements[2].classList.remove("progress-step-active");
		forms[1].classList.remove("form-step-active");
		forms[2].classList.remove("form-step-active");
	}

}

function getdetails(){
	fetch("http://localhost/Helperland/controllers/Customer_Pages.php?q=getdetails")
	.then((response)=>response.json())
	.then((data)=>{
		if(data.insert == "success"){
			document.getElementById('firstname').value = data.data['firstname'];
			document.getElementById('lastname').value = data.data['lastname'];
			document.getElementById('email').value = data.data['email'];
			document.getElementById('phone').value = data.data['phone'];

		}
		else{
			show_msg("error","Your details are not avilable please login first");
			window.location = "../controllers/Users.php?q=logout_login";
		}
	})
	.catch((error)=>{
		console.log(error);
	})
}
getdetails();

function savedetails(){
			var firstname = document.getElementById('firstname').value ;
			var lastname = document.getElementById('lastname').value;
			var email = document.getElementById('email').value ;
			var phone = document.getElementById('phone').value ;
			var day = document.getElementById("day").value;
			var month = document.getElementById("month").value;
			var year = document.getElementById("year").value;
			var language = document.getElementById("language").value;
			if(day == "day"){
				show_msg("error","Please select day");
				$("#day").focus();
				return false;
			}
			if(month == "month"){
				show_msg("error","Please select month");
				$("#month").focus();
				return false;
			}
			if(year == "year"){
				show_msg("error","Please select year");
				$("#year").focus();
				return false;
			}
			if(language == "language"){
				show_msg("error","Please select language");
				$("#language").focus();
				return false;
			}
			month ++;
			var birthdate = year+"-"+month+"-"+day;
			// alert(birthdate);
			var data = {
				'firstname':firstname,
				'lastname':lastname,
				'email':email,
				'phone':phone,
				'birthdate':birthdate,
				'language':language
			};
			var jsondata = JSON.stringify(data);
			if(confirm("Are you sure for this updation?")){
			fetch("http://localhost/Helperland/controllers/Customer_Pages.php?q=updatedetails",{
				method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        } 
			})
			.then((response)=>response.json())
			.then((data)=>{
				if(data.insert == "success"){
					show_msg("success",data.msg);
					window.onload = address();
				}
				else{
					show_msg("error",data.msg);
				}
			})
			.catch((error)=>{
				console.log(error);
			})
        }
        else{
            window.location = "customer_mysettings.php";
        }
}
function address(){
	if(elements[1].classList.contains("progress-step-active")){
		elements[1].classList.remove("progress-step-active");
		forms[1].classList.remove("form-step-active");
	}
	else{
		elements[1].classList.add("progress-step-active");
		forms[1].classList.add("form-step-active");
		elements[2].classList.remove("progress-step-active");
		elements[0].classList.remove("progress-step-active");
		forms[2].classList.remove("form-step-active");
		forms[0].classList.remove("form-step-active");
	}
}
function getaddresses(){
    fetch("http://localhost/Helperland/controllers/Customer_Pages.php?q=getAddresses")
    .then((response)=>response.text())
    .then( (data)=>{
        // console.log(data);
        document.getElementById("tabledata").innerHTML += data;
        
    })
    .catch((error)=>{
        console.log(error);
    })

}
getaddresses();

function editaddress(id,addressline1,addressline2,postalcode,phone,city){
    document.getElementById("street").value = addressline1;
    document.getElementById("housenumber").value = addressline2;
    document.getElementById("pincode").value = postalcode;
    document.getElementById("location").innerHTML = city;
    document.getElementById("phone1").value = phone;

    document.getElementById(id).setAttribute("data-toggle","modal");
    document.getElementById(id).setAttribute("data-target","#editModal");
    addressid = id.substring(0, id.indexOf(" "));

   

}
function postalchanged(){
    var postalcode = document.getElementById("pincode").value;
     var formdata = {
        'postalcode':postalcode
     }
     var jsondata = JSON.stringify(formdata);
    fetch("http://localhost/Helperland/controllers/Customer_Pages.php?q=City",{
        method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        } 
    })
        .then((response)=>response.text())
        .then((data)=>{
            document.getElementById("location").innerHTML = data;
        })
        .catch((error)=>{
            console.log(error);
        });
}
function postalchanged2(){
    var postalcode = document.getElementById("pincode2").value;
     var formdata = {
        'postalcode':postalcode
     }
     var jsondata = JSON.stringify(formdata);
    fetch("http://localhost/Helperland/controllers/Customer_Pages.php?q=City",{
        method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        } 
    })
        .then((response)=>response.text())
        .then((data)=>{
            document.getElementById("location2").innerHTML = data;
        })
        .catch((error)=>{
            console.log(error);
        });
}
function saveeditedaddress(){
    var street = document.getElementById("street").value;
    var housenumber = document.getElementById("housenumber").value;
    var postalcode = document.getElementById("postalcode").value;
    var city = document.getElementById("location").innerHTML;
    var phone = document.getElementById("phone1").value;
    var id = addressid;
    if (confirm("Do you really want to delete your profile?")) {
        var data = {
        'id' : id,
        'street':street,
        'housenumber':housenumber,
        'postalcode':postalcode,
        'city':city,
        'phone':phone
    };
    var jsondata = JSON.stringify(data);
    fetch("http://localhost/Helperland/controllers/Customer_Pages.php?q=updateaddress",{
        method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        } 
    })
    .then((response)=>response.json())
    .then((data)=>{
        if(data.insert == "success"){
            show_msg("success",data.msg);
        }
        else{
            show_msg("error",data.msg);
        }
    })
    .catch((error)=>{
        console.log(error);
    })
    }
    else
        address();
    
}

function saveaddress(){
    var street = document.getElementById("street2").value;
    var housenumber = document.getElementById("housenumber2").value;
    var postalcode = document.getElementById("pincode2").value;
    var city = document.getElementById("location2").innerHTML;
    var phone = document.getElementById("phone2").value;
    
    if(street == " "|| housenumber == " " || postalcode == "" || city == "" || phone == ""){
        alert("Please Enter all details");
    }
    alert(postalcode);
    var data = {
        'street':street,
        'housenumber':housenumber,
        'postalcode':postalcode,
        'city':city,
        'phone':phone
    };
    var jsondata = JSON.stringify(data);
    fetch("http://localhost/Helperland/controllers/Book_Service.php?q=saveaddress",{
        method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        } 
    })
    .then((response)=>response.json())
    .then((data)=>{
        if(data.insert == "success"){
            document.getElementById("newaddbtn").click();
            show_msg("success","Your new address is saved successfully");
            window.onload = address();
        }
        else{
            show_msg("error","Your new address is not saved please try again");
        }
    })
    .catch((error)=>{
        console.log(error);
    })


}

function password(){
	if(elements[2].classList.contains("progress-step-active")){
		elements[2].classList.remove("progress-step-active");
		forms[2].classList.remove("form-step-active");
	}
	else{
		elements[2].classList.add("progress-step-active");
		forms[2].classList.add("form-step-active");
		elements[0].classList.remove("progress-step-active");
		elements[1].classList.remove("progress-step-active");
		forms[0].classList.remove("form-step-active");
		forms[1].classList.remove("form-step-active");
	}
}

function resetpassword(){
    <?php if(isset($_SESSION['email'])){ ?>
        var email = "<?php echo $_SESSION['email'] ?>";
        var oldpassword = document.getElementById('oldpassword').value;
        var newpassword = document.getElementById('newpassword').value;
        var confirmpassword = document.getElementById('confirmpassword').value;

        if(oldpassword == "")
        {
            alert("Please fill old password");
            $("#oldpassword").focus();
            return false;
        }
         if(newpassword == "")
        {
            alert("Please fill new password");
            $("#newpassword").focus();
            return false;
        }
        let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,})')
        if(!strongPassword.test(newpassword))
        {
            alert("Your new password should be strong");
            $("#newpassword").focus();
            return false;
        }
         if(confirmpassword == "")
        
        {
            alert("Please fill old password");
            $("#confirmpassword").focus();
            return false;
        }
        if(newpassword != confirmpassword)
        {
            alert("New password and confirm password should be same");
            $('#confirmpassword').focus();
        }

        var formdata = {
            'email' : email,
            'oldpassword': oldpassword,
            'newpassword' : newpassword,
            'confirmpassword' : confirmpassword
        };
        var jsondata = JSON.stringify(formdata);
        fetch("http://localhost/Helperland/controllers/Customer_Pages.php?q=passwordupdate",{
             method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        } 
        })
        .then((response)=>response.json())
        .then((data)=>{
            if(data.insert == "success"){
                show_msg("success",data.msg);
                window.onload = details();
            }
            else{
                show_msg("error",data.msg);
            }
        })
        .catch((error)=>{
            console.log(error);
        })

    <?php }
    else{ ?>
        show_msg("error","Please login first");
        windo.location = "../controllers/Users.php?q=login";
   <?php  } ?>
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

// Populate years in dropdown
    window.onload = function () {
        //Reference the DropDownList.
        var ddlYears = document.getElementById("year");
 
        //Determine the Current Year.
        var currentYear = (new Date()).getFullYear();
 
        //Loop and add the Year values to DropDownList.
        for (var i = 1950; i <= currentYear; i++) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            ddlYears.appendChild(option);
        }

        var ddlday = document.getElementById("day");
 
       
        for (var i = 01; i <= 32; i++) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            ddlday.appendChild(option);
        }

        var ddlmonth = document.getElementById("month");
        let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        for (var i = 0; i < months.length; i++) {
            var option = document.createElement("OPTION");
            option.innerHTML = months[i];
            option.value = i;
            ddlmonth.appendChild(option);
        }

        // For language
        // length 142
// length 142
let languages_list = [
    "Afrikaans",
    "Albanian",
    "Amharic",
    "Arabic",
    "Aragonese",
    "Armenian",
    "Asturian",
    "Azerbaijani",
    "Basque",
    "Belarusian",
    "Bengali",
    "Bosnian",
    "Breton",
    "Bulgarian",
    "Catalan",
    "Central Kurdish",
    "Chinese",
    "Chinese (Hong Kong)",
    "Chinese (Simplified)",
    "Chinese (Traditional)",
    "Corsican",
    "Croatian",
    "Czech",
    "Danish",
    "Dutch",
    "English",
    "English (Australia)",
    "English (Canada)",
    "English (India)",
    "English (New Zealand)",
    "English (South Africa)",
    "English (United Kingdom)",
    "English (United States)",
    "Esperanto",
    "Estonian",
    "Faroese",
    "Filipino",
    "Finnish",
    "French",
    "French (Canada)",
    "French (France)",
    "French (Switzerland)",
    "Galician",
    "Georgian",
    "German",
    "German (Austria)",
    "German (Germany)",
    "German (Liechtenstein)",
    "German (Switzerland)",
    "Greek",
    "Guarani",
    "Gujarati",
    "Hausa",
    "Hawaiian",
    "Hebrew",
    "Hindi",
    "Hungarian",
    "Icelandic",
    "Indonesian",
    "Interlingua",
    "Irish",
    "Italian",
    "Italian (Italy)",
    "Italian (Switzerland)",
    "Japanese",
    "Kannada",
    "Kazakh",
    "Khmer",
    "Korean",
    "Kurdish",
    "Kyrgyz",
    "Lao",
    "Latin",
    "Latvian",
    "Lingala",
    "Lithuanian",
    "Macedonian",
    "Malay",
    "Malayalam",
    "Maltese",
    "Marathi",
    "Mongolian",
    "Nepali",
    "Norwegian",
    "Norwegian Bokmål",
    "Norwegian Nynorsk",
    "Occitan",
    "Oriya",
    "Oromo",
    "Pashto",
    "Persian",
    "Polish",
    "Portuguese",
    "Portuguese (Brazil)",
    "Portuguese (Portugal)",
    "Punjabi",
    "Quechua",
    "Romanian",
    "Romanian (Moldova)",
    "Romansh",
    "Russian",
    "Scottish Gaelic",
    "Serbian",
    "Serbo",
    "Shona",
    "Sindhi",
    "Sinhala",
    "Slovak",
    "Slovenian",
    "Somali",
    "Southern Sotho",
    "Spanish",
    "Spanish (Argentina)",
    "Spanish (Latin America)",
    "Spanish (Mexico)",
    "Spanish (Spain)",
    "Spanish (United States)",
    "Sundanese",
    "Swahili",
    "Swedish",
    "Tajik",
    "Tamil",
    "Tatar",
    "Telugu",
    "Thai",
    "Tigrinya",
    "Tongan",
    "Turkish",
    "Turkmen",
    "Twi",
    "Ukrainian",
    "Urdu",
    "Uyghur",
    "Uzbek",
    "Vietnamese",
    "Walloon",
    "Welsh",
    "Western Frisian",
    "Xhosa",
    "Yiddish",
    "Yoruba",
    "Zulu"
];
var ddllanguage = document.getElementById("language");
        
        for (var i = 0; i < languages_list.length; i++) {
            var option = document.createElement("OPTION");
            option.innerHTML = languages_list[i];
            option.value = languages_list[i];
            ddllanguage.appendChild(option);
        }
}



</script>