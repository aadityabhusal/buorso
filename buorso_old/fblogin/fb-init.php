<?php 
session_start();
require "vendor/autoload.php";

$fb = new Facebook\Facebook([
	'app_id' => '400501823856182',
	'app_secret' => '38123fea69dfb90692eb10a228d1bfc2',
	'default_graph_version' => 'v2.10'
	
]);

$helper = $fb->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl('http://localhost/projects/buorso/fblogin/');

try {
	$accessToken = $helper->getAccessToken();
	if(isset($accessToken)){
		$_SESSION['access_token'] = (string)$accessToken;
		//If Session Set
		header('Location:index.php');
	}

} catch (Exception $exc) {
	echo $exc->getTraceAsString();
}

//Get User Data
if (isset($_SESSION['access_token'])) {
	$fb->setDefaultAccessToken($_SESSION['access_token']);
	$res = $fb->get('/me?locale=US&field=id,name,email,gender',$accessToken);
	$resimg = $fb->get('/me/picture?redirect=false&width=250&height=250',$accessToken);
	$user = $res->getGraphUser();
	$userimg = $resimg->getGraphUser();
	$imgurl = $userimg["url"];
	echo $user->getField('name')."</br>";
	echo $user->getField('email')."</br>";

	echo "<img src='$imgurl'>";
 
}

?>