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
		<div class="about-section dib-vat">
		<div class="medtitle">About Buorso</div>
		<i><label class="boxlable"><i class="fa fa-birthday-cake" aria-hidden="true"></i>Welcome to Buorso<i class="fa fa-birthday-cake" aria-hidden="true"></i></label></i>
		<p>
		<b>Buorso</b>
		is a free classified ads website for electronics, vehicles, books, jobs, real estate, and everything else. Buorso allows you to post new or used products, jobs, services and many more. You can search for ads and contact the seller or create and post your own ad. Its
		<b>absolutely free</b>
		for you!
		</p>
		<p>
		Our main
		<b>mission</b>
		is to provide a <b>structured</b> and <b>easy to use</b> classified ads website for our users.(user interfae) and waste less. We are working hard and putting a lot of effort in improving the quality of the website and we hope that you will help us in making Buorso a better platform for you all by posting real and genuine ads.
		</p>
		<h3>What can I do on Buorso?</h3>
		<p>You can post ads of the followings :
			<ol type="1">
				<li><b>Any new or used product you want to sell</b></li>
				<li><b>Job Application/ Job Vacancy</b></li>
				<li><b>Service provided by you or your company</b></li>
				<li><b>Pets and Pet Care Items</b></li>
				<li><b>Art, Craft or Design</b></li>
				<li><b>Events and Programs</b></li>
				<li><b>Real Estate and Properties</b></li>
				<li><b>And everything else you want to sell</b></li>
			</ol>
		</p>
		<h3>More Info</h3>
		<p>
			<ul class="statlist">
				<li>
					<div class="statlisthead"><b>Founded</b></div>
					<div><span>2017</span></div>
				</li>
				<li>
					<div class="statlisthead"><b>Founder</b></div>
					<div><span><a href="aaditya-bhusal/">Aaditya Bhusal</a></span></div>
				</li>
			<!--<li>
					<div class="statlisthead"><b>Team Member(s)</b></div>
					<div><span>1</span></div>
				</li>
				<li>
					<div class="statlisthead"><b>Language</b></div>
					<div><span>PHP(Backend), JS(Frontend)</span></div>
				</li>
				<li>
					<div class="statlisthead"><b>Total Users</b></div>
					<div><span>More than 73 Thousand</span></div>
				</li>
				<li>
					<div class="statlisthead"><b>Total Ads</b></div>
					<div><span>More than 137 Thousand</span></div>
				</li>-->
				<li>
					<div class="statlisthead"><b>Location</b></div>
					<div><span>Kathmandu, Nepal</span></div>
				</li>
				<li>
					<div class="statlisthead"><b>Email</b></div>
					<div><span>buorsomail@gmail.com</span></div>
				</li>
				<li>
					<div class="statlisthead"><b>Follow</b></div>
					<div><span><a href="#" title="Blog"><i class="fa fa-globe" aria-hidden="true"></i></a><a href="#" title="Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a><a href="#" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a><a href="#" title="Google+"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></span></div>
				</li>
				<li>
					<div class="statlisthead"><b></b></div>
					<div><span></span></div>
				</li>
			</ul>
		</p>
		</div>
		<div class="promo-section-side dib-vat">
			<div class="promo-box">
				<img class="" src="../assets/images/promosmall.JPG">
			</div>
		</div>
	</div>
	<div class="promo-section-bottom">
		<div class="promo-box">
			<img src="../assets/images/promolong.jpg" class="ad-long-img">
		</div>
	</div>
</div>


<?php
include $filedir.'footer.php';
?>