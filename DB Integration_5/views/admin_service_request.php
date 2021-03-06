<!doctype html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- BOOTSTRAP-4 LINKS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
		<!-- Fontawsome -->
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<!-- External CSS file -->
		<link rel="stylesheet" href="css/admin_service_request.css">
		<title>Service Request </title>
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
									<a><img class="img1" src="images/Admin_Service_Request/admin-user.png"><span>Sohil Admin</span></a>
								</li>
								<li>
									<a  href="#"><img class="img2" src="images/Admin_Service_Request/logout.png"></a>
								</li>
							</ul>
						</div>
					</nav>
					
					
				</header>
				<!-- Header End -->
				<!-- Main Section -->
				<section>
					<div class="container-fluid">
						<div class="row main_row">
							<!-- SIDEBAR -->
							<div class="col sidebar_col">
								<div class="sidebar">
									<a href="" class="active">Service Request</a>
									<a href="">User Managementt</a>
								</div>
							</div>
							<div class="col table_col ">
								<!-- ADD USER ROW -->
								<div class="row">
									<div class="col Admin_Service_Request">Service Request</div>
								</div>
								<!-- FORM ROW -->
								<div class="row form-row">
									<div class="col pt-2"><div class="input-group mb-2">
										
										<input type="text" class="form-control" placeholder="Service ID"required>
									</div></div>
									<div class="col  form-search">
									   <select class="custom-select">
										<option selected >Customer</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									   </select>
									</div>
									<div class="col  form-search"><select class="custom-select">
										<option selected >Service Provider</option>
										<option value="1">One</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select></div>

									<div class="col  form-search"><select class="custom-select">
										<option selected >Status</option>
										<option value="1">Active</option>
										<option value="2">Two</option>
										<option value="3">Three</option>
									</select></div>
									<div class="col pt-2">
										<div class="input-group mb-2">
											<input type="text" id = "datepicker-5" class="form-control  datepicker-7" placeholder="From date"required>
										</div>
									</div>
									<div class="col pt-2">
										<div class="input-group mb-2">
											<input type="text" class="form-control  datepicker-7" placeholder="To date"required>
			
										</div>
									</div>
		
									
									<div class="col-auto pt-2">
										<button class="btn search" type="submit">Search</button>
										<button class="btn cancel" type="submit">Cancel</button>
									</div>
								</div>
								<!-- TABLE -->
								<table class="table table-hover  table-bordered" id="myTable"  style="width:100% !important;">
									<thead>
										<tr>
											<th class="header"scope="col">Service ID <img class="sort" src="images/Admin_Service_Request/sort.png"></th>
											<th class="header"scope="col">Service ID <img class="sort" src="images/Admin_Service_Request/sort.png"></th>
											<th class="header"scope="col">Customer Details <img class="sort" src="images/Admin_Service_Request/sort.png"></th>
											<th class="header"scope="col">Service Provider <img class="sort" src="images/Admin_Service_Request/sort.png"></th>
											<th class="header"scope="col">Status <img class="sort" src="images/Admin_Service_Request/sort.png"></th>
											<th class="header"scope="col">Action <img class="sort" src="images/Admin_Service_Request/sort.png"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									      <td></td>
									      <td style="text-align:center;"><span class="badge_new">New</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target">
													<ul >
														<li><a href="" data-toggle="modal" data-target="#myModal">Edit & Reschedule</a> </li>
														<li><a href="">Cancel SR by cust</a></li>
														<li><a href="">Inquiry</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
														<li><a href="">Other Transactions</a></li>
													</ul>
												</div>

											</td>
									    </tr>
									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									      <td></td>
									      <td style="text-align:center;"><span class="badge_new">New</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target1').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target1">
													<ul >
														<li><a href=""data-toggle="modal" data-target="#myModal">Edit & Reschedule</a> </li>
														<li><a href="">Cancel SR by cust</a></li>
														<li><a href="">Inquiry</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
														<li><a href="">Other Transactions</a></li>
													</ul>
												</div>
											</td>
									    </tr>
									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									      <td>
									        <div class="row">
									           <div class="col-auto avatar">
									              <img src="images/Admin_Service_Request/cap.png">
									            </div>
									            <div class="col"><span >Lyum Weston</span><br>
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star2.png">
									              <span>4</span>
									            </div>
									         </div>
									       </td>
									      <td style="text-align:center;"><span class="badge_pending">Pending</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target2').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target2">
													<ul >
														<li><a href=""data-toggle="modal" data-target="#myModal">Edit & Reschedule</a> </li>
														<li><a href=""data-toggle="modal1" data-target="#myModal1">Refund</a></li>
														<li><a href="">Cancel</a></li>
														<li><a href="">Change SP</a></li>
														<li><a href="">Escalate</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
													</ul>
												</div>
											</td>
									    </tr>

									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									       <td>
									        <div class="row">
									           <div class="col-auto avatar">
									              <img src="images/Admin_Service_Request/cap.png">
									            </div>
									            <div class="col"><span >Lyum Weston</span><br>
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star2.png">
									              <span>4</span>
									            </div>
									         </div>
									       </td>
									      <td style="text-align:center;"><span class="badge_pending">Pending</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target3').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target3">
													<ul >
														<li><a href=""data-toggle="modal" data-target="#myModal">Edit & Reschedule</a> </li>
														<li><a href=""data-toggle="modal1" data-target="#myModal1">Refund</a></li>
														<li><a href="">Cancel</a></li>
														<li><a href="">Change SP</a></li>
														<li><a href="">Escalate</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
													</ul>
												</div>
											</td>
									    </tr>

									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									       <td>
									        <div class="row">
									           <div class="col-auto avatar">
									              <img src="images/Admin_Service_Request/cap.png">
									            </div>
									            <div class="col"><span >Lyum Weston</span><br>
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star2.png">
									              <span>4</span>
									            </div>
									         </div>
									       </td>
									      <td style="text-align:center;"><span class="badge_complete">Complete</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target5').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target5">
													<ul >
														<li><a href=""data-toggle="modal1" data-target="#myModal1">Refund</a></li>
														<li><a href="">Escalate</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
													</ul>
												</div>
											</td>
									    </tr>

									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									       <td>
									        <div class="row">
									           <div class="col-auto avatar">
									              <img src="images/Admin_Service_Request/cap.png">
									            </div>
									            <div class="col"><span >Lyum Weston</span><br>
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star2.png">
									              <span>4</span>
									            </div>
									         </div>
									       </td>
									      <td style="text-align:center;"><span class="badge_complete">Complete</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target6').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target6">
													<ul >
														<li><a href=""data-toggle="modal1" data-target="#myModal1">Refund</a></li>
														<li><a href="">Escalate</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
													</ul>
												</div>
											</td>
									    </tr>

									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									       <td>
									        <div class="row">
									           <div class="col-auto avatar">
									              <img src="images/Admin_Service_Request/cap.png">
									            </div>
									            <div class="col"><span >Lyum Weston</span><br>
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star2.png">
									              <span>4</span>
									            </div>
									         </div>
									       </td>
									      <td style="text-align:center;"><span class="badge_cancel">Cancel</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target6').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target6">
													<ul >
														<li><a href=""data-toggle="modal1" data-target="#myModal1">Refund</a></li>
														<li><a href="">Escalate</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
													</ul>
												</div>
											</td>
									    </tr>
									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									       <td>
									        <div class="row">
									           <div class="col-auto avatar">
									              <img src="images/Admin_Service_Request/cap.png">
									            </div>
									            <div class="col"><span >Lyum Weston</span><br>
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star2.png">
									              <span>4</span>
									            </div>
									         </div>
									       </td>
									      <td style="text-align:center;"><span class="badge_cancel">Cancel</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target7').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target7">
													<ul >
														<li><a href=""data-toggle="modal1" data-target="#myModal1">Refund</a></li>
														<li><a href="">Escalate</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
													</ul>
												</div>
											</td>
									    </tr>
									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									      <td></td>
									      <td style="text-align:center;"><span class="badge_new">New</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target8').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target8">
													<ul >
														<li><a href=""data-toggle="modal" data-target="#myModal">Edit & Reschedule</a> </li>
														<li><a href="">Cancel SR by cust</a></li>
														<li><a href="">Inquiry</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
														<li><a href="">Other Transactions</a></li>
													</ul>
												</div>
											</td>
									    </tr>
									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									      <td></td>
									      <td style="text-align:center;"><span class="badge_new">New</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target9').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target9">
													<ul >
														<li><a href=""data-toggle="modal" data-target="#myModal">Edit & Reschedule</a> </li>
														<li><a href="">Cancel SR by cust</a></li>
														<li><a href="">Inquiry</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
														<li><a href="">Other Transactions</a></li>
													</ul>
												</div>
											</td>
									    </tr>
									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									       <td>
									        <div class="row">
									           <div class="col-auto avatar">
									              <img src="images/Admin_Service_Request/cap.png">
									            </div>
									            <div class="col"><span >Lyum Weston</span><br>
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star2.png">
									              <span>4</span>
									            </div>
									         </div>
									       </td>
									      <td style="text-align:center;"><span class="badge_pending">Pending</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target10').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target10">
													<ul >
														<li><a href=""data-toggle="modal" data-target="#myModal">Edit & Reschedule</a> </li>
														<li><a href=""data-toggle="modal1" data-target="#myModal1">Refund</a></li>
														<li><a href="">Cancel</a></li>
														<li><a href="">Change SP</a></li>
														<li><a href="">Escalate</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
													</ul>
												</div>
											</td>
									    </tr>

									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									       <td>
									        <div class="row">
									           <div class="col-auto avatar">
									              <img src="images/Admin_Service_Request/cap.png">
									            </div>
									            <div class="col"><span >Lyum Weston</span><br>
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star2.png">
									              <span>4</span>
									            </div>
									         </div>
									       </td>
									      <td style="text-align:center;"><span class="badge_pending">Pending</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target11').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target11">
													<ul >
														<li><a href=""data-toggle="modal" data-target="#myModal">Edit & Reschedule</a> </li>
														<li><a href=""data-toggle="modal1" data-target="#myModal1">Refund</a></li>
														<li><a href="">Cancel</a></li>
														<li><a href="">Change SP</a></li>
														<li><a href="">Escalate</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
													</ul>
												</div>
											</td>
									    </tr>

									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									       <td>
									        <div class="row">
									           <div class="col-auto avatar">
									              <img src="images/Admin_Service_Request/cap.png">
									            </div>
									            <div class="col"><span >Lyum Weston</span><br>
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star2.png">
									              <span>4</span>
									            </div>
									         </div>
									       </td>
									      <td style="text-align:center;"><span class="badge_complete">Complete</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target12').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target12">
													<ul >
														<li><a href=""data-toggle="modal1" data-target="#myModal1">Refund</a></li>
														<li><a href="">Escalate</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
													</ul>
												</div>
											</td>
									    </tr>

									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									       <td>
									        <div class="row">
									           <div class="col-auto avatar">
									              <img src="images/Admin_Service_Request/cap.png">
									            </div>
									            <div class="col"><span >Lyum Weston</span><br>
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star2.png">
									              <span>4</span>
									            </div>
									         </div>
									       </td>
									      <td style="text-align:center;"><span class="badge_complete">Complete</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target13').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target13">
													<ul >
														<li><a href=""data-toggle="modal1" data-target="#myModal1">Refund</a></li>
														<li><a href="">Escalate</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
													</ul>
												</div>
											</td>
									    </tr>

									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									       <td>
									        <div class="row">
									           <div class="col-auto avatar">
									              <img src="images/Admin_Service_Request/cap.png">
									            </div>
									            <div class="col"><span >Lyum Weston</span><br>
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star2.png">
									              <span>4</span>
									            </div>
									         </div>
									       </td>
									      <td style="text-align:center;"><span class="badge_cancel">Cancel</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target14').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target14">
													<ul >
														<li><a href=""data-toggle="modal1" data-target="#myModal1">Refund</a></li>
														<li><a href="">Escalate</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
													</ul>
												</div>
											</td>
									    </tr>
									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									       <td>
									        <div class="row">
									           <div class="col-auto avatar">
									              <img src="images/Admin_Service_Request/cap.png">
									            </div>
									            <div class="col"><span >Lyum Weston</span><br>
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star2.png">
									              <span>4</span>
									            </div>
									         </div>
									       </td>
									      <td style="text-align:center;"><span class="badge_cancel">Cancel</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target15').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target15">
													<ul >
														<li><a href=""data-toggle="modal1" data-target="#myModal1">Refund</a></li>
														<li><a href="">Escalate</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
													</ul>
												</div>
											</td>
									    </tr>
									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									      <td></td>
									      <td style="text-align:center;"><span class="badge_new">New</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target16').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target16">
													<ul >
														<li><a href=""data-toggle="modal" data-target="#myModal">Edit & Reschedule</a> </li>
														<li><a href="">Cancel SR by cust</a></li>
														<li><a href="">Inquiry</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
														<li><a href="">Other Transactions</a></li>
													</ul>
												</div>
											</td>
									    </tr>
									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									      <td></td>
									      <td style="text-align:center;"><span class="badge_pending">Pending</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target17').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target17">
													<ul >
														<li><a href=""data-toggle="modal" data-target="#myModal">Edit & Reschedule</a> </li>
														<li><a href=""data-toggle="modal1" data-target="#myModal1">Refund</a></li>
														<li><a href="">Cancel</a></li>
														<li><a href="">Change SP</a></li>
														<li><a href="">Escalate</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
													</ul>
												</div>
											</td>
									    </tr>

									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									       <td>
									        <div class="row">
									           <div class="col-auto avatar">
									              <img src="images/Admin_Service_Request/cap.png">
									            </div>
									            <div class="col"><span >Lyum Weston</span><br>
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star2.png">
									              <span>4</span>
									            </div>
									         </div>
									       </td>
									      <td style="text-align:center;"><span class="badge_pending">Pending</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target18').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target18">
													<ul >
														<li><a href=""data-toggle="modal" data-target="#myModal">Edit & Reschedule</a> </li>
														<li><a href=""data-toggle="modal1" data-target="#myModal1">Refund</a></li>
														<li><a href="">Cancel</a></li>
														<li><a href="">Change SP</a></li>
														<li><a href="">Escalate</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
													</ul>
												</div>
											</td>
									    </tr>

									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									       <td>
									        <div class="row">
									           <div class="col-auto avatar">
									              <img src="images/Admin_Service_Request/cap.png">
									            </div>
									            <div class="col"><span >Lyum Weston</span><br>
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star2.png">
									              <span>4</span>
									            </div>
									         </div>
									       </td>
									      <td style="text-align:center;"><span class="badge_complete">Complete</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target19').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target19">
													<ul >
														<li><a href=""data-toggle="modal1" data-target="#myModal1">Refund</a></li>
														<li><a href="">Escalate</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
													</ul>
												</div>
											</td>
									    </tr>

									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									       <td>
									        <div class="row">
									           <div class="col-auto avatar">
									              <img src="images/Admin_Service_Request/cap.png">
									            </div>
									            <div class="col"><span >Lyum Weston</span><br>
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star2.png">
									              <span>4</span>
									            </div>
									         </div>
									       </td>
									      <td style="text-align:center;"><span class="badge_complete">Complete</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target20').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target20">
													<ul >
														<li><a href=""data-toggle="modal1" data-target="#myModal1">Refund</a></li>
														<li><a href="">Escalate</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
													</ul>
												</div>
											</td>
									    </tr>

									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									       <td>
									        <div class="row">
									           <div class="col-auto avatar">
									              <img src="images/Admin_Service_Request/cap.png">
									            </div>
									            <div class="col"><span >Lyum Weston</span><br>
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star2.png">
									              <span>4</span>
									            </div>
									         </div>
									       </td>
									      <td style="text-align:center;"><span class="badge_cancel">Cancel</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target21').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target21">
													<ul >
														<li><a href=""data-toggle="modal1" data-target="#myModal1">Refund</a></li>
														<li><a href="">Escalate</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
													</ul>
												</div>
											</td>
									    </tr>
									    <tr>
									      <td>323436</td>
									      <td>
									        <div class="row">
									           <div class="col">
									              <img src="images/Admin_Service_Request/calendar2.png"><span class="date"><strong>09/04/2018</strong></span>
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-14.png"><span class="time">12:00 - 18:00</span>
									            </div>
									          </div>
									      </td>

									      <td>
									        <div class="row">
									           <div class="col">
									              David Bough 
									            </div>
									        </div>
									          <div class="row">
									            <div class="col"><img src="images/Admin_Service_Request/layer-15.png"><span class="time"> Musterstrabe 5,12345 Bonn</span>
									            </div>
									          </div>
									      </td>
									       <td>
									        <div class="row">
									           <div class="col-auto avatar">
									              <img src="images/Admin_Service_Request/cap.png">
									            </div>
									            <div class="col"><span >Lyum Weston</span><br>
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star1.png">
									              <img src="images/Admin_Service_Request/star2.png">
									              <span>4</span>
									            </div>
									         </div>
									       </td>
									      <td style="text-align:center;"><span class="badge_cancel">Cancel</span></td>
											<td style="text-align:center;" class="admin-table-action">
												<a id="poplink" onclick="$('#target22').toggle();"class="admin-table-actionbtn"><i class="fa fa-ellipsis-v" aria-hidden="true" style="color:#646464"></i></a>
												<div class="admin-table-action-menu" id="target22">
													<ul >
														<li><a href=""data-toggle="modal1" data-target="#myModal1">Refund</a></li>
														<li><a href="">Escalate</a></li>
														<li><a href="">History Log</a></li>
														<li><a href="">Download Invoice</a></li>
													</ul>
												</div>
											</td>
									    </tr>
										</tbody>
									</table>

									<!-- MODEL -->
									<div class="modal fade" id="myModal">
										<div class="modal-dialog">
											<div class="modal-content">
												
												<!-- Modal body -->
												<div class="modal-body mb-0 pb-0 mt-0">
													<div class="container ">
														
														<div class="row">
															<div class="col-auto"><h1>Edit Service Request</h1></div>
															<div class="col"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
													    </div>

													    <form class="needs-validation" novalidate>
														  <div class="form-row" style="border-style: none;">
														    <div class="col-md-6 mb-3">
														      <label for="validationCustom01">Date</label>
														      <input type="text" class="form-control  datepicker-7" placeholder="Date" id="validationCustom01 ,datepicker-5" placeholder="First name" required>
														    </div>
														    <div class="col-md-6 mb-3">
														      <label for="validationCustom02">Time</label>
														      <input placeholder="Selected time" type="time" id="validationCustom02" placeholder="Select Time" class="form-control" required>
															</div>
														    <div class="col-12"><h4>Service Address</h4></div>
														  	<div class="col-md-6 mb-3">
														      <label for="validationCustom04">Streat Name</label>
														      <input type="text" class="form-control" id="validationCustom04" placeholder="Streat Name" required>
														      <div class="invalid-feedback">
														        Please provide a valid streat name.
														      </div>
														    </div>
														    <div class="col-md-6 mb-3">
														      <label for="validationCustom05">House Number</label>
														      <input type="text" class="form-control" id="validationCustom05" placeholder="1111" required>
														      <div class="invalid-feedback">
														        Please provide a valid House Number.
														      </div>
														    </div>
														    <div class="col-md-6 mb-3">
														     <label for="validationCustom06">Postal Code</label>
														      <input type="text" class="form-control" id="validationCustom06" placeholder="Postal Code" required>
														      <div class="invalid-feedback">
														        Please provide a valid postal code.
														      </div>
														    </div>
														    <div class="col-md-6 mb-3">
														      <label for="validationCustom07">City</label>
														      <div class="col  form-search" id="validationCustom07" required>
														      	<select class="custom-select">
																	<option selected >City</option>
																	<option value="1">One</option>
																	<option value="2">Two</option>
																	<option value="3">Three</option>
																</select>
															  </div>
														      <div class="invalid-feedback">
														        Please provide a valid City.
														      </div>
														    </div>

														    <div class="col-12"><h4>Invoice Address</h4></div>
														  	<div class="col-md-6 mb-3">
														      <label for="validationCustom04">Streat Name</label>
														      <input type="text" class="form-control" id="validationCustom04" placeholder="Streat Name" required>
														      <div class="invalid-feedback">
														        Please provide a valid streat name.
														      </div>
														    </div>
														    <div class="col-md-6 mb-3">
														      <label for="validationCustom05">House Number</label>
														      <input type="text" class="form-control" id="validationCustom05" placeholder="1111" required>
														      <div class="invalid-feedback">
														        Please provide a valid House Number.
														      </div>
														    </div>
														    <div class="col-md-6 mb-3">
														     <label for="validationCustom06">Postal Code</label>
														      <input type="text" class="form-control" id="validationCustom06" placeholder="Postal Code" required>
														      <div class="invalid-feedback">
														        Please provide a valid postal code.
														      </div>
														    </div>
														    <div class="col-md-6 mb-3">
														      <label for="validationCustom07">City</label>
														      <div class="col  form-search" id="validationCustom07" required>
														      	<select class="custom-select">
																	<option selected >City</option>
																	<option value="1">One</option>
																	<option value="2">Two</option>
																	<option value="3">Three</option>
																</select>
															  </div>
														      <div class="invalid-feedback">
														        Please provide a valid City.
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
														    	<button type="submit" class="btn">Update</button>
														    </div>
														    
														  </div>
														  
														</form>


													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- MODEL End-->

									
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
												<li class="prev"><a href="#" id="prev"><img src='images/Admin_Service_Request/first-page.png' alt='first'/></a></li>
												<li class="next"><a href="#" id="next"><img src='images/Admin_Service_Request/first-page.png' alt='first' style='transform: rotate(180deg)' /></a></li>
											</ul>
										</section>
									</div>
									
									<div class="copyright">
										??2018 Helperland. All rights reserved.
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
			
		</html>}
