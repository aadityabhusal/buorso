<?php
@$con = mysqli_connect('localhost','root','','buorso');
					
$mainuserid = $_POST['mainuserid'];
if(isset($mainuserid)){
	echo"<div class='addfav'>";
	$userid = $_POST['userid'];
	$favornotid = $_POST['productid'];
	$favornot = "SELECT * FROM favourites WHERE favprod_id='$favornotid' AND favuser_id='$userid'";
	$runfavornot = mysqli_query($con,$favornot);
	if(mysqli_fetch_assoc($runfavornot)>0){
		$starblue = "starblue";
		$icon = "fa-star";
		$favtext = "Remove from Favourites";
	}else{
		$starblue = "";
		$icon = "fa-star-o";
		$favtext = "Add to Favourites";
	}

		echo"<form id='favform' method='POST' action='#' enctype='application/x-www-form-urlencoded'>
			<button type='button' name='favformbtn' class='favformbtn $starblue' onclick='checkfav();'>
			<i class='fa $icon' aria-hidden='true'></i>
			<span class='addfavtxt'>$favtext</span>
			</button>
		</form>
	</div>";
}
?>