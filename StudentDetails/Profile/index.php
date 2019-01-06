<?php
session_start();
if(isset($_GET['student_id'])){
	$_SESSION['student_id'] = $_GET['student_id'];
	$_SESSION['passwd'] = "";
	$_SESSION['new_passwd'] = "";	
	$_SESSION['logged_in'] = "teacher";
	$_SESSION['acc_created'] = true;
}

$_SESSION['create_card'] = "1";

if(isset($_SESSION['acc_created'])){
	$con = mysqli_connect("localhost", "root", "", "studentcard");
	$result = mysqli_query($con, "SELECT * FROM students WHERE student_id=".$_SESSION['student_id']);
	$count = mysqli_num_rows($result);
	$arr = mysqli_fetch_array($result);
	$result = mysqli_query($con, "SELECT * FROM school WHERE school_id=".$arr[26]."");
	$arrs = mysqli_fetch_array($result);
	$result = mysqli_query($con, "SELECT * FROM jrcollege WHERE jrcollege_id=".$arr[27]."");
	$arrj = mysqli_fetch_array($result);
	$result = mysqli_query($con, "SELECT * FROM parents WHERE parent_id=".$arr[28]."");
	$arrp = mysqli_fetch_array($result);
}
?>

<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link type="text/css" rel="stylesheet" href="../../assets/stylesheet2.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<title>Profile</title>

<script type = "txt/javascript">
	function updatepicture(pic){
	document.getElementById("image").setAttribute("src",pic);
	}
</script>	
</head>
<body>


<div class="main">
<div class="main" style="padding:20px;">
<img src="../../assets/images/logo.png" id="logo" class="img-responsive">
<h1>Vivekananda Education Society's College of Arts, Science and Commerce</h1>
<h2>Sindhi Society, Chembur - Mumbai 400 071</h2>
</div>
</div>

<div class="main" id="heading">
<b>Student Card</b>
</div>

