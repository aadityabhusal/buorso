<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
include '../core.php';
$title = "Trending - Buorso";
$filedir = "../";
include '../header.php';
?>

<div class="global-container">
	<div class="container">
		<div class="home-list">
			<ul class="home-list-ul">
				<li><a href="..">Home</a></li>
				<li><a href="../category/">Category</a></li>
				<li><a href="../featured/">Featured</a></li>
				<li><a href="../trending/" style="border-bottom:3px solid #3498db;">Trending</a></li>
			</ul>
		</div>
		<div class="category-container-title">No content to show here.</div>
	</div>
	<div class="ads-section-long">
		<img src="../assets/YouAdsLong.jpg" class="ad-long-img">
	</div>
</div>


<?php
include 'footer.php';
?>