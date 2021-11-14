<?php 
if(!isLoggedIn()){
	header('Location:home');
}
$title = "Account Settings - Buorso";
$extraStyle = 'settings';
$content = getViews('views/account-settings.php', []);
 ?>