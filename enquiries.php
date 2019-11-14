<?php
	session_start();
	include('includes/config.php');
	include('includes/checklogin.php');
	check_login();
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

		<title>Enquiries</title>

		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-social.css">
		<link rel="stylesheet" href="css/bootstrap-select.css">
		<link rel="stylesheet" href="css/fileinput.min.css">
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<?php include('includes/header.php');?>
		<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
			<div class="content-wrapper">
				<div class="container-fluid">
				
					<div class="row">
						<div class="col-md-12">
               				 <h2>Contact Us</h2>
           				</div>

						<div class="col-md-8 wrap-about py-5 ftco-animate"></div>
							<div class="feature_row row">
								<div class="col-md-8 col-md-offset-2">
									<div class="request-quote">
										<div class="bg-primary py-4">
											<span class="subheading">Be Part of our Business</span>
											<span class="subheading1">Enquire More Information</span>
										</div>

                        				<form action="https://formspree.io/info@pmhzw.com" method="POST" id="" name="contactForm" class="request-form ftco-animate">
                            				
											<fieldset id="fs-frm-inputs">
												<div class="form-group">
													<input id="name" name="name" type="text" class="form-control" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter your name">
												</div>
                                
												<div class="form-group">
													<input id="email" type="email" class="form-control" name="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
												</div>

												<div class="form-group">
													<input id="subject" type="text" class="form-control" name="text" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter a valid subject">
												</div>

												<div class="form-group">
													<textarea id="message" name="message"cols="30" rows="3" class="form-control" data-rule="required" data-msg="Please write something for us" placeholder="Your Message"></textarea>
												</div>
                                
												<div class="status"> </div>
                            
                                				<input type="hidden" name="subject" id="email-subject" value="Contact Form Submission">
                            				</fieldset>

											<div class="form-group">
												<div class="text-center">
													<input type="submit" name="submit" value="Send Request" class="btn btn-primary py-3 px-4">
												</div>
											</div>
                       					</form>
                   					</div>
               		 			</div>

								<?php	
									$aid=$_SESSION['id']; ?>
								<?php ?>
	
								</div>
							</div>
					
						</div>
					</div>
			
				</div>
			</div>
		</div>

		<!-- Loading Scripts -->
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