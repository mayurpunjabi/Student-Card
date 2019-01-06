<?php
session_start();
if(!isset($_SESSION['create_card'])){header("Location: ../");}
$con = mysqli_connect("localhost", "root", "", "studentcard");
$result = mysqli_query($con, "SELECT roll_no FROM years WHERE year_id=".$_SESSION['student_id']."3");
$arr1 = mysqli_fetch_array($result);
$result = mysqli_query($con, "SELECT gpa_grade FROM semester WHERE semester_id=6 AND year_id=".$_SESSION['student_id']."3");
$arr2 = mysqli_fetch_array($result);
$result = mysqli_query($con, "SELECT roll_no FROM years WHERE year_id=".$_SESSION['student_id']."2");
$arr3 = mysqli_fetch_array($result);
$result = mysqli_query($con, "SELECT roll_no FROM years WHERE year_id=".$_SESSION['student_id']."1");
$arr4 = mysqli_fetch_array($result);
if(isset($arr1[0]) && $arr1[0] > 0 && isset($arr2[0]) && $arr2[0]!=""){
	mysqli_query($con, "UPDATE students SET current_year=4 WHERE student_id=".$_SESSION['student_id']);
}
else if(isset($arr1[0]) && $arr1[0] > 0){
	mysqli_query($con, "UPDATE students SET current_year=3 WHERE student_id=".$_SESSION['student_id']);
	echo mysqli_error($con);
}
else if(isset($arr3[0]) && $arr3[0] > 0){
	mysqli_query($con, "UPDATE students SET current_year=2 WHERE student_id=".$_SESSION['student_id']);
}
else if(isset($arr4[0]) && $arr4[0] > 0){
	mysqli_query($con, "UPDATE students SET current_year=1 WHERE student_id=".$_SESSION['student_id']);
}