<div class="container" style="box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);">
<div id="img-upload">
<form method = "post" action = "../../assets/submission.php" enctype="multipart/form-data" autocomplete="on">
<div class="box">
<span id="uploaded_image"></span>
</div>
<div class="img-btn">
<input class="btn" type= "file" id="file" name ="file" <?php if(!isset($_SESSION['acc_created'])){echo "required";}?>><br>
</div>
</div>


	<div>
		<h2 style="padding-top:5px;"><b>PERSONAL DETAILS</b></h2>
	</div>
	
	<h4>
	<div class="form-group inputs">
		Name : <span style="color:red">*</span>
		<input class="form-control" style="margin-top:5px;" type = "text" id="first_name" name = "first_name" placeholder="First Name" maxlength="20" required>
		<input class="form-control" style="margin-top:5px;" type = "text" id="mid_name" name = "mid_name" placeholder="Middle Name" maxlength="20" required>
		<input class="form-control" style="margin-top:5px;" type = "text" id="last_name" name = "last_name" placeholder="Last Name" maxlength="20">
	</div>
	<div class="form-group" style="padding-top:10px;padding-bottom:8px;">
		Blood Group : <select id="blood" name = "blood">
						<option value = "A+" selected>A+</option>
						<option value = "A-">A-</option>
						<option value = "B+">B+</option>
						<option value = "B-">B-</option>
						<option value = "AB+">AB+</option>
						<option value = "AB-">AB-</option>
						<option value = "O+">O+</option>
						<option value = "O-">O-</option>
					 </select><span style="color:red">*</span>
	</div>
	<div class="form-group ">
		Address : <span style="color:red">*</span> <?php if(isset($count)){echo "<span style=\"font-size:17px;font-weight:400;\">[ <a  href=\"javascript:enable('addr');\">edit</a> ]</span>";}?><textarea class="form-control" style="margin-top:5px;" rows = "4" cols = "50" id="addr" maxlength="150" name = "addr" placeholder="Enter your current Home Address" required></textarea>
	</div>
	<div class="form-group">
		Mobile No : <span style="color:red">*</span> <?php if(isset($count)){echo "<span style=\"font-size:17px;font-weight:400;\">[ <a  href=\"javascript:enable('mobile_no');\">edit</a> ]</span>";}?><input class="form-control" style="margin-top:5px;" type = "text" id="mobile_no" name = "mobile_no"  placeholder="Enter your Mobile Number" maxlength="10" title="Must contain 10 digits" pattern="[0-9]{10}" required>
	</div>
	<div class="form-group">
		Email ID : <span style="color:red">*</span> <?php if(isset($count)){echo "<span style=\"font-size:17px;font-weight:400;\">[ <a  href=\"javascript:enable('email_id');\">edit</a> ]</span>";}?><input class="form-control" style="margin-top:5px;" type = "email" id="email_id" name = "email_id" placeholder="Enter your Email-ID" required>
	</div>
	</h4>

	<div>
		<h2 style="padding-top:5px;"><b>SCHOOL DETAILS</b></h2>
	</div>
	<h4>
		<div class="form-group">
			School Name : <span style="color:red">*</span> <input class="form-control" style="margin-top:5px;" maxlength="100" type = "text" id="school_name" name = "school_name" placeholder="Enter your School Name" required >
		</div>
		<div class="form-group">
			Medium : <input class="form-control" style="margin-top:5px;"type = "text" maxlength="10" id="s_medium" name = "s_medium" placeholder="Enter Medium"> 
		</div>
		<div class="form-group">
			Board : <input class="form-control" style="margin-top:5px;" type = "text" maxlength="100" id="s_board" name = "s_board" placeholder="Enter your Board Name"  >
		</div>
		<div class="form-group">
			Scored : <span style="color:red">*</span> <input class="form-control" style="margin-top:5px;" type = "number" id="Xscored" name = "Xscored" step="0.01" placeholder="Enter your Score in % or C.G.P.A" max="100.00" required >
		</div>
	</h4>


	<div>
		<h2 style="padding-top:5px;"><b>COLLEGE DETAILS</b></h2>
	</div>
	<h4>
		<div class="form-group">
			Jr.College Name : <span style="color:red">*</span> <input class="form-control" style="margin-top:5px;" maxlength="100" type = "text" id="j_name" name = "j_name" placeholder="Enter your Junior College Name"  required>
		</div>
		<div class="form-group">
			Medium : <input class="form-control" style="margin-top:5px;" type = "text" maxlength="10" id="j_medium" name = "j_medium" placeholder="Enter Medium"> 
		</div>
		<div class="form-group">
			Board :  <input class="form-control" style="margin-top:5px;" type = "text" maxlength="100" id="j_board" name = "j_board" placeholder="Enter your Board Name"  >
		</div>
		<div class="form-group">
			Scored : <span style="color:red">*</span> <input class="form-control" style="margin-top:5px;" type = "number" id="XIIscored" name = "XIIscored" step="0.01" placeholder="Enter your Score in % or C.G.P.A" max="100.00" required>
		</div>
	</h4>

	
	<div>
		<h2 style="padding-top:5px;"><b>PARENTS/GUARDIANS DETAILS</b></h2>
	</div>
	<h4>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					Father's Name : <span style="color:red">*</span> <input class="form-control" style="margin-top:5px;" maxlength="60" type = "text" id="father_name" name = "father_name" placeholder="Enter your Father's Name" required >
				</div>
				<div class="form-group">
					Father's Education : <span style="color:red">*</span> <input class="form-control" style="margin-top:5px;" maxlength="60" type = "text" id="f_education" name = "f_education" placeholder="Enter your Father's Education" required >
				</div>
				<div class="form-group">
					Father's Occupation : <span style="color:red">*</span> <input class="form-control" style="margin-top:5px;" maxlength="60" type = "text" id="f_occupation" name = "f_occupation" placeholder="Enter your Father's Occupation" required >
				</div>
				<div class="form-group">
					Father's Email Id : <input class="form-control" style="margin-top:5px;" maxlength="60" type = "email" id="f_emailid" name = "f_emailid" placeholder="Enter your Father's Email-ID">
				</div>
				<div class="form-group">
					Father's Mobile No : <span style="color:red">*</span> <input class="form-control" style="margin-top:5px;" maxlength="10" type = "text" id="f_mobno" name = "f_mobno" placeholder="Enter your Father's Mobile Number" title="Must contain 10 digits" pattern="[0-9]{10}" required>
				</div>
			</div>
	
			<div class="col-sm-6">
				<div class="form-group">
					Mother's Name : <span style="color:red">*</span> <input class="form-control" style="margin-top:5px;" maxlength="60" type = "text" id="mother_name" name = "mother_name" placeholder="Enter your Mother's Name"  required>
				</div>
				<div class="form-group">
					Mother's Education : <span style="color:red">*</span> <input class="form-control" style="margin-top:5px;" maxlength="60" type = "text" id="m_education" name = "m_education" placeholder="Enter your Mother's Education" required>
				</div>
				<div class="form-group">
					Mother's Occupation : <span style="color:red">*</span> <input class="form-control" style="margin-top:5px;" maxlength="60" type = "text" id="m_occupation" name = "m_occupation" placeholder="Enter your Mother's Occupation"  required>
				</div>
				<div class="form-group">
					Mother's Email Id : <input class="form-control" style="margin-top:5px;" maxlength="60" type = "email" id="m_emailid" name = "m_emailid" placeholder="Enter your Mother's Email-ID"  title="Must contain 10 digits">
				</div>
				<div class="form-group">
					Mother's Mobile No : <span style="color:red">*</span> <input class="form-control" style="margin-top:5px;" maxlength="10" type = "text" id="m_mobno" name = "m_mobno" placeholder="Enter your Mother's Mobile Number" pattern="[0-9]{10}" required>
				</div>
			</div>
		</div>
	
	
		<div>
			<h2 style="padding-top:5px;"><b>OTHER DETAILS</b></h2>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					No. of Siblings : <span style="color:red">*</span> <input class="form-control" style="margin-top:5px;" type = "number" min="0" max="99" id="sibiling_No" name = "sibling_No" placeholder="Enter the number of Sibling(s)" required>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					Student Enrolment Year : <span style="color:red">*</span> <input class="form-control" style="margin-top:5px;" type = "number" min="1947" max="3000" maxlength="4" id="year" name = "year" placeholder="Enter your Enrolment Year"  required>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					Program : <select id="program" name = "program">
								<option value = "BSc" selected>B.Sc.</option>
								<option value = "B.A.">B.A.</option>
								<option value = "Bcom">B.Com.</option>
							 </select>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					Course : <select id="course" name = "course">
								<option value = "Computer Science" selected>Computer Science</option>
								<option value = "Information Technology">Information Technology</option>
								<option value = "Biotechnology">Biotechnology</option>
							 </select>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					Prn No.: <span style="color:red">*</span> <input class="form-control" style="margin-top:5px;" type = "text" maxlength="16" title="Must contain 16 digits" pattern="[([0-9]{16})(0)]" id="prn_No" name = "prn_No" placeholder="Enter your PRN Number" required>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					Student ID : <input class="form-control" style="margin-top:5px;" type = "number" id="student_id" name = "student_id" value="<?php echo $_SESSION['student_id'] ?>" disabled>
				</div>
			</div>
		</div>
			
		<div class="form-group">
			Hobbies : <span style="color:red">*</span> <?php if(isset($count)){echo "<span style=\"font-size:17px;font-weight:400;\">[ <a  href=\"javascript:enable('hobby');\">edit</a> ]</span>";}?><input class="form-control" style="margin-top:5px;" maxlength="150" type = "text" id="hobby" name = "hobby" placeholder="Enter your Hobbies" required>
		</div>

	<div style="margin-top:5px;">
		Any Other Course You have Enrolled for : <span style="color:red">*</span>
			<label class="radio-inline"><input type="radio" id="Yes1" name="optradio1" value="Yes1"> Yes</label>
			<label class="radio-inline"><input type="radio" id="No1" name="optradio1" value="No1" checked> No</label>
	</div>

	<div style="margin-top:5px;">
		Are you working to support your family : <span style="color:red">*</span>
			<label class="radio-inline"><input type="radio" id="Yes2" name="optradio2" value="Yes2"> Yes</label>
			<label class="radio-inline"><input type="radio" id="No2" name="optradio2" value="No2" checked> No</label>
	</div>

	<div style="margin-top:5px;">
		Do You have any severe health problem : <span style="color:red">*</span>
			<label class="radio-inline"><input type="radio" id="Yes3" name="optradio3" value="Yes3"> Yes</label>
			<label class="radio-inline"><input type="radio" id="No3" name="optradio3" value="No3" checked> No</label>
	</div>

		
