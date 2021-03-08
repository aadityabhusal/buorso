<?php 
if($_SESSION['cookieCheck'] == true){
	if(isset($_COOKIE['BUIDT']) && !empty($_COOKIE['BUIDT'])){
		echo "<script>alert('Please Enable Your Cookies')</script>";
		unset($_SESSION['cookieCheck']);
	}
}
header('Location:'.$_SESSION['previousPage']);

 ?>