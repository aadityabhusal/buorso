<?php
@$con = mysqli_connect('localhost','root','','buorso');

			
if(isset($_POST['userid'])){
	$userid = $_POST['mainuserid'];
	if($_POST['userid']!=$userid){
	$getid=$_POST['userid'];
	$msgquery = "SELECT * FROM messages WHERE (reciever_id='$userid' OR sender_id='$userid') AND (reciever_id='$getid' OR sender_id='$getid') ORDER BY date ASC";
	 $runmsgquery = mysqli_query($con,$msgquery);
		 
	while($row3 = mysqli_fetch_assoc($runmsgquery)){
		$msgid = $row3['msg_id'];
		$message = $row3['message'];
		$sendid = $row3['sender_id'];
		$recieveid = $row3['reciever_id'];
		$date = $row3['date'];
		 if($sendid!=$userid){ 
			echo"<div class='msgtxtwrapcont' style='text-align:left;'><div class='msgtxtwrap mw1' title='$date'><div class='msgtxtcont mc1'><span class='msgtxt mt1'>$message</span></div></div></div>";
		 }else{ 
			echo"<div class='msgtxtwrapcont' style='text-align:right;'><div class='msgtxtwrap mw2' title='$date'><div class='msgtxtcont mc2'><span class='msgtxt mt2'>$message</span></div></div></div>";
		 }
		 
		
	}

	$removemsgquery = "UPDATE messages SET status='1' WHERE sender_id='$getid' AND reciever_id='$userid' AND status='0'";
	$removemsgqueryrun = mysqli_query($con,$removemsgquery);
	
	}else{
		header('Location: ../messages/');
	}
}else{
	echo"<h4 style='text-align:center; color:#7f8c8d'>Select a person from your contact.</h4>";
}
?>