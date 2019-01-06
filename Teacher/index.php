<!DOCTYPE html>

<?php
session_start();
if(isset($_POST['search'])){
	$con = mysqli_connect("localhost", "root", "", "studentcard");
	
	$str = explode(' ', $_POST['search']);
	$str_len = sizeof($str);
	for($i=0;$i<$str_len;$i=$i+1){
		if($str[$str_len-1]==""){
			$str_len -= 1;
		}
		else{
			break;
		}
	}
	if($str_len==1){
		$result = mysqli_query($con, "SELECT student_id,first_name,last_name FROM students WHERE first_name LIKE '%".$str[0]."%' OR middle_name LIKE '%".$str[0]."%' OR last_name LIKE '%".$str[0]."%'");
		$arr = mysqli_fetch_all($result);
	}
	else if($str_len==2){
		$result = mysqli_query($con, "SELECT student_id,first_name,last_name FROM students WHERE (first_name LIKE '%".$str[0]."%' AND last_name LIKE '%".$str[1]."%') OR (last_name LIKE '%".$str[0]."%' AND first_name LIKE '%".$str[1]."%') OR (first_name LIKE '%".$str[0]."%' AND middle_name LIKE '%".$str[1]."%')");
		$arr = mysqli_fetch_all($result);
	}
	else if($str_len==3){
		$result = mysqli_query($con, "SELECT student_id,first_name,last_name FROM students WHERE (first_name LIKE '%".$str[0]."%' AND middle_name LIKE '%".$str[1]."%' AND last_name LIKE '%".$str[2]."%') OR (last_name LIKE '%".$str[0]."%' AND first_name LIKE '%".$str[1]."%' AND middle_name LIKE '%".$str[2]."%') OR (first_name LIKE '%".$str[0]."%' AND last_name LIKE '%".$str[1]."%' AND middle_name LIKE '%".$str[2]."%')");
		$arr = mysqli_fetch_all($result);
	}
	else if($str_len==4){
		$result = mysqli_query($con, "SELECT student_id,first_name,last_name FROM students WHERE (first_name LIKE '%".$str[0]."%' AND last_name LIKE '%".$str[1]." ".$str[2]."%' AND last_name LIKE '%".$str[3]."%') OR (last_name LIKE '%".$str[0]."%' AND first_name LIKE '%".$str[1]."%' AND middle_name LIKE '%".$str[2]." ".$str[3]."%')");
		$arr = mysqli_fetch_all($result);
	}	
}
?>

<html lang="en">
<head>
 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" type="css/text" href="css/stylesheet.css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<title>Teacher | Home</title>

<style>
.dropdown-list {
	width:100%;
	padding:5px 4px;
	border:1px solid grey;
}	
body{
	background-color: rgba(0,163,232,0.9);
}
.container {
	margin:110px auto;
	background: rgba(255, 255, 255, 1);
	padding:0;
}
.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
	padding:0;
	margin-bottom:2%;
	margin-right:2%;
	width:18%;
	text-decoration:none;
	color:black;
}

.card:hover {
	text-decoration:none;
	color:black;	
    box-shadow: 0 13px 30px 0 rgba(0,0,0,0.2);
}
</style>

</head>
<body>
	<div class="container">
		<nav class="navbar navbar-dark bg-dark">
			<span class="navbar-brand" style="color:white;font-size:25px;"><b><i class="fas fa-home"></i> Home</b></span>	
				<ul class="nav">
					<li class="dropdown">
					<button type="button" class="navbar-toggler" data-toggle="dropdown">
						<span class="navbar-toggler-icon"></span>
					</button>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a class="dropdown-item" href=""><i class="fas fa-home"></i> Home</a></li>
						<li><a class="dropdown-item" href="../ResetPassword.php"><i class="fab fa-expeditedssl"></i> Change Password</a></li>
						<li><div class="dropdown-divider"></div></li>
						<li><a class="dropdown-item" href=""><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
					</ul>
					</li>
				</ul>
		</nav>
		<div style="padding:5px 20px;">
		<form class="form-group" action="" method="post">
			<h4 style="margin-top:20px;">Search for Students Data:</h4>
			<div class="input-group" style="border:1px solid grey;">
				<input type="text" class="form-control" placeholder="Search by Name" name="search" required>
				<div class="input-group-btn" style="border:1px solid grey;">
					<button class="btn btn-default" type="submit">
						<i style="font-size:22px;" class="fas fa-search"></i>
					</button>
				</div>
			</div>
		</form>
		<form class="form-group">
			<div>
				<h4 style="margin-top:20px;">Select the Year:</h4>
				<select id="year" class="dropdown-list"></select>
				<script>
					var start = 2000;
					var end = new Date().getFullYear();
					var options = "";
					for(var year = end; year >= start; year--){
					  options += "<option>"+ year + "-" + (year+1) +"</option>";
					}
					document.getElementById("year").innerHTML = options;
				</script>
			</div>
			<div>
				<h4 style="margin-top:20px;">Select the Batch:</h4>
				<input style="margin-top:10px;text-align:center;width:33%;" type="button" class="btn btn-success" name="fycs" value="FY" onclick="showResults(1)"> 
				<input style="margin-top:10px;text-align:center;width:33%;" type="button" class="btn btn-success" name="sycs" value="SY" onclick="showResults(2)">
				<input style="margin-top:10px;text-align:center;width:33%;" type="button" class="btn btn-success" name="tycs" value="TY" onclick="showResults(3)">
			</div>
	   </form>
	   </div>
	   <div id="results">
		<?php
			if(isset($arr)){
				echo "<div style='margin:0% 2%;padding-bottom:1%;'><h2 style='font-weight:700;'>RESULTS:</h2><hr style='margin-top:0%;'><div class='row' style='margin:0% 3%;'>";
				foreach($arr as $value){
					echo "<a href='../StudentDetails/Profile/index.php?student_id=".$value[0]."' class='col-sm-2.5 card'>
					  <img src='../uploads/".$value[0].".jpg' alt='Student' style='height:170px'>
					  <div>
						<p style='text-align:center;font-size:20px;margin:0 4%'><b>".$value[1]." ".$value[2]."</b></p> 
						<p style='text-align:center;'>".$value[0]."</p> 
					  </div>
					</a>";
				}
				echo "</div></div>";
			}
		?>
		</div>
	</div>
<script>
function showResults(year){
	var b = document.getElementById("year").value.split("-", 1);
	b = parseInt(b);
	b = b + 1 - year;
	$.ajax({
        url:"../assets/search.php",
		type: "POST",
		data:{year:b},
		beforeSend:function(){
			$('#results').html("<label class='text-success'>Loading...</label>");
		},  
		success:function(data){
			$('#results').html("<div style='margin:0% 2%;padding-bottom:1%;'><h2 style='font-weight:700;'>RESULTS:</h2><hr style='margin-top:0%;'><div class='row' style='margin:0% 3%;'>"+data+"</div></div>");
		}
    });
}	

</script>
</body>
</html>﻿