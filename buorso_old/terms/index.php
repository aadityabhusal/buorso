<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include '../core.php';
$title = "Terms - Buorso";
$filedir = "../";
include $filedir.'header.php';
?>

<div class="global-container">
	<div class="container">
		<div class="about-section dib-vat">
		<div class="medtitle">Terms of Use of Buorso</div>
		<i><label class="boxlable">These terms and conditions outline the rules and regulations for the use of Buorso's Website.</label></i>
		</div>
	</div>
</div>


<?php
include $filedir.'footer.php';
?>