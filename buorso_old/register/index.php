<?php
include '../core.php';

if(isset($_COOKIE['id'])){
	header('location:../user/?userid='.$_COOKIE['id']);
}else{
	
$title = "Sign Up - Buorso";
include '../header.php';
$logregwarning = '';
if(isset($_POST['signupbtn'])){
	if(!empty($_POST['fname']) || !empty($_POST['lname']) || !empty($_POST['email']) || !empty($_POST['pass'])){
		$fname = mysqli_real_escape_string($con,htmlentities(trim($_POST['fname'])));
		$lname = mysqli_real_escape_string($con,htmlentities(trim($_POST['lname'])));
		$email = mysqli_real_escape_string($con,htmlentities(trim($_POST['email'])));
		$pass = md5(mysqli_real_escape_string($con,htmlentities(trim($_POST['pass']))));
		$profileimg = 'default.png';
		$status = "1";
		
		$checkrecord = "SELECT email FROM users where email='$email'";
		$check = mysqli_query($con,$checkrecord);
			if(mysqli_num_rows($check)>0){
				echo "<script>alert('Record Already Exists!')</script>";
			}else{
				$insertdata = "INSERT INTO users(firstname,lastname,email,password,profile_image,date_joined,status) VALUES('$fname','$lname','$email','$pass','$profileimg',NOW(),'$status')";
				if(mysqli_query($con,$insertdata)==true){
					echo "<script>alert('Regestration Successful!')</script>";
					$redirectquery = "SELECT user_id from users where email='$email'";
					$runredirect = mysqli_query($con,$redirectquery);
					$row=mysqli_fetch_array($runredirect);
					setcookie('id',$row['user_id'],time()+604800,'/');
					header('location:../user/?userid='.$_COOKIE['id']);
				}else{
					echo "<script>alert('Regestration Unuccessful!')</script>";
				}
			}
		
	}else{
		echo "<script>alert('Please fill all the fields!')</script>";
	}
}
?>
<div class="global-container">
	<div class="form-container">
		<div class="largetitle">Create Your Account</div>
		<div class="logregwarning"><?php echo $logregwarning; ?></div>
		<form method="POST" id="signupform" action="../register/" class="uploadformcomp" enctype="application/x-www-form-urlencoded">
			<input type="text" name="fname" id="?" placeholder="Enter your First Name" maxlength="20" required/>
			<input type="text" name="lname" id="?" placeholder="Enter your Last Name" maxlength="20" required/>
			<input type="email" name="email" id="?" placeholder="Enter your Email" maxlength="32" required/>
			<input type="password" name="pass" id="pass" size="20" placeholder="Enter your Password" maxlength="20" required/>
			<span id="pmsg" style="display:none; font-size:14px; color:red; margin:5px 0;">Please enter a password of at least 8 characters</span>
			<input type="submit" name="signupbtn" id="signupbtn" class="submitbtn" value="Create an Account" disabled="disabled"/>
		</form>
		<div class="agreenotice">By creating your account, you agree to Buorso's <a href="<?php echo $filedir;?>terms/">Terms and Conditions</a> of Use and <a href="<?php echo $filedir;?>privacy/">Privacy Policy</a>.</div>
		<div class="haveaccount">Already have an Account? <a href="../login/">Log In</a></div>
	</div>
	<div class="promo-section-bottom promo">
		<span class="promoclose"><i class="fa fa-close" aria-hidden="true"></i></span>
		<div class="promo-box">
			<img src="../assets/images/promolong.jpg" class="ad-long-img">
		</div>
	</div>
</div>
<?php
include '../footer.php';
}
?>