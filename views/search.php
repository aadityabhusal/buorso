<section>
	<div id="search-ads" class="container">
		<div id="search-head">
			<?php 
				if(isset($_GET['sortby']) && !empty($_GET['sortby'])){
					if($_GET['sortby'] == 'Newest'){
						$sortByTitle = 'Newest';
					}else if($_GET['sortby'] == 'HighToLow'){
						$sortByTitle = 'Price - High to Low';
					}else if($_GET['sortby'] == 'LowToHigh'){
						$sortByTitle = 'Price - Low to High';
					}else{
						$sortByTitle = 'Relevance';
					}
				}else{
					$sortByTitle = 'Relevance';
				}
				

				$searchURL = 'search?search='.$_GET['search'].'&sortby=';
				if(!isset($searchData['noProducts'])){
					$totalResults = count($searchData);
				}else{
					$totalResults = 0;
				}
			 ?>
			<div id="search-head-title"><?php echo $totalResults ?> Results</div>
			<div id="search-sortby" class="dropdown-container"  >
				<div id="sortby-title" class="dropdown-button">Sort By: <?php echo $sortByTitle ?> <span>&#10095;</span></div>
				<div class="dropdown-box hide">
					<ul class="hover-bg">
						<li><a href="<?php echo $searchURL ?>Relevance" class="active">Relevance</a></li>
						<li><a href="<?php echo $searchURL ?>HighToLow">Price - High to Low</a></li>
						<li><a href="<?php echo $searchURL ?>LowToHigh">Price - Low to High</a></li>
						<li><a href="<?php echo $searchURL ?>Newest">Newest</a></li>
					</ul>
				</div>
			</div>
		</div>
		<?php if(!isset($searchData['noProducts'])){ ?>
		<ul class="ads-container">
			<?php 
				foreach ($searchData as $product => $data) {
					extract($data);
					echo Product::getProduct($product_id, htmlspecialchars($title), 'images/thumb.jpg', $price, $description, $user_id);
				}
				echo "</ul>";
				}else{
					echo $searchData['noProducts'];
				}
			?>
	</div>
</section>