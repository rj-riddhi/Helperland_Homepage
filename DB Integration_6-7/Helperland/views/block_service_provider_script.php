<script>
	function showblockcustomers(){
  fetch("../controllers/Customer_Pages.php?q=getBlockServiceProviders")
  .then((response)=>response.text())
  .then((data)=>{
  // console.log(data);
  document.getElementById("tabledata5").innerHTML += data;
  pagination();
    
  })
  .catch((error)=>{
    // console.log(error);
  });
}
showblockcustomers();

function block(custid,spid,spname){
  var blockbtn = document.getElementsByClassName(spid);
 if(blockbtn[1].innerHTML == "Block"){
 	var spid = spid;
    var custid = custid;
    var custname = spname
    var formdata={
      'targetuserid':spid,
      'userid':custid,
      'username':custname
    };
    var jsondata = JSON.stringify(formdata);
    fetch("../controllers/Customer_Pages.php?q=blockServiceProvider",{
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
        blockbtn[1].innerHTML = "UnBlock";
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
    var custname = spname
    var formdata={
      'targetuserid':spid,
      'userid':custid,
      'username':custname
    };
    var jsondata = JSON.stringify(formdata);
    fetch("../controllers/Customer_Pages.php?q=unBlockServiceProvider",{
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
        blockbtn[1].innerHTML = "Block";

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

function favourite(custid,spid,spname){
  var blockbtn = document.getElementsByClassName(spid);
 if(blockbtn[0].innerHTML == "Favourite"){
 	var spid = spid;
    var custid = custid;
    var custname = spname
    var formdata={
      'targetuserid':spid,
      'userid':custid,
      'username':custname
    };
    var jsondata = JSON.stringify(formdata);
    fetch("../controllers/Customer_Pages.php?q=FavouriteServiceProvider",{
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
        blockbtn[0].innerHTML = "Unfavourite";
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
    var custname = spname
    var formdata={
      'targetuserid':spid,
      'userid':custid,
      'username':custname
    };
    var jsondata = JSON.stringify(formdata);
    fetch("../controllers/Customer_Pages.php?q=unFavouriteServiceProvider",{
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
        blockbtn[0].innerHTML = "Favourite";

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