<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Home Page</title>
		<meta charset="utf-8">
		<?php include 'headerLinks.php'; ?>
		<!-- External css -->
		<link rel="stylesheet" href="View/css/homepage.css">
		<link rel="stylesheet" href="View/css/login.css">
		
	</head>
	<body>
		<div class="container  main-container">
			<!-- Header start -->
			<div class="container-fluid  banner">
				<nav class="row  m-0 nav_row  navbar-expand-lg navbar-light" id="navbar" >
					<div class="col "id="logo" style=" margin-top:4px;">
						<img class="logo"src="View/images/Homepage/logo.png">
					</div>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					
					<div class="col-md-auto  text-center pt-4 pt-lg-0 collapse navbar-collapse p-0 "  id="navbarSupportedContent">
						<ul class="navabr-right ml-auto">
							<li><a href="" class="nav_btn">Book a Cleaner</a></li>
							<li><a href="Prices.php">Prices</a></li>
							<li><a href="#">Our Guarantee</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="View/Contact.php">Contact us</a></li>
							<li><a href="" data-toggle="modal" data-target="#myModal" class="nav_btn" >Login</a></li>
							<li><a href="" class="nav_btn">Become a Helper</a></li>
							<img class="flag"src="View/images/Homepage/flag.png">
							<img class="flag_arrow"src="View/images/Homepage/flag_arrow.png">
						</ul>
					</div>
				</nav>
				<div class="container-fluid container1">
					<div class="row m-0">
						<div class="col p-0">
							<h1>Do not feel like housework?</h1>
							<p>Great! Book now for Helperland and enjoy the benefits</p>
							<p >
								<span><img src="View/images/Homepage/right.png"></span> certified & insured helper<br>
								<span><img src="View/images/Homepage/right.png"></span> easy booking procedure<br>
								<span><img src="View/images/Homepage/right.png"></span> friendly customer service<br>
								<span><img src="View/images/Homepage/right.png"></span> secure online payment method<br>
							</p>
						</div>
					</div>
					<div class="row ">
						<div class="col text-center">
							<button class="btn book_btn">Let's Book a cleaner</button>
						</div>
					</div>
					<div class="container">
						<div class="row d-none d-lg-flex " style="margin-top: 157px">
							<div class="col-auto text-center">
								<img class="mb-3" src="View/images/Homepage/v-1.png">
								<p>Enter Your postcode</p>
							</div>
							<div class="col mt-2"><img src="View/images/Homepage/v-a-1.png"></div>
							<div class="col-auto text-center">
								<img class="mb-3" src="View/images/Homepage/v-2.png">
								<p>Select your plan</p>
							</div>
							<div class="col text-center mt-2"><img src="View/images/Homepage/v-a-2.png"></div>
							<div class="col-auto text-center">
								<img class="mb-3" src="View/images/Homepage/v-3.png">
								<p>Pay securely online</p>
							</div>
							<div class="col text-center mt-2"><img src="View/images/Homepage/v-a-1.png"></div>
							<div class="col-auto text-center">
								<img class="mb-3" src="View/images/Homepage/v-4.png">
								<p>Enjoy amazing service</p>
							</div>
							
						</div>
						<div class="row small_row d-lg-none d-flex">
							<div class="col-12 ">
								<img class="mb-3" src="View/images/Homepage/v-1.png">
								<p>Enter Your postcode</p>
							</div>
							<div class="col-12 "><img src="View/images/Homepage/v-a-1.png" style="transform: rotate(90deg)"></div>
							<div class="col-12   ">
								<img class="mb-3" src="View/images/Homepage/v-2.png">
								<p>Select your plan</p>
							</div>
							<div class="col-12 "><img src="View/images/Homepage/v-a-2.png" style="transform: rotate(90deg)"></div>
							<div class="col-12 ">
								<img class="mb-3" src="View/images/Homepage/v-3.png">
								<p>Pay securely online</p>
							</div>
							<div class="col-12 "><img src="View/images/Homepage/v-a-1.png" style="transform: rotate(90deg)"></div>
							<div class="col-12   ">
								<img class="mb-3" src="View/images/Homepage/v-4.png">
								<p>Enjoy amazing service</p>
							</div>
						</div>
						<div class="row" style="margin-top:42px;margin-bottom: 33px;">
							<div class="col text-center">
								<a href="#next"><img src="View/images/Homepage/down_arrow.png"></a>
							</div>
						</div>
					</div>
					
				</div>
				
				
			</div>
			
			
			<!-- Header End-->
			<!-- Main Section start -->
			<section>
				<div class="container" id="next" style="margin-top: 79px;">
					<div class="row">
						<div class="col "><h2>Convince yourself!</h2></div>
					</div>
					
					<div class="row helper-row">
						<div class="col-lg-4 text-sm-center helper-col">
							<img class="img1" src="View/images/Homepage/helper-img-1.png">
							<h4>Friendly & Certified Helpers</h4>
							<p class="helper_para">We want you to be completely satisfied with our service and feel comfortable at home. In order to guarantee this, our helpers go through a test procedure. Only when the cleaners meet our high standards, they may call themselves Helper.
							</p>
						</div>
						<div class="col-lg-4 text-sm-center helper-col">
							<img class="img2" src="View/images/Homepage/helper-img-2.png">
							<h4>Transparent and secure payment</h4>
							<p class="helper_para2">We have transparent prices, you do not have to scratch money or money on the sideboard Leave it: Pay your helper easily and securely via the online payment method. You will also receive an invoice for each completed cleaning.</p>
						</div>
						<div class="col-lg-4 text-sm-center helper-col">
							<img class="img3" src="View/images/Homepage/helper-img-3.png">
							<h4>We're here for you</h4>
							<p class="helper_para2">You have a question or need assistance with the booking process? Our customer service is happy to help and advise you. How you can reach us you will find out when you look under "Contact". We look forward to hearing from you or reading.</p>
						</div>
					</div>
				</div>
				<div class="container-fluid" style="margin-top: 168.68px ; padding-top: 60px; max-width:1162px">
					<img class="position-absolute "style="left:0px ; top:105rem; width:147px; margin: 29px 53px 84px 0; "src="View/images/Homepage/blog-left-bg.png">
					<img class="position-absolute"style="right:0px ; top:105rem; width:147px;margin: 0 0 125px 23px;"src="View/images/Homepage/blog-right-bg.png">
					<div class="container">
						<div class="row">
							<div class="col order-md-1 order-sm-2">
								<h6>We do not know what makes you happy, <br> but ...</h6>
								<p style="color: #4F4F4F;">If it's not dusting off, our friendly helpers will free you from this burden - do not worry anymore about spending valuable time doing housework, but savor life, you're well worth your time with beautiful experiences.  </p>
								<p style="color: #4F4F4F;">Free yourself and enjoy the gained time: Go celebrate, relax, play with your children, meet friends or dare to jump on the bungee.Other leisure ideas and exclusive events can be found in our blog - guaranteed free from dust and cleaning tips!</p>
								<p style="color: #4F4F4F;"> Mauris consequat ornare enim, sed lobortis quam ultrices sed.</p>
							</div>
							<div class="col blog_img order-md-2 order-sm-1 text-md-right text-sm-center" style="padding-right: 31px">
								<img src="View/images/Homepage/group-36.png">
							</div>
						</div>
						<div class="row">
							<div class="col"><h2>Our Blog</h2></div>
						</div>
						<div class="row blog">
							<div class="col-lg-4">
								<img src="View/images/Homepage/blog_1.png">
								<p style="color:#3D4046 ; font-size: 20px;font-weight: bolder;">Lorem ipsum dolor sit amet</p>
								<p style="color:#A3A3A3">January 28, 2019</p>
								<p style="color:#565656">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar aliquet.</p>
								<p style="font-size: 18px ;color:#4F4F4F">Read the Post<span></span><span ><img src="View/images/Homepage/r_arrow.png" alt="arrow"></span></p>
							</div>
							<div class="col-lg-4">
								<img src="View/images/Homepage/blog_2.png">
								<p style="color:#3D4046 ; font-size: 20px;font-weight: bolder;">Lorem ipsum dolor sit amet</p>
								<p style="color:#A3A3A3">January 28, 2019</p>
								<p style="color:#565656">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar aliquet.</p>
								<p style="font-size: 18px ;color:#4F4F4F">Read the Post<span></span><span ><img src="View/images/Homepage/r_arrow.png" alt="arrow"></span></p>
							</div>
							<div class="col-lg-4">
								<img src="View/images/Homepage/blog_3.png">
								<p style="color:#3D4046 ; font-size: 20px;font-weight: bolder;">Lorem ipsum dolor sit amet</p>
								<p style="color:#A3A3A3">January 28, 2019</p>
								<p style="color:#565656">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar aliquet.</p>
								<p style="font-size: 18px ;color:#4F4F4F">Read the Post<span></span><span ><img src="View/images/Homepage/r_arrow.png" alt="arrow"></span></p>
							</div>
						</div>
						
					</div>
				</div>
				<div class="container-fluid" style="background-color: #F4F5F8;padding-top:57.01px;">
					<div class="row">
						<div class="col"><h2>What Our Customers Say</h2></div>
					</div>
					<div class="row m-0 customer_row justify-content-center">
						<div class="col-lg-3 p-0">
							<div class="row">
								<div class="col-12 text-right">
									<img src="View/images/Homepage/msg.png" alt="">
								</div>
							</div>
							<div class="row"  style="padding-left:25px">
								<div class="col-2 "><img src="View/images/Homepage/blog_4.png"></div>
								<div class="col text-left" style="margin-left:17.34px">
									<p style="font-size: 19.92px;color:#4F4F4F;font-weight: bolder; margin:0px">Lary Watson</p>
									<p style="font-size: 13.95px;color:#8E8E8E;margin:0px">Manchester</p>
								</div>
								<div class="col-12" style="margin-top: 15px;">
									<p style="color:#565656">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar aliquet consequat. Praesent nec malesuada nibh.<br><br>Nullam et metus congue, auctor augue sit amet, consectetur tortor.</p>
									<p style="font-size: 18px ;color:#4F4F4F">Read the Post<span></span><span ><img src="View/images/Homepage/r_arrow.png" alt="arrow"></span></p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 p-0">
							<div class="row">
								<div class="col-12 text-right">
									<img src="View/images/Homepage/msg.png" alt="">
								</div>
							</div>
							<div class="row"  style="padding-left:25px">
								<div class="col-2 "><img src="View/images/Homepage/blog_5.png"></div>
								<div class="col text-left" style="margin-left:17.34px">
									<p style="font-size: 19.92px;color:#4F4F4F;font-weight: bolder; margin:0px">John Smith</p>
									<p style="font-size: 13.95px;color:#8E8E8E;margin:0px">Manchester</p>
								</div>
								<div class="col-12" style="margin-top: 15px;">
									<p style="color:#565656">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar aliquet consequat. Praesent nec malesuada nibh.<br><br>Nullam et metus congue, auctor augue sit amet, consectetur tortor.</p>
									<p style="font-size: 18px ;color:#4F4F4F">Read the Post<span></span><span ><img src="View/images/Homepage/r_arrow.png" alt="arrow"></span></p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 p-0">
							<div class="row">
								<div class="col-12 text-right">
									<img src="View/images/Homepage/msg.png" alt="">
								</div>
							</div>
							<div class="row"  style="padding-left:25px">
								<div class="col-2 "><img src="View/images/Homepage/blog_6.png"></div>
								<div class="col text-left" style="margin-left:17.34px">
									<p style="font-size: 19.92px;color:#4F4F4F;font-weight: bolder; margin:0px">Lars Johnson</p>
									<p style="font-size: 13.95px;color:#8E8E8E;margin:0px">Manchester</p>
								</div>
								<div class="col-12" style="margin-top: 15px;">
									<p style="color:#565656">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum metus pulvinar aliquet consequat. Praesent nec malesuada nibh.<br><br>Nullam et metus congue, auctor augue sit amet, consectetur tortor.</p>
									<p style="font-size: 18px ;color:#4F4F4F">Read the Post<span></span><span ><img src="View/images/Homepage/r_arrow.png" alt="arrow"></span></p>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				<!-- MODEL -->
		<div class="modal fade " id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<!-- Modal body -->
					<div class="modal-body mb-0 pb-0 mt-0">
						<div class="container ">
							
							<div class="row">
								<div class="col-auto"><h1 class="h1">Login to your Account</h1></div>
								<div class="col"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
							</div>
							<form >
								<div class="form-row" style="border-style: none;">
									<div class="form-group col-12">
										<input type="email" class="form-control  user" placeholder="Email"required>
									</div>
									<div class="form-group col-12">
										<input type="password" class="form-control  lock" placeholder="Password"required>
									</div>
									<div class="form-group col">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value=""required>
											<label class="form-check-label ml-2">
												<p class="p">Remember me</p>
											</label>
											
										</div>
									</div>
									
									
									<div class="col-12 ">
										<button type="submit" class="btn">Login</button>
									</div>
									<div class="col-12 mt-2">
										<p class="text-center"><span> <a href="#" title="">Forgot password?</a></span></p>
										<p class="text-center p"><span class="span"> Don't have an account?<a href="register.php" title=""> Create one account</a></span></p>
									</div>
									
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- MODEL End-->
			</section>
			<!-- Main section End -->

			<!-- Footer -->
			<!-- <?php 
				// require_once'footer.php';
			?> -->
