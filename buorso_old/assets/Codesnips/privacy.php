<?php 
@$con = mysqli_connect('localhost','root','','buorso');

if ((isset($_POST['type']) && isset($_POST['privacy']) && isset($_POST['produserid'])) && ($_POST['privacy']==0 || $_POST['privacy']==1)) {
	$type = substr($_POST['type'],7,strlen($_POST['type']));
	$privacy = $_POST['privacy'];
	$produserid = $_POST['produserid'];


	$privacysql = "UPDATE settings SET ".$type."='$privacy' WHERE user_id='$produserid'";
	if (mysqli_query($con,$privacysql)) {
		if ($privacy==0) {
			echo $privacyupdate =1;
		}elseif($privacy==1){
			echo $privacyupdate =0;
		}
	}
}
?>