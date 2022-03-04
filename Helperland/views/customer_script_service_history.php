<script>

function showtabledata(){
  fetch("http://localhost/Helperland/controllers/Customer_Pages.php?q=showhistory")
  .then((response)=>response.text())
  .then((data)=>{
  
  document.getElementById("tabledata").innerHTML += data;
   
  })
  .catch((error)=>{
    console.log(error);
  });


}
showtabledata();
function summary(id,serviceid,date,time,printendtime,duration,payment,comments,pets,address,mobile,email){
  var tr = document.getElementById(id);
  tr.style.cursor = "pointer";
  document.getElementById("serviceid").innerHTML = serviceid;
  document.getElementById("date_time").innerHTML = date;
  var time = time+" - "+printendtime;
  document.getElementById('date_time').innerHTML +="  "+time;
  document.getElementById('duration').innerHTML = duration;
  document.getElementById('payment').innerHTML = payment;
  document.getElementById('address').innerHTML = address;
  document.getElementById('phone').innerHTML = mobile;
  document.getElementById('email').innerHTML = email;
  document.getElementById('comments').innerHTML = ": "+comments;
  if(pets == 1){
  document.getElementById("pets").classList.remove("d-none");
}

 var formdata = {
        'id': id
        }
var jsondata = JSON.stringify(formdata);
fetch("http://localhost/Helperland/controllers/Customer_Pages.php?q=getextras",{
 method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        } 
})
.then((response)=>response.json())
.then((data)=>{
  var extras="";
  if(data.data['cabinate'] == 1){
    extras += " Inside Cabinates ";
  }
  if(data.data['fridge'] == 1){
    extras += " Inside Fridge ";
  }
  if(data.data['oven'] == 1){
    extras += " Inside Oven ";
  }
  if(data.data['wash'] == 1){
    extras += " Laundry Wash & Dry ";
  }
  if(data.data['windows'] == 1){
    extras += " Interior Windows ";
  }
  document.getElementById("extra").innerHTML = extras;
})
.catch((error)=>{
  console.log(error);
});


  

 tr.addEventListener("click",()=>{
   tr.setAttribute("data-toggle","modal");
   tr.setAttribute("data-target","#summaryModal");

    
 });
}
function ratesp(){
  var feedback = $('#feedback').val();
  if(feedback.trim()==""){
    alert("Please provide feedback");
    $('#feedback').focus();
    return false;
  }
  var avg = $("#average").text();
  if(avg == 0){
    alert("please hover on first rating star line");
      $("#rating").focus();
  }
 
  var ontime = $("#result").removeClass("d-none").text();
  $("#result").addClass("d-none");
  var friendly = $("#result1").removeClass("d-none").text();
  $("#result1").addClass("d-none");
  var quality = $("#result2").removeClass("d-none").text();
  $("#result2").addClass("d-none");
  var avgrating = $("#average").text();

  var spname = document.getElementById('spname').innerHTML;
  var serviceid = document.getElementById('serviceid').innerHTML;
  var formdata ={
    'avgrating' : avgrating,
    'ontime' : ontime,
    'friendly':friendly,
    'quality':quality,
    'feedback':feedback,
    'spname': spname,
    'serviceid' : serviceid
  }
 var jsondata = JSON.stringify(formdata);
 fetch("http://localhost/Helperland/controllers/Customer_Pages.php?q=ratesp",{
 method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        } 
})
 .then((response)=>response.json())
 .then((data)=>{
  if(data.insert == "success"){
  alert(data.msg);
  // document.getElementById('close').click();
  window.location = "customer_service_history.php";
}
else{
  alert(data.msg);
}
 })
 .catch((error)=>{
  console.log(error);
 })
}
// function update(){
  
// var currentdate = "<?php 
// echo date('m/d/Y')?>";

// var date = $('#datepicker-5').val();
//     var time = $('#time2').val();
//     var id =  document.getElementById('serviceid').innerHTML;
//     if(date.trim() == '' ){
//         alert('Please enter date.');
//         $('#datepicker-5').focus();
//         return false;
//      }
//      else if(date.trim() < currentdate){
//       alert('Please enter valid date.');
//         $('#datepicker-5').focus();
//         return false;
//      }
//     else if(time.trim() == '' ){
//         alert('Please enter time.');
//         $('#time2').focus();
//         return false;
//     }
// else{
//   var formdata = {
//         'id' : id,
//         'date': date,
//         'time' : time
//         }

// var jsondata = JSON.stringify(formdata);
// fetch("http://localhost/Helperland/controllers/Customer_Pages.php?q=updateservice",{
//  method : 'POST',
//         body : jsondata,
//         headers : {
//           'Content-Type' :'application/json',
//         } 
// })
// .then((response)=>response.json())
// .then((data)=>{
//   if(data.insert == 'success'){
//     show_msg("success",data.msg);
//     window.location="customer_dashboard.php";
//   }
//   else{
//     alert(data.msg);
//     window.location="customer_dashboard.php";
//   }
// })
// .catch((error)=>{
//   console.log(error);
// })
// }
//  }


  function ratemodal(id,spname){
    document.getElementById(id).addEventListener("click" , ()=>{
       document.getElementById(id).removeAttribute("data-toggle","modal");
    document.getElementById(id).removeAttribute("data-target","#summaryModal");
    
    });
   document.getElementById(id).setAttribute("data-toggle","modal");
    document.getElementById(id).setAttribute("data-target","#rateModal");

    document.getElementById('spname').innerHTML = spname;
    document.getElementById('serviceid').innerHTML = id;
    
  }

 
</script>