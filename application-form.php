<?php
	session_start();
	include('includes/config.php');
	include('includes/checklogin.php');
	check_login();

	//code for registration
	if(isset($_POST['submit'])) {
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$gender=$_POST['gender'];
		$contact=$_POST['contact'];
		$marital=$_POST['marital'];
		$email=$_POST['email'];
		$dob=$_POST['dob'];
		$national=$_POST['national'];
		$countrybirth=$_POST['countrybirth'];
		$nationality=$_POST['nationality'];
		$address=$_POST['address'];
		$locality=$_POST['locality'];
		$stand=$_POST['stand'];
		$house=$_POST['house'];
		$period=$_POST['period'];
		$nextname=$_POST['nextname'];
		$nextsurname=$_POST['nextsurname'];
		$nextid=$_POST['nextid'];
		$nextdob=$_POST['nextdob'];
		$nextphone=$_POST['nextphone'];
		$nextaddress=$_POST['nextaddress'];

		$query="insert into  applicants(firstName,surname,gender,contact,marital,email,dob,national,countrybirth,nationality,address,locality,stand,house,period,nextname,nextsurname,nextid,nextdob,nextphone,nextaddress) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = $mysqli->prepare($query);
		$rc=$stmt->bind_param('sssssssssssssssssssss',$fname,$lname,$gender,$contact,$marital,$email,$dob,$national,$countrybirth,$nationality,$address,$locality,$stand,$house,$period,$nextname,$nextsurname,$nextid,$nextdob,$nextphone,$nextaddress);
		$stmt->execute();
		// if($stand == '150 m&sup2' && $period == '5 Years') {
		// 	echo"<script>success('The value of the property selected is US$ 4 500 with subscriptions of US$ 105/month')</script>";
		// 	echo"<script>success('Application Successfully Completed!');</script>";
		// } 
		echo"<script>success('Application for' $fname + $lname' Successfully Completed!');</script>";
		header('location:terms.php');
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

		<title>Application Form</title>

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
		<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
		<script>
			function getSeater(val) {
				$.ajax({
					type: "POST",
					url: "get_seater.php",
					data:'roomid='+val,
					success: function(data){
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
								<h2 class="page-title"> </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
										<form method="post" action="" class="form-horizontal">
											<?php
												$uid=$_SESSION['login'];
												$stmt=$mysqli->prepare("SELECT email FROM users WHERE email=? ");
												$stmt->bind_param('s',$uid);
												$stmt->execute();
												$stmt -> bind_result($email);
												$rs=$stmt->fetch();
												$stmt->close();
												if($rs){ ?>
													<!-- <h3 style="color: green" align="left">already  by you</h3> -->
													<?php }
												else{
													echo "";
												} ?>			

											<div class="form-group">
												<label class="col-sm-6 control-label">
													<h4 style="color: #8a2829" align="center-right">PERSONAL AND CONTACT DETAILS </h4> 
												</label>
											</div>

											<?php	
												$aid=$_SESSION['id'];
												$ret="select * from users where id=?";
												$stmt= $mysqli->prepare($ret) ;
												$stmt->bind_param('i',$aid);
												$stmt->execute() ;//ok
												$res=$stmt->get_result();
												//$cnt=1;
												while($row=$res->fetch_object()) { ?>

												<div class="form-group">
													<label class="col-sm-2 control-label"> Surname : </label>
													<div class="col-sm-3">
														<input type="text" name="lname" id="lname"  class="form-control" value="<?php echo $row->lastName;?>" >
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">First Name (s): </label>
														<div class="col-sm-3">
															<input type="text" name="fname" id="fname"  class="form-control" value="<?php echo $row->firstName;?>"  >
													</div>
												</div>

												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Gender : </label>
													<div class="col-sm-3">
														<input type="text" name="gender" value="<?php echo $row->gender;?>" class="form-control" >
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Contact No : </label>
														<div class="col-sm-3">
															<input type="text" name="contact" id="contact" value="<?php echo $row->contactNo;?>"  class="form-control" >
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Date of Birth:</label>
													<div class="col-sm-3">
														<input type="date" name="dob" id="dob"  class="form-control" value="<?php echo $row->dob;?>"  >
													</div>																					
													<div class="form-group">
														<label class="col-sm-2 control-label">Email : </label>
														<div class="col-sm-3">
															<input type="email" name="email" id="email"  class="form-control" value="<?php echo $row->email;?>"  >
														</div>
													</div>
												</div>

											<?php } ?>

											<div class="form-group"><label class="col-sm-2 control-label">Marital Status: </label>
												<div class="col-sm-3">
													<select name="marital" class="form-control" required="required">
														<option value="">Select Marital Status</option>
														<option value="Married">Married</option>
														<option value="Single">Single</option>
														<option value="Others">Others</option>
													</select>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">National ID No:</label>
													<div class="col-sm-3">
													<input type="text" name="national" id="national"  class="form-control" required="required">
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label">Country of Birth:</label>
												<div class="col-sm-3">
													<input type="text" name="countrybirth" id="countrybirth"  class="form-control" required="required">
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Nationality: </label>
													<div class="col-sm-3">
														<input type="text" name="nationality" id="nationality"  class="form-control" required="required">
													</div>
												</div>
											</div>

											<div class="form-group">											
												<label class="col-sm-2 control-label">Address : </label>
												<div class="col-sm-8">
													<textarea  rows="2" name="address"  id="address" class="form-control" required="required"></textarea>
												</div>
											</div>


											<div class="form-group">
												<label class="col-sm-6 control-label"><h4 style="color: #8a2829" align="center-left"> PROPERTY DETAILS</h4> </label>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label">Preferred Locality: </label>
												<div class="col-sm-3">
													<select name="locality" class="form-control" required="required">
														<option value="">Select Location</option>
														<option value="Westlea, Harare">Westlea, Harare</option>
														<option value="Zimre Park, Harare">Eastview, Harare</option>
														<option value="Zimre Park, Harare">Zimre Park, Harare</option>
														<option value="Zimre Park, Harare">Glenroy Lakeside Park, Harare</option>
														<option value="Somerby Subdivision 2, Harare">Somerby Subdivision 2, Harare</option>
														<option value="Southlea Park, Harare">Southlea Park, Harare</option>
														<option value="Budiriro Extension, Harare">Budiriro Extension, Harare</option>
														<option value="Edinburgh Subdivision 6, Harare">Edinburgh Subdivision 6, Harare</option>
														<option value="Upper Rangemore, Bulawayo">Upper Rangemore, Bulawayo</option>
														<option value="Lower Rangemore, Bulawayo">Lower Rangemore, Bulawayo</option>
														<option value="Fortune Medowlands, Gweru">Fortune Medowlands, Gweru</option>
														<option value="Mbuya Maria, Mutare">Mbuya Maria, Mutare</option>
														<option value="Mbuya Maria, Mutare">Atherstone, Bindura</option>
														<option value="Alves of Eden, Chinhoyi">Alves of Eden, Chinhoyi</option>
														<option value="Yellow city, Marondera">Yellow City, Marondera</option>
													</select>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Stand Size:</label>
													<div class="col-sm-3">
														<select name="stand" class="form-control" required="required" onClick = "changeImage">
															<option value="">Select Stand Size: </option>
															<option value="150 m&sup2" data="150 m&sup2">150 m&sup2</option>
															<option value="200 m&sup2">200 m&sup2</option>
															<option value="250 m&sup2">250 m&sup2</option>
															<option value="300 m&sup2">300 m&sup2</option>
															<option value="350 m&sup2">350 m&sup2</option>
															<option value="400 m&sup2">400 m&sup2</option>
															<option value="450 m&sup2">450 m&sup2</option>
															<option value="500 m&sup2">500 m&sup2</option>
															<option value="550 m&sup2">550 m&sup2</option>
															<option value="600 m&sup2">600 m&sup2</option>					
														</select>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Model House Type:</label>
													<div class="col-sm-3">
														<select name="house" class="form-control" required="required">
															<option value="">Select</option>
															<option value="Not Applicable">N/A</option>
															<option value="2 roomed">2 roomed</option>
															<option value="3 roomed">3 roomed</option>
															<option value="4 roomed">4 roomed</option>
															<option value="5 roomed">5 roomed</option>
														</select>
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Repayment Period:</label>
														<div class="col-sm-3">
														<select name="period" class="form-control" required="required" onchange="changeText()">
															<option value="">Select Period: </option>
															<option value="5 Years" data="5 Years">5 Years</option>
															<option value="10 Years">10 Years</option>
															<option value="15 Years">15 Years</option>
															<option value="20 Years">20 Years</option>
															<option value="25 Years">25 Years</option>
															<option value="30 Years">30 Years</option>	
														</select>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Property Value:</label>
													<div class="col-sm-3">
														<input type="text" name="property" id="property" class="form-control" value="" readonly="readonly">
															<!-- <script type="text/javascript">
																function changeText() {
																	var text = document.getElementById("property");
																	if(stand == "150 m&sup2") {
																		$("#property").text("US$ 4 500 or equiv. ZWL$");
																		document.getElementById('property').value = 'US$ 4 500 or equiv. ZWL$';
																	}
																	if (image.src.match("bulbon")) {
																		image.src = "pic_bulboff.gif";
																	} 
																}
																if(stand == "150 m&sup2")
																	$("#property").text("US$ 4 500 or equiv. ZWL$");
																	document.getElementById('property').value = 'US$ 4 500 or equiv. ZWL$';
															</script> -->
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Monthly Subscription: </label>
														<div class="col-sm-3">
															<input type="text" name="premium" id="premium"  value="" class="form-control">
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-6 control-label"><h4 style="color: #8a2829" align="center-left">NEXT OF KIN DETAILS </h4> </label>
												</div>


												<div class="form-group">
													<label class="col-sm-2 control-label">Name:</label>
													<div class="col-sm-3">
														<input type="text" name="nextname" id="nextname"  class="form-control" required="required">
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Surname: </label>
														<div class="col-sm-3">
															<input type="text" name="nextsurname" id="nextsurname"  class="form-control" required="required">
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">ID No: </label>
													<div class="col-sm-3">
														<input type="text" name="nextid" id="nextid"  class="form-control" required="required">
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Date of Birth:</label>
														<div class="col-sm-3">
															<input type="date" name="nextdob" id="nextdob"  class="form-control" >
														</div>
													</div>
												</div>


												<div class="form-group">
													<label class="col-sm-2 control-label">Phone No: </label>
													<div class="col-sm-3">
														<input type="text" name="nextphone" id="nextphone"  class="form-control" required="required">
													</div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Address : </label>
														<div class="col-sm-3">
															<textarea  rows="2" name="nextaddress"  id="nextaddress" class="form-control" required="required"></textarea>
													</div>
												</div>

												<div style="text-align: center">
													<h3>List of Beneficiaries</h3>
												</div>

												<!-- <table style="width:100%; padding-left: 50px"> -->
												<div class="table-condensed">
													<table style="width:85%; margin-left:7%" >
														<!--Table head-->
														<thead>
															<tr>
															<th>Name</th>
															<th>Surname</th>
															<th>Gender  </th>
															<th>D.O.B</th>
															<th>ID number</th>
															<th>Relationship</th>
															</tr>
														</thead>

														<tbody>
															<tr class="table-info">
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td>
																	<select class="selectpicker form-control" >
																		<option>Female   </option>
																		<option>Male    </option>
																	</select>
																</td>
																<td><input type="date" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
															</tr>
															<tr class="table-info">
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td>
																	<select class="selectpicker form-control" >
																		<option>Female   </option>
																		<option>Male    </option>
																	</select>
																</td>
																<td><input type="date" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
															</tr>
															<tr class="table-info">
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td>
																	<select class="selectpicker form-control" >
																		<option>Female   </option>
																		<option>Male    </option>
																	</select>
																</td>
																<td><input type="date" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
															</tr>
															<tr class="table-info">
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td>
																	<select class="selectpicker form-control" >
																		<option>Female   </option>
																		<option>Male    </option>
																	</select>
																</td>
																<td><input type="date" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
															</tr>
															<tr class="table-info">
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td>
																	<select class="selectpicker form-control" >
																		<option>Female   </option>
																		<option>Male    </option>
																	</select>
																</td>
																<td><input type="date" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
															</tr>
															<tr class="table-info">
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td>
																	<select class="selectpicker form-control" >
																		<option>Female   </option>
																		<option>Male    </option>
																	</select>
																</td>
																<td><input type="date" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
															</tr>
															<tr class="table-info">
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td>
																	<select class="selectpicker form-control" >
																		<option>Female   </option>
																		<option>Male    </option>
																	</select>
																</td>
																<td><input type="date" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
															</tr>
															<tr class="table-info">
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td>
																	<select class="selectpicker form-control" >
																		<option>Female   </option>
																		<option>Male    </option>
																	</select>
																</td>
																<td><input type="date" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
															</tr>
															<tr class="table-info">
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td>
																	<select class="selectpicker form-control" >
																		<option>Female   </option>
																		<option>Male    </option>
																	</select>
																</td>
																<td><input type="date" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
															</tr>
															<tr class="table-info">
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td>
																	<select class="selectpicker form-control" >
																		<option>Female   </option>
																		<option>Male    </option>
																	</select>
																</td>
																<td><input type="date" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
																<td><input type="text" class="form-control" name=""></td>
															</tr>
														</tbody>
													</table>
													</div>
												</div>
											</div>
										

											<div class="col-sm-6 col-sm-offset-4">
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
		$(document).ready(function() {
			$('input[type="checkbox"]').click(function() {
				if($(this).prop("checked") == true){
					$('#paddress').val( $('#address').val() );
					$('#pcity').val( $('#city').val() );
					$('#pstate').val( $('#state').val() );
					$('#ppincode').val( $('#pincode').val() );
				}
			});
		});
	</script>													

	<script type="text/javascript">  
		$(document).ready(function() {                                       
			$("#period").live("change", function() {
			$("#property").val($(this).find("option:selected").attr("value"));
			})
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
	<script type="text/javascript">
		$(document).ready(function() {
			$('#duration').keyup(function(){
				var fetch_dbid = $(this).val();
				$.ajax({
					type:'POST',
					url :"ins-amt.php?action=userid",
					data :{userinfo:fetch_dbid},
					success:function(data){
						$('.result').val(data);
					}
				});
			})
		});
	</script>
</html>