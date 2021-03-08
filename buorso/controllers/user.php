<?php 
$_SESSION['previousPage'] = 'user?id='.$_GET['id'];

if(!isset($_GET['id']) || empty($_GET['id'])){
	require "controllers/404.php";
	die();
}

$user = new Queries('users');
$userResult = $user->select('*', 'user_id', $_GET['id'],'');

if($userResult->rowCount() != 1){
	require "controllers/404.php";
	die();
}

$data = $userResult->fetch();
foreach ($data as $key => $value) {
	$data[$key] = htmlspecialchars($value);
}

$userProducts = new Queries('products');
$productsData = Product::getProductList($userProducts, 'user_id', $_GET['id'], 'ORDER BY date DESC', 'posted by this user');
if(!isset($productsData['noProducts'])){
	$productsData = ['productsData' => $productsData];
}

$data = $data + $productsData;

$title = $data['firstname']." ".$data['lastname']." - Buorso";
$content = getViews('views/user.php', $data);
$extraStyle = 'user';
 ?>