<?php
    session_start();
	include('includes/config.php');
	date_default_timezone_set('Africa/Zimbabwe');
	include('includes/checklogin.php');
	check_login();
	$aid=$_SESSION['id'];
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
        <title>Terms and Conditions</title>
        
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
  </head>
  
  <body>
        <?php include('includes/header.php');?>
		<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
            <div class="content-wrapper">
                <form method="post" action="" class="form-horizontal">
                    <div class="container-fluid">
                        <h1>Conditions</h1>
                        <p> 1. The effective start date of the agreement is the date of its final authorized signature by Premier Mortgaging & Housing Private Limited. <br>
                            2. Effective subscription starts the day of the month upon initial installment date.<br>
                            3. Subscription period ranges from 5 years to 30 years.<br>
                            4. Monthly installment includes admin, interest and insurance charges.<br>
                            5. Insurance documents only obtainable through preferred financial advisor.<br>
                            6. Allocation of property is done upon payment of 30% of the mortgage value.<br>
                            7. In the event of passing on of the subscribing member, full settlement or installment balance of the property shall be paid by the insurance company to <br>
                                Premier Mortgaging & Housing Private Limited, upon which Premier Mortgaging & Housing Private Limited shall not reposes the property.<br>
                            8. On voluntary withdrawal, Premier Mortgaging & Housing Private Limited shall refund the subscribing member after having deducted 30% of total <br>
                                subscription to cover for insurance & administration costs. <br>
                            9. An administration fee is included in the instalment amount.<br>
                            10. Installment amount is subject to change in line with inflation rate.<br>
                            11. The insurance document shall be ceded to Premier Mortgaging & Housing Private Limited as collateral<br>
                        </p>
                    </div>

                    <div class="container-fluid">
                        <h1>Declaration and Authorization</h1>
                        <p> The information I have given on this application is correct and to the best of my knowledge. I agree to give Premier Mortgaging & Housing Private Limited<br>
                        of any changes which may affect the information I have given. <br>
                        <br>
                        <input type="checkbox" id="" name="" value="">
                        I understand that if I have given false or inaccurate information to Premier Mortgaging & Housing of any relevant changes in circumstances, that Premier <br>
                            Mortgaging & Housing Private Limited may defer, cancel or amend my application. <br>
                            <br>
                            <input type="checkbox" id="" name="" value="">
                            I authorize Premier Mortgaging & Housing Private Limited use of the information prescribed in this document for the purpose of conducting its Housing <br>
                            scheme and related businesses. I understand the informaon may be photocopied and agree that copies may be used to obtain the required information. <br>
                        </p>
                    </div>

                    <div class="container-fluid">
                        <h1>Cession of Assurance Conditions</h1>
                        <p> 1. The policy overleaf is ceded as security for any sums of money now or at any time hereafter due, owing or payable by the Mortgager to the Cessionary <br>
                            from whatever cause arising. <br>
                            2. The cession shall remain in force until cancelled by the Cessionary.<br>
                            3. The Cedent hereby undertakes to pay or cause to be paid all premiums due under the said Policy and to exhibit to the Cessionary the Premium Renewal <br> 
                            Receipts if called upon to do soby the Cessionary. The Cedent also acknowledges the Cessionary’s right to pay arrear premiums on the Cedent’s behalf <br>
                            and hereby undertakes to reimburse the Cessionary the amount so disbursed. <br>
                            4. The Cedent hereby appoints the Cessionary irrevocaby ad in rem suam with power of substitution to be the Cedent’s agent at any time to surrender <br>
                            the Policy and to appropriate the surrender value thereof on of the amount owing to the Cessionary by the Mortgagor in terms of Clause 1 hereof.<br>
                            5. The Cedent is bound hereby as surety in Solidium for and co-principal debtor with the Cessinary may hold the Surety liable for the whole debt and <br>
                            is not obliged to proceed against the Mortgagor. Under the law a Surety may demand that the Principal Debtor must be sued before any claim is made <br>
                            on the Surety and that thereafter the claim is made on the surety and that thereafter the claim against the surety can only be for the amount by which the <br>
                            Principal Debtor has may sue me for the full amount hereby guaranteed by me even though he may not have sued the Principal Debtor ﬁrst, and further <br>
                            that having renounced the “Beneﬁciaum Divisionis” I cannot be heard to say that if there are other guarantors of this debt then my liability should be <br>
                            reduced proportionately because having so renounced I bound fully as though there were no other such guarantors. Since I might not be bound if I did not <br>
                            renounce these beneﬁts, and as I am quite willing to be bound, I hereby renounce them. I acknowledge that I understood their meaning and what I am <br>
                            doing in renouncing them. <br>
                            6. If the policy shall become payable for any reason whatsoever the Cessionary shall have the right to appropriate all or a portion of the proceeds <br>
                            thereof towards the Mortgagor’s liability under Clause 1 hereof. <br>
                            7. The Cedents liability hereunder is limited to the proceeds of the Policy.<br>
                        </p>
                    </div>
                    <div class="col-sm-6 col-sm-offset-4">
                        <!-- <button class="btn btn-default" type="submit">Prev</button> -->
                        <input type="submit" name="submit" Value="Proceed" class="btn btn-primary">
                    </div>
                </form>
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