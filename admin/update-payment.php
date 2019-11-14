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
		$id=$_GET['id'];
		$query="update payments set applicant_no=?,amount=?,exchange_rate=? where id=?";
		$stmt = $mysqli->prepare($query);
		$rc=$stmt->bind_param('sssi',$coursecode,$coursesn,$coursefn,$id);
		$stmt->execute();
		echo"<script>alert('Payment record has been Updated successfully');</script>";
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

		<title>Update Payment</title>
		
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
							<h2 class="page-title">Update Payment </h2>
		
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">Update Payment</div>
										<div class="panel-body">
											<form method="post" class="form-horizontal">
												<?php	
													$id=$_GET['id'];
													$ret="select * from payments where id=?";
													$stmt= $mysqli->prepare($ret) ;
													$stmt->bind_param('i',$id);
													$stmt->execute() ;//ok
													$res=$stmt->get_result();
													//$cnt=1;
													while($row=$res->fetch_object()) { ?>

													<div class="hr-dashed"></div>
													<div class="form-group">
														<label class="col-sm-2 control-label">Account No. </label>
														<div class="col-sm-8">
															<input type="text"  name="account" value="<?php echo $row->applicant_no;?>"  class="form-control"> </div>
														</div>

													<div class="form-group">
														<label class="col-sm-2 control-label">Amount Paid</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="amount" id="cns" value="<?php echo $row->amount;?>" required="required">
														</div>
													</div>

													<div class="form-group">
														<label class="col-sm-2 control-label">Exchange Rate</label>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="rate" value="<?php echo $row->exchange_rate;?>" >
														</div>
													</div>

												<?php } ?>
													<div class="col-sm-8 col-sm-offset-2">
														<input class="btn btn-primary" type="submit" name="submit" value="Update Payment">
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