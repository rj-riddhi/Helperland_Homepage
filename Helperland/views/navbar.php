<?php include_once '../helpers/msgs.php'; ?>

<?php 
                 if(!isset($_SESSION['FirstName'])) {
?>

<header >
      
      <div class="row  m-0 nav_row  navbar-expand-md navbar-light" id="navbar">
        <div class="col logo" style=" margin-top:4px;">
          <img src="images/Prices/logo-small.png">
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="col-md-auto text-center collapse navbar-collapse p-0 "  id="navbarSupportedContent">
          <ul class="navabr-right ml-auto">
		   		<li><a href="" class="btn nav_btn active">Book a Cleaner</a></li>
				<li><a href="../controllers/Users.php?q=prices" class="btn">Prices</a></li>
				<li><a href="#" class="btn">Our Guarantee</a></li>
				<li><a href="#" class="btn">Blog</a></li>
				<li><a href="../controllers/Users.php?q=contact" class="btn">Contact us</a></li>
				<li><a class="nav-link " href="#login" id="box-2" title="Login" data-toggle="modal" data-target="#LoginModal">Login </a></li>
				<li><a href="../controllers/Users.php?q=serviceprovider" class="btn nav_btn">Become a Helper</a></li>
				
			</ul>
        </div>
      </div>
    </header>
<?php
    flash('login')
?> 

<!-- MODEL -->
		<!-- <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginForm" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					
					
					<div class="modal-body mb-0 pb-0 mt-0">
						<div class="container ">
							
							<div class="row">
								<div class="col-auto"><h1 class="h1">Login to your Account</h1></div>
								<div class="col"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
							</div>
							<form method="post" action="../controllers/Users.php">
    						<input type="hidden" name="type" value="login">
								<div class="form-row" style="border-style: none;">
									<div class="form-group col-12">
										<input type="email" name="Email" class="form-control  user" placeholder="Email"required>
									</div>
									<div class="form-group col-12">
										<input type="password" name="password" class="form-control  lock" placeholder="Password"required>
									</div>
									<div class="form-group col">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value=""required>
											<label class="form-check-label ml-2">
												<p class="p">Remember me</p>
											</label>
											
										</div>
									</div>
									
									
									<div class="col-12 text-center">
										<button type="submit" name="submit" class="btn book_btn">Login</button>
									</div>
									<div class="col-12 mt-2">
										<p class="text-center"><span> <a class="forgot-password" href="#" data-toggle="modal" data-target="#ForgotModal" data-dismiss="modal">Forgot password?</a></span></p>
										<p class="text-center p"><span class="span"> Don't have an account?<a href="./customerRegister.php" title=""> Create one account</a></span></p>
									</div>
									
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- MODEL End-->

		<!-- Forgot pass model -->

		<!-- <div class="modal fade" id="ForgotModal" tabindex="-1" role="dialog" aria-labelledby="ForgotPassword" aria-hidden=" true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					
					
					<div class="modal-body mb-0 pb-0 mt-0">
						<div class="container ">
							
							<div class="row">
								<div class="col-auto"><h1 class="h1">Forgot Password</h1></div>
								<div class="col"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
							</div>
							<form method="post" action="../controllers/ResetPasswords.php">
    						<input type="hidden" name="type" value="send" >
								<div class="form-row" style="border-style: none;">
									<div class="form-group col-12">
										<input type="email" name="Email" class="form-control  user" placeholder="Email"required>
									</div>
									
									<div class="col-12 text-center">
										<button type="submit" name="submit" class="btn book_btn">Send</button>
									</div>
									<div class="col-12 mt-2">
										
										<p class="text-center p"><span class="span"><a class="login-now" href="#" data-toggle="modal" data-target="#LoginModal" data-dismiss="modal">Login now</a></span></p>
									</div>
									
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- Forgot pass model end -->




		<!-- MODEL -->
		<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginForm" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					
					
					<div class="modal-body mb-0 pb-0 mt-0">
						<div class="container ">
							
							<div class="row">
								<div class="col-auto"><h1 class="h1">Login to your Account</h1></div>
								<div class="col"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
							</div>
							<form method="post" action="../controllers/Users.php">
    						<input type="hidden" name="type" value="login">
								<div class="form-row" style="border-style: none;">
									<div class="form-group col-12">
										<input type="email" name="Email" class="form-control  user" placeholder="Email"required>
									</div>
									<div class="form-group col-12">
										<input type="password" name="password" class="form-control  lock" placeholder="Password"required>
									</div>
									<div class="form-group col">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value=""required>
											<label class="form-check-label ml-2">
												<p class="p">Remember me</p>
											</label>
											
										</div>
									</div>
									
									
									<div class="col-12 text-center">
										<button type="submit" name="submit" class="btn book_btn">Login</button>
									</div>
									<div class="col-12 mt-2">
										<p class="text-center"><span> <a class="forgot-password" href="#" data-toggle="modal" data-target="#ForgotModal" data-dismiss="modal">Forgot password?</a></span></p>
										<p class="text-center p"><span class="span"> Don't have an account?<a href="./customerRegister.php" title=""> Create one account</a></span></p>
									</div>
									
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- MODEL End-->

		<!-- Forgot pass model -->

		 <div class="modal fade" id="ForgotModal" tabindex="-1" role="dialog" aria-labelledby="ForgotPassword" aria-hidden=" true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					
					
					<div class="modal-body mb-0 pb-0 mt-0">
						<div class="container ">
							
							<div class="row">
								<div class="col-auto"><h1 class="h1">Forgot Password</h1></div>
								<div class="col"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
							</div>
							<form method="post" action="../controllers/ResetPasswords.php">
    						<input type="hidden" name="type" value="send" >
								<div class="form-row" style="border-style: none;">
									<div class="form-group col-12">
										<input type="email" name="Email" class="form-control  user" placeholder="Email"required>
									</div>
									
									<div class="col-12 text-center">
										<button type="submit" name="submit" class="btn book_btn">Send</button>
									</div>
									<div class="col-12 mt-2">
										
										<p class="text-center p"><span class="span"><a class="login-now" href="#" data-toggle="modal" data-target="#LoginModal" data-dismiss="modal">Login now</a></span></p>
									</div>
									
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Forgot pass model end -->

    <?php } else { include_once 'login_nav.php'; } ?>
