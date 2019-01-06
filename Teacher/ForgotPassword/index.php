<?php
session_start();
require_once("../../assets/PHPMailer/PHPMailerAutoload.php");

$con = mysqli_connect("localhost","root","","studentcard");
$result = mysqli_query($con, "SELECT * FROM teachers");
$count = mysqli_num_rows($result);
$emails = mysqli_fetch_all($result);
$protected_emails[$count] = [];
for($i=0;$i<$count;$i=$i+1){
	$temp_email = "";
	for($j=0;$j<strlen($emails[$i][1]);$j=$j+1){
		if($j == 0 or $j > strlen($emails[$i][1])-16){
			$temp_email = $temp_email.$emails[$i][1][$j];
		}
		else{
			$temp_email = $temp_email."*";
		}
	}
	$protected_emails[$i] = $temp_email;
}

if(isset($_POST['email']) && $_POST['email']!=""){
	$con = mysqli_connect("localhost","root","","studentcard");
	$result = mysqli_query($con, "Select name,email from teachers where email='".$_POST['email']."'");
	$count = mysqli_num_rows($result);
	if ($count == 0){
		$password_error = "This Email ID is not registered";
	}
	else{
		$arr = mysqli_fetch_array($result);
		$_SESSION['email'] = array($arr[0], $arr[1]);
		$_SESSION['forgot'] = "t";
		header("Location: ../../assets/sendOTP.php");
	}
}
?>

<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link type="text/css" rel="stylesheet" href="../../assets/stylesheet.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<title>Forgot Password</title>

</head>

<body style="background-color: rgba(0,163,232,0.9);">
	<div class="form">
		<form action="index.php" method="post">
			<div class="top-head">
				<h2>Forgot Password</h2>
			</div>
			<hr style="border-color:#AAAAAA;">
			<div class="des">Enter Email ID associated with your account.</div>
			<div class="form-group icons">
				<span class="fas fa-envelope"></span>
				<input class="form-control" type = "email" name = "email" placeholder="Email ID" required>
			</div>
			<div class="set">
				<?php if(isset($password_error)){echo $password_error;}?>
			</div>
			<div class="buttons" style="margin-left:30%;margin-right:30%">
				<input type = "submit" name = "send_otp" value = "Send OTP" />
			</div>
		</form>
	</div>

</body>
</html>