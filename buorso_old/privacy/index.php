<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include '../core.php';
$title = "Privacy - Buorso";
$filedir = "../";
include $filedir.'header.php';
?>

<div class="global-container">
	<div class="container">
		<div class="about-section dib-vat">
		<div class="medtitle">Privacy Policy of Buorso</div>
		<i><label class="boxlable">Your privacy is critically important to us.</label></i>
		<p>
			By using the services of Buorso, you agree to our <a href="../terms">Terms of Service</a> and Privacy Policy. 
		</p>
		<p>
			<h3>What information do we store?</h3>
		</p>
		<p>You can use Buorso's services without giving any personal information. You do not need an account to see the ads but you have to create an account to post an ad or add a comment to an ad.</p>
		<p>
			<ol>
				<li>We store the information provided by the user such as name, photo, email, phone number etc.</li>
				<li>We also store other informations such as user's ip address, browser and computer they are using etc.</li>
				<li>We do not take the responsibility of any information shared with other users.</li>
				<li>We also don't have any control over the information collected by third party sites or services.</li>
				<li>We make good efforts to store your information securly but cannot make any guarantees.</li>
			</ol>
		</p>
		<p>
			<h3>How we use and process the information?</h3>
		</p>
		<p>
			We use and process user's information to provide our services to the users and for other business purposes. Some data provided by the user's and collected by our websites are shared with user and third party sites depending on the type of the data. Others are kept within the website only. The data we take from user helps in the communication between the users and other research purposes to improve our services.You can update or delete informations about you whenever you want from our website.
		</p>
		<p>
			<h3>Disclosure of your data</h3>
		</p>
		<p>
			We do not sell or rent your personal information to third parties without your explicit consent. We may disclose your personal information to Goverment and law enforcement agencies, to our service providers, to protect our rights, property, privacy and safety, or that of our users or anyone else.
		</p>
		<p>
			 If we change our privacy policies, we will inform you about those changes on the website. If you have any questions, feel free to <a href="../contact/">contact us</a>.
		</p>
		</div>		
	</div>
</div>


<?php
include $filedir.'footer.php';
?>