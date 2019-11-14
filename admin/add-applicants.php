<?php
	session_start();
	include('includes/config.php');
	include('includes/checklogin.php');
	check_login();
	//code for registration
	if($_POST['submit']) {
		$roomno=$_POST['room'];
		$seater=$_POST['seater'];
		$feespm=$_POST['fpm'];
		$foodstatus=$_POST['foodstatus'];
		$stayfrom=$_POST['stayf'];
		$duration=$_POST['duration'];
		$course=$_POST['course'];
		$regno=$_POST['regno'];
		$fname=$_POST['fname'];
		$mname=$_POST['mname'];
		$lname=$_POST['lname'];
		$gender=$_POST['gender'];
		$contactno=$_POST['contact'];
		$emailid=$_POST['email'];
		$emcntno=$_POST['econtact'];
		$gurname=$_POST['gname'];
		$gurrelation=$_POST['grelation'];
		$gurcntno=$_POST['gcontact'];
		$caddress=$_POST['address'];
		$ccity=$_POST['city'];
		$cstate=$_POST['state'];
		$cpincode=$_POST['pincode'];
		$paddress=$_POST['paddress'];
		$pcity=$_POST['pcity'];
		$pstate=$_POST['pstate'];
		$ppincode=$_POST['ppincode'];
		$query="insert into  applicants(roomno,seater,feespm,foodstatus,stayfrom,duration,course,regno,firstName,middleName,lastName,gender,contactno,emailid,egycontactno,guardianName,guardianRelation,guardianContactno,corresAddress,corresCIty,corresState,corresPincode,pmntAddress,pmntCity,pmnatetState,pmntPincode) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = $mysqli->prepare($query);
		$rc=$stmt->bind_param('iiiisisissssisississsisssi',$roomno,$seater,$feespm,$foodstatus,$stayfrom,$duration,$course,$regno,$fname,$mname,$lname,$gender,$contactno,$emailid,$emcntno,$gurname,$gurrelation,$gurcntno,$caddress,$ccity,$cstate,$cpincode,$paddress,$pcity,$pstate,$ppincode);
		$stmt->execute();
		$stmt->close();

		$query1="insert into  users(regNo,firstName,middleName,lastName,gender,contactNo,email,password) values(?,?,?,?,?,?,?,?)";
		$stmt1= $mysqli->prepare($query1);
		$stmt1->bind_param('sssssiss',$regno,$fname,$mname,$lname,$gender,$contactno,$emailid,$contactno);
		$stmt1->execute();
		echo"<script>alert('Applicant Succssfully Registered');</script>";
		header('location: manage-applicants.php');
	}
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="theme-color" content="#3e454c">
		<title> Application Form</title>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<link rel="stylesheet" href="css/fileinput.min.css">
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
		<script type="text/javascript" src="js/validation.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<script>
			function getSeater(val) {
				$.ajax({
					type: "POST",
					url: "get_seater.php",
					data:'roomid='+val,
					success: function(data) {
						//alert(data);
						$('#seater').val(data);
					}
				});

				$.ajax({
					type: "POST",
					url: "get_seater.php",
					data:'rid='+val,
					success: function(data){
						//alert(data);
						$('#fpm').val(data);
					}
				});
			}
		</script>
	</head>

	<body>
		<?php include('includes/header.php');?>
		<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">
						<h2 class="page-title">Add Applicants </h2>

							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-primary">
										<div class="panel-heading">Fill Applicant Info</div>
										<div class="panel-body">
											<form method="post" action="" class="form-horizontal">
												<div class="form-group">
													<label class="col-sm-6 control-label">
														<h4 style="color: #8a2829" align="center-right">PERSONAL AND CONTACT DETAILS </h4> 
													</label>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Surname: </label>
													<div class="col-sm-3">
														<input type="text" name="fname" id="fname"  class="form-control" required="required" >
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">First Name (s): </label>
														<div class="col-sm-3">
															<input type="text" name="lname" id="lname"  class="form-control" required="required">
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Gender : </label>
													<div class="col-sm-3">
														<select name="gender" class="form-control" required="required">
															<option value="">Select Gender</option>
															<option value="male">Male</option>
															<option value="female">Female</option>
														</select>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Contact No : </label>
														<div class="col-sm-3">
															<input type="text" name="contact" id="contact"  class="form-control" required="required">
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Marital Status: </label>
													<div class="col-sm-3">
														<select name="gender" class="form-control" required="required">
															<option value="">Select Marital Status</option>
															<option value="male">Married</option>
															<option value="female">Single</option>
															<option value="others">Others</option>
														</select>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Email id : </label>
														<div class="col-sm-3">
															<input type="email" name="email" id="email"  class="form-control"required= "required">
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Date of Birth:</label>
													<div class="col-sm-3">
														<input type="date" name="dob" id="dob"  class="form-control" require="required" >
													</div>

													<div class="form-group">
														<label class="col-sm-2 control-label">National ID No:</label>
														<div class="col-sm-3">
															<input type="text" name="gname" id="gname"  class="form-control" required="required">
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Country of Birth:</label>
													<div class="col-sm-3">
														<input type="text" name="gname" id="gname"  class="form-control" required="required">
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Nationality: </label>
														<div class="col-sm-3">
															<input type="text" name="grelation" id="grelation"  class="form-control" required="required">
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Address : </label>
													<div class="col-sm-8">
														<textarea  rows="2" name="address"  id="address" class="form-control" required="required"></textarea>
													</div>
												</div>
												</div>


												<div class="form-group">
													<label class="col-sm-6 control-label">
														<h4 style="color: #8a2829" align="center"> PROPERTY DETAILS</h4> 
													</label>
												</div>
												<div class="clear">&nbsp;</div>

												<div class="form-group" style="margin-top:20px; margin-bottom:40px">									
													<label class="col-sm-2 control-label">Preferred Locality: </label>
													<div class="col-sm-3">
														<select name="locality" class="form-control" required="required">
															<option value="">Select Location</option>
															<option value="Westlea, Harare">Westlea, Harare</option>
															<option value="Zimre Park, Harare">Zimre Park, Harare</option>
															<option value="Somerby Subdivision 2, Harare">Somerby Subdivision 2, Harare</option>
															<option value="Southlea Park, Harare">Southlea Park, Harare</option>
															<option value="Budiriro Extension, Harare">Budiriro Extension, Harare</option>
															<option value="Edinburgh Subdivision 6, Harare">Edinburgh Subdivision 6, Harare</option>
															<option value="Upper Rangemore, Bulawayo">Upper Rangemore, Bulawayo</option>
															<option value="Lower Rangemore, Bulawayo">Lower Rangemore, Bulawayo</option>
															<option value="Fortune Medowlands, Gweru">Fortune Medowlands, Gweru</option>
															<option value="Mbuya Maria, Mutare">Mbuya Maria, Mutare</option>
															<option value="Alves of Eden, Chinhoyi">Alves of Eden, Chinhoyi</option>
															<option value="Yellow city, Marondera">Yellow City, Marondera</option>
														</select>
													</div>

													<div class="form-group">							
														<label class="col-sm-2 control-label">Stand Size:</label>
														<div class="col-sm-3">
															<select name="standsize" class="form-control" required="required">
																<option value="">Select Stand Size: </option>
																<option value="150">150 m&sup2</option>
																<option value="200">200 m&sup2</option>
																<option value="250">250 m&sup2</option>
																<option value="300">300 m&sup2</option>
																<option value="350">350 m&sup2</option>
																<option value="400">400 m&sup2</option>
																<option value="450">450 m&sup2</option>
																<option value="500">500 m&sup2</option>
																<option value="550">550 m&sup2</option>
																<option value="600">600 m&sup2</option>
															</select>
														</div>
													</div>
												</div>
												<div class="clear">&nbsp;</div>
												<div class="clear">&nbsp;</div>

												<div class="form-group" style="margin-top:20px; margin-bottom:40px">
													<label class="col-sm-2 control-label">Model House Type:</label>
													<div class="col-sm-3">
														<select name="rooms" class="form-control" required="required">
															<option value="">Select</option>
															<option value="2 Rooms">2 Roomed</option>
															<option value="3 Rooms">3 Roomed</option>
															<option value="4 Rooms">4 Roomed</option>
															<option value="5 Rooms">5 Roomed</option>
														</select>
													</div>
													<div class="form-group">									
														<label class="col-sm-2 control-label">Repayment Period:</label>
														<div class="col-sm-3">
															<select name="repayment" class="form-control" required="required">
																<option value="">Select Period: </option>
																<option value="5 Years">5 Years</option>
																<option value="10 Years">10 Years</option>
																<option value="15 Years">15 Years</option>
																<option value="20 Years">20 Years</option>
																<option value="25 Years">25 Years</option>
																<option value="30 Years">30 Years</option>	
															</select>
														</div>
													</div>	
												</div>
												<div class="clear">&nbsp;</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Property Value:</label>
													<div class="col-sm-3">
														<label name="property" id="property"  class="form-control">
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Total Mortgage Value: </label>
														<div class="col-sm-3">
															<label name="mortgage_value" id="mortgage_value"  class="form-control">
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Monthly Subscription:</label>
													<div class="col-sm-3">
														<label name="premium" id="premium"  class="form-control">
													</div>
													<!-- <div class="form-group">
														<label class="col-sm-2 control-label">Monthly Subscription: </label>
														<div class="col-sm-3">
															<label name="premium" id="premium"  class="form-control">
														</div>
													</div> -->
												</div>

												<div class="form-group" style="margin-top:20px; margin-bottom:50px">
													<label class="col-sm-6 control-label">
														<h4 style="color: #8a2829" align="center">NEXT OF KIN DETAILS </h4> 
													</label>
												</div>


												<div class="col-sm-6 col-sm-offset-4" style="padding-top:20px; padding-bottom:20px">
													<button class="btn btn-default" type="submit">Cancel</button>
													<input type="submit" name="submit" Value="Register" class="btn btn-primary">
												</div>
											</form>
										</div>
										</div>
									</div>
								</div>
							</div>
								</div>
							</div>
						</div>
					</div> 	
				</div>
			</div>
		</div>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap-select.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>
		<script src="js/Chart.min.js"></script>
		<script src="js/fileinput.js"></script>
		<script src="js/chartData.js"></script>
		<script src="js/main.js"></script>
	</body>
	<script type="text/javascript">
		$(document).ready(function(){
			$('input[type="checkbox"]').click(function(){
				if($(this).prop("checked") == true){
					$('#paddress').val( $('#address').val() );
					$('#pcity').val( $('#city').val() );
					$('#pstate').val( $('#state').val() );
					$('#ppincode').val( $('#pincode').val() );
				} 
			});
		});
	</script>
	<script>
		function checkAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data:'roomno='+$("#room").val(),
				type: "POST",
				success:function(data){
					$("#room-availability-status").html(data);
					$("#loaderIcon").hide();
				},
				error:function (){}
			});
		}
	</script>
</html>