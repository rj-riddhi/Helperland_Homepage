<script >
    var table;
	function getUsersRole(){

		fetch("http://localhost/Helperland/controllers/Admin.php?q=getUserRole")
		.then((response)=>response.text())
		.then((data)=>{
			var array = data.split("/");
			let unique_role = [...new Set(array)];
			var role = document.getElementById("role");
			for(var i = 0 ; i< unique_role.length ; i++){
         	var option = document.createElement("OPTION");
            option.innerHTML = unique_role[i];
            option.value = unique_role[i];
            role.appendChild(option);
        }
        })
		.catch((error)=>{
			console.log(error);
		})
	}
	getUsersRole();
	function getUsersName(){
		fetch("http://localhost/Helperland/controllers/Admin.php?q=getUserName")
		.then((response)=>response.text())
		.then((data)=>{
			var array = data.split("/");
			var name = document.getElementById("name");
			for(var i = 0 ; i< array.length ; i++){
         	var option = document.createElement("OPTION");
            option.innerHTML = array[i];
            option.value = array[i];
            name.appendChild(option);
        }
        })
		.catch((error)=>{
			console.log(error);
		})

	}
	getUsersName();

	function getZipCode(){
		fetch("http://localhost/Helperland/controllers/Admin.php?q=getZipCode")
		.then((response)=>response.text())
		.then((data)=>{
			// console.log(data);
			var array = data.split(" ");
			var zipcode = document.getElementById("zipcode");
			for(var i = 0 ; i< array.length ; i++){
         	var option = document.createElement("OPTION");
            option.innerHTML = array[i];
            option.value = array[i];
            zipcode.appendChild(option);
        }
        })
		.catch((error)=>{
			console.log(error);
		})
	}
	getZipCode();
	var namechanged = document.getElementById('name');
	namechanged.addEventListener('change',function(){
		var changename = namechanged.value;
		changename = changename.split(" ")[1];
		var data = {
			'name':changename
		};
		var jsondata = JSON.stringify(data);
         fetch("http://localhost/Helperland/controllers/Admin.php?q=getChangedRole",{
         	method : "POST",
         	body : jsondata,
         	header : {
         		'Content-Type' :'application/json',
         	}
         })
         .then((response)=>response.text())
         .then((data)=>{
         	if(data == 1){
         		document.getElementById("role")[1].setAttribute("selected","selected");
         	}
         	else if(data == 2){
         		document.getElementById("role")[2].setAttribute("selected","selected");
         	}
         	else{
         		document.getElementById("role")[3].setAttribute("selected","selected");
         	}
    	
         })
         .catch((error)=>{
         	console.log(error);
         });
         fetch("http://localhost/Helperland/controllers/Admin.php?q=getNumber",{
         	method : "POST",
         	body : jsondata,
         	header : {
         		'Content-Type' :'application/json',
         	}
         })
         .then((response)=>response.text())
         .then((data)=>{
         	document.getElementById("inlineFormInputGroup").value = data;
         	// var number = data;
         	var form2 = {
         		'name':changename
         	};
         	var jsondata2 = JSON.stringify(form2);
         	fetch("http://localhost/Helperland/controllers/Admin.php?q=getChngedZipCode",{
         	method : "POST",
         	body : jsondata2,
         	header : {
         		'Content-Type' :'application/json',
         	}
         })
         .then((response)=>response.text())
         .then((data)=>{
         	if(data != 0){
         	var array = data.split(" ");
			document.getElementById("zipcode2").classList.remove("d-none");
			var zipcode = document.getElementById("zipcode2");
			document.getElementById("zipcode").classList.add("d-none");
			zipcode.options.length = 0;
			for(var i = 0 ; i< array.length ; i++){
         	var option = document.createElement("OPTION");
            option.innerHTML = array[i];
            option.value = array[i];
            zipcode.appendChild(option);
         }

     }
         else{
         	document.getElementById("zipcode").value = "";
         }
         fetch("http://localhost/Helperland/controllers/Admin.php?q=getEmail",{
            method:"POST",
            body : jsondata,
            header : {
                'Content-Type' :'application/json',
            }
         })
         .then((response)=>response.text())
         .then((data)=>{
            document.getElementById("email").value = data;
         })
         	
    	
         })
         .catch((error)=>{
         	console.log(error);
         })
    	
         })
         .catch((error)=>{
         	console.log(error);
         })
         

		});

	function cancelsearch(){
		document.getElementById("zipcode2").classList.add("d-none");
        document.getElementById("zipcode").classList.remove("d-none");
	}

	function search(){
        var name = document.querySelector("#name").value;
        var role = document.querySelector("#role").value;
        var phone = document.querySelector("#inlineFormInputGroup").value;
        var zipcode = document.querySelector("#zipcode").value;
        var email = document.querySelector("#email").value;
        var startdate = document.querySelector("#datepicker_5").value;
        var enddate = document.querySelector("#datepicker_6").value;
        if(role != "")
        {
            if(role == "Customer ")
                role = 1;
            else if(role == "Service Provider ")
                role = 2;
            else
                role = 3;
        }
        var data = {
                'name':name,
                'role':role,
                'phone':phone,
                'zipcode':zipcode,
                'email':email,
                'startdate':startdate,
                'enddate':enddate

            }

            var jsondata = JSON.stringify(data);
            fetch("http://localhost/Helperland/controllers/Admin.php?q=getDataFromeSearch",{
            method:"POST",
            body : jsondata,
            header : {
                'Content-Type' :'application/json',
            }
         })
         .then((response)=>response.text())
         .then((data)=>{
            if(data == "Please fill start date"){
            show_msg("error",data);
            $("#datepicker_5").focus();
        }
        else if(data == "Start date should be less then from date"){
            show_msg("error",data);
            $("#datepicker_5").focus();
        }
        else if(data == "Please fill anyone feild")
        {
            show_msg("error",data);
            $("#name").focus();
        }
        else if(data != "No data Found")
        {
            var table = document.getElementById("usersData");
            table.innerHTML = "";
            table.innerHTML += data;
            
            pagination();
        }
        else{
            var table = document.getElementById("usersData");
            table.innerHTML = "";
            table.innerHTML += data;
            pagination();
        }
            
         })
         .catch((error)=>{
            console.log(error);
         })

	}
    
	function getUsersTable(){
		fetch("http://localhost/Helperland/controllers/Admin.php?q=getUserTable")
		.then((response)=>response.text())
		.then((data)=>{
			if(data != 0)
			// console.log(data);
			document.getElementById("usersData").innerHTML += data;
            pagination();
			
        })
		.catch((error)=>{
			console.log(error);
		});
        
	}
	getUsersTable();
