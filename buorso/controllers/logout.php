<?php 

$title = "Logout - Buorso";
$extraStyle = null;

if(isLoggedIn()){
	$delete = new Queries('sessions');
	$delete->delete('token', hash('sha256', $_COOKIE['BUIDT']));
	setcookie("BUIDT", "", time()-3600, '/');
	setcookie("BUIDTT", "", time()-3600, '/');
}

header('Location:login');


 ?>