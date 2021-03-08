<section>
	<div id="product-section" class="container">
		<div id="image-section">
			<div id="product-image">
				<img src="images/image.jpg" class="all0">
			</div>
			<div id="product-image-list">
				<div id="product-image-thumb">
					<img src="images/thumb.jpg" class="all0">
				</div>
				<div id="product-image-thumb">
					<img src="images/thumb2.jpg" class="all0">
				</div>
				<div id="product-image-thumb">
					<img src="images/thumb.jpg" class="all0">
				</div>
				<div id="product-image-thumb">
					<img src="images/thumb3.jpg" class="all0">
				</div>
			</div>
			<div id="warning" class="paragraph">
				<div class="label">&#9888;&nbsp;Safety Tips for Buyers</div>
				<ol type="1">
					<li>Meet seller at a safe location</li>
					<li>Check the item before you buy</li>
					<li>Pay only after collecting item</li>
					<li>Avoid non face-to-face transactions</li>
				</ol>
			</div>
		</div>
		<div id="product-info">
			<?php 
				echo '<div class="product-edit dropdown-container">
				<div class="dropdown-button">
					<div></div>
					<div></div>
					<div></div>
				</div>
				<div class="dropdown-box hide">
					<ul class="hover-bg">';
						if($user_id == isLoggedIn()){
							echo'<li><a href="edit?id='.$product_id.'">Edit</a></li>';
						}else{
							echo '<li><a href="#">Report</a></li>';;
						}
					echo '</ul>
				</div>
			</div>';
			 ?>
			<h1 id="product-title" title="<?php echo $title ?>"><?php echo $title ?></h1>
			<?php 
				$owner = new Queries('users');
				$ownerResult = $owner->select('firstname,lastname', 'user_id', $user_id,'');
				$ownerData = $ownerResult->fetch();
			 ?>
			<div id="seller"><span>by</span><a href="user?id=<?php echo $user_id ?>"><?php echo $ownerData['firstname']." ".$ownerData['lastname'] ?></a>
			</div>
			<h2 id="price">रु <?php echo $price ?></h2>
			<div id="category" title="Category"><span><?php echo Icons::getIcon('category',24,24); ?></span><a href="#"><?php echo $category ?></a></div>
			<div id="company" title="Company"><span><?php echo Icons::getIcon('company',24,24); ?></span><?php echo $company ?></div>
			<div id="upload-date" title="Upload Date"><span><?php echo Icons::getIcon('calendar',24,24); ?></span><?php echo substr($date,0,10) ?></div>
			<div id="location" title="Location"><span><?php echo Icons::getIcon('location',24,24); ?></span><?php echo $location ?></div>
			<div id="phone" title="Phone"><span><?php echo Icons::getIcon('phone',24,24); ?></span><?php echo $phone ?></div>
			<div id="condition" title="Condition"><span><?php echo Icons::getIcon('condition',24,24); ?></span><?php echo $product_condition ?></div>
			<div id="product-views" title="Views"><span><?php echo Icons::getIcon('views',24,24); ?></span><?php echo $views ?></div>
			<div id="add-to-favourite" title="Add to Favourite"><span><?php echo Icons::getIcon('favourite',24,24); ?></span>Add to Favourite</div>
			<div id="description">
				<div class="label">Description</div>
				<div class="paragraph"><?php echo $description ?></div>
			</div>
		</div>
	</div>
</section>
<section>
	<div id="comment-section" class="container">
		<div class="promo-square"></div>
		<div id="comments">
			<div id="comments-header">
				<h3>Comments</h3>
			</div>
			<div id="comments-body">
				<div class="comment">
					<div class="comment-image">
						<a href="#">
							<div class="comment-img">
								<img src="images/profile.png" class="all0">
							</div>
						</a>
					</div>
					<div class="comment-content">
						<div class="bold">
							<a href="#">Aaditya Bhusal</a>
						</div>
						<div class="comment-date">2019-08-20</div>
						<div class="paragraph">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat.
						</div>
					</div>
				</div>
				<div class="comment">
					<div class="comment-image">
						<a href="#">
							<div class="comment-img">
								<img src="images/profile.png" class="all0">
							</div>
						</a>
					</div>
					<div class="comment-content">
						<div class="bold">
							<a href="#">Aaditya Bhusal</a>
						</div>
						<div class="comment-date">2019-08-20</div>
						<div class="paragraph">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat.
						</div>
					</div>
				</div>
			</div>
			<div id="comment-area">
				<div id="comment-user">
					<div id="comment-user-image">
						<img src="images/profile.png" class="all0">
					</div>
				</div>
				<form id="comment-form">
					<div id="comment-box">
						<textarea id="comment" placeholder="Write a comment" required></textarea>
					</div>
					<input type="button" name="comment-button" value="Comment">
				</form>
			</div>
		</div>
	</div>	
</section>
<script type="text/javascript">
	var textareas = document.getElementsByTagName('textarea');
	for(var i = 0; i < textareas.length; i++){
		textareas[i].addEventListener('input', function(){
			this.style.height = 'auto';
			this.style.height = this.scrollHeight+"px";
		}); 
	}
</script>