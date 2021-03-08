<?php
@$con = mysqli_connect('localhost','root','','buorso');

$userid = $_POST['userid'];
$notifnumquery = "SELECT status,reciever_id,sender_id FROM notifications WHERE status='0' AND reciever_id='$userid'";
$notifnumqueryrun = mysqli_query($con,$notifnumquery);
$totalnum = mysqli_num_rows($notifnumqueryrun);
if($totalnum>0){
	echo $totalnum;
	$notifnumdisp = "block";
}else{
	$notifnumdisp = "none";
}

?>