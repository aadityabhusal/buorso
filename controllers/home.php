<?php 
$_SESSION['previousPage'] = 'home';

$homeProducts = new Queries('products');

$todayData = Product::getProductList($homeProducts, '1', 1, 'AND date > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY date DESC', 'posted Today');

$thisWeekData = Product::getProductList($homeProducts, '1', 1, 'AND date > DATE_SUB(NOW(), INTERVAL 1 WEEK) ORDER BY date DESC', 'posted This Week');

$thisMonthData = Product::getProductList($homeProducts, '1', 1, 'AND date > DATE_SUB(NOW(), INTERVAL 1 MONTH) ORDER BY date DESC', 'posted This Month');

$data = [
	'todayData' => $todayData,
	'thisWeekData' =>$thisWeekData,
	'thisMonthData' =>$thisMonthData
];


$title = "Buorso - Buy Or Sell Online";
$extraStyle = null;
$content = getViews('views/home.php', $data);

?>