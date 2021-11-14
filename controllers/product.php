<?php 

if(!isset($_GET['id']) || empty($_GET['id'])){	
	require "controllers/404.php";
	die();
}

$_SESSION['previousPage'] = 'product?id='.$_GET['id'];

$product = new Queries('products');
$result = $product->select('*', 'product_id', $_GET['id'],'');

if($result->rowCount() != 1){
	require "controllers/404.php";
	die();
}

$data = $result->fetch();
foreach ($data as $key => $value) {
	$data[$key] = htmlspecialchars($value);
}

$title = $data['title']." - Buorso";
$extraStyle = 'product';
$content = getViews('views/product.php', $data);


?>
