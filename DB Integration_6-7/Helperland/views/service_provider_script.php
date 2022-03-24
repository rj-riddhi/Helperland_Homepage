<script>
	function showtabledata(){
  fetch("../controllers/Service_Provider.php?q=getNewServiceRequest")
  .then((response)=>response.text())
  .then((data)=>{
  // console.log(data);
  document.getElementById("tabledata").innerHTML += data;
  pagination();
  // calender();
    
  })
  .catch((error)=>{
    // console.log(error);
  });

}
showtabledata();
function showupcomingtabledata(){
  fetch("../controllers/Service_Provider.php?q=getUpcomingServiceRequest")
  .then((response)=>response.text())
  .then((data)=>{
  // console.log(data);
  document.getElementById("tabledata2").innerHTML += data;
  document.getElementsByClassName("false")[0].firstElementChild.classList.add("d-none");
  pagination();
    
  })
  .catch((error)=>{
    // console.log(error);
  });

}
showupcomingtabledata();
function showhistorytabledata(){
  fetch("../controllers/Service_Provider.php?q=getServiceProviderHistory")
  .then((response)=>response.text())
  .then((data)=>{
  // console.log(data);
  document.getElementById("tabledata3").innerHTML += data;
  document.getElementsByClassName("false")[0].firstElementChild.classList.add("d-none");
  pagination();
    
  })
  .catch((error)=>{
    // console.log(error);
  });

}
showhistorytabledata();
function showblockcustomers(){
  fetch("../controllers/Service_Provider.php?q=getBlockCustomers")
  .then((response)=>response.text())
  .then((data)=>{
  // console.log(data);
  document.getElementById("tabledata4").innerHTML += data;
  pagination();
    
  })
  .catch((error)=>{
    // console.log(error);
  });
}
showblockcustomers();
function summary(id,serviceid,date,time,printendtime,duration,payment,comments,pets,address,custname,custid,city,street){
  var mapaddress2 =street+" "+city;
  // serviceproviderid = spid;
  // console.log(serviceproviderid);
  var tr = document.getElementById(id);
  tr.style.cursor = "pointer";
  document.getElementById("serviceid").innerHTML = serviceid;
  document.getElementById("date_time").innerHTML = date;
  var time = time+" - "+printendtime;
  document.getElementById('date_time').innerHTML +="  "+time;
  document.getElementById('duration').innerHTML = duration;
  document.getElementById('payment').innerHTML = payment;
  document.getElementById('address').innerHTML = address;
  document.getElementById('custname').innerHTML = custname;
  document.getElementById('comments').innerHTML = ": "+comments;
  document.getElementsByClassName("badge_complete")[0].setAttribute("id",serviceid+" "+custid);
  document.getElementsByClassName("googlemap1")[0].setAttribute("id",serviceid+" location");
  document.getElementById(serviceid+" location").setAttribute("src","https://maps.google.com/maps?q="+mapaddress2+"&output=embed");

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
  if(data.insert == 'success'){
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
}
else{
  var extras = " ";
}
})
.catch((error)=>{
  console.log(error);
});


  

 tr.addEventListener("click",()=>{
   tr.setAttribute("data-toggle","modal");
   tr.setAttribute("data-target","#summaryModal");

    
 });
}

function accept(id){
  var serviceid = id.substr(0,id.indexOf(" "));
  var custid = id.substr(id.indexOf(" "));
  if(document.getElementById("pets").classList.contains("d-none")){
    var pets = 1;
  }
  else{
    var pets = 0;
  }
  var spid = "<?php echo $_SESSION['userid']?>";
  var formdata = {
    'serviceid':serviceid,
    'custid' : custid,
    'spid' : spid,
    'pets' : pets
  };
  var jsondata = JSON.stringify(formdata);
  fetch("http://localhost/Helperland/controllers/Service_Provider.php?q=timeconflict",{
 method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        } 
})
  .then((response)=>response.json())
  .then((data)=>{
    if(data.insert == 'success'){
    show_msg("error",data.msg)
    document.getElementById(formdata['serviceid']+" timeconflict").innerHTML = data.msg2;
  }
  else{
    
  document.getElementById(formdata['serviceid']+" Accept").innerHTML = "Loading...";
      fetch("http://localhost/Helperland/controllers/Service_Provider.php?q=acceptservicerequest",{
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
    document.getElementById(formdata['serviceid']+" Accept").innerHTML = "Accepted";
    document.getElementById(formdata['serviceid']+" Accept").disabled = true;
    document.getElementById(formdata['serviceid']+" Accept").style.cursor = "not-allowed";

  }
  else
  {
    show_msg("error",data.msg);
  }
})
.catch((error)=>{
  console.log(error);
})
  }
  })
  .catch((error)=>{
    console.log(error);
  })


}

