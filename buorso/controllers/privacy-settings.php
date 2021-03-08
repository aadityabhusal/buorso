<?php 
if(!isLoggedIn()){
	header('Location:home');
}
$title = "Privacy Settings - Buorso";
$extraStyle = 'settings';
$content = getViews('views/privacy-settings.php', []);
 ?>