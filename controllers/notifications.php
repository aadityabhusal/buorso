<?php 
if(!isLoggedIn()){
	header('Location:home');
}
$title = "Notifications - Buorso";
$extraStyle = 'notifications';
$content = getViews('views/notifications.php', []);
 ?>