function complete(id){
  alert(id);
  var serviceid = id.substr(0,id.indexOf(" "));;
  var formdata = {
    'serviceid':serviceid
  };
  var jsondata = JSON.stringify(formdata);
  fetch("http://localhost/Helperland/controllers/Service_Provider.php?q=markServiceAsCompleted",{
 method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        } 
})
  .then((response)=>response.json())
  .then((data)=>{
    if(data.insert == "success"){
      document.getElementById(serviceid+" Complete").innerHTML = "Completed";
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

function summary2(id,serviceid,date,time,printendtime,duration,payment,comments,pets,address,custname,custid,completemark,city,street){
  // serviceproviderid = spid;
  // console.log(serviceproviderid);
  var mapaddress =street+" "+city;
  var tr = document.getElementById(id);
  tr.style.cursor = "pointer";
  document.getElementById("serviceid2").innerHTML = serviceid;
  document.getElementById("date_time2").innerHTML = date;
  var time = time+" - "+printendtime;
  document.getElementById('date_time2').innerHTML +="  "+time;
  document.getElementById('duration2').innerHTML = duration;
  document.getElementById('payment2').innerHTML = payment;
  document.getElementById('address2').innerHTML = address;
  document.getElementById('custname2').innerHTML = custname;
  document.getElementById('comments2').innerHTML = ": "+comments;
  document.getElementsByClassName("badge_complete")[0].setAttribute("id",serviceid+" "+custid+"complete");
  document.getElementsByClassName("badge_cancel")[0].setAttribute("id",serviceid+" "+custid);
  document.getElementsByClassName("googlemap2")[0].setAttribute("id",serviceid+" location");
  document.getElementById(serviceid+" location").setAttribute("src","https://maps.google.com/maps?q="+mapaddress+"&output=embed");
  
  
  if(completemark == false){
    // console.log(document.getElementById(serviceid+" "+custid+"complete").classList);
    document.getElementById(serviceid+" "+custid+"complete").classList.add("d-none");
  }

  
  if(pets == 1){
  document.getElementById("pets2").classList.remove("d-none");
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
  if(data.insert == 'success'){
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
}
else{
  var extras = " ";
}
})
.catch((error)=>{
  console.log(error);
});


  

 tr.addEventListener("click",()=>{
   tr.setAttribute("data-toggle","modal");
   tr.setAttribute("data-target","#summaryModal2");

    
 });
}


// function calender(){
// $(".calendar").fullCalendar();
    var userid = "<?php echo $_SESSION['userid']?>";
    var formdata = {
      'userid':userid
    };
    var jsondata = JSON.stringify(formdata);
    fetch("http://localhost/Helperland/controllers/Service_Provider.php?q=celenderdata",{
      method : 'POST',
        body : jsondata,
        headers : {
          'Content-Type' :'application/json',
        }
    })
    .then((response)=>response.json())
    .then((data)=>{
      var items = data;
    

      // console.log(items[i]);
 var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
      left: 'prev,next',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay',
      
    },
    events: items,
    selectable:true,
    selectHelper: true,

    eventClick: function(items){
      var details = items.event.extendedProps.sources;
        
      var serviceid = items.event.id;
      for(var i = 0; i < details.length ; i++){

         if(serviceid == details[0][i].ServiceId){
          var id = serviceid ;
          var custid =details[0][i].UserId ;
          var street = details[1].AddressLine1;
          var housenumber = details[1].AddressLine2;
          var postalcode = details[1].PostalCode;
          var city = details[1].City;
          var mapaddress =street+" "+city;
          var date = details[0][i].ServiceStartDate;
          date = date.substr(0,10);
          var time = items.event.title;
          var printendtime = time ;
          var duration = details[0][i].ServiceHours;
          var payment = details[0][i].TotalCost;
          var address =street+" "+housenumber+" "+postalcode+" "+city;
          var custname =details[2].FirstName+" "+details[2].LastName ;
          // console.log(custname);
          var comments = details[0][i].Comments;
          var completemark = "true";
          var pets = details[0][i].HasPets;
          summary3(id,serviceid,date,time,duration,payment,comments,pets,address,custname,custid,completemark,city,street,mapaddress)
          $("#summaryModal3").modal("show");
         }
    }},
   
          initialView: 'dayGridMonth',
          
        });
        calendar.render();
      
    })
    .catch((error)=>{
      console.log(error);
    });

