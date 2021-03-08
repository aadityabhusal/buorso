<?php
session_start();
include '../../core.php';
if(isset($userid)){
$filedir = "../../";
$title = "Account Settings - Buorso";
include '../../header.php';

if(isset($_POST['newpasswordsave'])){
	if(!empty($_POST['currentpass']) && !empty($_POST['newpass'])){
		$currentpass = md5(mysqli_real_escape_string($con,htmlentities(trim($_POST['currentpass']))));
		$newpass = md5(mysqli_real_escape_string($con,htmlentities(trim($_POST['newpass']))));

		$passchecksql = "SELECT password FROM users WHERE user_id='$userid' AND password='$currentpass'";
		$passcheckrun = mysqli_query($con,$passchecksql);
		if(mysqli_num_rows($passcheckrun)==1){
			if(strlen($_POST['newpass'])>=8){
				$passinsertsql = "UPDATE users SET password='$newpass' WHERE user_id='$userid'";
				if(mysqli_query($con,$passinsertsql)){
					header('Location: '.$filedir.'user/');
				}
			}else{
				echo "<script>alert('New Password is too short!');</script>";
			}
		}else{
			echo "<script>alert('Wrong Password!');</script>";
		}
	}else{
		echo "<script>alert('Please Enter All the Fields!');</script>";
	}
}


if(isset($_POST['newemailsave'])){
	if(!empty($_POST['newemail'])){
		$newemail = mysqli_real_escape_string($con,htmlentities(trim($_POST['newemail'])));
		$newemailsql = "UPDATE users SET tempemail='$newemail' WHERE user_id='$userid'";
		if(mysqli_query($con,$newemailsql)){
			header("Location: ".$filedir."user/");
		}
	}
}





if(isset($_POST['deleteuserbtn'])){
	$deleteuserquery="DELETE FROM users WHERE user_id='$userid'";
	if($profileimg!="default.png"){
	unlink('../../user/images/'.$profileimg);
	}
	if(mysqli_query($con,$deleteuserquery)==true){
		$deleteuserprod="DELETE FROM products WHERE user_id='$userid'";
			$remuserprodimg="SELECT * FROM products WHERE user_id='$userid'";
			$runremuserprodimg = mysqli_query($con,$remuserprodimg);
			while($remprodimg = mysqli_fetch_assoc($runremuserprodimg)){
				$remimg = $remprodimg['image'];
				unlink('../../product/images/'.$remimg);
			}
		if(mysqli_query($con,$deleteuserprod)==true){
			$deleteusercmt="DELETE FROM comments WHERE user_id='$userid'";
			if(mysqli_query($con,$deleteusercmt)==true){
				$deleteuserfav="DELETE FROM favourites WHERE favuser_id='$userid'";
				if(mysqli_query($con,$deleteuserfav)==true){
					$deleteusermsg="DELETE FROM messages WHERE sender_id='$userid' OR reciever_id='$userid'";
					if(mysqli_query($con,$deleteusermsg)==true){
						session_destroy();
						setcookie('id','',time()-86400,'/');
						header("Location: ".$filedir);
						exit();
					}
				}
			}
		}
	}
}

?>
<div class="global-container">
	<div id="modal-bg" onclick="exit_msgbox();"></div>
	<div id="modal">
		<div class="modal-head">
			<h3 class="smltitle">Confirm Delete</h3>
		</div>
		<form name="deleteuserform" id="deleteuserform" method="POST" action='../account/' enctype="application/x-www-form-urlencoded">
			<div class="modal-body">
				<div class="msgbox-to">Are you sure you want to delete your account?</div>
			</div>
			<div class="modal-foot">
				<span class="cancelbtn" style="cursor: pointer;" onclick="exit_msgbox();">Cancel</span>
				<input type="submit" name="deleteuserbtn" class="savebtn" value="Delete">
			</div>
		</form>
	</div>
	<div class="container">
		<div class="left-section dib-vat">
			<h4 class="left-list-title h4lb">Settings</h4>
			<ul class="left-list">
				<li><a href="../../settings/">Profile Settings</a></li>
				<li class="active"><a href="../account">Account Settings</a></li>
				<li><a href="../privacy">Privacy Settings</a></li>
			</ul>
		</div>
		<div class="settings-section dib-vat">
			<h3 class="settings-title h3lb">Account Settings</h3>
			<div class="setting-content">
				<ul class="settings-list">
					<li>
						<label>Email</label>
						<div class="settings-label">Primary Email</div>
						<div class="settings-info"><?php echo $email;?></div>
						<div class="settings-label">Change Email</div>
						<div class="settings-info">
							<form class="accountform" method="POST" action="../account/">
								<input type="email" name="newemail" class="newemail" maxlength="20" placeholder="Enter the New Email" required="required"/>
								<input type="submit" class="savebtn" name="newemailsave" value="Change Email" />
								<p style="font-size:14px; margin-top: 15px; color: #7f8c8d;">*Your email will not be changed until the new email is verified.</p>
							</form>
						</div>
					</li>
					<li>
						<label>Password</label>
						<div class="settings-label">Change Password</div>
						<div class="settings-info">
							<form class="accountform" method="POST" action="../account/">
								<input type="password" name="currentpass" class="edpass1" maxlength="20" placeholder="Enter the Current Password" required="required"/>
								<input type="password" name="newpass" class="" maxlength="20" placeholder="Enter the New Password" required="required"/>
								<input type="submit" class="savebtn" name="newpasswordsave" value="Change Password" />
							</form>
						</div>
					</li>
					<li>
						<label>Connect Other Accounts</label>
						<div class="settings-label"><i class="fa fa-facebook-official" aria-hidden="true"></i>Facebook</div>
						<div class="settings-info"><a href="#">Connect your Facebook Account</a></div>
						<div class="settings-label"><i class="fa fa-twitter" aria-hidden="true"></i>Twitter</div>
						<div class="settings-info"><a href="#">Connect your Twitter Account</a></div>
					</li>
					<li>
						<label>Advanced Settings</label>
						<div class="settings-label">Delete Account</div>
						<div id="deleteuserbtn" class="settings-info" onclick="show_msgbox();">Delete your Account</div>
					</li>							
				</ul>
			</div>
		</div>
	</div>
</div>
<?php
include '../../footer.php';
}else{
header('location:../../login/');
}
?>