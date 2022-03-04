<script>

function showtabledata(){
  fetch("http://localhost/Helperland/controllers/Customer_Pages.php?q=getTableData")
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
        };
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

function update(){
  
var currentdate = "<?php echo date('m/d/Y')?>";

var date = $('#datepicker-5').val();
    var time = $('#time2').val();
    var id =  document.getElementById('serviceid').innerHTML;
    if(date.trim() == '' ){
        alert('Please enter date.');
        $('#datepicker-5').focus();
        return false;
     }
     else if(date.trim() < currentdate){
      alert('Please enter valid date.');
        $('#datepicker-5').focus();
        return false;
     }
    else if(time.trim() == '' ){
        alert('Please enter time.');
        $('#time2').focus();
        return false;
    }
else{
  var formdata = {
        'id' : id,
        'date': date,
        'time' : time
        }

var jsondata = JSON.stringify(formdata);
fetch("http://localhost/Helperland/controllers/Customer_Pages.php?q=updateservice",{
 method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        } 
})
.then((response)=>response.json())
.then((data)=>{
  if(data.insert == 'success'){
    show_msg("success",data.msg);
    window.location="customer_dashboard.php";
  }
  else{
    alert(data.msg);
    window.location="customer_dashboard.php";
  }
})
.catch((error)=>{
  console.log(error);
})
}
 }

function cancel() {
  var id =  document.getElementById('serviceid').innerHTML;
    
  var comment = document.getElementById('comment').value;
  if(comment == ""){
    alert("Please enter reason for canceling service");
    $("#comment").focus();
    return false;
  }
  var formdata = {
    'id' : id,
    'comment':comment
  }
  var jsondata = JSON.stringify(formdata);
  fetch("http://localhost/Helperland/controllers/Customer_Pages.php?q=deleteservice",{
 method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        } 
})
  .then((response)=>response.json())
  .then((data)=>{
    if(data.insert == "success"){
      show_msg("success","Your request is deleted");
      window.location="customer_dashboard.php";
    }
    else{
      alert("not deleted");
      show_msg("error","Your request is not deleted");
      window.location="customer_dashboard.php";
    }
  })
  .catch((error)=>{
    console.log(error);
  })
}

  function reschedulemodal(id){
    document.getElementById(id).addEventListener("click" , ()=>{
       document.getElementById(id).removeAttribute("data-toggle","modal");
    document.getElementById(id).removeAttribute("data-target","#summaryModal");
    
    });
   document.getElementById(id).setAttribute("data-toggle","modal");
    document.getElementById(id).setAttribute("data-target","#rescheduleModal");
    
  }

  function cancelmodal(id){
    document.getElementById(id).addEventListener("click" , ()=>{
       document.getElementById(id).removeAttribute("data-toggle","modal");
    document.getElementById(id).removeAttribute("data-target","#summaryModal");
    
    });
   document.getElementById(id).setAttribute("data-toggle","modal");
    document.getElementById(id).setAttribute("data-target","#cancelModal");
  }

function show_msg(type,text){
  if(type == 'error'){
    var message_box = document.getElementById("error-message");
    console.log(message_box);
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