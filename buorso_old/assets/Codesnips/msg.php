<?php
@$con = mysqli_connect('localhost','root','','buorso');

if(isset($_POST['messagebox'])){
	if(!empty(trim($_POST['messagebox']))){
		$msgtxt =  mysqli_real_escape_string($con,nl2br(htmlentities(trim($_POST['messagebox']))));
		$reciever = $_POST['recieverid'];
		$userid = $_POST['userid'];
		$status='0';
		$msginsert ="INSERT INTO messages(msg_id,message,sender_id,reciever_id,date,status) VALUES('','$msgtxt','$userid','$reciever',NOW(),'$status')";
		if(mysqli_query($con,$msginsert)==true){
			echo"<script>alert('Message successfully sent!');</script>";
			header("Location: " . $_SERVER['REQUEST_URI']);
			exit();
		}		
	}
} 

?>