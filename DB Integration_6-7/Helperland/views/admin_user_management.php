<?php 
    session_start(); 
    
?>
<!doctype html>
<html lang="en">
<head>
  <?php include_once 'headerLinks.php';
   ?>
  
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="css/admin.css">
  <title>User Management </title>
  <style type="text/css">
  	.dataTables_length {
    margin-top: 10px;
    margin-left: 20px;
}
  </style>
</head>

		<body>
			<div class="container-fluid main_container" style="border:0px !important">
				<!-- header -->
				<header>
					<?php if(isset($_SESSION['userid'])){ 
        include_once 'login_nav.php';}else{?>
        <meta http-equiv = "refresh" content = "0.5; url =../controllers/Users.php?q=logout_login" />
       <?php } ?>
				</header>
				<!-- Header End -->
				<!-- Main Section -->
				<section>
					<div class="container-fluid">
						<div class="row main_row">
							<!-- SIDEBAR -->
							<div class="col sidebar_col d-none d-lg-block">
								<div class="sidebar">
									<a href="admin_service_request.php">Service Request</a>
									<a href="" class="active">User Managementt</a>
								</div>
							</div>
							<div class="col table_col table-responsive p-0">
								<!-- ADD USER ROW -->
								<div class="row">
									<div class="col service_history">User Management</div>
									<div class="col text-right"><button class="btn add_user"><img src="images/Admin_User_Management/add.png" alt=""> Add new User</button></div>
								</div>
								<!-- FORM ROW -->
								<form>
					<div class="alert alert-danger" id="error-message"style="display: none"></div>
       				<div class="alert alert-success"id="success-message"style="display:none"></div>
       				
								<div class="row form-row">
									<div class="col   form-search pt-2">
										<select class="custom-select" id="name">
											<option value="">Name</option>
										</select>
									</div>
									<div class="col  form-search pt-2">
										<select class="custom-select" id="role">
											<option value="">Role</option>
										</select>
									</div>
									<div class="col form-search pt-3">
										<div class="input-group mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text ">+49</div>
										</div>
										<input type="text" class="form-control " id="inlineFormInputGroup" placeholder="Phone number">
									</div></div>
									<div class="col form-search pt-2">
										<select class="custom-select" id="zipcode">
											<option value="">Zipcode</option>
										</select>
										<select class="custom-select d-none" id="zipcode2">
											<option value="">Zipcode</option>
										</select>
										
									</div>
									<div class="col  form-search pt-2">
										 <input type="email"class="form-control" id="email" placeholder="Email">
									</div>
									<div class="col form-search pt-2">
                            <input type="text" class="form-control  datepicker-7"  id = "datepicker_5" name="date"placeholder="From Date">
                            </div>
                            <div class="col form-search pt-2">
                            <input type="text" class="form-control  datepicker-7"  id = "datepicker_6" name="date"placeholder="To Date">
                            </div>
									<div class="col form-search pt-2">
										<button class="btn search mr-1"onclick="search()" type="button">Search</button>
										<button class="btn cancel " type="reset" onclick="cancelsearch()">Cancel</button>
									</div>
								</div>
							</form>
								<!-- EXPORT ROW -->
								<div class="row export-row">
									<div class="col text-right">
										<button class="btn search"onclick="exportToExcel('tblexportData', 'Service-history')">Export
										</button>
									</div>
								</div>
								<!-- TABLE -->
								<table class="table table-hover  table-bordered" id="myTable" style="width:100% !important;">
									<thead>
										<tr>
											<th class="header"scope="col">User Name <img class="sort" src="images/Admin_User_Management/sort.png"></th>
											<th class="header"scope="col">Role</th>
											<th class="header"scope="col">Date Of Registration</th>
											<th class="header"scope="col">User Type</th>
											<th class="header"scope="col">Phone</th>
											<th class="header"scope="col">Postal Code <img class="sort" src="images/Admin_User_Management/sort.png"></th>
											<th class="header"scope="col">User Status <img class="sort" src="images/Admin_User_Management/sort.png"></th>
											<th class="header"scope="col">Action <img class="sort" src="images/Admin_User_Management/sort.png"></th>
										</tr>
									</thead>
									<tbody id="usersData">
									</tbody>
								</table>
									
									
									<div class="copyright">
										©2018 Helperland. All rights reserved.
									</div>
								</div>
							</div>
						</div>
						
						
					</section>
					
					<!-- Main Section End -->
					
					
					<!-- JS LINKS -->

					

					<script src="JavaScripts/export_data.js"></script>
					<script src="JavaScripts/admin_service_request.js"></script>

					<?php 
					include_once 'jsLinks.php';
						  include_once 'Admin_script.php' ?>
						  

					
				</div>
			</body>
			
		</html>