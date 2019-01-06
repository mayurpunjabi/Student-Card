<?php
$con = mysqli_connect("localhost", "root", "", "studentcard");
$result = mysqli_query($con ,"SELECT student_id,first_name,last_name FROM students WHERE enrollment_year = '".$_POST['year']."'");
$arr = mysqli_fetch_all($result);
foreach($arr as $value){
	echo "<a href='../StudentDetails/Profile/index.php?student_id=".$value[0]."' class='col-sm-2.5 card'><img src='../uploads/".$value[0].".jpg' alt='Student' style='height:170px'><div><p style='text-align:center;font-size:20px;margin:0 4%'><b>".$value[1]." ".$value[2]."</b></p> <p style='text-align:center;'>".$value[0]."</p> </div></a>";
}
?>