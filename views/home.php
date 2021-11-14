<section>
	<div class="container">
		<h3 class="title">Today</h3>
		<?php if(!isset($todayData['noProducts'])){ ?>
		<ul class="ads-container">
			<?php 
				foreach ($todayData as $product => $data) {
					extract($data);
					echo Product::getProduct($product_id, htmlspecialchars($title), 'images/product/'.$image_thumb, $price, '', $user_id);
				}
				echo "</ul>";
				}else{
					echo $todayData['noProducts'];
				}
			?>
	</div>
</section>
<section>	
	<div class="container">
		<h3 class="title">This Week</h3>
		<?php if(!isset($thisWeekData['noProducts'])){ ?>
		<ul class="ads-container">
			<?php 
				foreach ($thisWeekData as $product => $data) {
					extract($data);
					echo Product::getProduct($product_id, htmlspecialchars($title), 'images/product/'.$image_thumb, $price, '', $user_id);
				}
				echo "</ul>";
				}else{
					echo $thisWeekData['noProducts'];
				}
			?>
	</div>
</section>
<section>	
	<div class="container">
		<h3 class="title">This Month</h3>
		<?php if(!isset($thisMonthData['noProducts'])){ ?>
		<ul class="ads-container">
			<?php 
				foreach ($thisMonthData as $product => $data) {
					extract($data);
					echo Product::getProduct($product_id, htmlspecialchars($title), 'images/product/'.$image_thumb, $price, '', $user_id);
				}
				echo "</ul>";
				}else{
					echo $thisMonthData['noProducts'];
				}
			?>
	</div>
</section>