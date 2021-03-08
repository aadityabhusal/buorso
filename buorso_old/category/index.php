<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include '../core.php';
$title = "Category - Buorso";
$filedir = "../";
include $filedir.'header.php';
?>

<div class="global-container">
	<div class="container">
		<div class="home-list">
			<ul class="home-list-ul">
				<li><a href="..">Home</a></li>
				<li><a href="../category/" style="border-bottom:3px solid #3498db;">Category</a></li>
				<li><a href="../featured/">Featured</a></li>
				<li><a href="../trending/">Trending</a></li>
			</ul>
		</div>
		<div class="category-container-title">Select a Category below <i class="fa fa-arrow-down" aria-hidden="true"></i></div>
		<div class='maincat-container'>
			<?php
			$catid = $_GET['catid'];
			$maincatquery = "SELECT id,name,iconname,color FROM categories WHERE id='$catid'";
			$maincatrun = mysqli_query($con,$maincatquery);
			$maincatrow = mysqli_fetch_assoc($maincatrun);
			$maincatname = $maincatrow['name'];
			$maincaticon = $maincatrow['iconname'];
			$maincatcolor = $maincatrow['color'];
			echo"<div class='category-box dib-vat'>
					<a href='#' class='cblink'>
						<i class='fa $maincaticon' style='color:#$maincatcolor;' aria-hidden='true'></i>
						<div class='category-box-name' style='font-size:16px;'>$maincatname</div>
					</a>
				</div>";
			?>
			<div class="subcat-container dib-vat">
				<ul class="subcat-list">
					<?php
					$subcatquery = "SELECT id,name,iconname,color,placenum FROM categories WHERE type='Sub_Category' AND placenum='$catid'";
					$subcatrun = mysqli_query($con,$subcatquery);
					while($subcatrow = mysqli_fetch_assoc($subcatrun)){
						$subcatid = $subcatrow['id'];
						$subcatname = $subcatrow['name'];
						$subcaticon = $subcatrow['iconname'];
						$subcatcolor = $subcatrow['color'];
						echo "
						<li class='subcat-box dib-vat'>
							<a href='#'>
								<i class='fa $subcaticon fa-fw dib-vat' style='color:#$subcatcolor;' aria-hidden='true'></i>
								<div class='subcat-box-name dib-vat'>$subcatname</div>
							</a>
						</li>";
					}
					?>
				</ul>
			</div>
		</div>
		<?php
		$categoryquery = "SELECT id,name,iconname,color FROM categories WHERE type='Category' ORDER BY placenum ASC";
		$runcategoryquery = mysqli_query($con,$categoryquery);
		while($catrow = mysqli_fetch_assoc($runcategoryquery)){
			$categoryid = $catrow['id'];
			$catname = $catrow['name'];
			$caticonname = $catrow['iconname'];
			$catcolor = $catrow['color'];
			if($categoryid==$catid){$bold = "style='font-weight:bold;'";}else{$bold = "";}
			echo"<div class='category-box' $bold >
				<a href='../category/?catid=$categoryid' class='cblink'>
					<i class='fa $caticonname' style='color:#$catcolor;' aria-hidden='true'></i>
					<div class='category-box-name'>$catname</div>
				</a>
			</div>";
		}
		?>
	</div>
	<div class="promo-section-bottom promo">
		<span class="promoclose"><i class="fa fa-close" aria-hidden="true"></i></span>
		<div class="promo-box">
			<img src="../assets/images/promolong.jpg" class="ad-long-img">
		</div>
	</div>
</div>


<?php
include $filedir.'footer.php';
?>