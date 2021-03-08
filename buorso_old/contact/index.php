<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include '../core.php';
$title = "Contact us - Buorso";
$filedir = "../";
include $filedir.'header.php';

if(isset($_POST['submitcontact'])){
	if(empty($_POST['contactsub']) || empty($_POST['sendername']) || empty($_POST['senderemail']) || empty($_POST['sendermsg'])){
		$contsub = mysqli_real_escape_string($con,htmlentities(trim($_POST['contactsub'])));
		$contsub = mysqli_real_escape_string($con,htmlentities(trim($_POST['sendername'])));
		$contsub = mysqli_real_escape_string($con,htmlentities(trim($_POST['senderemail'])));
		$contsub = mysqli_real_escape_string($con,nl2br(htmlentities(trim($_POST['sendermsg']))));
		
		
		
			//echo"<script>alert('Comment successfully sent.')</script>";
			//header("Location: " . $_SERVER['REQUEST_URI']);
			//exit();
		
	}
}

?>

<div class="global-container">
	<div class="container">
		<div class="about-section dib-vat">
		<div class="medtitle">Contact us</div>
		<p><b>You can report, ask for help, contact us or give your valuable feedback here.</b></p>
		<form name="?" method="POST" class="uploadformcomp" action="#" enctype="application/x-www-form-urlencoded">
			<select name="contactsub" required>
				<option value="">Select a subject</option>
				<option value="1">I need help with my account or password</option>
				<option value="2">I have a legal question</option>
				<option value="3">I want to report an ad</option>
				<option value="4">I want to report a scam or fraud</option>
				<option value="5">I want to advertise on Buorso</option>
				<option value="6">I want to become a seller or partner</option>
				<option value="7">I want to give a general feedback</option>
				<option value="8">I want to report a bug</option>
			</select>
			<input type="text" class="s-inp" name="sendername" placeholder="Enter your name" title="Enter your name"  required/>
			<input type="text" class="s-inp" name="senderemail" placeholder="Enter your email" title="Enter your email"  required/>
			<textarea class="" name="sendermsg" placeholder="Enter your message" title="Enter your message" required></textarea>
			<input id="file" type="file"  value="Choose a file" />
			<label class="filelabel2 dib-vat" for="file"><i class="fa fa-upload" aria-hidden="true"></i>Upload a Screenshot</label>
			<div class="image-container2 dispimgcont dib-vat">
				<img class="all0" id="dispimg" src=""/>
			</div>
			<input type="submit" class="submitbtn savebtn" name="submitcontact" value="Submit" disabled="disabled" />
		</form>
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