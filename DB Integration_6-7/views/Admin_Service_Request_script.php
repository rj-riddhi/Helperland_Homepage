<script>

function getCustomerName(){
	fetch("http://localhost/Helperland/controllers/Admin.php?q=getCustomerName")
	.then((response)=>response.text())
	.then((data)=>{
		// console.log(data);
		var array = data.split("/");
			var customer = document.getElementById("customer");
			for(var i = 0 ; i< array.length ; i++){
         	var option = document.createElement("OPTION");
            option.innerHTML = array[i];
            option.value = array[i];
            customer.appendChild(option);
        }
	})
	.catch((error)=>{
		console.log(error);
	})
}
getCustomerName();
function getServiceproviderName(){
	fetch("http://localhost/Helperland/controllers/Admin.php?q=getServiceproviderName")
	.then((response)=>response.text())
	.then((data)=>{
		// console.log(data);
		var array = data.split("/");
			var serviceprovider = document.getElementById("serviceprovider");
			for(var i = 0 ; i< array.length ; i++){
         	var option = document.createElement("OPTION");
            option.innerHTML = array[i];
            option.value = array[i];
            serviceprovider.appendChild(option);
        }
	})
	.catch((error)=>{
		console.log(error);
	})
}
getServiceproviderName();
function search2()
	{
		var serviceid = document.querySelector("#serviceid").value;
		var postalcode = document.querySelector("#zipcode").value;
		var email = document.querySelector("#email").value;
		var customername = document.querySelector("#customer").value;
		var spname = document.querySelector("#serviceprovider").value;
		var paymentstatus = document.querySelector("#paymentstatus").value;
		var servicestatus = document.querySelector("#status").value;
		var startdate = document.querySelector("#datepicker_5").value;
		var enddate = document.querySelector("#datepicker_6").value;

		if(serviceid == "" && postalcode == "" && email == "" && customername == "" && spname == "" && paymentstatus == "" && servicestatus == "" && startdate == "" && enddate == "" ){
			show_msg("error","Please fill eny one feild");
			return false;
		}
		else if(enddate != "" && startdate == ""){
			show_msg("error","Please fill startdate");
			$("#datepicker-5").focus();
			return false;
		}
		else if(startdate > enddate && enddate != ''){
			show_msg("error","Startdate should be less than enddate");
			$("#datepicker-5").focus();
			return false;
		}
		else {
			var data = {
                'serviceid':serviceid,
                'postalcode':postalcode,
                'email':email,
                'customername':customername,
                'spname':spname,
                'paymentstatus':paymentstatus,
                'servicestatus':servicestatus,
                'startdate':startdate,
                'enddate':enddate

            }

            var jsondata = JSON.stringify(data);
            fetch("http://localhost/Helperland/controllers/Admin.php?q=getServiceDataFromeSearch",{
            method:"POST",
            body : jsondata,
            header : {
                'Content-Type' :'application/json',
            }
         })
         .then((response)=>response.text())
         .then((data)=>{
         	// console.log(data);
         	var table = document.getElementById("servicesData");
         	table.innerHTML = "";
         	table.innerHTML += data;
         	var averageresult = document.getElementsByClassName('rating');
				  for(var i = 0 ; i<averageresult.length ; i++){
				    var average = averageresult[i];
				    rating(average,i);
				}
			pagination();
         })
         .catch((error)=>{
         	console.log(error);
         })
		}
	}
	function getAllServicesData(){
		fetch("http://localhost/Helperland/controllers/Admin.php?q=getAllServicesData")
		.then((response)=>response.text())
		.then((data)=>{
			document.getElementById("servicesData").innerHTML += data;
			var tr = document.querySelectorAll("tr");
			var serviceid = document.getElementById("serviceid");
			for(var j = 1 ; j<tr.length ; j++){
				var option = document.createElement("OPTION");
            option.innerHTML = tr[j].id;
            option.value = tr[j].id;
            serviceid.appendChild(option);
            }
            
			var averageresult = document.getElementsByClassName('rating');
				  for(var i = 0 ; i<averageresult.length ; i++){
				    var average = averageresult[i];
				    rating(average,i);
				}
			pagination();
		})
		.catch((error)=>{
			console.log(error);
		})
	}
	getAllServicesData();

	function rating(average,i)
{
  var i = i;
  const starPercentage = average.innerHTML;
          const starPercentageRounded = `${(starPercentage/5)*100}%`;
          
          document.querySelectorAll(".stars-inner")[i].setAttribute("style","width:"+starPercentageRounded);
}

