$(function() {
            $( ".datepicker-7" ).datepicker({
               defaultDate:+9,
               dayNamesMin: [ "So", "Mo", "Di", "Mi", "Do", "Fr", "Sa" ],
               duration: "slow"
            });
         });

       
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

// Popover
$("#poplink").popover({
    html: true,
    placement: "left",
    trigger: "focus",
    
    content: function () {
        return $(".admin-table-action-menu").html();
    }
});

    