
// Cookie

(function () {
    "use strict";

    var cookieAlert = document.querySelector(".cookiealert");
    var acceptCookies = document.querySelector(".acceptcookies");

    if (!cookieAlert) {
       return;
    }

    cookieAlert.offsetHeight;
    if (!getCookie("acceptCookies")) {
        cookieAlert.classList.add("show");
    }

    acceptCookies.addEventListener("click", function () {
        setCookie("acceptCookies", true, 365);
        cookieAlert.classList.remove("show");

        window.dispatchEvent(new Event("cookieAlertAccept"))
    });

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) === 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
})();

// Pagination

let tbody = document.querySelector('tbody');
let tr= tbody.getElementsByTagName('tr');
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

  // SCROLL BEAHVIOUR

            window.addEventListener("scroll",()=>{
            var nav=document.getElementById("navbar");
            nav.classList.toggle("sticky",window.scrollY>0);
        });
