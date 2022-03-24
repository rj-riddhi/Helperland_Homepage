<script>
  function getRatings(){

    var ratings = new Array();
    fetch("http://localhost/Helperland/controllers/Service_Provider.php?q=getSpRatings")
    .then((response)=>response.text())
    .then((data)=>{
      console.log(data);
      document.getElementById("tabledata5").innerHTML += data;
      var tr = document.querySelectorAll(".tr");
        for(var i=0;i<tr.length;i++){
          var id = tr[i].id;
          var rating =  id.split(" ")[0];
          var name = id.split(" ")[1];
          ratings[name] = rating;

        }
        setRatings(ratings);
      
    })
    .catch((error)=>{
      console.log(error);
    })
  }
  getRatings();
  function showRating(id){
    console.log(id);
  }
//   const ratings = {
//   sandip : 0.5,
  
// };

function setRatings(ratings){
// total number of stars
const starTotal = 5;

for(const rating in ratings) {  
  const starPercentage = (ratings[rating] / starTotal) * 100;
  // console.log(ratings[rating]);
  const starPercentageRounded = `${(Math.round(starPercentage / 10) * 10)}%`;
  console.log(document.querySelector(`.${rating} .stars-inner`));
  document.querySelector(`.${rating} .stars-inner`).style.width = starPercentageRounded; 
  if(starPercentage < 20){
    document.getElementById(ratings[rating]).innerHTML = "Very Poor"; 
    }
  else if(starPercentage >=20 &&starPercentage < 40){
     document.getElementById(ratings[rating]).innerHTML = "Poor"; 
  }
  else if(starPercentage >=40 &&starPercentage < 60){
     document.getElementById(ratings[rating]).innerHTML = "Good"; 
  }
  else if(starPercentage >= 60 && starPercentage < 80){
     document.getElementById(ratings[rating]).innerHTML = "Very Good"; 
  }
  else if(starPercentage >= 80){
     document.getElementById(ratings[rating]).innerHTML = "Excellent"; 
  }
}
}
</script>