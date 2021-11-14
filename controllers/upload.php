<?php 
if(!isLoggedIn()){
	header('Location:home');
}
$title = "Upload - Buorso";
$extraStyle = 'productEdit';
$content = getViews('views/upload.php', []);
 ?>