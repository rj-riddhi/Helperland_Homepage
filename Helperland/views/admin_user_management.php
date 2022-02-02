<!doctype html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- BOOTSTRAP-4 LINKS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<!-- Fontawsome -->
		<link
			rel="stylesheet"
			href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
			integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
			crossorigin="anonymous"
			/>
			<!-- External CSS file -->
			<link rel="stylesheet" href="css/admin_user_management.css">
			<title>User Management </title>
			
		</head>
		<body>
			<div class="container-fluid main_container" >
				<!-- header -->
				<header>
					
					<nav class="navbar nav_row navbar-expand-lg navbar-light">
						<a class="navbar-brand text-white" href="#">helperland</a>
						
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						</button>
						
						<div class="col-md-auto text-center pt-4 pt-md-0 collapse navbar-collapse p-0 "  id="navbarSupportedContent">
							<ul class="navabr-right ml-auto ">
								<li>
									<a><img class="img1" src="images/Admin_User_Management/admin-user.png"><span>Sohil Admin</span></a>
								</li>
								<li>
									<a  href="#"><img class="img2" src="images/Admin_User_Management/logout.png"></a>
								</li>
							</ul>
						</div>
					</nav>
					
					
				</header>
				<!-- Header End -->
				<!-- Main Section -->
				<section>
					<div class="container-fluid">
						<div class="row main_row" style="border:1px solid blue;">
							<!-- SIDEBAR -->
							<div class="col sidebar_col">
								<div class="sidebar">
									<a href="">Service Request</a>
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
								<div class="row form-row">
									<div class="col  form-search form-search"><select class="custom-select">
										<option selected >User name</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select></div>
									<div class="col  form-search"><select class="custom-select">
										<option selected >User Role</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select></div>
									<div class="col pt-2"><div class="input-group mb-2">
										<div class="input-group-prepend">
											<div class="input-group-text">+49</div>
										</div>
										<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Phone number">
									</div></div>
									<div class="col pt-2">
										<input type="text" class="form-control" id="validationTooltip05" placeholder="Zipcode" required>
										<div class="invalid-tooltip">
											Please provide a valid zip.
										</div>
									</div>
									<div class="col pt-2">
										<button class="btn search" type="submit">Search</button>
										<button class="btn cancel" type="submit">Cancel</button>
									</div>
								</div>
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
											<th class="header"scope="col">User Type</th>
											<th class="header"scope="col">Role</th>
											<th class="header"scope="col">Postal Code <img class="sort" src="images/Admin_User_Management/sort.png"></th>
											<th class="header"scope="col">City</th>
											<th class="header"scope="col">Radius <img class="sort" src="images/Admin_User_Management/sort.png"></th>
											<th class="header"scope="col">User Status <img class="sort" src="images/Admin_User_Management/sort.png"></th>
											<th class="header"scope="col">Action <img class="sort" src="images/Admin_User_Management/sort.png"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Lyum watson</td>
											<td> Call center</td>
											<td>Inquiry Manager</td>
											<td>123456</td>
											<td>Berlin</td>
											<td></td>
											<td style="text-align:center;"><span class="badge_complete">Active</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu">
													<ul>
														<li><a href="">Edit</a> </li>
														<li><a href="">Deactivate</a></li>
														<li><a href="">Service History</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>John smith</td>
											<td>Service Provier</td>
											<td> </td>
											<td>123456</td>
											<td>Berlin</td>
											<td>10 km</td>
											<td style="text-align:center;"><span class="badge_cancel">Cencel</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu">
													<ul>
														<li><a href="">Edit</a> </li>
														<li><a href="">Deactivate</a></li>
														<li><a href="">Service History</a></li>
													</ul>
												</div>
											</td>
											
										</tr>
										<tr>
											<td>John smith</td>
											<td> Call Center</td>
											<td>Inquiry Manager</td>
											<td>123456</td>
											<td>Berlin</td>
											<td></td>
											<td style="text-align:center;"><span class="badge_pending">Pending</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu">
													<ul>
														<li><a href="">Edit</a> </li>
														<li><a href="">Deactivate</a></li>
														<li><a href="">Service History</a></li>
													</ul>
												</div>
											</td>
											
										</tr>
										<tr>
											<td>Lyum watson</td>
											<td> Customer</td>
											<td>Content Manager</td>
											<td>123456</td>
											<td>Berlin</td>
											<td></td>
											<td style="text-align:center;"><span class="badge_new">New</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu">
													<ul>
														<li><a href="">Edit</a> </li>
														<li><a href="">Deactivate</a></li>
														<li><a href="">Service History</a></li>
													</ul>
												</div>
											</td>
											
										</tr>
										<tr>
											<td>Lyum watson</td>
											<td> Call center</td>
											<td>Inquiry Manager</td>
											<td>123456</td>
											<td>Berlin</td>
											<td></td>
											<td style="text-align:center;"><span class="badge_complete">Active</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu">
													<ul>
														<li><a href="">Edit</a> </li>
														<li><a href="">Deactivate</a></li>
														<li><a href="">Service History</a></li>
													</ul>
												</div>
											</td>
										</tr>
										<tr>
											<td>John smith</td>
											<td>Service Provier</td>
											<td> </td>
											<td>123456</td>
											<td>Berlin</td>
											<td>10 km</td>
											<td style="text-align:center;"><span class="badge_cancel">Cencel</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu">
													<ul>
														<li><a href="">Edit</a> </li>
														<li><a href="">Deactivate</a></li>
														<li><a href="">Service History</a></li>
													</ul>
												</div>
											</td>
											
										</tr>
										<tr>
											<td>John smith</td>
											<td> Call Center</td>
											<td>Inquiry Manager</td>
											<td>123456</td>
											<td>Berlin</td>
											<td></td>
											<td style="text-align:center;"><span class="badge_pending">Pending</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu">
													<ul>
														<li><a href="">Edit</a> </li>
														<li><a href="">Deactivate</a></li>
														<li><a href="">Service History</a></li>
													</ul>
												</div>
											</td>
											
										</tr>
										<tr>
											<td>Lyum watson</td>
											<td> Customer</td>
											<td>Content Manager</td>
											<td>123456</td>
											<td>Berlin</td>
											<td></td>
											<td style="text-align:center;"><span class="badge_new">New</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu">
													<ul>
														<li><a href="">Edit</a> </li>
														<li><a href="">Deactivate</a></li>
														<li><a href="">Service History</a></li>
													</ul>
												</div>
											</td></tr>
											<tr>
												<td>John smith</td>
												<td>Service Provier</td>
												<td> </td>
												<td>123456</td>
												<td>Berlin</td>
												<td>10 km</td>
												<td style="text-align:center;"><span class="badge_cancel">Cencel</span></td>
												<td style="text-align:center;" class="admin-table-action">
													<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
													<div class="admin-table-action-menu">
														<ul>
															<li><a href="">Edit</a> </li>
															<li><a href="">Deactivate</a></li>
															<li><a href="">Service History</a></li>
														</ul>
													</div>
												</td>
												
											</tr>
											<tr>
												<td>John smith</td>
												<td> Call Center</td>
												<td>Inquiry Manager</td>
												<td>123456</td>
												<td>Berlin</td>
												<td></td>
												<td style="text-align:center;"><span class="badge_pending">Pending</span></td>
												<td style="text-align:center;" class="admin-table-action">
													<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
													<div class="admin-table-action-menu">
														<ul>
															<li><a href="">Edit</a> </li>
															<li><a href="">Deactivate</a></li>
															<li><a href="">Service History</a></li>
														</ul>
													</div>
												</td>
												
											</tr>
											<tr>
												<td>Lyum watson</td>
												<td> Customer</td>
												<td>Content Manager</td>
												<td>123456</td>
												<td>Berlin</td>
												<td></td>
												<td style="text-align:center;"><span class="badge_new">New</span></td>
												<td style="text-align:center;" class="admin-table-action">
													<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
													<div class="admin-table-action-menu">
														<ul>
															<li><a href="">Edit</a> </li>
															<li><a href="">Deactivate</a></li>
															<li><a href="">Service History</a></li>
														</ul>
													</div>
												</td>
												
											</tr>
											<tr>
												<td>John smith</td>
												<td>Service Provier</td>
												<td> </td>
												<td>123456</td>
												<td>Berlin</td>
												<td>10 km</td>
												<td style="text-align:center;"><span class="badge_cancel">Cencel</span></td>
												<td style="text-align:center;" class="admin-table-action">
													<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
													<div class="admin-table-action-menu">
														<ul>
															<li><a href="">Edit</a> </li>
															<li><a href="">Deactivate</a></li>
															<li><a href="">Service History</a></li>
														</ul>
													</div>
												</td>
												
											</tr>
											<tr>
												<td>John smith</td>
												<td> Call Center</td>
												<td>Inquiry Manager</td>
												<td>123456</td>
												<td>Berlin</td>
												<td></td>
												<td style="text-align:center;"><span class="badge_pending">Pending</span></td>
												<td style="text-align:center;" class="admin-table-action">
													<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
													<div class="admin-table-action-menu">
														<ul>
															<li><a href="">Edit</a> </li>
															<li><a href="">Deactivate</a></li>
															<li><a href="">Service History</a></li>
														</ul>
													</div>
												</td>
												
											</tr>
											<tr>
												<td>Lyum watson</td>
												<td> Customer</td>
												<td>Content Manager</td>
												<td>123456</td>
												<td>Berlin</td>
												<td></td>
												<td style="text-align:center;"><span class="badge_new">New</span></td>
												<td style="text-align:center;" class="admin-table-action">
													<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
													<div class="admin-table-action-menu">
														<ul>
															<li><a href="">Edit</a> </li>
															<li><a href="">Deactivate</a></li>
															<li><a href="">Service History</a></li>
														</ul>
													</div>
												</td>
												
											</tr>
											<tr>
												<td>Lyum watson</td>
												<td> Call center</td>
												<td>Inquiry Manager</td>
												<td>123456</td>
												<td>Berlin</td>
												<td></td>
												<td style="text-align:center;"><span class="badge_complete">Active</span></td>
												<td style="text-align:center;" class="admin-table-action">
													<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
													<div class="admin-table-action-menu">
														<ul>
															<li><a href="">Edit</a> </li>
															<li><a href="">Deactivate</a></li>
															<li><a href="">Service History</a></li>
														</ul>
													</div>
												</td>
												
											</tr>
											<tr>
												<td>John smith</td>
												<td>Service Provier</td>
												<td> </td>
												<td>123456</td>
												<td>Berlin</td>
												<td>10 km</td>
												<td style="text-align:center;"><span class="badge_cancel">Cencel</span></td>
												<td style="text-align:center;" class="admin-table-action">
													<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
													<div class="admin-table-action-menu">
														<ul>
															<li><a href="">Edit</a> </li>
															<li><a href="">Deactivate</a></li>
															<li><a href="">Service History</a></li>
														</ul>
													</div>
												</td>
												
											</tr>
											<tr>
												<td>John smith</td>
												<td> Call Center</td>
												<td>Inquiry Manager</td>
												<td>123456</td>
												<td>Berlin</td>
												<td></td>
												<td style="text-align:center;"><span class="badge_pending">Pending</span></td>
												<td style="text-align:center;" class="admin-table-action">
													<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
													<div class="admin-table-action-menu">
														<ul>
															<li><a href="">Edit</a> </li>
															<li><a href="">Deactivate</a></li>
															<li><a href="">Service History</a></li>
														</ul>
													</div>
												</td>
												
											</tr>
											<tr>
												<td>John smith</td>
												<td>Service Provier</td>
												<td> </td>
												<td>123456</td>
												<td>Berlin</td>
												<td>10 km</td>
												<td style="text-align:center;"><span class="badge_cancel">Cencel</span></td>
												<td style="text-align:center;" class="admin-table-action">
													<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
													<div class="admin-table-action-menu">
														<ul>
															<li><a href="">Edit</a> </li>
															<li><a href="">Deactivate</a></li>
															<li><a href="">Service History</a></li>
														</ul>
													</div>
												</td>
												
											</tr>
											<tr>
												<td>John smith</td>
												<td> Call Center</td>
												<td>Inquiry Manager</td>
												<td>123456</td>
												<td>Berlin</td>
												<td></td>
												<td style="text-align:center;"><span class="badge_pending">Pending</span></td>
												<td style="text-align:center;" class="admin-table-action">
													<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
													<div class="admin-table-action-menu">
														<ul>
															<li><a href="">Edit</a> </li>
															<li><a href="">Deactivate</a></li>
															<li><a href="">Service History</a></li>
														</ul>
													</div>
												</td>
												
											</tr>
											<tr>
												<td>Lyum watson</td>
												<td> Customer</td>
												<td>Content Manager</td>
												<td>123456</td>
												<td>Berlin</td>
												<td></td>
												<td style="text-align:center;"><span class="badge_new">New</span></td>
												<td style="text-align:center;" class="admin-table-action">
													<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
													<div class="admin-table-action-menu">
														<ul>
															<li><a href="">Edit</a> </li>
															<li><a href="">Deactivate</a></li>
															<li><a href="">Service History</a></li>
														</ul>
													</div>
												</td>
											</tr>
										</tr>
										<tr>
											<td>John smith</td>
											<td>Service Provier</td>
											<td> </td>
											<td>123456</td>
											<td>Berlin</td>
											<td>10 km</td>
											<td style="text-align:center;"><span class="badge_cancel">Cencel</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu">
													<ul>
														<li><a href="">Edit</a> </li>
														<li><a href="">Deactivate</a></li>
														<li><a href="">Service History</a></li>
													</ul>
												</div>
											</td>
											
										</tr>
										<tr>
											<td>John smith</td>
											<td> Call Center</td>
											<td>Inquiry Manager</td>
											<td>123456</td>
											<td>Berlin</td>
											<td></td>
											<td style="text-align:center;"><span class="badge_pending">Pending</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu">
													<ul>
														<li><a href="">Edit</a> </li>
														<li><a href="">Deactivate</a></li>
														<li><a href="">Service History</a></li>
													</ul>
												</div>
											</td>
											
										</tr>
										<tr>
											<td>Lyum watson</td>
											<td> Customer</td>
											<td>Content Manager</td>
											<td>123456</td>
											<td>Berlin</td>
											<td></td>
											<td style="text-align:center;"><span class="badge_new">New</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu">
													<ul>
														<li><a href="">Edit</a> </li>
														<li><a href="">Deactivate</a></li>
														<li><a href="">Service History</a></li>
													</ul>
												</div>
											</td>
											<tr>
												<td>Lyum watson</td>
												<td> Customer</td>
												<td>Content Manager</td>
												<td>123456</td>
												<td>Berlin</td>
												<td></td>
												<td style="text-align:center;"><span class="badge_new">New</span></td>
												<td style="text-align:center;" class="admin-table-action">
													<a id="poplink" class="admin-table-actionbtn" href="javascript:void(0);"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
													<div class="admin-table-action-menu">
														<ul>
															<li><a href="">Edit</a> </li>
															<li><a href="">Deactivate</a></li>
															<li><a href="">Service History</a></li>
														</ul>
													</div>
												</td>
												
											</tr>
										</tbody>
									</table>
									<div class="row form-row justify-content-between ">
										<section class="col-md-10">
											<span style="color:#646464">Show</span>
											<select name="" id="select">
												<option value="2" >2</option>
												<option value="4">4</option>
												<option value="6">6</option>
												<option value="8">8</option>
												<option value="10" selected>10</option>
												<option value="12">12</option>
												<option value="12">14</option>
												<option value="12">16</option>
											</select>
											<span style="color:#646464">Entries</span>
											<ul class="pagination  col-md-2 ml-auto  text-right">
												<li class="prev"><a href="#" id="prev"><img src='images/Admin_User_Management/first-page.png' alt='first'/></a></li>
												<li class="next"><a href="#" id="next"><img src='images/Admin_User_Management/first-page.png' alt='first' style='transform: rotate(180deg)' /></a></li>
											</ul>
										</section>
									</div>
									
									<div class="copyright">
										©2018 Helperland. All rights reserved.
									</div>
								</div>
							</div>
						</div>
						
						
					</section>
					
					<!-- Main Section End -->
					
					<!-- JS LINKS -->
					<?php include_once 'jsLinks.php'; ?>
					
				</div>
			</body>
			
		</html>