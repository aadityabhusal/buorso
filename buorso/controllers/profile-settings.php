<?php 
if(!isLoggedIn()){
	header('Location:home');
}

$profileData = new Queries('users');
$results = $profileData->select('firstname, lastname, profession, phone, address, profile_bio, profile_image', 'user_id', isLoggedIn(), '');
$data = $results->fetch();
foreach ($data as $key => $value) {
	$data[$key] = htmlspecialchars($value);
}

$title = "Profile Settings - Buorso";
$extraStyle = 'settings';
$content = getViews('views/profile-settings.php', $data);

$profile = new Queries('users');

if(isset($_POST['submit'])){
	unset($_POST['submit']);
	unset($_POST['profile_image']);
	if($profile->update($_POST, 'user_id', isLoggedIn())){
		header('Location:user?id=' . isLoggedIn());
	}else{
		echo "<script>alert('Not Done')</script>";
	}
}

 ?>