// Stepper

const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  });
});

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
      formStep.classList.remove("form-step-active");
  });

  formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() { 
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      var elements = document.getElementsByClassName("progress-step-active");
      // console.log(elements[0].classList);
      // console.log(idx+" "+progressStep);
      elements[0].classList.remove("progress-step-active");
      progressStep.classList.add("progress-step-active");
      
      } else {
      progressStep.classList.remove("progress-step-active");
    }
  });


 
}

// Date picker
$(function() {
            $( ".datepicker-7" ).datepicker({
               defaultDate:+9,
               dayNamesMin: [ "So", "Mo", "Di", "Mi", "Do", "Fr", "Sa" ],
               duration: "slow"
            });
         });

// For selecting Services
 var Services = document.querySelectorAll(".services");
  
  Services.forEach((img , count)=>{
    var img1 = "<img src='images/Book_Service/"+count+".png'>";
    var img2 = "<img src='images/Book_Service/"+(count+5)+".png'>";
   
    img.addEventListener("click", () =>{
      if(Services[count].classList.contains('services-active') == false)
      {
       Services[count].classList.add('services-active');
      Services[count].innerHTML = img1;
      }
      else
      {
        Services[count].classList.remove('services-active');
        Services[count].innerHTML = img2;
      }

    });
  });

// Add new Address
var address = document.getElementById("btn2");
address.addEventListener("click", () =>{
  var new_add = document.getElementsByClassName("form_container");
  new_add[0].classList.add("form_show");
});
  // Selecting favourite sp
  var sp = document.querySelectorAll('.favourite_sp');
  sp.forEach((a,count)=>{
    a.addEventListener("click",()=>{
      if(sp[count].children[count].classList.contains('favourite_sp_active')  == false)
      {
         sp[count].children[count].classList.add('favourite_sp_active');
         sp[count].children[count+3].classList.add('btn3_active');
      }
    else
    {
      sp[count].children[count].classList.remove('favourite_sp_active');
      sp[count].children[count+3].classList.remove('btn3_active');
    }
    })
  });




//   /JavaScript function that enables or disables a submit button depending
// //on whether a checkbox has been ticked or not.
function terms_changed(termsCheckBox){
    //If the checkbox has been checked
    if(termsCheckBox.checked){
        //Set the disabled property to FALSE and enable the button.
        document.getElementById("submit_button").disabled = false;
        
    } else{
        //Otherwise, disable the submit button.
        document.getElementById("submit_button").disabled = true;


    }
}