<div class="Next" style="padding-left:45%;">
	<input type="submit" class="btn btn-success" style="width:15%;text-align:center;margin:15px 0px;" value="Next &raquo;">
</div>

</h4>
</form>
</div>	 

<script>
$(document).ready(function(){
 $(document).on('change', '#file', function(){
  var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Image File Size is very big");
  }
  else
  {
   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"../../assets/upload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image').html("<img src='../../uploads/"+<?php echo $_SESSION['student_id']; ?>+".jpg' style='width:206px;height:206px;'>");
    }
   });
  }
 });
});

function enable(id){
	document.getElementById(id).readOnly = false;
}
</script>


<?php
if(isset($count) and $count>0){
?>
	<script>
		document.getElementById("first_name").value = "<?php echo $arr[1]; ?>";
		document.getElementById("mid_name").value = "<?php echo $arr[2];?>";
		document.getElementById("last_name").value = "<?php echo $arr[3];?>";
		document.getElementById("addr").value = "<?php echo trim(preg_replace('/\r?\n/', '\\n', $arr[4])); ?>";
		document.getElementById("mobile_no").value = "<?php echo $arr[6];?>";
		document.getElementById("email_id").value = "<?php echo $arr[7];?>";
		document.getElementById("school_name").value = "<?php echo $arrs[1];?>";
		document.getElementById("s_medium").value = "<?php echo $arrs[3];?>";
		document.getElementById("s_board").value = "<?php echo $arrs[2];?>";
		document.getElementById("Xscored").value = "<?php echo $arr[9];?>";
		document.getElementById("j_name").value = "<?php echo $arrj[1];?>";
		document.getElementById("j_medium").value = "<?php echo $arrj[3];?>";
		document.getElementById("j_board").value = "<?php echo $arrj[2];?>";
		document.getElementById("XIIscored").value = "<?php echo $arr[10];?>";
		document.getElementById("father_name").value = "<?php echo $arrp[1];?>";
		document.getElementById("mother_name").value = "<?php echo $arrp[6];?>";
		document.getElementById("f_education").value = "<?php echo $arrp[2];?>";
		document.getElementById("m_education").value = "<?php echo $arrp[7];?>";
		document.getElementById("f_occupation").value = "<?php echo $arrp[3];?>";
		document.getElementById("m_occupation").value = "<?php echo $arrp[8];?>";
		document.getElementById("f_emailid").value = "<?php echo $arrp[4];?>";
		document.getElementById("m_emailid").value = "<?php echo $arrp[9];?>";
		document.getElementById("f_mobno").value = "<?php echo $arrp[5];?>";
		document.getElementById("m_mobno").value = "<?php echo $arrp[10];?>";
		document.getElementById("sibiling_No").value = "<?php echo $arr[11]; ?>";
		document.getElementById("year").value = "<?php echo $arr[12];?>";
		document.getElementById("prn_No").value = "<?php echo $arr[15];?>";
		document.getElementById("hobby").value = "<?php echo $arr[16];?>";
		document.getElementById("blood").value = "<?php echo $arr[5];?>";
		document.getElementById("program").value = "<?php echo $arr[13];?>";
		document.getElementById("course").value = "<?php echo $arr[14];?>";
		document.getElementById("uploaded_image").innerHTML = "<img src='../../uploads/"+<?php echo $_SESSION['student_id']; ?>+".jpg' style='width:206px;height:206px;'>";
		document.getElementById("<?php echo $arr[17] ?>").checked = true;
		document.getElementById("<?php echo $arr[18] ?>").checked = true;
		document.getElementById("<?php echo $arr[19] ?>").checked = true;
		
		
		document.getElementById("first_name").readOnly = true;
		document.getElementById("mid_name").readOnly = true;
		document.getElementById("last_name").readOnly = true;
		document.getElementById("addr").readOnly = true;
		document.getElementById("mobile_no").readOnly = true;
		document.getElementById("email_id").readOnly = true;
		document.getElementById("school_name").readOnly = true;
		document.getElementById("s_medium").readOnly = true;
		document.getElementById("s_board").readOnly = true;
		document.getElementById("Xscored").readOnly = true;
		document.getElementById("j_name").readOnly = true;
		document.getElementById("j_medium").readOnly = true;
		document.getElementById("j_board").readOnly = true;
		document.getElementById("XIIscored").readOnly = true;
		document.getElementById("father_name").readOnly = true;
		document.getElementById("mother_name").readOnly = true;
		document.getElementById("f_education").readOnly = true;
		document.getElementById("m_education").readOnly = true;
		document.getElementById("f_occupation").readOnly = true;
		document.getElementById("m_occupation").readOnly = true;
		document.getElementById("f_emailid").readOnly = true;
		document.getElementById("m_emailid").readOnly = true;
		document.getElementById("f_mobno").readOnly = true;
		document.getElementById("m_mobno").readOnly = true;
		document.getElementById("sibiling_No").readOnly = true;
		document.getElementById("year").readOnly = true;
		document.getElementById("prn_No").readOnly = true;
		document.getElementById("hobby").readOnly = true;
		document.getElementById("blood").disabled = true;
		document.getElementById("program").disabled = true;
		document.getElementById("course").disabled = true;
		document.getElementById("Yes1").disabled = true;
		document.getElementById("Yes2").disabled = true;
		document.getElementById("Yes3").disabled = true;
		document.getElementById("No1").disabled = true;
		document.getElementById("No2").disabled = true;
		document.getElementById("No3").disabled = true;
	</script>
<?php 
}
?>

</body>
</html>