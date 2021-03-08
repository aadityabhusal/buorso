<?php 
if(!isLoggedIn()){
	header('Location:home');
}
$title = "Messages - Buorso";
$extraStyle = 'messages';
$content = getViews('views/messages.php', []);
 ?>