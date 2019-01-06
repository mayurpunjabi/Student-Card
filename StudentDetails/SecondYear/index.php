<?php
session_start();
$_SESSION['create_card'] = "3";

if(isset($_SESSION['passwd'])){
	$con = mysqli_connect("localhost", "root", "", "studentcard");
	$result = mysqli_query($con, "SELECT sy_skills_lacked FROM students WHERE student_id=".$_SESSION['student_id']);
	$count = mysqli_num_rows($result);
	$arr = mysqli_fetch_array($result);
	$result = mysqli_query($con, "SELECT * FROM years WHERE year_id=".$_SESSION['student_id']."2");
	$arry = mysqli_fetch_array($result);
	$result = mysqli_query($con, "SELECT * FROM semester WHERE semester_id=3 AND year_id=".$_SESSION['student_id']."2");
	$arrs1 = mysqli_fetch_array($result);
	$result = mysqli_query($con, "SELECT * FROM semester WHERE semester_id=4 AND year_id=".$_SESSION['student_id']."2");
	$arrs2 = mysqli_fetch_array($result);
}
?>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!--link type="text/css" rel="stylesheet" href="index.css"-->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<title>Second Year</title>

<style>
h3,h4,h5{
	font-weight:400;
}

table input{
	text-align:center;
}

#heading {
	z-index:1;
	text-align:center;
	background-color:#2ab1f5;
	letter-spacing:3px;
	font-size:60px;
	color:white;
	position:sticky;
	top:0;
	text-shadow:2px 3px rgba(0,0,0,0.42);
	margin-bottom:0px;
}

textarea {
	width:100%;
}

.next {
	display:inline;
}

.prev {
	display:inline;
}
</style>

</head>
<body>
<div id="heading">
	Semester III and IV
</div>
<div class="container" style="box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);margin-top:0px;">
	<form action="../../assets/submission.php" method="post">
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group" style="margin-top:5px;">
					<h3>Student Roll No :</h3><input class="form-control" style="margin-top:5px;" type = "number" id="stud_no" name = "stud_no" placeholder="Enter your Roll Number"> 
				</div>
			</div>
			<div class="col-sm-8">
				<div class="form-group" style="margin-top:5px;">
					<h3>Name of your class coordinator:</h3><input class="form-control" style="margin-top:5px;" id="co_name" type = "text" name = "co_name" placeholder="Enter your Class Coordinator's Name">
				</div>
			</div>
		</div>
		
		<div class="form-group" style="margin-top:15px;">
			<h3>Did you join any summer internship program/job? If yes,please specify </h3>
			<textarea class="form-control" name="intern" rows = "3" cols = "90" id="intern" name = "intern"></textarea>
		</div>
				 
		<div class="form-group" style="margin-top:20px;">
			<h3>What are your goals for this year? How do you plan to work towards them?</h3>
			<textarea class="form-control" rows = "3" cols = "90" id="goals" name = "goals"></textarea>
		</div>

		<div class="form-group" style="margin-top:20px;">
			<h3>Class Coordinator suggestions/action and remarks for student's progression :</h3>
				<h4>Meeting 1</h4>
				<h5>Date:<input class="form-control" style="margin-top:5px;" type = "date" id="date1" name = "date1"> </h4>
				<textarea class="form-control" style="margin-top:5px;" rows = "3" cols = "100" id="description1" name = "description1" placeholder="Class Coordinator's Suggestions/Remarks"></textarea> 
				<h4 style="margin-top:10px;">Meeting 2</h4>
				<h5>Date:<input class="form-control" style="margin-top:5px;" type = "date" id="date2" name = "date2"> </h4>
				<textarea class="form-control" style="margin-top:5px;" rows = "3" cols = "100" id="description2" name = "description2" placeholder="Class Coordinator's Suggestions/Remarks"></textarea> 
		</div>
		
		<div class="form-group" style="margin-top:20px;">
			<h3>What changes would you like to bring in the college for the betterment of students?</h3>
			<textarea class="form-control" rows = "3" cols = "90" id="feedback1" name = "feedback1"></textarea>
		</div>
		
		<div class="form-group" style="margin-top:20px;">
			<h3>Have you been able to choose a career option for your self? What are the skills you are lacking for your choosen career option?</h3>
			<textarea class="form-control" rows = "3" cols = "90" id="skills" name = "skills"></textarea>
		</div>
		
		<div class="form-group" style="margin-top:20px;">
			<h3>Details of meeting  with Guardian,if any.</h3>
			<textarea class="form-control" style="margin-top:5px;" rows = "3" cols = "60" id="feedback2" name = "feedback2"></textarea>
		</div>

		<div class="form-group" style="margin-top:20px;">
			<TABLE class="table table-sm table-bordered" style="margin-top:20px;">
				<TR> 
					<Th></Th>
					<Th><h3 style="text-align:center;padding:5px;font-weight:400;">Semester III</h3></Th>
					<Th><h3 style="text-align:center;padding:5px;font-weight:400;">Semester IV</h3></Th>
				</TR>
					
				<TR>
					<Th><h4 style="text-align:center;padding:5px;font-weight:400;">Attendence</h4></Th>
					<TD>
						<INPUT class="form-control" type="number" step="0.01" id="attend1" name="attend1" size="30">
					</TD>
					<TD>
						<INPUT class="form-control" type="number" step="0.01" id="attend2" name="attend2" size="30">
					</TD>
				</TR>
				<TR>
					<Th><h4 style="text-align:center;padding:5px;font-weight:400;">GPA and Grade </h4></Th>
					<TD><INPUT class="form-control" type="text" id="gpa1" name="gpa1" size="50"></TD>
					<TD><INPUT class="form-control" type="text" id="gpa2" name="gpa2" size="50"></TD>
				</TR>
				
				<tr>
					<th><h4 style="text-align:center;padding:5px;font-weight:400;">Your Achievements this year</h4></th>
					<td><textarea class="form-control" rows = "3" cols = "100" id="achieve1" name = "achieve1"></textarea></td>
					<td><textarea class="form-control" rows = "3" cols = "100" id="achieve2" name = "achieve2"></textarea></td>
				</tr>
			</TABLE>
		</div>
	
		<div style="padding-left:40%;margin-bottom:20px;">
		<div class="prev">
			<a href="../FirstYear" class="btn btn-info" style="width:20%;text-align:center;margin:15px 0PX;">&laquo; Prev</a>
		</div>
		<div class="Next">
			<input type="submit" class="btn btn-success" style="width:20%;text-align:center;margin:15px 0px;" value="Next &raquo;">
		</div>
		</div>
	</form>
