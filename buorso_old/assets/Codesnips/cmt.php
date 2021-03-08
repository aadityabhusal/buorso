<?php
@$con = mysqli_connect('localhost','root','','buorso');

if(isset($_POST['commentbox'])){
	if(!empty($_POST['commentbox'])){
		$comment = mysqli_real_escape_string($con,nl2br(htmlentities(trim($_POST['commentbox']))));
		$userid = $_POST['userid'];
		$produserid = $_POST['produserid'];
		$productid = $_POST['productid'];
		$status ="1";
		
		$insertcomment = "INSERT INTO comments(comment_id,comment,user_id,product_id,likes,date,status) VALUES('','$comment','$userid','$productid','',NOW(),'$status')";
		if(mysqli_query($con,$insertcomment)==true){
			if($userid!=$produserid){
				$notifsql = "INSERT INTO notifications(sender_id,reciever_id,info,date,product_id,status) VALUES('$userid','$produserid','commented on your',NOW(),'$productid','0')";
				$notifrun = mysqli_query($con,$notifsql);
			}
		}
		
	}
}
?>