<?php 
session_start();
require 'classes/Database.php';
require 'classes/Queries.php';
require 'classes/User.php';
require 'classes/Product.php';
require 'classes/Icons.php';

if(!isset($_SESSION['previousPage']) || empty($_SESSION['previousPage'])){
	$_SESSION['previousPage'] = 'home';
}

function getViews($filename, $tempVars){
	extract($tempVars);
	ob_start();
	include $filename;
	$content = ob_get_clean();
	return $content;
}

function emptyCheck($formData){
	$check = false;
	foreach ($formData as $key => $value) {
    	if(empty(trim($value))){
    		$check = false;
    		break;	
    	}else{
    		$check = true;
    	}
    }
    return $check;
}

function isLoggedIn(){
	if(isset($_COOKIE['BUIDT']) && !empty($_COOKIE['BUIDT'])){
		$session = new Queries('sessions');
		// BUID(T)T = Buorso User ID (Temporary) Token
		if($sessionResults = $session->select('user_id', 'token', hash('sha256', $_COOKIE['BUIDT']),'')){
			$sessionData = $sessionResults->fetch();
			if(!isset($_COOKIE['BUIDTT']) || empty($_COOKIE['BUIDTT'])){
				$cryptoStrong = True;
				$newToken = bin2hex(openssl_random_pseudo_bytes(64, $cryptoStrong));
				$currentDateTime = date('Y-m-d H:i:s');
				$sessionValues = [
					'token' =>  hash('sha256', $newToken),
					'user_id' => $sessionData['user_id'],
					'ip_address' => '192.168.14.123',
					'logged_in' => $currentDateTime
				];
				if($session->insert($sessionValues)){
					$session->delete('token', hash('sha256', $_COOKIE['BUIDT']));
					setcookie('BUIDT', $newToken, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
					setcookie('BUIDTT', 1, time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
					header('Location:'.$_SESSION['previousPage']);
				}
				
			}
			return $sessionData['user_id'];
		}
	}
	return false;
}


// function productListData($tableQuery, $field, $value, $extraQuery, $message){
// 	$results = $tableQuery->select('product_id, title, image, price, description, user_id', $field, $value, $extraQuery);
// 	if($results->rowCount() < 1){
// 		$data = ['noProducts' => "<h4 style='text-align: center;'>No Products $message</h4>"];
// 	}else{
// 		$data = $results->fetchAll();
// 	}
// 	return $data;
// }

// function productCard($id, $title, $image, $price, $description, $userid){
// 	echo '
// 		<li class="product">
// 			<a href="product?id='.$id.'" title="'.$title.'">
// 				<div class="product-image">
// 					<img src="'.$image.'" class="all0" alt="'.$title.'">
// 				</div>
// 				<div class="product-info">
// 					<div class="product-title bold elips2">'.$title.'</div>
// 					<div class="product-price elips1">रु&nbsp;'.$price.'</div>';
// 					if($description != ''){
// 						echo '<div class="product-description paragraph elips3">'.$description.'</div>';
// 					}
// 				echo'</div>
// 			</a>
// 			<div class="product-edit dropdown-container">
// 				<div class="dropdown-button">
// 					<div></div>
// 					<div></div>
// 					<div></div>
// 				</div>
// 				<div class="dropdown-box hide">
// 					<ul class="hover-bg">';
// 						if($userid == isLoggedIn()){
// 							echo'<li><a href="edit?id='.$id.'">Edit</a></li>';
// 						}else{
// 							echo '<li><a href="#">Report</a></li>';
// 							echo '<li><a href="#">Add to Favourites</a></li>';
// 						}
// 					echo '</ul>
// 				</div>
// 			</div>
// 		</li>';
// }

?>