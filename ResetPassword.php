<?php
session_start();
if(!(isset($_SESSION['logged_in']) || isset($_SESSION['forgot']))){header("Location: index.php");}
else if(isset($_SESSION['forgot']) && (!isset($_SESSION['otp_matched']) || (isset($_SESSION['otp_matched']) && $_SESSION['otp_matched']!=true))){
	header("Location: submitOTP.php");
}

else if(isset($_POST['cur_passwd'])){
	$con = mysqli_connect("localhost", "root", "", "studentcard");
	if($_SESSION['logged_in']=="teacher"){
		$result = mysqli_query($con, "SELECT pass FROM teachers WHERE email='".$_SESSION['teacher_id']."'");
		$arr = mysqli_fetch_array($result);
		if($arr[0] == $_POST['cur_passwd']){
			mysqli_query($con, "UPDATE teachers SET pass='".$_POST['new_pass']."' WHERE email='".$_SESSION['teacher_id']."'");
			header("Location: Teacher");
		}
		else{
			$password_error = "Incorrect Password";
		}
	}
	else if($_SESSION['logged_in']=="student"){
		$result = mysqli_query($con, "SELECT pass FROM students WHERE student_id=".$_SESSION['student_id']);
		$arr = mysqli_fetch_array($result);
		if($arr[0] == $_POST['cur_passwd']){
			mysqli_query($con, "UPDATE students SET pass='".$_POST['new_pass']."' WHERE student_id=".$_SESSION['student_id']);
			header("Location: StudentDetails/Profile");
		}
		else{
			$password_error = "Incorrect Password";
		}
	}
}
else if(isset($_POST['new_pass'])){
	$con = mysqli_connect("localhost", "root", "", "studentcard");
	if(isset($_SESSION['teacher'])){
		mysqli_query($con, "UPDATE teachers SET pass='".$_POST['new_pass']."' WHERE email='".$_SESSION['email'][1]."'");
	}
	else{
		mysqli_query($con, "UPDATE students SET pass='".$_POST['new_pass']."' WHERE email='".$_SESSION['email'][1]."'");
	}
	unset($_SESSION["otp_matched"]);
	header("Location: index.php");
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

<title>Reset Password</title>

</head>

<body>
	<style>
		body{background-color: rgba(0,163,232,0.9);
			<script language="JavaScript">
			<!--
			var res = screen.width/15;
			document.write("zoom:"+res+"%;");
			-->
			</script>
	</style>
	
	<div class="form">
		<form action="ResetPassword.php" method="post">
			<div class="top-head">
				<h2>Reset Password</h2>
			</div>
			<hr style="border-color:#AAAAAA;">
				<?php
					if(!isset($_SESSION["otp_matched"])){
						echo '<div class="form-group icons"><span class="fas fa-lock"></span><input class="form-control"  type = "password" name="cur_passwd" placeholder="Current Password" required></div>';
					}
				?>
				<div class="form-group icons">
					<span class="fas fa-lock"></span>
					<input class="form-control" id="password" type = "password" name="new_pass" placeholder="New Password" required>
				</div>
				<div class="form-group icons">
					<span class="fas fa-lock"></span>
					<input class="form-control" id="confirm_password" type = "password" name="cm_new_pass" placeholder="Confirm New Password" required>
				</div>
			<span id='message'></span>
			<div class="set">
				<?php if(isset($password_error)){echo $password_error;}?>
			</div>
			<div class="buttons" style="margin-left:30%;margin-right:30%">
				<input type = "submit" id="button_update" name = "update_pass" value = "Update Password" />
			</div>
		</form>
	</div>
<script>
$('#password, #confirm_password').on('keyup', function () {
	if (($('#password').val() != "") && $('#confirm_password').val() != ""){
		if ($('#password').val() == $('#confirm_password').val()) {
			$('#message').html('Password Matched').css('color', 'green');
			document.getElementById('button_update').type = "submit";
		}else{
			$('#message').html('Password Not Matched').css('color', 'red');
			document.getElementById('button_update').type = "button";
		}
	}
	else{
		$('#message').html('').css('color', 'green');
	}
});
</script>
</body>
</html>