function editModal(id,date,time,address,spid,custid,serviceid){
	var tr = document.getElementById(id);
	tr.setAttribute("data-toggle","modal");
   	tr.setAttribute("data-target","#editModal");
	tr.click($("#editModal").show());
	var street = address.split(" ")[0];
	var housenumber = address.split(" ")[1];
	var postalcode = address.split(" ")[2];
	var city = address.split(" ")[3];
	document.getElementById("datepicker-5").value = date;
	document.getElementById("validationCustom02").value = time;
	document.getElementById("validationCustom04").value = street;
	document.getElementById("validationCustom05").value = housenumber;
	document.getElementById("street2").value = street;
	document.getElementById("housenumber2").value = housenumber;
	document.getElementById("validationCustom06").value = postalcode;
	document.getElementById("postalcode2").value = postalcode;
	document.getElementById("location").value = city;
	document.getElementById("location").text = city;
	document.getElementById("location2").value = city;
	document.getElementById("location2").text = city;
	document.getElementById("editbtn").setAttribute("class",date+" "+time+" "+address+" "+spid+" "+custid+" "+serviceid+" "+id+" btn");
	var data = document.getElementById("editbtn").classList;
	
	// console.log(data[0]+" "+data[1]+" "+data[8]+" "+data[9]+" "+data[10]);
	document.getElementById("validationCustom06").classList.add(spid);
	document.getElementById("validationCustom06").classList.add(data[4]);
	// console.log(document.getElementById("validationCustom06").classList);
	
  
}
function editService(){
	var data = document.getElementById("editbtn").classList;
	// var date = data[0];
	// var time = data[1];
	var postalcode = data[4];
	var date = document.getElementById("datepicker-5").value;
	var time = document.getElementById("validationCustom02").value;
	var street1 = document.getElementById("validationCustom04").value ;
	var street2 = street1;
	var housenumber1 = document.getElementById("validationCustom05").value ;
	var housenumber2 = housenumber1;
	var postalcode1  =document.getElementById("validationCustom06").value ; 
	var postalcode2 = postalcode1;
	var city1 = document.getElementById("location").value ; 
	var city2 = city1;
	var reason = document.getElementById("validationCustom08").value;
	var notes = document.getElementById("validationCustom09").value;
	var modifier = "<?php echo $_SESSION['userid'] ?>";
	var currentdate = "<?php echo date('d/m/Y')?>";
	var spid = data[8];
	var custid = data[9];
	var serviceid = data[10];
	var modal = data[11];
	console.log(date +" "+currentdate);
	if(date.trim() == '' ){
        alert('Please enter date.');
        $('#datepicker-5').focus();
        return false;
     }
     
//     else if(date.trim().toString() < currentdate){
//       alert('Please enter valid date.');
      
//         $('#datepicker-5').focus();
// return false;
//         // window.location.reload(true);
        
        
//      }
    else if(time.trim() == '' ){
        alert('Please enter time.');
        $('#validationCustom02').focus();
        return false;
    }
	else if(street1 == ''){
		alert('Please enter street.');
        $('#validationCustom04').focus();
        return false;
	}
	else if(housenumber1 == ''){
		alert('Please enter housenumber.');
        $('#validationCustom05').focus();
        return false;
	}
	else if(postalcode1 == ''){
		alert('Please enter postalcode.');
        $('#validationCustom06').focus();
        return false;
	}
	
	else if(street2 == ''){
		alert('Please enter street.');
        $('#street2').focus();
        return false;
	}
	else if(housenumber2 == ''){
		alert('Please enter housenumber.');
        $('#housenumber2').focus();
        return false;
	}
	else if(postalcode2 == ''){
		alert('Please enter postalcode.');
        $('#postalcode2').focus();
        return false;
	}
	else if(reason == ''){
		alert('Please enter reason for this updation.');
        $('#validationCustom08').focus();
        return false;
	}
	else if(notes == ''){
		alert('Please enter reason for this updation.');
        $('#validationCustom09').focus();
        return false;
	}
	
	else{
		var formdata = {
			'date':date,
			'time':time,
			'street':street1,
			'housenumber' : housenumber1,
			'postalcode':postalcode1,
			'city':city1,
			'reason':reason,
			'notes':notes,
			'modifier':modifier,
			'currentdate':currentdate,
			'spid':spid,
			'custid':custid,
			'serviceid':serviceid
		};
		var jsondata = JSON.stringify(formdata);
		document.getElementById("editbtn").innerHTML = "loading...";
		fetch("http://localhost/Helperland/controllers/Admin.php?q=updateRequestByAdmin",{
			method : 'POST',
			body : jsondata,
			header : {
                'Content-Type' :'application/json',
            }
		})
		.then((response)=>response.json())
		.then((data)=>{
			if(data.insert == "success"){
				document.getElementById("editbtn").innerHTML = "Update";
				alert(data.msg);
				window.location.reload(true);
			}
			else{
				alert(data.msg);
				// window.location.reload(true);
			}
		})
		.catch((error)=>{
			console.log(error);
		})
	}
}
function postalchanged(){
	var postalcode = document.getElementById("validationCustom06").value;
	var data = document.getElementById("validationCustom06").classList;
	var spid = data[1];
	var postalcode1 = data[2];
	
	if(postalcode.length == 6){
     
        if(postalcode1 != postalcode && spid != 0){
		var data = {
			'newpostalcode':postalcode1,
			'spid':spid
		};
		var jsondata = JSON.stringify(data);
		fetch("http://localhost/Helperland/controllers/Admin.php?q=SpAvilabilityOnNewPostal",{
			method : 'POST',
			body : jsondata,
			heade : {
                'Content-Type' :'application/json',
            }
		})
		.then((response)=>response.json())
		.then((data)=>{
			if(data.insert != "success"){
				alert("Your allocated serviceprovider is not avilable at new area");
				window.location.reload(true);
			}
		})
		.catch((error)=>{
			console.log(error);
		});
	}
	else{
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
        	
        	document.getElementById("location").value = data;
            document.getElementById("location").text = data;
            document.getElementById("location2").value = data;
            document.getElementById("location2").text = data;
            document.getElementById("postalcode2").value = postalcode;
        
        })
        .catch((error)=>{
            console.log(error);
        });
	}

        
    }
    else
    {
    	alert("Please select valid postalcode");
        	$("#validationCustom06").focus();
        	return false;
    }
	
}
function cancelModal(id){
	
	var id = id.split("_")[1];
	 if(confirm("Are you sure for deletion of "+id+"?")){
    var formdata = {
        'serviceid' : id
    };
    var jsondata = JSON.stringify(formdata);
    fetch("http://localhost/Helperland/controllers/Admin.php?q=deleteService",{
        method : 'POST',
        body : jsondata,
            header : {
                'Content-Type' :'application/json',
            }
    })
    .then((response)=>response.json())
    .then((data)=>{
        if(data.insert == "success"){
        	alert("Service Request is deleted Successfully!!");
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
	// data-toggle='modal' data-target='#myModal'
}
function cancelledModal(){
	console.log("called");
	// data-toggle='modal' data-target='#myCancelledModal'
}
function completedModal(){
	console.log("called");
	// data-toggle='modal' data-target='#myCompletedModal'
}
</script>