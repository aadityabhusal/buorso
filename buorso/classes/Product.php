<?php 

/**
 * 
 */
class Product
{
	
	// private $id, $userid, $title, $image[], $thumb[], $price, $description, $category,

	// public __construct($tableQuery, $field, $value, $extraQuery, $message){

	// 	$results = $tableQuery->select('product_id, title, image_thumb, price, description, user_id', $field, $value, $extraQuery);
	// 	if($results->rowCount() < 1){
	// 		$data = ['noProducts' => "<h4 style='text-align: center;'>No Products $message</h4>"];
	// 	}else{
	// 		$data = $results->fetchAll();
	// 	}
	// 	return $data;
	// }


	public static function getProductList($tableQuery, $field, $value, $extraQuery, $message){
		$results = $tableQuery->select('product_id, title, image_thumb, price, description, user_id', $field, $value, $extraQuery);
		if($results->rowCount() < 1){
			$data = ['noProducts' => "<h4 style='text-align: center;'>No Products $message</h4>"];
		}else{
			$data = $results->fetchAll();
		}
		return $data;
	}

	public static function getProduct($id, $title, $image, $price, $description, $userid){

		if($description != ''){
			$descriptionData = '<div class="product-description paragraph elips3">'.$description.'</div>';
		}else{
			$descriptionData = '';
		}

		if($userid == isLoggedIn()){
			$dropdownData = '<li><a href="edit?id='.$id.'">Edit</a></li>';
		}else{
			$dropdownData = '<li><a href="#">Report</a></li><li><a href="#">Add to Favourites</a></li>';
		}

		$data = '<li class="product">
					<a href="product?id='.$id.'" title="'.$title.'">
						<div class="product-image">
							<img src="'.$image.'" class="all0" alt="'.$title.'">
						</div>
						<div class="product-info">
							<div class="product-title bold elips2">'.$title.'</div>
							<div class="product-price elips1">रु&nbsp;'.$price.'</div>
							'.$descriptionData.'
							</div>
					</a>
					<div class="product-edit dropdown-container">
						<div class="dropdown-button">
							<div></div>
							<div></div>
							<div></div>
						</div>
						<div class="dropdown-box hide">
							<ul class="hover-bg">
							'.$dropdownData.'
							</ul>
						</div>
					</div>
				</li>';

		return $data;
	}

}

 ?>