function activeOrdeactve(id){
    var formdata = {
        'firstname' : id
    };
    var jsondata = JSON.stringify(formdata);
    fetch("http://localhost/Helperland/controllers/Admin.php?q=actiAndDeactivation",{
        method : 'POST',
        body : jsondata,
            header : {
                'Content-Type' :'application/json',
            }
    })
    .then((response)=>response.json())
    .then((data)=>{
        if(data.insert == "success"){
            window.location.reload(true);
        }
        else
        {
            show_msg("error","Task Incompleted");
        }
    })
    .catch((error)=>{
        console.log(error);
    });

            
}
function deleteUser(id){

    if(confirm("Are you sure for deletion of "+id+"?")){
    var formdata = {
        'firstname' : id
    };
    var jsondata = JSON.stringify(formdata);
    fetch("http://localhost/Helperland/controllers/Admin.php?q=deleteUser",{
        method : 'POST',
        body : jsondata,
            header : {
                'Content-Type' :'application/json',
            }
    })
    .then((response)=>response.json())
    .then((data)=>{
        if(data.insert == "success"){
            window.location.reload(true);
        }
        else
        {
            show_msg("error","Task Incompleted");
        }
    })
    .catch((error)=>{
        console.log(error);
    })
}
}
function pagination(){

table = $("#myTable").DataTable({
            
			      "iDisplayLength": 10,
                  'searching':false,
            "aLengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]],
            "pagingType": "simple_numbers",
            "dom": '<"top"i>rt<"bottom"lp><"clear">',
            "destroy":true,
    
            // "dom": '<"top"f>rt<"bottom"ilp><"clear">'


		});
table.destroy();
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