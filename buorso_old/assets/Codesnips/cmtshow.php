<?php
@$con = mysqli_connect('localhost','root','','buorso');
$filedir = "../";
if(isset($_POST['productid'])){
$productid = $_POST['productid'];
$getcomment = "SELECT * FROM comments WHERE product_id='$productid' ORDER BY date ASC";
$rungetcomment = mysqli_query($con,$getcomment);

		$num = mysqli_num_rows($rungetcomment);
		echo "<div class='totalcomments'>($num)</div>";
		
		if($num==0){
		echo "<div class='nocomments'>No comments to show</div>";
		}
		
	 while($row3 = mysqli_fetch_assoc($rungetcomment)){
		$comment = $row3['comment'];
		$comdate = $row3['date'];
		$commenterid = $row3['user_id'];
		
		
		
		$getcommenter = "SELECT * FROM users WHERE user_id='$commenterid'";
		$rungetcommenter = mysqli_query($con,$getcommenter);
		$row4 = mysqli_fetch_assoc($rungetcommenter);
		
		$commentername = $row4['firstname'].' '.$row4['lastname'];
		$commenterimg = $row4['profile_image'];
		
		 echo "
		 <div class='comment'>
		 <div class='commentimg dib-vat'><a href='".$filedir."user/?userid=$commenterid'><img class='all0' src='".$filedir."user/images/$commenterimg' title='$commentername'></a></div>
		 <div class='commentcontent dib-vat'>
		 <div class='commentname dib-vat'><a href='".$filedir."user/?userid=$commenterid' class='elips2' title='$commentername'>$commentername</a></div>
		  <div class='commentdate'>".substr($comdate,0,10)."</div>
		 <div class='commentbody'>$comment</div>
		</div></div>";
	 }
}
?>