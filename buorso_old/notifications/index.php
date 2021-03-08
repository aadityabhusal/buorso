<?php
include '../core.php';
if(isset($userid)){

$title ="Notifications - Buorso";
include '../header.php';

?>
<div class="global-container">
	<div class="container">
		<div class="notifs-section">
			<div class="notifs-head">
				<h3 class="notifs-title">Notifications</h3>
			</div>
			<div class="notifs-area dib-vat">
				<div class="notif-results">
					<?php 
						$notifsql = "SELECT notifications.sender_id,notifications.reciever_id,notifications.info,notifications.date,notifications.product_id,notifications.status,users.firstname,users.lastname FROM notifications LEFT JOIN users ON notifications.sender_id=users.user_id WHERE reciever_id='$userid' ORDER BY date DESC";
						if($notifrun = mysqli_query($con,$notifsql)){
							if(mysqli_num_rows($notifrun)>0){
								while ($notifrow = mysqli_fetch_array($notifrun)) {
									$sender = $notifrow['sender_id'];
									$firstname = $notifrow['firstname'];
									$lastname = $notifrow['lastname'];
									$reciever = $notifrow['reciever_id'];
									$info = $notifrow['info'];
									$date = $notifrow['date'];
									$product = $notifrow['product_id'];
									$status = $notifrow['status'];
									if($status==0){
										$class = ' newnotif';
									}else{
										$class = '';
									}
									echo"
									<div class='results".$class."'>
										<div class='notifbox'>
											<div class='notifuser'><a href='../user/?userid=$sender' title='$firstname $lastname'>$firstname $lastname</a> $info <a href='../product/?productid=$product' title='Product Page'>product</a>.<span class='notifdate'>".substr($date,0,10)."</span></div>
										</div>
									</div>
									";

								}
								$removenotif = "UPDATE notifications SET status='1' WHERE sender_id='$sender' AND reciever_id='$userid' AND status='0'";
								$removenotifrun = mysqli_query($con,$removenotif);
							}else{
						echo"<div style='font-size:20px; width:630px; padding:10px 0 0 20px;'>No Notifications to show</h3></div>";
						}
						}
					?>
				</div>
			</div>
			<div class="promo-section-side dib-vat promo">
			<span class="promoclose"><i class="fa fa-close" aria-hidden="true"></i></span>
				<div class="promo-box">
					<img class="" src="../assets/images/promosmall.JPG">
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include '../footer.php';
}else{
header('location:../login/');
}
?>