<?php
	session_start();

	require_once("../../assets/PHPMailer/PHPMailerAutoload.php");
	if(isset($_POST['student_id']) && $_POST['student_id']!=""){
		$con = mysqli_connect("localhost","root","","studentcard");
		$result = mysqli_query($con, "Select first_name,last_name,email from students where student_id=".$_POST['student_id']);
		$count = mysqli_num_rows($result);
		if ($count == 0){
			$password_error = "Student ID does not exist";
		}
		else{
			$arr = mysqli_fetch_array($result);
			$_SESSION['email'] = array($arr[0]." ".$arr[1], $arr[2]);
			$_SESSION['forgot'] = "s";
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
			<div class="des">Enter your Student ID. An OTP will be sent to the Email ID associated with your Student ID</div>
			<div class="form-group icons">
				<span class="fas fa-id-badge"></span>
				<input class="form-control" type = "number" name = "student_id" placeholder="Student ID" required>
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