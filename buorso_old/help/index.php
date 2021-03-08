<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include '../core.php';
$title = "About - Buorso";
$filedir = "../";
include $filedir.'header.php';
?>

<div class="global-container">
	<div class="container">
		<div class="about-section">
		<div class="medtitle">About Buorso</div>
		<p>
		<b>Buorso</b>
		is a free classified ads website for electronics, vehicles, books, jobs, real estate, and
		<a href='#' title="List of Categories">everything else</a>.
		<b>Buorso</b>
		allows you to post new or used product. You can search for ads and contact the seller or create and post your own ad. Its absolutely
		<b>free</b>
		for you.
		</p>
		<p>
		Our main
		<b>mission</b>
		is to make classifieds in Nepal structured and easy to use for our users. We provide an
		<b>easy-to-use</b>
		user interface for you to easily use our site. We hope that you will help us in creating
		<b>Buorso</b>
		a better platform for you all.
		</p>
		</div>
	</div>
	<div class="promo-long">
		<img src="../assets/YouAdsLong.jpg" class="ad-long-img">
	</div>
</div>


<?php
include $filedir.'footer.php';
?>