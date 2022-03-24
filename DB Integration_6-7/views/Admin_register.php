<?php
session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<?php include 'headerLinks.php';
			  include_once '../helpers/msgs.php'; ?>
		<!-- External css -->
		<link rel="stylesheet" href="css/register.css">
		<link rel="stylesheet" href="css/login.css">

		
		<title>Admin Registeration</title>
	</head>
	<body >
	 <?php
     flash('register')
      ?> 
		<div class="container-fluid p-0  main_container">
			
			<!-- Main Content start-->
			<section >
				
				<div class="container mx-auto form_container">
					<div class="container mx-auto p-0 m-5" >
						
						<h2>Create an Account</h2>
						<div class="row m-0 justify-content-center">
							<div class="col p-0 mr-1" style="max-width:4rem"><hr style="width:3.87rem ; border:1px solid #CCCCCC"></div>
							<div class="col p-0" style="max-width:1.5rem">
								<img  src="images/Contact/faq_star.png">
							</div>
							<div class="col p-0 ml-1" style="max-width:4rem"><hr style="width:3.87rem ; border:1px solid #CCCCCC"></div>
						</div>
					</div>
					<div class="alert alert-danger" id="error-message" style="display: none"></div>
       				 <div class="alert alert-success"id="success-message" style="display: none"></div>
					<form>
						<div class="form-row">
							<div class="form-group col-md-6">
								<input type="text" name="usersFirstName" class="form-control" id="inputFirstName" placeholder="First name" required>
								
							</div>
							<div class="form-group col-md-6">
								<input type="text" name="usersLastName" class="form-control" id="inputLastName" placeholder="Last name" required>
								
							</div>
							<div class="form-group col-md-6">
								<input type="email" name="usersEmail" class="form-control" id="email" placeholder="Email Address" required>
								
							</div>
							<div class="form-group col-md-6">
								<div class="input-group mb-2">
									<div class="input-group-prepend">
										<div class="input-group-text">+49</div>
									</div>
									<input type="tel" name="phone" class="form-control" id="phone1" placeholder="Mobile number" maxlength="10">
									
								</div>
							</div>
							
							<div class="form-group col-md-6">
								<input type="password" name="usersPwd" class="form-control"id="password1" placeholder="Password"  required >
								
								
							</div>
							<div class="form-group col-md-6">
								<input type="password" name="pwdRepeat" class="form-control" id="password2" placeholder="Confirm Password" required>
							</div>
							<div class="form-group col">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
									<label class="form-check-label ml-2" for="invalidCheck2">
										<p >I have read the <span><a href="">Privacy Policy</a></span></p>
									</label>
									
								</div>
							</div>
						</div>
						<div class="form-group  text-center">
							<div class="col-12">
								<button type="button" class="btn sub_btn  btn-rounded" onclick="adminregister()"id="submitbtn2">Register</button>
							</div>
							<div class="col-12 mt-2">
								<p >Already Registered? <span> <a href="../controllers/Users.php?q=login">Login Now</a></span></p>
							</div>
							
						</div>
					</form>
					
				</div>
			</section>
			
			<?php
			require_once 'become_a_pro_script.php';
			require_once 'jsLinks.php';
			?>
		</body>
	</html>