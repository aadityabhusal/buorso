<section>
	<div class="container" id="profile-header">
		<div>
			<div id="profile-image">
				<img src="images/profile.png" class="all0" alt="Aaditya Bhusal">
			</div>
		</div>
		<div id="profile-info" class="scroll">
			<h1><?php echo $firstname." ".$lastname ?></h1>
			<h3><?php echo $profession ?></h3>
			<div id="profile-bio" class="paragraph"><?php echo $profile_bio ?></div>
		</div>
		<div id="profile-details">
			<ul>
				<li>
					<div class="label"><?php echo Icons::getIcon('phone',18, 18); ?>Phone Number</div>
					<div class="elips2"><?php echo $phone; ?></div>
				</li>
				<li>
					<div class="label"><?php echo Icons::getIcon('location',18, 18); ?>Resident</div>
					<div class="elips2"><?php echo $address; ?></div>
				</li>
				<li>
					<div class="label"><?php echo Icons::getIcon('calendar',18, 18); ?>Joined</div>
					<div><?php echo substr($date_joined, 0, 10); ?></div>
				</li>
				<li>
					<div class="label"><?php echo Icons::getIcon('views',18, 18); ?>Total Views</div>
					<div>14,600</div>
				</li>
			</ul>
			
		</div>
	</div>
</section>
<section>
	<div class="container">
		<?php if(!isset($noProducts)){ ?>
		<ul class="ads-container">
			<?php 
				foreach ($productsData as $product => $data) {
					extract($data);
					echo Product::getProduct($product_id, htmlspecialchars($title), 'images/product/'.$image_thumb, $price, '', $user_id);
				}
				echo "</ul>";
				}else{
					echo $noProducts;
				}
			?>
	</div>
</section>