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
  <link rel="stylesheet" type="text/css" href="../views/css/rating.css">
  <title>Service Request </title>
  <style type="text/css">
  	.dataTables_length {
    margin-top: 10px;
    margin-left: 20px;

}

     
  </style>
</head>
	<body>
			<div class="container-fluid main_container" style="border:0px !important;overflow-x: hidden !important">
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
									<a class="active">Service Request</a>
									<a href="admin_user_management.php"  >User Managementt</a>
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
										<select class="custom-select" id="serviceid">
											<option value="">Service Id</option>
										</select>
									</div>
									<div class="col form-search pt-2">
										<select class="custom-select" id="zipcode">
											<option value="">Zipcode</option>
										</select>
										
									</div>
									<div class="col  form-search pt-2">
										 <input type="email"class="form-control" id="email" placeholder="Email">
									</div>
									<div class="col   form-search pt-2">
										<select class="custom-select" id="customer">
											<option value="">Customer</option>
										</select>
									</div>
									<div class="col   form-search pt-2">
										<select class="custom-select" id="serviceprovider">
											<option value="">Service Provider</option>
										</select>
									</div>
									<div class="col   form-search pt-2">
										<select class="custom-select" id="status">
											<option value="">Status</option>
											<option value="New">New</option>
											<option value="pending">pending</option>
											<option value="Cancelled">Cancelled</option>
											<option value="completed">completed</option>
										</select>
									</div>
									<div class="col   form-search pt-2">
										<select class="custom-select" id="paymentstatus">
											<option value="">Payment Status</option>
											<option value="1">Completed</option>
											<option value="0">NotCompleted</option>
										</select>
									</div>
									<div class="col form-search pt-2">
                            <input type="text" class="form-control  datepicker-7"  id = "datepicker_5" name="date"placeholder="From Date">
                            </div>
                            <div class="col form-search pt-2">
                            <input type="text" class="form-control  datepicker-7"  id = "datepicker_6" name="date"placeholder="To Date">
                            </div>
									<div class="col form-search pt-2">
										<button class="btn search mr-1"onclick="search2()" type="button">Search</button>
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
								<table class="table table-hover table-bordered table-wrapper-scroll-y my-custom-scrollbar" id="myTable"  style="max-width:130% !important;">
									<thead>
										<tr>
											<th class="header pr-0"scope="col" style="min-width:100px;font-size:0.8rem">Service ID </th>
											<th class="header pl-0 pr-0"scope="col" style="font-size:0.8rem">Service Date </th>
											<th class="header pl-0 pr-0"scope="col"  style="min-width:150px;font-size:0.8rem">Customer Details </th>
											<th class="header pl-0 pr-0"scope="col" style="min-width:140px;font-size:0.8rem">Service Provider </th>
											<th class="header pl-0 pr-0"scope="col"style="min-width:90px;font-size:0.8rem">Gross Amount </th>
											<th class="header pl-0 "scope="col"style="min-width:90px;font-size:0.8rem">Net Amount </th>
											<th class="header pl-0"scope="col"style="font-size:0.8rem">Discount </th>
											<th class="header pl-0"scope="col"style="font-size:0.8rem">Status </th>
											<th class="header pl-0"scope="col"style="font-size:0.8rem">Payment Status </th>
											<th class="header pl-0"scope="col"style="font-size:0.8rem">Action </th>
										</tr>
									</thead>
									<tbody id="servicesData">
									</tbody>
									</table>

									<div class="copyright">
										©2018 Helperland. All rights reserved.
									</div>
								</div>
							</div>
						</div>
						
						
					</section>


<!-- MODEL -->
<div class="modal fade  " id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true" >
	<div class="modal-dialog my-custom-scrollbar my-custom-scrollbar-primary">
		<div class="modal-content">
			
			<!-- Modal body -->
			<div class="modal-body mb-0 pb-0 mt-0">

				<div class="container scrollbox">
					
					<div class="row">
						<div class="col-auto"><h1>Edit Service Request</h1></div>
						<div class="col"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
					</div>

					<form >
						<div class="form-row" style="border-style: none;">
							<div class="col-md-6 mb-3">
								<label for="datepicker-5">Date</label>
								<input type="text" class="form-control  datepicker-7" placeholder="Date" id="datepicker-5" placeholder="First name" required>
								
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom02">Time</label>
								<input placeholder="Selected time" type="time" id="validationCustom02" placeholder="Select Time" class="form-control" required>
								
							</div>
							<div class="col-12"><h6>Service Address</h6></div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom04">Streat Name</label>
								<input type="text" class="form-control" id="validationCustom04" placeholder="Streat Name" required>
								
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom05">House Number</label>
								<input type="text" class="form-control" id="validationCustom05" placeholder="1111" required>
								
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom06">Postal Code</label>
								<input type="text" class="form-control" id="validationCustom06" placeholder="Postal Code" maxlength="6" required onchange="postalchanged()">
								
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom07">City</label>
								<div class="col  form-search" id="validationCustom07" required>
									<select class="custom-select" >
										<option selcted id="location"></option>
									</select>
								</div>
								
							</div>
							<div class="col-12"><h6>Invoice Address</h6></div>
							<div class="col-md-6 mb-3">
								<label for="street2">Streat Name</label>
								<input type="text" class="form-control" id="street2" placeholder="Streat Name" required>
								
							</div>
							<div class="col-md-6 mb-3">
								<label for="housenumber2">House Number</label>
								<input type="text" class="form-control" id="housenumber2" placeholder="1111" required>
								
							</div>
							<div class="col-md-6 mb-3">
								<label for="postalcode2">Postal Code</label>
								<input type="text" class="form-control" id="postalcode2" placeholder="Postal Code" maxlength="6" onchange="postalchanged()" required>
								
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom07">City</label>
								<div class="col  form-search" id="validationCustom07" required>
									<select class="custom-select" >
										<option selcted id="location2"></option>
									</select>
								</div>
								
							</div>
							<div class="col-12">
								<label for="validationCustom08"><strong>Why do you want to reschedule service request</strong></label>
								<textarea name="" class="form-control" id="validationCustom08" placeholder="Why do you want to reschedule service request" required></textarea>
								
							</div>
							<div class="col-12">
								<label for="validationCustom09"><strong>Call Center EMP Notes</strong></label>
								<textarea name="" class="form-control" id="validationCustom09" placeholder="Enter Notes" required></textarea>
								
							</div>
							<div class="col-12">
								<button type="button" id="editbtn" onclick="editService()">Update</button>
							</div>
							
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- MODEL End-->
					
					<!-- Main Section End -->
					
     
					<!-- JS LINKS -->
					<script src="JavaScripts/export_data.js"></script>
					<script src="JavaScripts/admin_service_request.js"></script>

					<?php 
					
					include_once 'jsLinks.php';
					include_once 'Admin_script.php';
						  include_once 'Admin_Service_Request_script.php';
						   ?>
						  

					
				</div>
			</body>
			
		</html>
