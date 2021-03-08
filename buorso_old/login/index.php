<?php
include '../core.php';

session_start();
if(isset($_COOKIE['id'])){
	header('location:../user/?userid='.$_COOKIE['id']);
}else{

$title = "Log In - Buorso";
include '../header.php';
$logregwarning = '';
if(isset($_POST['loginbtn'])){
	if(!empty($_POST['email']) && !empty($_POST['pass'])){
		$email = mysqli_real_escape_string($con,htmlentities(trim($_POST['email'])));
		$pass = md5(mysqli_real_escape_string($con,htmlentities(trim($_POST['pass']))));
		
		$loginquery = "SELECT * FROM users WHERE email='$email' && password='$pass'";
		$runlogin = mysqli_query($con,$loginquery);
		$num_row = mysqli_num_rows($runlogin);
		$row=mysqli_fetch_array($runlogin);
		if( $num_row > 0 ) {
			setcookie('id',$row['user_id'],time()+604800,'/');
			
			if(isset($_SESSION['url'])) {
				$url = $_SESSION['url'];
			}else{ 
				$url = "../";
			}
			header('location:'.$url);
		}
		else{
			$logregwarning = 'Your email or password is wrong.';
		}
	}
}



?>
<div class="global-container">
	<div class="form-container">
		<div class="largetitle">Log In</div>
		<div class="logregwarning"><?php echo $logregwarning; ?></div>
		<form name="loginform" id='loginform' class="uploadformcomp" method="POST" action="../login/" enctype="application/x-www-form-urlencoded">
			<input type="email" name="email" id="emailbox" title="Enter your Email" placeholder="Enter your Email" maxlength="32" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>" required />
			<input type="password" name="pass" id="?" size="20" title="Enter your Password" placeholder="Enter your Password" maxlength="20" required/>
			<label><input type="checkbox" name="keeplogged" value="?" checked="checked" />Keep me logged in</label>
			<span class=" forgotpass"><a href="">Forgot Password?</a></span>
			<input type="submit" name="loginbtn" id="loginbtn" class="submitbtn" value="Log in" disabled="disabled"/>
		</form>
		<div class="noaccount">Don't have an Account? <a href="../register/">Create an account</a></div>
	</div>
	<div class="promo-section-bottom promo">
		<span class="promoclose"><i class="fa fa-close" aria-hidden="true"></i></span>
		<div class="promo-box">
			<img src="../assets/images/promolong.jpg" class="ad-long-img">
		</div>
	</div>
</div>
<?php
echo"
<script type='text/javascript'>

</script>
";
include '../footer.php';
}
?>