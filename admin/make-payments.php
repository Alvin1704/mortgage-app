<?php
	session_start();
	include('includes/config.php');
	include('includes/checklogin.php');
	check_login();
	//code for add courses
	if($_POST['submit']) {
		$coursecode=$_POST['account'];
		$coursesn=$_POST['amount'];
		$coursefn=$_POST['rate'];

		$query="insert into payments (applicant_no,amount,exchange_rate) values(?,?,?)";
		$stmt = $mysqli->prepare($query);
		$rc=$stmt->bind_param('sss',$coursecode,$coursesn,$coursefn);
		$stmt->execute();
		echo"<script>alert('Payment has been successfully made');</script>";
		header('location: payments.php');
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

		<title>Make Payment</title>

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
	</head>

	<body>
		<?php include('includes/header.php');?>
		<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
			<div class="content-wrapper">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12">
						
							<h2 class="page-title">Payments </h2>
		
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Pay Premiums</div>
										<div class="panel-body">
										
											<form method="post" class="form-horizontal">												
												<div class="hr-dashed"></div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Payment Method </label>
													<div class="col-sm-8">
														<select name="rooms" class="form-control" required="required">
															<option value="">Select</option>
															<option value="Cash">Cash</option>
															<option value="Ecocash">Ecocash</option>
															<option value="Swipe">Swipe</option>
														</select> 
													</div>
												</div>

												<div class="hr-dashed"></div>
												<div class="form-group">
													<label class="col-sm-2 control-label">Currency </label>
													<div class="col-sm-8">
														<select name="rooms" class="form-control" required="required">
															<option value="">Select</option>
															<option value="Cash">ZWL</option>
															<option value="Ecocash">ZAR</option>
															<option value="Swipe">US</option>
														</select> 
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Account No.</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="account" id="account" required="required">
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Amount Paid</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="amount" id="amount" required="required">
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Adjust Rate</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="rate" id="rate" required="required">
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label">Equivalent</label>
													<div class="col-sm-8">
													<label class="col-sm-2 control-label">US$ </label>
													</div>
												</div>

												<div class="col-sm-8 col-sm-offset-2">
													<input class="btn btn-primary" type="submit" name="submit" value="Make Payment">
												</div>
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
</html>