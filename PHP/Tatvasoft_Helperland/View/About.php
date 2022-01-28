<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php include 'headerLinks.php'; ?>
    <!-- External css -->
    <link rel="stylesheet" href="css/About.css">
    
    <title>About</title>
    
  </head>
  <body>
    <div class="container-fluid p-0  main_container">
      <!-- Header start -->
      <?php
      require_once 'header.php';
      ?>
      <!-- Header End -->
      <!-- Main Content start-->
      <section >
      <div class="row">
        <div class="col ">
          <img class="banner"src="images/About/about-bg.png" alt="Workers">
        </div>
      </div>
      <div class="container mx-auto p-0" >
        <h1>A Few words about us</h1>
        <div class="row m-0 justify-content-center">
          <div class="col p-0 mr-1" style="max-width:4rem"><hr style="width:3.87rem ; border:1px solid #CCCCCC"></div>
          <div class="col p-0" style="max-width:1.5rem">
            <img  src="images/About/faq_star.png">
          </div>
          <div class="col p-0 ml-1" style="max-width:4rem"><hr style="width:3.87rem ; border:1px solid #CCCCCC"></div>
        </div>
      </div>

      <div class="row justify-content-center about_para_row" >
        <div class="col text-center about_para_col p-0">
          
          <p class="about_first_container_para ">
            We are providers of professional home cleaning services, offering hourly based house cleaning options, which mean that you don’t have to fret about getting your house cleaned anymore. We will handle everything for you, so that you can focus on spending your precious time with your family members.
          </p>
          <p class="about_first_container_para">

            We have a number of experienced cleaners to help you make cleaning out or shifting your home an easy affair.
          </p>
        </div>
      </div>


      <div class="container mx-auto p-0" >
        <h1>Our Story</h1>
        <div class="row m-0 justify-content-center">
          <div class="col p-0 mr-1" style="max-width:4rem"><hr style="width:3.87rem ; border:1px solid #CCCCCC"></div>
          <div class="col p-0" style="max-width:1.5rem">
            <img  src="images/About/faq_star.png">
          </div>
          <div class="col p-0 ml-1" style="max-width:4rem"><hr style="width:3.87rem ; border:1px solid #CCCCCC"></div>
        </div>
      </div>

      <div class="row justify-content-center about_para_row">
        <div class="col text-center about_para_col_2 p-0">
          
          <p class="about_first_container_para ">
            A cleaner is a type of industrial or domestic worker who cleans homes or commercial premises for payment. Cleaners may specialise in cleaning particular things or places, such as window cleaners. Cleaners often work when the people who otherwise occupy the space are not around. They may clean offices at night or houses during the workday. 
          </p>
          
        </div>
      </div>
    </section>
    <!--  Main Content End -->
    <!-- Footer start -->
    <?php
    require_once 'footer.php';
    ?>
    <!-- Footer End -->
    <!-- JS links -->
    <?php
    require_once 'jsLinks.php';
    ?>
  </body>
</html>