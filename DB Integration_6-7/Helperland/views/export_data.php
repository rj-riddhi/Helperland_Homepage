<script>


$(function() {
            $( ".datepicker-7" ).datepicker({
               defaultDate:+9,
               dayNamesMin: [ "So", "Mo", "Di", "Mi", "Do", "Fr", "Sa" ],
               duration: "slow",
               format: "yyyy/mm/dd",
    // startDate: "01-01-2021",
    // endDate: "01-01-2022",
    container: '#rescheduleModal modal-body summary_row'
            });
         });

         // Pagination

// var tbody1 = document.querySelector('tbody');

// let tr1= tbody1.getElementsByTagName('tr');
// let select1 = document.querySelector('select');
// let ul1 = document.querySelector('.pagination');
// let arrayTr1 = [];
// for(let i = 0; i<tr1.length;i++)
// {
//     arrayTr1.push(tr1[i]);
// }
// select1.onchange = rowCount;

// function rowCount(e)
// {
//     console.log(e);
//     let neil = ul1.querySelectorAll('.list');
//     neil.forEach(n=>n.remove());
//     let limit = parseInt(e.target.value);
//     displayPage(limit);
// }

// function displayPage(limit)
// {
//     tbody1.innerHTML = '';
//     for(let i=0 ; i<limit ; i++)
//     {
//         tbody1.appendChild(arrayTr1[i]);
//     }
//     buttonGenerator(limit);
// }
// displayPage(10);

// function buttonGenerator(limit)
// {
//     const nofTr = arrayTr1.length;
//     if(nofTr <= limit)
//     {
//         ul1.style.display = 'none';
//     }
//     else
//     {
//         ul1.style.display = 'flex';
        
//         const nofPage = Math.ceil(nofTr/limit);
//         // console.log(nofPage);


//         for(i=1 ; i<=nofPage ; i++)
//         {
//             let li = document.createElement('li');
//             li.className = 'list';

  
//             let a = document.createElement('a');
//             a.href = '#';
//             a.setAttribute('data-page',i);
//             li.appendChild(a).style;
//             a.style="color: black;font-size: 17px;font-weight: normal;";
//             a.innerHTML = i;
//             ul1.insertBefore(li , ul1.querySelector('.next'));

//             a.onclick = e=>{
//                 let x = e.target.getAttribute('data-page');
//                 tbody1.innerHTML = '';
//                 x--;
//                 let start = limit * x;
//                 let end = start + limit;
//                 let page = arrayTr1.slice(start , end);
//                 for(let i=0 ; i<page.length ; i++)
//                 {
//                     let item = page[i];
//                     tbody1.appendChild(item);
//                 }
//             }
//         }
//     }

//     let z =0;
//     function nextElement()
//     {
//         if(this.id == 'next')
//         {
//             z == arrayTr1.length - limit ? (z=0) : (z+=limit) ;    
//          }
//         if(this.id == 'prev')
//         {
//             z == 0 ? arrayTr1.length - limit : (z-= limit);
//         }

//         tbody1.innerHTML ='';
//         for(let c=z ; c<z+limit; c++)
//         {
//             tbody1.appendChild(arrayTr1[c]);

//         }
//     }
//     document.getElementById('prev').onclick = nextElement;
//     document.getElementById('next').onclick = nextElement;
// }

// Form Validation
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

    

</script>