if($_SESSION['create_card']=="1"){
	if(!isset($_POST['blood'])){
		$result = mysqli_query($con, "SELECT blood_group, program, course, other_course, working, health_problem FROM students WHERE student_id='".$_SESSION['student_id']."'");
		$arr = mysqli_fetch_array($result);
		$blood = $arr[0];
		$program = $arr[1];
		$course = $arr[2];
		$other_course = $arr[3];
		$working = $arr[4];
		$health_problem = $arr[5];
	}
	else{
		$blood = $_POST['blood'];
		$program = $_POST['program'];
		$course = $_POST['course'];
		$other_course = $_POST['optradio1'];
		$working = $_POST['optradio2'];
		$health_problem = $_POST['optradio3'];
	}
	
		$_SESSION['student_id'] = (int)$_SESSION['student_id'];
		$con = mysqli_connect("localhost", "root", "", "studentcard");

		$result = mysqli_query($con, "SELECT school_id FROM school WHERE name LIKE '%".$_POST['school_name']."%'");
		$count = mysqli_num_rows($result);
		if($count>0){
			$arr = mysqli_fetch_all($result);
			$school_id = $arr[0][0];
		}
		else{
			$result = mysqli_query($con, "INSERT INTO school VALUES(".$_SESSION['student_id'].", '".$_POST['school_name']."', '".$_POST['s_board']."', '".$_POST['s_medium']."')");
			$school_id = $_SESSION['student_id'];
		}

		$result = mysqli_query($con, "SELECT jrcollege_id FROM jrcollege WHERE name LIKE '%".$_POST['j_name']."%'");
		$count = mysqli_num_rows($result);
		if($count>0){
			$arr = mysqli_fetch_all($result);
			$jrcollege_id = $arr[0][0];
		}
		else{
			$result = mysqli_query($con, "INSERT INTO jrcollege VALUES(".$_SESSION['student_id'].", '".$_POST['j_name']."', '".$_POST['j_board']."', '".$_POST['j_medium']."')");
			$jrcollege_id = $_SESSION['student_id'];
		}

		mysqli_query($con, "INSERT INTO parents VALUES(".$_SESSION['student_id'].", '".$_POST['father_name']."', '".$_POST['f_education']."', 
		'".$_POST['f_occupation']."', '".$_POST['f_emailid']."', ".$_POST['f_mobno'].", '".$_POST['mother_name']."', '".$_POST['m_education']."', 
		'".$_POST['m_occupation']."', '".$_POST['m_emailid']."', ".$_POST['m_mobno'].")");

	$result = mysqli_query($con, "INSERT INTO students (student_id, school_id, jrcollege_id, parent_id) VALUES(".$_SESSION['student_id'].", ".$school_id.", ".$jrcollege_id.", ".$_SESSION['student_id'].")");
	echo mysqli_error($con);

	$result = mysqli_query($con, "UPDATE students SET first_name='".$_POST['first_name']."', middle_name='".$_POST['mid_name']."', last_name='".$_POST['last_name']."', address='".$_POST['addr']."', blood_group='".$blood."', phone=".$_POST['mobile_no'].", email='".$_POST['email_id']."', pass='".$_SESSION['new_passwd']."', X_percent=".$_POST['Xscored'].", XII_percent=".$_POST['XIIscored'].", siblings=".$_POST['sibling_No'].", enrollment_year=".$_POST['year'].", program='".$program."', course='".$course."', prn_no=".$_POST['prn_No'].", hobbies='".$_POST['hobby']."', other_course='".$other_course."', working='".$working."', health_problem='".$health_problem."' WHERE student_id=".$_SESSION['student_id']);
	
	$_SESSION['acc_created'] = true;
	
	$_SESSION['student_id'] = (int)$_SESSION['student_id'];
	$year_id = $_SESSION['student_id']."1";
	$year_id = (int)$year_id;
	$result = mysqli_query($con, "INSERT INTO years (year_id, student_id) VALUES(".$year_id.",".$_SESSION['student_id'].")");
	$result = mysqli_query($con, "INSERT INTO semester (semester_id, year_id) VALUES(1, '".$year_id."')");
	$result = mysqli_query($con, "INSERT INTO semester (semester_id, year_id) VALUES(2, '".$year_id."')");

	$_SESSION['student_id'] = (int)$_SESSION['student_id'];
	$year_id = $_SESSION['student_id']."2";
	$year_id = (int)$year_id;
	$result = mysqli_query($con, "INSERT INTO years (year_id, student_id) VALUES(".$year_id.",".$_SESSION['student_id'].")");
	$result = mysqli_query($con, "INSERT INTO semester (semester_id, year_id) VALUES(3, '".$year_id."')");
	$result = mysqli_query($con, "INSERT INTO semester (semester_id, year_id) VALUES(4, '".$year_id."')");

	$_SESSION['student_id'] = (int)$_SESSION['student_id'];
	$year_id = $_SESSION['student_id']."3";
	$year_id = (int)$year_id;
	$result = mysqli_query($con, "INSERT INTO years (year_id, student_id) VALUES(".$year_id.",".$_SESSION['student_id'].")");
	$result = mysqli_query($con, "INSERT INTO semester (semester_id, year_id) VALUES(5, '".$year_id."')");
	$result = mysqli_query($con, "INSERT INTO semester (semester_id, year_id) VALUES(6, '".$year_id."')");
	
	$err = mysqli_error($con);
	echo $err;
	//header("Location: ../StudentDetails/FirstYear");
}
else if($_SESSION['create_card']=="2"){
	$_SESSION['student_id'] = (int)$_SESSION['student_id'];
	$year_id = $_SESSION['student_id']."1";
	$year_id = (int)$year_id;
	
	if(!$_POST['date1']=="mm/dd/yyyy"){$date1 = "";}
	else{$date1 = "meeting_date='".$_POST['date1']."', ";}
	if($_POST['attend1']==NULL){$attend1 = "";}
	else{$attend1 = "attendance=".$_POST['attend1'].", ";}

	if(!$_POST['date2']=="mm/dd/yyyy"){$date2 = "";}
	else{$date2 = "meeting_date='".$_POST['date2']."', ";}
	if($_POST['attend2']==NULL){$attend2 = "";}
	else{$attend2 = "attendance=".$_POST['attend2'].", ";}
	
	$input = $_POST['reason'];
	$reasons = "";
	foreach ($input as $reason){ 
		$reasons .= $reason.",";
	}
	$reasons .= "#".$_POST['other_reason'];
	
	$input = $_POST['join'];
	$joins = "";
	foreach ($input as $join){ 
		$joins .= $join.",";
	}
			
	$con = mysqli_connect("localhost","root","","studentcard");
	
	$result = mysqli_query($con, "UPDATE students SET fy_reason_for_vesasc='".$reasons."', fy_want_to_join='".$joins."', fy_library_card='".$_POST['lib_card']."' WHERE student_id=".$_SESSION['student_id']);
	
	$result = mysqli_query($con, "UPDATE years SET roll_no=".$_POST['stud_no'].", class_coordinator='".trim(preg_replace("/\r?'/", "\\'", $_POST['co_name']))."', ex_meet_desc='".trim(preg_replace("/\r?'/", "\\'", $_POST['feedback2']))."', suggestion_for_college='".trim(preg_replace("/\r?'/", "\\'", $_POST['feedback1']))."' WHERE year_id=$year_id");
	
	$result = mysqli_query($con, "UPDATE semester SET ".$attend1."gpa_grade='".$_POST['gpa1']."', achievements='".$_POST['achieve1']."', ".$date1."description='".$_POST['description1']."' WHERE semester_id=1 AND year_id=$year_id");
	
	$result = mysqli_query($con, "UPDATE semester SET ".$attend2."gpa_grade='".$_POST['gpa2']."', achievements='".$_POST['achieve2']."', ".$date2."description='".$_POST['description2']."' WHERE semester_id=2 AND year_id=$year_id");
	
	header("Location: ../StudentDetails/SecondYear");
}
else if($_SESSION['create_card']=="3"){
	$_SESSION['student_id'] = (int)$_SESSION['student_id'];
	$year_id = $_SESSION['student_id']."2";
	$year_id = (int)$year_id;
	
	if(!$_POST['date1']=="mm/dd/yyyy"){$date1 = "";}
	else{$date1 = "meeting_date='".$_POST['date1']."', ";}
	if($_POST['attend1']==NULL){$attend1 = "";}
	else{$attend1 = "attendance=".$_POST['attend1'].", ";}

	if(!$_POST['date2']=="mm/dd/yyyy"){$date2 = "";}
	else{$date2 = "meeting_date='".$_POST['date2']."', ";}
	if($_POST['attend2']==NULL){$attend2 = "";}
	else{$attend2 = "attendance=".$_POST['attend2'].", ";}
	
	$con = mysqli_connect("localhost","root","","studentcard");
	
	$result = mysqli_query($con, "UPDATE students SET sy_skills_lacked='".$_POST['skills']."' WHERE student_id=".$_SESSION['student_id']);
	
	$result = mysqli_query($con, "UPDATE years SET roll_no=".$_POST['stud_no'].", class_coordinator='".trim(preg_replace("/\r?'/", "\\'", $_POST['co_name']))."', ex_meet_desc='".trim(preg_replace("/\r?'/", "\\'", $_POST['feedback2']))."', internship='".trim(preg_replace("/\r?'/", "\\'", $_POST['intern']))."', goals='".trim(preg_replace("/\r?'/", "\\'", $_POST['goals']))."', suggestion_for_college='".trim(preg_replace("/\r?'/", "\\'", $_POST['feedback1']))."' WHERE year_id=$year_id");
	
	$result = mysqli_query($con, "UPDATE semester SET ".$attend1."gpa_grade='".$_POST['gpa1']."', achievements='".$_POST['achieve1']."', ".$date1."description='".$_POST['description1']."' WHERE semester_id=3 AND year_id=$year_id");
	
	$result = mysqli_query($con, "UPDATE semester SET ".$attend2."gpa_grade='".$_POST['gpa2']."', achievements='".$_POST['achieve2']."', ".$date2."description='".$_POST['description2']."' WHERE semester_id=4 AND year_id=$year_id");
	
	echo mysqli_error($con);
	header("Location: ../StudentDetails/ThirdYear");
}
else if($_SESSION['create_card']=="4"){
	$_SESSION['student_id'] = (int)$_SESSION['student_id'];
	$year_id = $_SESSION['student_id']."3";
	$year_id = (int)$year_id;

	if(!$_POST['date1']=="mm/dd/yyyy"){$date1 = "";}
	else{$date1 = "meeting_date='".$_POST['date1']."', ";}
	if($_POST['attend1']==NULL){$attend1 = "";}
	else{$attend1 = "attendance=".$_POST['attend1'].", ";}

	if(!$_POST['date2']=="mm/dd/yyyy"){$date2 = "";}
	else{$date2 = "meeting_date='".$_POST['date2']."', ";}
	if($_POST['attend2']==NULL){$attend2 = "";}
	else{$attend2 = "attendance=".$_POST['attend2'].", ";}
	
	$con = mysqli_connect("localhost","root","","studentcard");
	
	$result = mysqli_query($con, "UPDATE students SET ty_placement_activities='".$_POST['placement']."' WHERE student_id=".$_SESSION['student_id']);
	
	$result = mysqli_query($con, "UPDATE years SET roll_no=".$_POST['stud_no'].", class_coordinator='".trim(preg_replace("/\r?'/", "\\'", $_POST['co_name']))."', ex_meet_desc='".trim(preg_replace("/\r?'/", "\\'", $_POST['feedback2']))."', internship='".trim(preg_replace("/\r?'/", "\\'", $_POST['intern']))."', goals='".trim(preg_replace("/\r?'/", "\\'", $_POST['goals']))."', suggestion_for_college='".trim(preg_replace("/\r?'/", "\\'", $_POST['feedback1']))."' WHERE year_id=$year_id");
	
	$result = mysqli_query($con, "UPDATE semester SET ".$attend1."gpa_grade='".$_POST['gpa1']."', achievements='".$_POST['achieve1']."', ".$date1."description='".$_POST['description1']."' WHERE semester_id=5 AND year_id=$year_id");
	
	$result = mysqli_query($con, "UPDATE semester SET ".$attend2."gpa_grade='".$_POST['gpa2']."', achievements='".$_POST['achieve2']."', ".$date2."description='".$_POST['description2']."' WHERE semester_id=6 AND year_id=$year_id");
	
	echo mysqli_error($con);
	header("Location: ../");
}
?>