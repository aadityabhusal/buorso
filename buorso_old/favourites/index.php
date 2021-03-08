<?php
include '../core.php';
if(isset($userid)){

$title = "Favourites - Buorso";
$filedir = "../";
include '../header.php';


$per_page=10;
if(isset($_GET['page'])){
	$page = $_GET['page'];
}else{
	$page=1;
}
$start_from = ($page-1) * $per_page;


if(isset($_POST['favformbtn'])){
	$favformbtn = $_POST['favformbtn'];
	$favidrem = $_POST['favidrem'];
	$favinsert = "DELETE FROM favourites WHERE fav_id='$favidrem'";
	if(mysqli_query($con,$favinsert)==true){
		header("Location: " . $_SERVER['REQUEST_URI']);
		exit();
		}else{
			echo "<script>alert('Unuccessful!')</script>";
		}
}
?>
<div class="global-container">
	<div class="container">
		<div class="favourites-section">
			<div class="favourites-head">
				<h3 class="favourites-title">Favourites</h3>
			</div>
			<div class="favourites-area dib-vat">
				<div class="favourite-results">
					<?php
						$favquery = "SELECT * FROM favourites WHERE favuser_id='$userid' ORDER BY date DESC LIMIT $start_from,$per_page";
						$runfavquery = mysqli_query($con,$favquery);
						if(mysqli_num_rows($runfavquery)>0){
						while($favrow = mysqli_fetch_assoc($runfavquery)){
							$favid = $favrow['fav_id'];
							$favprodid = $favrow['favprod_id'];
							
							$favprodquery = "SELECT * FROM products WHERE product_id='$favprodid'";
							$runfavprodquery = mysqli_query($con,$favprodquery);
							$row=mysqli_fetch_assoc($runfavprodquery);
			
								$prodid = $row['product_id'];
								$prodimg = $row['image'];
								$produserid = $row['user_id'];
								$prodtitle = $row['title'];
								$prodprice = $row['price'];
								$prodbio = $row['description'];
								$produserquery = "SELECT user_id,firstname,lastname FROM users WHERE user_id='$produserid'";
								$produserrun = mysqli_query($con,$produserquery);
								$row2 = mysqli_fetch_array($produserrun);
								$produserfname = $row2['firstname'];
								$produserlname = $row2['lastname'];
								echo "
								<div class='result'>
									<div class='prodbox'>
										<div class='addfav remfav'>
											<form id='favform' method='POST' action='#' enctype='application/x-www-form-urlencoded'>
												<input type='submit' name='favformbtn' class='favstarfull' value='&#xf005;' title='Remove from Favourites'>
												<input type='hidden' name='favidrem' value='$favid' />
											</form>
										</div>
										<div class='prodimg dib-vat'><a href='../product/?productid=$prodid'><img class='all0' src='../product/images/$prodimg' title='$prodtitle'></a></div>
										<div class='prodinfo dib-vat'>
											<div class='prodtitle'><a href='../product/?productid=$prodid' class='elips2' title='$prodtitle'>$prodtitle</a></div>							
											<div class='prodowner'>by <a href='../user/?userid=$produserid' title='$produserfname $produserlname'>$produserfname $produserlname</a></div>
											<div class='prodprice'>$$prodprice</div>
										</div>
									</div>
								</div>";
							}
						}else{
						echo"<div style='font-size:20px; width:630px; padding:10px 0 0 20px;'>No Favourites to show</h3></div>";
						}
					?>
				<?php 
		$paginationquery = "SELECT * FROM favourites WHERE favuser_id='$userid'";
		$runpaginationquery = mysqli_query($con,$paginationquery);
		$count = mysqli_num_rows($runpaginationquery);
		$total_pages = ceil($count/$per_page);
		
			if($count>=10){
		echo "<ul class='pagination-list'>";
	for($i=1;$i<=$total_pages;$i++){
		if($i==$page){
			$color="#ecf0f1";
		}else{
			$color="white";
		}
		echo "<li class='pagination-num' style='background:$color;'>
		<a href='../favourites/?page=$i'> $i </a>
		</li>";
	}
	echo "</ul>";
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
	<div class="promo-section-bottom promo">
		<span class="promoclose"><i class="fa fa-close" aria-hidden="true"></i></span>
		<div class="promo-box">
			<img src="../assets/images/promolong.jpg" class="ad-long-img">
		</div>
	</div>
</div>
<?php
echo"
<script>

</script>
";

include '../footer.php';
}else{
header('location:../login/');
}
?>