<?php
session_start();
//upload.php
if($_FILES["file"]["name"] != '')
{
 $test = explode('.', $_FILES["file"]["name"]);
 $ext = end($test);
 $name = $_SESSION['student_id']. '.jpg';
 $location = '../uploads/' . $name;
 move_uploaded_file($_FILES["file"]["tmp_name"], $location);
}
?>