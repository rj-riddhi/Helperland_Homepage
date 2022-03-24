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
		forms[1].classList.remove("form-step-active");
		}

}
function getDetails(){
    fetch("http://localhost/Helperland/controllers/Service_Provider.php?q=getdetails")
    .then((response)=>response.json())
    .then((data)=>{
        if(data.insert == "success"){
            document.getElementById("status").innerHTML = "Active";
            document.getElementById('firstname').value = data.data['firstname'];
            document.getElementById('lastname').value = data.data['lastname'];
            document.getElementById('email').value = data.data['email'];
            document.getElementById('phone').value = data.data['phone'];
            var birthdate = data.data['birthdate'];
            // birthdate = birthdate.split(":");
            var birthyear = birthdate.split('-')[0];
            var birthmonth = birthdate.split('-')[1];
            var birthday = birthdate.split('-')[2];
            birthday = birthday.substr(0,birthday.indexOf(" "));
            
            if(data.data['userprofile']!= null)
            {
               var dp =  document.getElementsByClassName("dp");
               dp[0].innerHTML = "<img src='images/AvatarImages/"+data.data['userprofile']+"'>";
               dp[1].innerHTML = "<img src='images/AvatarImages/"+data.data['userprofile']+"'>";
               var avtar = document.querySelectorAll(".avtar");
               var userprofile = data.data['userprofile'];
               for(var i=0;i<avtar.length;i++){
                changeClass2(avtar[i]);
                if(avtar[i].id == userprofile.substr(0,userprofile.indexOf('.'))){
                    avtar[i].classList.add("services-active");
                }
               }
            }
            if(birthdate != null){
                document.getElementById("setyear").value = birthyear;
                document.getElementById("setyear").text = birthyear;
                document.getElementById("setmonth").value = birthmonth;
                document.getElementById("setmonth").text = birthmonth;
                document.getElementById("setday").value = birthday;
                document.getElementById("setday").text = birthday;
                // console.log(document.getElementById("year").value);
            }
            if(data.data['nationality'] != null){
                var nationality = document.getElementById("Ntionality");
                var nationalityvalue = data.data['nationality'];
                var opt = nationality.options[nationality.selectedIndex];
                opt.value =nationalityvalue;
                opt.text = nationalityvalue;
            }

            if(data.data['gender'] != null){
                var id = data.data['gender'];
                $("input[name='gender'][id='"+id+"']").prop('checked', true);
            }
           var street = data.data['street'];
           var housenumber = data.data['housenumber'];
           var postalcode = data.data['postalcode'];
           var city = data.data['city'];
           if(street != ""){
            document.getElementById('streetname').value = street;
            document.getElementById('housenumber').value = housenumber;
            document.getElementById('postalcode').value = postalcode;
            document.getElementById('location').value = city;
            document.getElementById('location').text = city;
        }

        }
        else{

            document.getElementById("status").innerHTML = "Not Active";
            show_msg("error","Your details are not avilable please login first");
            window.location = "../controllers/Users.php?q=logout_login";
        }
    })
    .catch((error)=>{
        console.log(error);
    })
}
getDetails();
function savedetails(){
			var firstname = document.getElementById('firstname').value ;
			var lastname = document.getElementById('lastname').value;
			var email = document.getElementById('email').value ;
			var phone = document.getElementById('phone').value ;
			var day = document.getElementById("day").value;
			var month = document.getElementById("month").value;
			var year = document.getElementById("year").value;
			var nationality = document.getElementById("Ntionality").value;
            var gender = 0 ;
            var ele = document.getElementsByName('gender');
              
            for(i = 0; i < ele.length; i++) {
                if(ele[i].checked){
                    gender = (ele[i].id);
                }
            }


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
			if(nationality == "Ntionality"){
				show_msg("error","Please select nationality");
				$("#Ntionality").focus();
				return false;
			}
			month ++;
			var birthdate = year+"-"+month+"-"+day;
			if(gender == 0){
                show_msg("error","Please select gender");
                $("#gender").focus();
                return false;
            }

            var avtar = document.getElementsByClassName("dp")[1].innerHTML; 
            avtar = avtar.substr((avtar.lastIndexOf('/')+1));
            avtar = avtar.substr(avtar,avtar.indexOf('"'));
            
            var street = document.getElementById("streetname").value;
            var housenumber = document.getElementById("housenumber").value;
            var postalcode = document.getElementById("postalcode").value;
            var city = document.getElementById("location").value;

            if(street==""){
                show_msg("error","Please fill Street details");
                $("#streetname").focus();
                return focus();
            }
            if(housenumber==""){
                show_msg("error","Please fill Housenumver ");
                $("#housenumber").focus();
                return focus();
            }
            if(postalcode==""){
                show_msg("error","Please fill postalcode ");
                $("#postalcode").focus();
                return focus();
            }

			var data = {
				'firstname':firstname,
				'lastname':lastname,
				'email':email,
				'phone':phone,
				'birthdate':birthdate,
				'nationality':nationality,
                'gender':gender,
                'avtar':avtar,
                'postalcode':postalcode
			};
			var jsondata = JSON.stringify(data);
			if(confirm("Are you sure for this updation?")){
			fetch("http://localhost/Helperland/controllers/Service_Provider.php?q=updatedetails",{
				method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        } 
			})
			.then((response)=>response.json())
			.then((data)=>{
				if(data.insert == "success"){
                    saveaddress(street,housenumber,postalcode,city,phone);
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
        else{
            window.location = "service_provider_mysettings.php";
        }
}
function postalchanged(){
    var postalcode = document.getElementById("postalcode").value;
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
            if(data != ""){
            document.getElementById("location").innerHTML = data;
        }
        else
        {
            show_msg("error","Please fill correct postalcode");
            $("#postalcode").focus();
            return false;
        }
        })
        .catch((error)=>{
            console.log(error);
        });
}
function saveaddress(street,housenumber,postalcode,city,phone){
    var street = street;
    var housenumber = housenumber;
    var postalcode = postalcode;
    var city = city;
    var mobile = phone;
    
    alert(postalcode);
    var data = {
        'street':street,
        'housenumber':housenumber,
        'postalcode':postalcode,
        'city':city,
        'phone':mobile
    };
    var jsondata = JSON.stringify(data);
    fetch("http://localhost/Helperland/controllers/Service_Provider.php?q=saveaddress",{
        method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        } 
    })
    .then((response)=>response.json())
    .then((data)=>{
        if(data.insert == "success"){
            return true;
        }
        else{
            show_msg("error","Your new address is not saved please try again");
            return false;
        }
    })
    .catch((error)=>{
        console.log(error);
    })


}

