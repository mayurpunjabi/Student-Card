<?php
session_start();
$_SESSION["otp_matched"] = false;
if(isset($_POST['otp'])){
	if((int)$_POST['otp'] == (int)$_SESSION['otp_pass']){
		$_SESSION["otp_matched"] = true;
		header("Location: ResetPassword.php");
	}
	else{
		$password_error = "Incorrect OTP";
	}
}
?>

<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link type="text/css" rel="stylesheet" href="assets/stylesheet.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<title>Forgot Password</title>

</head>

<body>
	<style>
		body{background-color: rgba(0,163,232,0.9);}
	</style>
	
	<div class="form">
		<form action="submitOTP.php" method="post">
			<div class="side">
			<div class="top-head">
				<h2>Validate OTP</h2>
			</div>
			<?php if(isset($_SESSION['teacher']))
					{echo "<a href='Teacher/ForgotPassword' style='padding-top:32px'><< Re-Enter Email ID</a>";}
				else
					{echo "<a href='Student/ForgotPassword' style='padding-top:32px;margin-left:25%'><< Re-Enter Student ID</a>";}
			?>
			</div>
			<hr style="border-color:#AAAAAA;">
			<div class="des">A One Time Password has been sent to abcdefghij@wxyz.com</div>
			<div class="des">Please enter the OTP below to verify your Email Address. If you cannot see the email from "StudentCard Admin" in your inbox, make sure to check your SPAM folder.</div>
			<div class="side">
				<div class="form-group icons" style="width:75%">
					<span class="fas fa-lock"></span>
					<input class="form-control" type = "number" name="otp" placeholder="Enter OTP" required>
				</div>
				<div class="forgot" style="width:25%">
						<a href="assets/sendOTP.php">Resend OTP</a>
				</div>
			</div>
			<div class="set">
				<?php if(isset($password_error)){echo $password_error;}?>
			</div>
			<div class="buttons" style="margin-left:30%;margin-right:30%">
				<input type = "submit" name = "submit" value = "Submit" />
			</div>
		</form>
	</div>
</body>
</html>