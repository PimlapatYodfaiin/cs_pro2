<?php 
session_start();
    $host = "localhost";
    $user = "root";
    $passwd = "";
    $db = "620112230039p_procument2";

    $connect=mysqli_connect("$host","$user","$passwd","$db") or die("เกิดข้อผิดพลาดเกิดขึ้น");
    error_reporting(E_ALL ^ E_NOTICE);

//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
?>

    