<?php
@$con = mysqli_connect('localhost','root','','buorso');

$userid = $_POST['userid'];
$msgnumquery = "SELECT status,reciever_id,sender_id FROM messages WHERE status='0' AND reciever_id='$userid'";
$msgnumqueryrun = mysqli_query($con,$msgnumquery);
$totalnum = mysqli_num_rows($msgnumqueryrun);
if($totalnum>0){
	echo $totalnum;
	$msgnumdisp = "block";
}else{
	$msgnumdisp = "none";
}

?>