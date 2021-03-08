<?php 
$_SESSION['previousPage'] = 'search?search='.$_GET['search'];

if(!isset($_GET['search']) || empty($_GET['search'])){
	header('Location:home');
}

$searchText = $_GET['search'];

$searchProducts = new Queries('products');
$extraQuery = "AND MATCH(title) AGAINST('$searchText' IN BOOLEAN MODE) 
				OR MATCH(description) AGAINST('$searchText' IN BOOLEAN MODE) 
				OR MATCH(tags) AGAINST('$searchText' IN BOOLEAN MODE) 
				OR MATCH(category) AGAINST('$searchText' IN BOOLEAN MODE) 
				OR MATCH(location) AGAINST('$searchText' IN BOOLEAN MODE) 
				OR MATCH(company) AGAINST('$searchText' IN BOOLEAN MODE) ";

if(isset($_GET['sortby']) && !empty($_GET['sortby'])){
	if($_GET['sortby'] == "HighToLow"){
		$finalQuery = $extraQuery."ORDER BY CAST(price AS DECIMAL(10,2)) DESC";
	}else if($_GET['sortby']=="LowToHigh"){
		$finalQuery = $extraQuery."ORDER BY CAST(price AS DECIMAL(10,2)) ASC";
	}else if($_GET['sortby']=="Newest"){
		$finalQuery = $extraQuery."ORDER BY date DESC";
	}else if($_GET['sortby']=="Relevance"){
		$finalQuery = $extraQuery."ORDER BY MATCH(title) AGAINST('$searchText' IN BOOLEAN MODE) DESC";
	}
}else{
	$finalQuery = $extraQuery."ORDER BY MATCH(title) AGAINST('$searchText' IN BOOLEAN MODE) DESC";
}

$searchProductsData = Product::getProductList($searchProducts, '1', 1, $finalQuery, 'to show');

$data = [
	'searchData' => $searchProductsData
];

$title = $searchText." - Buorso";
$extraStyle = 'search';
$content = getViews('views/search.php', $data);


 ?>