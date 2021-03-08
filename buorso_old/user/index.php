<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
include '../core.php';

if(isset($_GET['userid'])){
	$user_id = preg_replace('#[^0-9]#i','',mysqli_real_escape_string($con,$_GET['userid']));
	$userquery = "SELECT * FROM users WHERE user_id='$user_id'";
	$userqueryrun = mysqli_query($con,$userquery);
	if(mysqli_num_rows($userqueryrun)>0){
		$row = mysqli_fetch_array($userqueryrun);
		$userfname = $row['firstname'];
		$userlname = $row['lastname'];
		$userimg = $row['profile_image'];
		$useremail = $row['email'];
		$userjoined = $row['date_joined'];
		$userbio = $row['profile_bio'];
		$userprofession = $row['profession'];
		$useraddress = $row['address'];
		$usercountry = $row['country'];
		$userstaus = $row['status'];
	}else{
		header('location:../');
	}
}else{
		header('location:../user/?userid='.$userid);
}

$title = $userfname." ".$userlname.' - Buorso';
include '../header.php';

if(isset($_POST['savebtn'])){
	if(!empty(trim($_POST['msgbox-msg']))){
		$msgboxmsg = mysqli_real_escape_string($con,nl2br(htmlentities(trim($_POST['msgbox-msg']))));
		$status='0';
		$msginsert ="INSERT INTO messages(msg_id,message,sender_id,reciever_id,date,status) VALUES('','$msgboxmsg','$userid','$user_id',NOW(),'$status')";
		if(mysqli_query($con,$msginsert)==true){
			echo"<script>alert('Message successfully sent!');</script>";
			header("Location: " . $_SERVER['REQUEST_URI']);
			exit();
		}
	}
}


?>
<div class="global-container">
	<div class="promo-section-top promo">
	<span class="promoclose"><i class="fa fa-close" aria-hidden="true"></i></span>
		<div class="promo-box">
			<img src="../assets/images/promolong.jpg" class="ad-long-img">
		</div>
	</div>
	<div id="modal-bg" onclick="exit_msgbox();"></div>
	<div id="modal">
		<div class="modal-head">
			<h3 class="smltitle">Message</h3>
		</div>
		<form name="msgbox-form" id="msgbox-form" method="POST" action='<?php echo $filedir?>user/?userid=<?php echo $user_id ?>'>
			<div class="modal-body">
				<div class="msgbox-to">To : <?php echo $userfname." ".$userlname; ?></div>
				<div class="msgbox-msgcont">
					<textarea id='msgbox-msg' name='msgbox-msg' class='msgbox-msg sml-scrl' placeholder='Write a message'></textarea>
				</div>
			</div>
			<div class="modal-foot">
				<span class="cancelbtn" onclick="exit_msgbox();">Cancel</span>
				<input type="submit" name="savebtn" class="savebtn" value="Message">
			</div>
		</form>
	</div>
	<div class="container">
		<div class="profile-header">
			<div class="left-section dib-vat">
				<div class="image-container">
					<img class="all0" src="images/<?php echo $userimg; ?>" alt="<?php echo $userfname." ".$userlname; ?>" title="<?php echo $userfname." ".$userlname; ?>"/>
					<?php if($user_id==$userid){echo"<a href='../settings/' class='profedit' title='Edit Profile Image'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";}
					?>
				</div>
				<?php
				if($user_id!=$userid && isset($userid)){
					echo '
					<div class="msg-btn-bx" onclick="show_msgbox();">
						<a class="msg-btn">
							<i class="fa fa-envelope-o" aria-hidden="true"></i><span class="msg-title">Message</span>
						</a>
					</div>';
				}
				?>
				
			</div>
			<div class="mid-section dib-vat sml-scrl">
				<h1 class="user-name"><?php echo $userfname." ".$userlname; ?></h1>
				<h3 class="user-position"><?php if(strlen($userprofession)<=0 && $user_id==$userid){echo '<a href="../settings/" style="font-size:20px;">Enter Your Profession</a>';}else{echo $userprofession;}?></h3>
				<div class="user-bio"><?php if(strlen($userbio)<=0 && $user_id==$userid){echo '<a href="../settings/" style="font-size:16px;">Enter Your Description</a>';}else{ echo $userbio;}?></div>
			</div>
			<div class="right-section dib-vat">
			<!--<div class="promo-section-side dib-vat promo">
					<span class="promoclose"><i class="fa fa-close" aria-hidden="true"></i></span>
					<div class="promo-box">
						<img class="" src="../assets/images/promosmall.JPG">
					</div>
				</div>-->
				<ul class="user-stat">
					<li><div class="r1"><i class="fa fa-map-marker" aria-hidden="true"></i>Residence</div><div class="r2"><?php if(strlen($useraddress)<=0 && strlen($usercountry)<=0 && $user_id==$userid){echo '<a href="../settings/" style="font-size:13px;">Enter Your Location</a>';}else{ echo $useraddress.' '.$usercountry;} ?></div></li>
					<li><div class="j1"><i class="fa fa-calendar" aria-hidden="true"></i>Joined</div><div class="j2"><?php echo substr($userjoined,0,10);?></div></li>
					<li><div class="tv1"><i class="fa fa-eye" aria-hidden="true"></i>Total Views</div><div class="tv2">0</div></li>
				</ul>				
			</div>
		</div>
		<div class="profile-body">
			<div class="">
				<div class="prodlist">
					<?php
					$getmyprod = "SELECT * FROM products WHERE user_id='$user_id' ORDER BY date DESC";
					$rungetmyprod = mysqli_query($con,$getmyprod);
					if(mysqli_num_rows($rungetmyprod)>0){
						while($row2 = mysqli_fetch_assoc($rungetmyprod)){
							$prodid = $row2['product_id'];
							$prodimg = $row2['image_thumb'];
							$prodtitle = $row2['title'];
							$prodprice = $row2['price'];
							 echo "
							 <div class='prodbox'>
							 <div class='prodimg'><a href='../product/?productid=$prodid'><img class='all0' src='../product/images/$prodimg' title='$prodtitle'></a></div>
							 <div class='prodtitle'><a href='../product/?productid=$prodid' class='elips2' title='$prodtitle'>$prodtitle</a></div>
							 <div class='prodprice' style='float:left;'>रु&nbsp;$prodprice</div>";
							 if($user_id==$userid){echo"<a href='../edit/?productid=$prodid' class='prodedit' title='Edit Product'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";}
							 echo"</div>";
						}
					}else{
						echo"<div style='font-size:20px; padding:10px; text-align:center;'>No Ads to show.</div>";
					}
					?>
					
				</div>
			</div>
		</div>
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

echo"
<script>
function openPage(URL) { aWindow=window.open(URL,'Large','toolbar=no,width=500,height=400,status=no,scrollbars=yes,resize=no,menubars=no');}

</script>
"

//}else{
//header('location:../login/');
//}
?>