function summary3(id,serviceid,date,time,duration,payment,comments,pets,address,custname,custid,city,street,mapaddress){
  
  document.getElementById("serviceid").innerHTML = serviceid;
  document.getElementById("date_time").innerHTML = date;
  document.getElementById('date_time').innerHTML +="  "+time;
  document.getElementById('duration').innerHTML = duration;
  document.getElementById('payment').innerHTML = payment;
  document.getElementById('address').innerHTML = address;
  document.getElementById('custname').innerHTML = custname;
  document.getElementById('comments').innerHTML = ": "+comments;
  document.getElementsByClassName("badge_complete")[0].setAttribute("id",serviceid+" "+custid);
  document.getElementsByClassName("googlemap1")[0].setAttribute("id",serviceid+" location");
  document.getElementById(serviceid+" location").setAttribute("src","https://maps.google.com/maps?q="+mapaddress+"&output=embed");

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
  if(data.insert == 'success'){
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
}
else{
  var extras = " ";
}
})
.catch((error)=>{
  console.log(error);
});


}

function block(spid,custid,custname){
  var blockbtn = document.getElementById(custid);
  if(blockbtn.innerHTML == "Block"){
    var spid = spid;
    var custid = custid;
    var custname = custname
    var formdata={
      'targetuserid':spid,
      'userid':custid,
      'username':custname
    };
    var jsondata = JSON.stringify(formdata);
    fetch("../controllers/Service_Provider.php?q=blockCustomer",{
      method:"POST",
      body : jsondata,
      headers : {
          'Content-Type' :'application/json',
        } 

    })
    .then((response)=>response.json())
    .then((data)=>{
      if(data.insert == "success"){
        show_msg("success",data.msg);
        blockbtn.innerHTML = "UnBlock";
      }
      else
      {
        show_msg("error",data.msg);
      }
    })
    .catch((error)=>{
      console.log(error);
    })
  }
  else{
    var spid = spid;
    var custid = custid;
    var custname = custname
    var formdata={
      'targetuserid':spid,
      'userid':custid,
      'username':custname
    };
    var jsondata = JSON.stringify(formdata);
    fetch("../controllers/Service_Provider.php?q=unBlockCustomer",{
      method:"POST",
      body : jsondata,
      headers : {
          'Content-Type' :'application/json',
        } 

    })
    .then((response)=>response.json())
    .then((data)=>{
      if(data.insert == "success"){
        show_msg("success",data.msg);
        blockbtn.innerHTML = "Block";

      }
      else
      {
        show_msg("error",data.msg);
      }
    })
    .catch((error)=>{
      console.log(error);
    })

  }
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
function pagination(){

let tbody = document.querySelector('tbody');
let tr= tbody.getElementsByClassName('tr');
let select = document.querySelector('select');
let ul = document.querySelector('.pagination');
let arrayTr = [];
for(let i = 0; i<tr.length;i++)
{
    arrayTr.push(tr[i]);
}
select.onchange = rowCount;
function rowCount(e)
{
    let neil = ul.querySelectorAll('.list');
    neil.forEach(n=>n.remove());
    let limit = parseInt(e.target.value);
    displayPage(limit);
}

function displayPage(limit)
{
    tbody.innerHTML = '';
    for(let i=0 ; i<limit ; i++)
    {
      // console.log(arrayTr[i]);
        tbody.appendChild(arrayTr[i]);
    }
    buttonGenerator(limit);
}
displayPage(10);

function buttonGenerator(limit)
{
    const nofTr = arrayTr.length;
    if(nofTr <= limit)
    {
        ul.style.display = 'none';
    }
    else
    {
        ul.style.display = 'flex';
        const nofPage = Math.ceil(nofTr/limit);

        for(i=1 ; i<=nofPage ; i++)
        {
            let li = document.createElement('li');
            li.className = 'list';
            let a = document.createElement('a');
            a.href = '#';
            a.setAttribute('data-page',i);
            li.appendChild(a);
            a.innerHTML = i;
            ul.insertBefore(li , ul.querySelector('.next'));

            a.onclick = e=>{
                let x = e.target.getAttribute('data-page');
                tbody.innerHTML = '';
                x--;
                let start = limit * x;
                let end = start + limit;
                let page = arrayTr.slice(start , end);
                for(let i=0 ; i<page.length ; i++)
                {
                    let item = page[i];
                    tbody.appendChild(item);
                }
            }
        }
    }

    let z =0;
    function nextElement()
    {
        if(this.id == 'next')
        {
            z == arrayTr.length - limit ? (z=0) : (z+=limit) ;
        }
        if(this.id == 'prev')
        {
            z == 0 ? arrayTr.length - limit : (z-= limit);
        }

        tbody.innerHTML ='';
        for(let c=z ; c<z+limit; c++)
        {
            tbody.appendChild(arrayTr[c]);
        }
    }
    document.getElementById('prev').onclick = nextElement;
    document.getElementById('next').onclick = nextElement;
}
} 
</script>