function password(){
	if(elements[1].classList.contains("progress-step-active")){
		elements[1].classList.remove("progress-step-active");
		forms[1].classList.remove("form-step-active");
	}
	else{
		elements[1].classList.add("progress-step-active");
		forms[1].classList.add("form-step-active");
		elements[0].classList.remove("progress-step-active");
		forms[0].classList.remove("form-step-active");
		
	}
}
function checkoldpassword(value){
    var oldpassword = value;
    var email = "<?php echo $_SESSION['email'] ?>";
    var formdata = {
        'oldpassword':oldpassword,
        'email':email
    };
    var jsondata = JSON.stringify(formdata);
    fetch("http://localhost/Helperland/controllers/Customer_Pages.php?q=checkoldpassword",{
        method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        } 
    })
    .then((response)=>response.json())
    .then((data)=>{
        if(data.insert == "success"){}
            else{
                show_msg("error",data.msg);
            }
    })
    .catch((error)=>{
        console.log(error);
    })
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

function changeClass(element){
    if(element.classList.contains("services-active")){
        element.classList.remove("services-active");
    }
    else{
        element.classList.add("services-active");
        var dp = document.getElementsByClassName("dp");
        console.log(dp);
        dp[0].innerHTML = "<img src='images/AvatarImages/"+element.id+".png'>";
        dp[1].innerHTML = "<img src='images/AvatarImages/"+element.id+".png'>";
    }
}
function changeClass2(element){
    if(element.classList.contains("services-active")){
        element.classList.remove("services-active");
    }
}
function selectavtar(id){
    
    var elements = document.querySelectorAll(".avtar");
    if(elements[0].id == id){

        changeClass(elements[0]);
        changeClass2(elements[1]);
        changeClass2(elements[2]);
        changeClass2(elements[3]);
        changeClass2(elements[4]);
        changeClass2(elements[5]);
    }
    else if(elements[1].id == id){
        changeClass(elements[1]);
        changeClass2(elements[0]);
        changeClass2(elements[2]);
        changeClass2(elements[3]);
        changeClass2(elements[4]);
        changeClass2(elements[5]);
    }
    else if(elements[2].id == id){
        changeClass(elements[2]);
        changeClass2(elements[1]);
        changeClass2(elements[0]);
        changeClass2(elements[3]);
        changeClass2(elements[4]);
        changeClass2(elements[5]);
    }
    else if(elements[3].id == id){
        changeClass(elements[3]);
        changeClass2(elements[0]);
        changeClass2(elements[2]);
        changeClass2(elements[1]);
        changeClass2(elements[4]);
        changeClass2(elements[5]);
    }
    else if(elements[4].id == id){
        changeClass(elements[4]);
        changeClass2(elements[0]);
        changeClass2(elements[2]);
        changeClass2(elements[3]);
        changeClass2(elements[1]);
        changeClass2(elements[5]);
    }
    else if(elements[5].id == id){
        changeClass(elements[5]);
        changeClass2(elements[0]);
        changeClass2(elements[2]);
        changeClass2(elements[3]);
        changeClass2(elements[4]);
        changeClass2(elements[1]);
    }
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
        // For nationality
let countries = [
    "Afghanistan",
    "Albania",
    "Algeria",
    "American Samoa",
    "Andorra",
    "Angola",
    "Anguilla",
    "Antarctica",
    "Antigua and Barbuda",
    "Argentina",
    "Armenia",
    "Aruba",
    "Australia",
    "Austria",
    "Azerbaijan",
    "Bahamas",
    "Bahrain",
    "Bangladesh",
    "Barbados",
    "Belarus",
    "Belgium",
    "Belize",
    "Benin",
    "Bermuda",
    "Bhutan",
    "Bolivia",
    "Bosnia and Herzegowina",
    "Botswana",
    "Bouvet Island",
    "Brazil",
    "British Indian Ocean Territory",
    "Brunei Darussalam",
    "Bulgaria",
    "Burkina Faso",
    "Burundi",
    "Cambodia",
    "Cameroon",
    "Canada",
    "Cape Verde",
    "Cayman Islands",
    "Central African Republic",
    "Chad",
    "Chile",
    "China",
    "Christmas Island",
    "Cocos (Keeling) Islands",
    "Colombia",
    "Comoros",
    "Congo",
    "Congo, the Democratic Republic of the",
    "Cook Islands",
    "Costa Rica",
    "Cote d'Ivoire",
    "Croatia (Hrvatska)",
    "Cuba",
    "Cyprus",
    "Czech Republic",
    "Denmark",
    "Djibouti",
    "Dominica",
    "Dominican Republic",
    "East Timor",
    "Ecuador",
    "Egypt",
    "El Salvador",
    "Equatorial Guinea",
    "Eritrea",
    "Estonia",
    "Ethiopia",
    "Falkland Islands (Malvinas)",
    "Faroe Islands",
    "Fiji",
    "Finland",
    "France",
    "France Metropolitan",
    "French Guiana",
    "French Polynesia",
    "French Southern Territories",
    "Gabon",
    "Gambia",
    "Georgia",
    "Germany",
    "Ghana",
    "Gibraltar",
    "Greece",
    "Greenland",
    "Grenada",
    "Guadeloupe",
    "Guam",
    "Guatemala",
    "Guinea",
    "Guinea-Bissau",
    "Guyana",
    "Haiti",
    "Heard and Mc Donald Islands",
    "Holy See (Vatican City State)",
    "Honduras",
    "Hong Kong",
    "Hungary",
    "Iceland",
    "India",
    "Indonesia",
    "Iran (Islamic Republic of)",
    "Iraq",
    "Ireland",
    "Israel",
    "Italy",
    "Jamaica",
    "Japan",
    "Jordan",
    "Kazakhstan",
    "Kenya",
    "Kiribati",
    "Korea, Democratic People's Republic of",
    "Korea, Republic of",
    "Kuwait",
    "Kyrgyzstan",
    "Lao, People's Democratic Republic",
    "Latvia",
    "Lebanon",
    "Lesotho",
    "Liberia",
    "Libyan Arab Jamahiriya",
    "Liechtenstein",
    "Lithuania",
    "Luxembourg",
    "Macau",
    "Macedonia, The Former Yugoslav Republic of",
    "Madagascar",
    "Malawi",
    "Malaysia",
    "Maldives",
    "Mali",
    "Malta",
    "Marshall Islands",
    "Martinique",
    "Mauritania",
    "Mauritius",
    "Mayotte",
    "Mexico",
    "Micronesia, Federated States of",
    "Moldova, Republic of",
    "Monaco",
    "Mongolia",
    "Montserrat",
    "Morocco",
    "Mozambique",
    "Myanmar",
    "Namibia",
    "Nauru",
    "Nepal",
    "Netherlands",
    "Netherlands Antilles",
    "New Caledonia",
    "New Zealand",
    "Nicaragua",
    "Niger",
    "Nigeria",
    "Niue",
    "Norfolk Island",
    "Northern Mariana Islands",
    "Norway",
    "Oman",
    "Pakistan",
    "Palau",
    "Panama",
    "Papua New Guinea",
    "Paraguay",
    "Peru",
    "Philippines",
    "Pitcairn",
    "Poland",
    "Portugal",
    "Puerto Rico",
    "Qatar",
    "Reunion",
    "Romania",
    "Russian Federation",
    "Rwanda",
    "Saint Kitts and Nevis",
    "Saint Lucia",
    "Saint Vincent and the Grenadines",
    "Samoa",
    "San Marino",
    "Sao Tome and Principe",
    "Saudi Arabia",
    "Senegal",
    "Seychelles",
    "Sierra Leone",
    "Singapore",
    "Slovakia (Slovak Republic)",
    "Slovenia",
    "Solomon Islands",
    "Somalia",
    "South Africa",
    "South Georgia and the South Sandwich Islands",
    "Spain",
    "Sri Lanka",
    "St. Helena",
    "St. Pierre and Miquelon",
    "Sudan",
    "Suriname",
    "Svalbard and Jan Mayen Islands",
    "Swaziland",
    "Sweden",
    "Switzerland",
    "Syrian Arab Republic",
    "Taiwan, Province of China",
    "Tajikistan",
    "Tanzania, United Republic of",
    "Thailand",
    "Togo",
    "Tokelau",
    "Tonga",
    "Trinidad and Tobago",
    "Tunisia",
    "Turkey",
    "Turkmenistan",
    "Turks and Caicos Islands",
    "Tuvalu",
    "Uganda",
    "Ukraine",
    "United Arab Emirates",
    "United Kingdom",
    "United States",
    "United States Minor Outlying Islands",
    "Uruguay",
    "Uzbekistan",
    "Vanuatu",
    "Venezuela",
    "Vietnam",
    "Virgin Islands (British)",
    "Virgin Islands (U.S.)",
    "Wallis and Futuna Islands",
    "Western Sahara",
    "Yemen",
    "Yugoslavia",
    "Zambia",
    "Zimbabwe"
];
        var ddlnationality = document.getElementById("Ntionality");
        for (var i = 0; i < countries.length; i++) {
            var option = document.createElement("OPTION");
            option.innerHTML = countries[i];
            option.value = countries[i];
            ddlnationality.appendChild(option);
        }

  
}





</script>