<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI']; 

include '../core.php';
if(empty($_GET['search'])){$titlename='Search Results';}else{$titlename=  mysqli_real_escape_string($con,htmlentities(trim($_GET['search'])));}
$title = $titlename."- Buorso";
include '../header.php';

$per_page=10;
if(isset($_GET['page'])){
	$page = htmlentities(trim($_GET['page']));
}else{
	$page=1;
}
$start_from = ($page-1) * $per_page;
?>

<div class="global-container">
	<!--<div class="promo-section-top promo">
	<span class="promoclose"><i class="fa fa-close" aria-hidden="true"></i></span>
		<div class="promo-box">
			<img src="../assets/images/promolong.jpg" class="ad-long-img">
		</div>
	</div>-->
	<div class="container">
	<div class="results-section">
	<div class="sortby dib-vat"><div class="sortbytitle dib-vat"><b>Sort by:</b><?php if(isset($_GET['resultsortby']) || !empty($_GET['resultsortby'])){ if($_GET['resultsortby']=="Relevance"){echo"Relevance";}else if($_GET['resultsortby']=="HightoLow"){echo"Price - High to Low";}else if($_GET['resultsortby']=="LowtoHigh"){echo"Price - Low to High";}else if($_GET['resultsortby']=="Newest"){echo"Newest";}}else{echo "Relevance";}?></div>
	<i class="fa fa-chevron-down" aria-hidden="true"></i>
	<ul class="sortbynav">
		<li><a href="../search/?search=<?php echo $titlename;?>&resultsortby=Relevance">Relevance</a></li>
		<li><a href="../search/?search=<?php echo $titlename;?>&resultsortby=HightoLow">Price - High to Low</a></li>
		<li><a href="../search/?search=<?php echo $titlename;?>&resultsortby=LowtoHigh">Price - Low to High</a></li>
		<li><a href="../search/?search=<?php echo $titlename;?>&resultsortby=Newest">Newest</a></li>
		</ul>
		</div>
		<div class="results-area dib-vat">
			<div class="search-results">
				<?php
					if(isset($_GET['search']) && !empty($_GET['search'])){
						$searchname = mysqli_real_escape_string($con,htmlentities(trim($_GET['search'])));
						$commonsearchquery = "SELECT * FROM products WHERE MATCH(title) AGAINST('$searchname' IN BOOLEAN MODE) 
							OR MATCH(description) AGAINST('$searchname' IN BOOLEAN MODE) 
							OR MATCH(tags) AGAINST('$searchname' IN BOOLEAN MODE) 
							OR MATCH(category) AGAINST('$searchname' IN BOOLEAN MODE) 
							OR MATCH(location) AGAINST('$searchname' IN BOOLEAN MODE) 
							OR MATCH(company) AGAINST('$searchname' IN BOOLEAN MODE)";
							
						if(isset($_GET['resultsortby']) || !empty($_GET['resultsortby'])){
						 if($_GET['resultsortby']=="HightoLow"){
							$searchprod = $commonsearchquery."ORDER BY CAST(price AS DECIMAL(10,2)) DESC LIMIT $start_from,$per_page";
						}else if($_GET['resultsortby']=="LowtoHigh"){
							$searchprod = $commonsearchquery."ORDER BY CAST(price AS DECIMAL(10,2)) ASC LIMIT $start_from,$per_page";
						}else if($_GET['resultsortby']=="Newest"){
							$searchprod = $commonsearchquery."ORDER BY date DESC LIMIT $start_from,$per_page";
						}else if($_GET['resultsortby']=="Relevance"){
							$searchprod = $commonsearchquery."ORDER BY MATCH(title) AGAINST('$searchname' IN BOOLEAN MODE) DESC LIMIT $start_from,$per_page";
						}
						}else{$searchprod = $commonsearchquery."ORDER BY MATCH(title) AGAINST('$searchname' IN BOOLEAN MODE) DESC LIMIT $start_from,$per_page";
						}
						
						$totalquery = $commonsearchquery;
						
						$runsearchprod = mysqli_query($con,$searchprod);
						if(mysqli_num_rows($runsearchprod)>0){
							$runtotalquery = mysqli_query($con,$totalquery);
							$num = mysqli_num_rows($runtotalquery);
							echo "<div class='resultsnum'>$num Results</div>";
						while($row = mysqli_fetch_assoc($runsearchprod)){
							$prodid = $row['product_id'];
							$prodimg = $row['image_thumb'];
							$produserid = $row['user_id'];
							$prodtitle = $row['title'];
							$prodprice = $row['price'];
							$prodbio = $row['description'];
							//$addslash = preg_replace('%//"*(?<!\")$%m', '\0"', $addslash);
							//$prodbio = (strlen($prodbio) > 120) ? substr($prodbio,0,120).'...' : $prodbio;
							$produserquery = "SELECT user_id,firstname,lastname FROM users WHERE user_id='$produserid'";
							$produserrun = mysqli_query($con,$produserquery);
							$row2 = mysqli_fetch_array($produserrun);
							$produserfname = $row2['firstname'];
							$produserlname = $row2['lastname'];
							echo "
							<div class='result'>
								<div class='prodbox'>
									<div class='prodimg dib-vat'><a href='../product/?productid=$prodid'><img class='all0' src='../product/images/$prodimg' title='$prodtitle'></a></div>
									<div class='prodinfo dib-vat'>
										<div class='prodtitle'><a href='../product/?productid=$prodid' class='elips2' title='$prodtitle'>$prodtitle</a></div>							
										<div class='prodowner'>by <a href='../user/?userid=$produserid' title='$produserfname $produserlname'>$produserfname $produserlname</a></div>
										<div class='prodprice'>रु&nbsp;$prodprice</div>
										<div class='proddescription'>".substr($prodbio,0,180).' ...'."</div>
									</div>
								</div>
							</div>";
						}
					}else{
						echo"<div style='font-size:20px; width:630px; border-top:1px solid #bdc3c7; padding:10px 0 0 20px;'>No Results for <h3 class='h3lb dib-vat'>$searchname</h3></div>";
					}
					}else{
					header('location:../user/?userid='.$userid);
					}

					?>
			<?php 
	$paginationquery = "SELECT * FROM products WHERE MATCH(title) AGAINST('$searchname' IN BOOLEAN MODE) 
							OR MATCH(description) AGAINST('$searchname' IN BOOLEAN MODE) 
							OR MATCH(tags) AGAINST('$searchname' IN BOOLEAN MODE)";
	$runpaginationquery = mysqli_query($con,$paginationquery);
	$count = mysqli_num_rows($runpaginationquery);
	$total_pages = ceil($count/$per_page);
	if(isset($_GET['resultsortby']) || !empty($_GET['resultsortby'])){
	$resultsortby = htmlentities($_GET['resultsortby']);
	$resultsortby = htmlentities($_GET['resultsortby']);
	}else{
	$resultsortby = "Relevance";

	}
	if($count>=10){
		echo "<ul class='pagination-list'>";
	for($i=1;$i<=$total_pages;$i++){
		if($i==$page){
			$color="#ecf0f1";
		}else{
			$color="white";
		}
		echo "<li class='pagination-num' style='background:$color;'>
		<a href='../search/?search=$searchname&resultsortby=$resultsortby&page=$i'> $i </a>
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
	<!--<div class="promo-section-bottom promo">
		<span class="promoclose"><i class="fa fa-close" aria-hidden="true"></i></span>
		<div class="promo-box">
			<img src="../assets/images/promolong.jpg" class="ad-long-img">
		</div>
	</div>-->
</div>


<?php
echo"
<script>
$('.sortby').on('click',function(e){
    $('.sortbynav').toggle();
	e.stopPropagation();
  }); 
 $(window).click(function(){ $('.sortbynav').hide();});
</script>
";
include '../footer.php';
//}else{
//header('location:../login/');
//}
?>