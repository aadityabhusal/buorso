<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
include 'core.php';

$title = "Buorso - Buy Or Sell Online";
$filedir = "";
include 'header.php';

?>

<div class="global-container">
	<!--<div class="promo-section-top promo">
	<span class="promoclose"><i class="fa fa-close" aria-hidden="true"></i></span>
		<div class="promo-box">
			<img src="assets/images/promolong.jpg" class="ad-long-img">
		</div>
	</div>-->
	<div class="container">
		<div class="featured-container">
		<div class="">
			<div class="smltitle">Featured Ads</div>
					<?php
					$getmyprod = "SELECT * FROM products ORDER BY RAND() LIMIT 8";
					$rungetmyprod = mysqli_query($con,$getmyprod);
						 while($row2 = mysqli_fetch_assoc($rungetmyprod)){
							$prodid = $row2['product_id'];
							$prodimg = $row2['image'];
							$prodtitle = $row2['title'];
							$prodprice = $row2['price'];
							 echo "
							 <div class='prodbox'>
							 <div class='prodimg'><a href='product/?productid=$prodid'><img class='all0' src='product/images/$prodimg' title='$prodtitle'></a></div>
							 <div class='prodtitle'><a href='product/?productid=$prodid' class='elips2' title='$prodtitle'>$prodtitle</a></div>
							 <div class='prodprice' style='float:left;'>रु&nbsp;$prodprice</div></div>";
						 }
					?>
		</div>
	<div class="promo-section-bottom promo">
		<span class="promoclose"><i class="fa fa-close" aria-hidden="true"></i></span>
		<div class="promo-box">
			<img src="assets/images/promolong.jpg" class="ad-long-img">
		</div>
	</div>
		</div>
	
		<div class="category-section">
			<div class="smltitle">Select a Category</div>
			<div class="category-list dib-vat">
				<?php
				$categoryquery = "SELECT id,name,iconname,color FROM categories WHERE type='Category' ORDER BY placenum ASC";
				$runcategoryquery = mysqli_query($con,$categoryquery);
				while($catrow = mysqli_fetch_assoc($runcategoryquery)){
					$catname = $catrow['name'];
					$caticonname = $catrow['iconname'];
					$catcolor = $catrow['color'];
					$catid = $catrow['id'];
					echo"<div class='category-box'>
						<a href='category/?catid=$catid' class='cblink'>
							<i class='fa $caticonname' style='color:#$catcolor;' aria-hidden='true'></i>
							<div class='category-box-name'>$catname</div>
						</a>
					</div>";
				}
				?>
			</div>
		<div class="promo-section-side dib-vat promo">
		<span class="promoclose"><i class="fa fa-close" aria-hidden="true"></i></span>
			<div class="promo-box">
				<img class="" src="assets/images/promosmall.JPG">
			</div>
		</div>	
		</div>

		<div class="prod-slider-container">
		<div class="prod-slider">
			<div class="smltitle">Trending Ads</div>
			<ul class="prod-slider-list" id="img-list">
					<?php
					$getmyprod = "SELECT * FROM products ORDER BY RAND() LIMIT 12";
					$rungetmyprod = mysqli_query($con,$getmyprod);
						 while($row2 = mysqli_fetch_assoc($rungetmyprod)){
							$prodid = $row2['product_id'];
							$prodimg = $row2['image'];
							$prodtitle = $row2['title'];
							$prodprice = $row2['price'];
							 echo "
							 <li class='dib-vat'>
							 <div class='prodbox'>
							 <div class='prodimg'><a href='product/?productid=$prodid'><img class='all0' src='product/images/$prodimg' title='$prodtitle'></a></div>
							 <div class='prodtitle'><a href='product/?productid=$prodid' class='elips2' title='$prodtitle'>$prodtitle</a></div>
							 <div class='prodprice' style='float:left;'>रु&nbsp;$prodprice</div></div></li>";
						 }
					?>
			</ul>
		</div>
			<div id="left" class="arrow" onclick="goright()"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
			<div id="right" class="arrow" onclick="goleft()"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
		</div>
	</div>
	<div class="promo-section-bottom promo">
		<span class="promoclose"><i class="fa fa-close" aria-hidden="true"></i></span>
		<div class="promo-box">
			<img src="assets/images/promolong.jpg" class="ad-long-img">
		</div>
	</div>
</div>


<?php
echo"
<script>

 var slider = document.getElementById('img-list');
//Right Sliding Function
function goright(){
  if (slider.style.left == '-2096px'){
     slider.style.left = '-1048px';
     }else{
       slider.style.left = '0px';
    }
}
goright();
//Left Sliding Function
function goleft(){
  if (slider.style.left == '-1048px'){
     slider.style.left = '-2096px';
     }else if (slider.style.left == '0px'){
         slider.style.left = '-1048px';
    }else{
     slider.style.left = '0px';
	}
}
 
</script>
";
include 'footer.php';
?>