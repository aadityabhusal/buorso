<?php
@$con = mysqli_connect('localhost','root','','buorso');

if(isset($_POST['productid'])){
	$favprodid = $_POST['productid'];
	$userid = $_POST['userid'];
	$favcheck = "SELECT * FROM favourites WHERE favprod_id='$favprodid' AND favuser_id='$userid'";
	$runfavcheck=mysqli_query($con,$favcheck);
	if(mysqli_fetch_assoc($runfavcheck)>0){
	$favrem = "DELETE FROM favourites WHERE favprod_id='$favprodid' AND favuser_id='$userid'";
	if(mysqli_query($con,$favrem)==true){
		echo"<script>alert('Comment successfully sent.')</script>";
		header("Location: " . $_SERVER['REQUEST_URI']);
		exit();
		}else{
			echo "<script>alert('Unuccessful!')</script>";
		}
	}else{
	$favinsert = "INSERT INTO favourites(fav_id,favprod_id,favuser_id,date) VALUES('','$favprodid','$userid',NOW())";
	if(mysqli_query($con,$favinsert)==true){
		echo"<script>alert('Comment successfully sent.')</script>";
		header("Location: " . $_SERVER['REQUEST_URI']);
		exit();
		}else{
			echo "<script>alert('Unuccessful!')</script>";
		}
	}
}
?>