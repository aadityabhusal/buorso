<?php
include '../core.php';
if(isset($userid)){
$title = "Profile Settings - Buorso";
include '../header.php';

if(isset($_POST['save'])){
	if(empty(preg_replace("/\s|&nbsp;/",'',$_POST['fname'])) || empty(preg_replace("/\s|&nbsp;/",'',$_POST['lname']))){
		echo "<script>alert('You Cannot Leave Your Name Empty!')</script>";
	}else{
		$fname = mysqli_real_escape_string($con,htmlentities(trim($_POST['fname'])));
		$lname = mysqli_real_escape_string($con,htmlentities(trim($_POST['lname'])));
		$profession = mysqli_real_escape_string($con,htmlentities(trim($_POST['profession'])));
		$address = mysqli_real_escape_string($con,htmlentities(trim($_POST['address'])));
		$bio = mysqli_real_escape_string($con,nl2br(htmlentities(trim($_POST['descriptionbox']))));
		
		if($_FILES["userimg"]["error"] != 4){
		$userimgname =  explode(".", htmlentities($_FILES["userimg"]["name"]));
		$newuserimgname = round(microtime(true)) . '.' . end($userimgname);
		$userimgsize = $_FILES['userimg']['size'];
		$userimgtype = $_FILES['userimg']['type'];
		$userimgtemp = $_FILES['userimg']['tmp_name'];
		$loc = '../user/images/';
		unlink($loc.$userimg);
		move_uploaded_file($userimgtemp,$loc.$newuserimgname);
		
		$updateimg = "UPDATE users SET profile_image='$newuserimgname' where user_id ='$userid'";
		$runupdateimg = mysqli_query($con,$updateimg);
		}
		
		$updatequery = "UPDATE users SET firstname='$fname', lastname='$lname', profession='$profession',address='$address',profile_bio='$bio' where user_id ='$userid'";
		if($runupdate = mysqli_query($con,$updatequery)){
			header('location:../user/?userid='.$userid);
		}else{
			echo "<script>alert('Update Failed!')</script>";
		}
	}

}

?>
<div class="global-container">
	<div class="container">
		<div class="left-section dib-vat">
			<h4 class="left-list-title h4lb">Settings</h4>
			<ul class="left-list">
				<li class="active"><a href="../settings/">Profile Settings</a></li>
				<li><a href="../settings/account">Account Settings</a></li>
				<li><a href="../settings/privacy">Privacy Settings</a></li>
			</ul>
		</div>
		<div class="settings-section dib-vat">
			<h3 class="settings-title h3lb">Profile Settings</h3>
			<div class="setting-content">
				<form name="?" id="editform" class="uploadformcomp" method="POST" action="../settings/" enctype="multipart/form-data">
					<div class="edit-img dib-vat">
						<div class="image-container">
							<img class="all0" id="dispimg" src="../user/images/<?php echo $profileimg; ?>"/>
							<input type="file" name="userimg" id="file" />
							<label class="filelabel" for="file">Change Image</label>
						</div>
					</div>
					<div class="edit-info form-container nompb dib-vat">
						<label>Edit your Profile Information</label>
						<input type="text" name="fname" class="fname" value="<?php echo $fname; ?>" placeholder="Enter Your First Name" required/>
						<input type="text" name="lname" class="lname" value="<?php echo $lname; ?>" placeholder="Enter Your Last Name" required/>
						<input type="text" name="profession" value="<?php echo $profession; ?>" placeholder="Enter Your Profession"/>
						<input type="text" name="address" value="<?php echo $address; ?>" placeholder="Enter Your Residence/ Location"/>
					</div>
					<div class="edit-bio">
						<label>Edit your Description</label>
							<textarea name="descriptionbox" id="descriptionbox" class="sml-scrl" maxlength="2048" placeholder="Enter the description of your Product"><?php $breaks = array("<br />","<br>","<br/>");  
							$text = str_ireplace($breaks, "", $bio); 
							echo $text ?></textarea>
					</div>
					<input type="submit" class="savebtn submitbtn" name="save" value="Save Changes"/>
					<a href="../user/?userid=<?php echo $userid ?>" class="cancelbtn">Cancel</a>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
echo"<script type='text/javascript'>
</script>";

include '../footer.php';
}else{
header('location:../login/');
}
?>