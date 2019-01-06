<?php
	session_start();
	
	if(isset($_POST['t_passwd'])){
		$email = $_POST['t_email'];
		$passwd = $_POST['t_passwd'];
		$con = mysqli_connect("localhost", "root", "", "studentcard");
		$result = mysqli_query($con, "SELECT pass FROM teachers WHERE email='$email'");
		$arr = mysqli_fetch_array($result);
		if($arr[0] == $passwd){
			$_SESSION['teacher_id'] = $email;
			$_SESSION['logged_in'] = "teacher";
			unset($password_error);
			header("Location: Teacher");
		}
		else{
			$password_error = "Incorrect Email ID or Password";
		}
	}
	else{
		unset($password_error);
	}
	
	if(isset($_POST['student_id']) and $_POST['student_id'] != Null){
		$student_id = $_POST['student_id'];
		if($student_id < 10000){
			$student_id_error =  "Invalid Student ID!";
		}
		else{
			$con = mysqli_connect("localhost", "root", "", "studentcard");
			$result = mysqli_query($con, "SELECT * FROM students WHERE student_id=$student_id");
			$count = mysqli_num_rows($result);
			if($count==0){
				$_SESSION['student_id'] = $_POST['student_id'];
				$_SESSION['new_passwd'] = $_POST['password_stud1'];
				$_SESSION['logged_in'] = "student";
				unset($_SESSION['acc_created']);
				unset($student_id_error);
				header("Location: StudentDetails/Profile");
			}
			else{
				$student_id_error = "Student ID already exists";
			}
		}
	}
	else{
		unset($student_id_error);
	}
	
	if(isset($_POST['stud_id']) and $_POST['stud_id'] != Null){
		$student_id = $_POST['stud_id'];
		$passwd = $_POST['passwd'];
		$con = mysqli_connect("localhost", "root", "", "studentcard");
		$result = mysqli_query($con, "SELECT pass FROM students WHERE student_id=$student_id");
		$arr = mysqli_fetch_array($result);
		if($arr[0] == $passwd){
			$_SESSION['student_id'] = $student_id;
			$_SESSION['passwd'] = $passwd;
			$_SESSION['new_passwd'] = $passwd;
			$_SESSION['logged_in'] = "student";
			$_SESSION['acc_created'] = true;
			unset($student_login_error);
			header("Location: StudentDetails/Profile");
		}
		else{
			$student_login_error = "Incorrect Username or Password";
		}
	}
	else{
		unset($student_login_error);
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

<title>Student Card</title>

</head>

<body>
<style>
	body {
		background-image:url(assets/images/background.jpg);
		background-repeat:no-repeat;
		background-position:center;
		background-size:cover;
	}
</style>
<script language="JavaScript">
<!--
	var res = screen.width/15;
	document.write("<style>body{zoom:"+res+"%;}</style>");
-->
</script>
<h1 class="heading">Student Card</h1>

<div class="mid-cls">

<form class="main1" action="index.php" method="post">
	<div class="top-header">
		<h2>For Teachers</h2>
	</div>
	<div class="form-group icons">
			<span class="fas fa-envelope"></span>
			<input class="form-control" type = "email" name = "t_email" placeholder="Enter Email ID" required>
		</div>
	<div class="form-group icons">
		<span class="fas fa-lock"></span>
		<input class="form-control" type = "password" name = "t_passwd" placeholder="Enter Password" maxlength="16" required>
	</div>
	<div class="set">
		<?php if(isset($password_error)){echo $password_error;}?>
	</div>
	<div class="forgot">
		<a href="Teacher/ForgotPassword/">FORGOT PASSWORD...?</a>
	</div>
	<div class="buttons">
		<input type = "submit" name = "LOG IN AS A TEACHER" value = "LOG IN AS A TEACHER" />
	</div>
</form >	


<br><br>

<form class="main1" action="index.php" method="post" autocomplete="off">
		<div class="top-header">
			<h2>For Students</h2>
		</div>
		
		<div class="form-group icons">
			<span class="fas fa-id-badge"></span>
			<input class="form-control" type = "text" min="1" max="99999" name = "student_id" placeholder="Enter Student ID" maxlength="5" title="Must contain 5 digits" pattern="[0-9]{5}" required>
		</div>
		<div class="form-group icons">
			<span class="fas fa-lock"></span>
			<input class="form-control" type = "password" id="password" name = "password_stud1" placeholder="Enter Password" title="Must contain at least 6 and at most 16 characters" maxlength="16" pattern=".{6,}" required>
		</div>
		<div class="form-group icons">
			<span class="fas fa-lock"></span>
			<input class="form-control" type = "password" id="confirm_password" name = "password_stud2" placeholder="Re-enter Password" maxlength="16" required>
		</div>
		<span id='message'></span>
		<div class="set">
		<?php if(isset($student_id_error)){echo $student_id_error;}?>
		</div>
		<div class="buttons buttons1">
			<input type = "submit" id="button_create" value = "CREATE YOUR STUDENT CARD" /> 
		</div>
		<div class="sign-in">
			<p>Already created your card? <a href="" data-toggle="modal" data-target="#myModal">Sign-in</a></p>
		</div>
</form>
</div>

<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Sign In</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="index.php" method="post">
					<div class="form-group icons">
						<span class="fas fa-id-badge"></span>
						<input class="form-control" type = "number" min="1" max="99999" name = "stud_id" placeholder="Student ID" required>
					</div>
					<div class="form-group icons">
						<span class="fas fa-lock"></span>
						<input class="form-control" type = "password" name = "passwd" placeholder="Password" maxlength="16" required >
					</div>
					<div class="forgot" style="text-align:center">
						<a href="Student/ForgotPassword">FORGOT PASSWORD...?</a>
					</div>
					<button class="btn btn-success sign">Sign in</button>
				</form>
			</div>
		</div>	  
	</div>
</div>

<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
			<h4 class="modal-title"><i style="color:rgb(255,0,0);" class="fa fa-exclamation-triangle" aria-hidden="true"></i> <span style="color:rgb(255,0,0);">Warning</span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Incorrect Student ID or Password.</p>
        </div>
        <div class="modal-footer" >
          <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#myModal">OK</button>
        </div>
      </div>
    </div>
</div>
<?php if(isset($student_login_error)){
?>
	<script type="text/javascript">
    $(document).ready(function(){
        $("#myModal2").modal('show');
    });
	</script>
<?php
	}else{}
?>
<p class="copy">&copy;2018 Student Card. All rights reserved | Designed by <a href="#">Moh Maya</a></p>

<script>
$('#password, #confirm_password').on('keyup', function () {
	if (($('#password').val() != "") && $('#confirm_password').val() != ""){
		if ($('#password').val() == $('#confirm_password').val()) {
			$('#message').html('Password Matched').css('color', 'green');
			document.getElementById('button_create').type = "submit";
		}else{
			$('#message').html('Password Not Matched').css('color', 'red');
			document.getElementById('button_create').type = "button";
		}
	}
	else{
		$('#message').html('');
	}
});
</script>

</body>
</html>