<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="../views/css/customer_service_history.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../views/css/rating.css">
  

</head>
<body>
<div class="container">
    <div class="row">

<div class="modal fade" id="rateModal"> 
        <div class="modal-dialog">
          <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header pb-0">
          <h4 class="modal-title">
            <div class="row">
              <div class="col-auto avatar1" ><img  src="images/Service_History/cap.png"></div>
              <div class="col-auto">
                <span class="avatar_name"id="spname"></span><br>

    <div class="stars-outer">
          <div class="stars-inner"></div>
        </div>
    <span class="average" id="average" style="font-size:20px;color:#646464">0</span>
          
                 
                  
              </div>
              <div class="col-12 pt-3"><span class="avatar_name"><p>Rate your service Provider</p></span> </div>
            </div>



          </h4>
          <button type="button" class="close" id="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-4 avatar_name2">On time arrival</div>
            <div class="col pl-0">
                  <span class="rateyo d-inline-block " id= "rating"
                     data-rateyo-rating="0"
                     data-rateyo-num-stars="5"
                     data-rateyo-score="3">
                  </span>
<!-- data-rateyo-num-stars="5" -->
                     
                  <span class='result d-none' id="result" style="font-size:20px;color:#646464"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-4 avatar_name2">Friendly</div>
            <div class="col pl-0">
                  <div class="rateyo1" id= "rating"
                     data-rateyo-rating="0"
                     data-rateyo-num-stars="5"
                     data-rateyo-score="3">
                  </div>
 
                  <span class='result1 d-none' id="result1" style="font-size:20px;color:#646464" ></span>
            </div>
          </div>
          <div class="row">
            <div class="col-4 avatar_name2">Quality of service</div>
            <div class="col pl-0">
              <div class="rateyo2" id= "rating"
                 data-rateyo-rating="0"
                 data-rateyo-num-stars="5"
                 data-rateyo-score="3">
              </div>
 
              <span class='result2 d-none' id="result2" style="font-size:20px;color:#646464"></span>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <p class="avatar_name2 mt-2 mb-1">Feedback on service provider</p>
              
              <textarea rows="4" cols="50" id="feedback" name="comment" form="usrform" required></textarea>
            </div>
          </div>
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer mx-auto">
          <button  type="button" id="ratespbtn" onclick="ratesp()" class="btn badge_rate1">Submit</button>
        </div>
        
          </div>
        </div>
      </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

 
<script>
 
 
    $(function () {
      var rating1=0;
      var rating2=0;
      var rating3=0;
      var average = 0;
  
var average;

      
        $(".rateyo").rateYo({starWidth: "20px" , ratedFill: "#f8ce0b", normalFill:"#A0A0A0",spacing: "5px"
}).on("rateyo.change", function (e, data) {
            rating1 = data.rating;
            
            $(this).parent().find('.result').text(rating1);
            setRatings();
            
        });

        $(".rateyo1").rateYo({starWidth: "20px" , ratedFill: "#f8ce0b", normalFill:"#A0A0A0",spacing: "5px"}).on("rateyo.change", function (e, data) {
            rating2 = data.rating;
            
            $(this).parent().find('.result1').text(rating2);
          
            setRatings();
            
        });

        $(".rateyo2").rateYo({starWidth: "20px" , ratedFill: "#f8ce0b", normalFill:"#A0A0A0",spacing: "5px"}).on("rateyo.change", function (e, data) {
            rating3 = data.rating;
            
            $(this).parent().find('.result2').text(rating3);
            setRatings();
          
        });
        function setRatings(){
          average = rating1+rating2+rating3;
          average = (average/3);
          const starPercentage = (average / 5) * 100;
          const starPercentageRounded = `${(Math.round(starPercentage / 10) * 10)}%`; 
          document.getElementById('average').innerHTML =(average).toFixed(1);
          document.querySelector(".stars-inner").style.width = starPercentageRounded;
        }

    });
 
</script>
</body>
 
</html>