</div>

<?php
if(isset($count) and $count>0){
?>
	<script>
		document.getElementById("stud_no").value = "<?php echo $arry[1]; ?>";
		document.getElementById("co_name").value = "<?php echo $arry[2];?>";
		document.getElementById("intern").value = "<?php echo $arry[4];?>";
		document.getElementById("goals").value = "<?php echo $arry[5];?>";
		document.getElementById("date1").value = "<?php echo $arrs1[4];?>";
		document.getElementById("description1").value = "<?php echo trim(preg_replace('/\r?\n/', '\\n', $arrs1[5])); ?>";
		document.getElementById("date2").value = "<?php echo $arrs2[4];?>";
		document.getElementById("description2").value = "<?php echo trim(preg_replace('/\r?\n/', '\\n', $arrs2[5])); ?>";
		document.getElementById("feedback1").value = "<?php echo $arry[6];?>";
		document.getElementById("skills").value = "<?php echo $arry[6];?>";
		document.getElementById("feedback2").value = "<?php echo $arry[3];?>";
		document.getElementById("attend1").value = "<?php echo $arrs1[1];?>";
		document.getElementById("attend2").value = "<?php echo $arrs2[1];?>";
		document.getElementById("gpa1").value = "<?php echo $arrs1[2];?>";
		document.getElementById("gpa2").value = "<?php echo $arrs2[2];?>";
		document.getElementById("achieve1").value = "<?php echo $arrs1[3];?>";
		document.getElementById("achieve2").value = "<?php echo $arrs2[3];?>";	
	</script>
<?php 
}
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']=="student"){ 
?>
	<script>
		document.getElementById("date1").readOnly = true;
		document.getElementById("description1").readOnly = true;
		document.getElementById("date2").readOnly = true;
		document.getElementById("description2").readOnly = true;
		document.getElementById("feedback2").readOnly = true;
		if(document.getElementById("stud_no").value != ""){
		document.getElementById("stud_no").readOnly = true;}
		if(document.getElementById("co_name").value != ""){
		document.getElementById("co_name").readOnly = true;}
		if(document.getElementById("goals").value != ""){
		document.getElementById("goals").readOnly = true;}
		if(document.getElementById("intern").value != ""){
		document.getElementById("intern").readOnly = true;}
		if(document.getElementById("feedback1").value != ""){
		document.getElementById("feedback1").readOnly = true;}
		if(document.getElementById("skills").value != ""){
		document.getElementById("skills").readOnly = true;}
		if(document.getElementById("attend1").value != ""){
		document.getElementById("attend1").readOnly = true;}
		if(document.getElementById("attend2").value != ""){
		document.getElementById("attend2").readOnly = true;}
		if(document.getElementById("gpa1").value != ""){
		document.getElementById("gpa1").readOnly = true;}
		if(document.getElementById("gpa2").value != ""){
		document.getElementById("gpa2").readOnly = true;}
		if(document.getElementById("achieve1").value != ""){
		document.getElementById("achieve1").readOnly = true;}
		if(document.getElementById("achieve2").value != ""){
		document.getElementById("achieve2").readOnly = true;}
	</script>
<?php 
}
?>

</body>
</html>