<?php 
if(!isLoggedIn()){
	header('Location:home');
}

$title = "Edit - Buorso";
$extraStyle = 'productEdit';
$content = getViews('views/edit.php', []);

 ?>