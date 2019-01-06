<?php
session_start();
echo $_SESSION['student_id'];
$_SESSION['student_id'] = $student_id;
$_SESSION['passwd'] = $passwd;
$_SESSION['new_passwd'] = $passwd;
$_SESSION['logged_in'] = "student";
$_SESSION['acc_created'] = true;
?>