<!-- FOOTER START -->
  <footer >
    <div class="row text-center"  style="margin:54.01px auto 53px auto; ">
      <div class="col"><h3>GET OUR NEWSLETTER</h3></div>
      <div class="w-100"></div>
      <div class="col">
        
        <div class=" container newsletter">
          <input type="search" name="" value="" placeholder="YOUR EMAIL">
        <button type="submit">Submit</button></div>
        
      </div>
    </div>
    
    <div class="row footer justify-content-between" style="padding-left:115px ; padding-right: 115px;">
      
        <div class="col-12 col-md-1 text-center " style="padding-top: 20px;" >
              <img src="View/images/Homepage/footer-logo.png">
              </div>
        <div class="col-md-auto my-auto">

              <ul >
                <li><a href="homepage.php" >HOME</a></li>
                <li><a href="About.php" >ABOUT</a></li>
                <li><a href="homepage.php" >TESTIMONIALS</a></li>
                <li><a href="FAQ.php" >FAQS</a></li>
                <li><a href="homepage.php" >INSURANCE</a></li>
                <li><a href="homepage.php" >POLICY</a></li>
                <li><a href="homepage.php" >IMPRESSUM</a></li>
              </ul>
            </div>
      <div class="col-12 col-md-1 my-auto">
            <div  class="social-media justify-content-center">
                <a class="nav-link"><img src="View/images/Homepage/facbook.png"></a>
                <a class="nav-link"><img src="View/images/Homepage/instagram.png"></a>
            </div>
        </div>
      
      <hr class="mx-auto "style="border:1px solid #424242;width:1320px;">
      <div class="row mx-auto">
            <div class="col text-center">
              <p style="color:#9BA0A3">©2018 Helperland. All rights reserved.   Terms and Conditions | Privacy Policy</p>
            </div>
            

          </div>
            
      
    </div>
  </footer>
  <!-- FOOTER END -->
</div>
			
			<!-- scripts -->
			<?php 
			   require_once'jsLinks.php';
			?>
			
			
			
		</body>
	</html>