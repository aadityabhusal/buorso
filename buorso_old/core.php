<?php
@$con = mysqli_connect('localhost','root','','buorso') or die('<h1>Error Connection</h1>');

//User
@$userid = $_COOKIE['id'];
$getdata = "SELECT * FROM users WHERE user_id='$userid'";
$rungetdata = mysqli_query($con,$getdata);
$profilerow = mysqli_fetch_array($rungetdata);
$fname = $profilerow['firstname'];
$lname = $profilerow['lastname'];
$profileimg = $profilerow['profile_image'];
$email = $profilerow['email'];
$joined = $profilerow['date_joined'];
$bio = $profilerow['profile_bio'];
$profession = $profilerow['profession'];
$address = $profilerow['address'];
$country = $profilerow['country'];
$staus = $profilerow['status'];

$filedir = "../"; 
$titlename="";
//echo "https://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
?>