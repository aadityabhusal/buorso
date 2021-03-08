<?php
include '../core.php';
if(isset($userid) && !empty($userid)){
$title = "Upload Product - Buorso";
include '../header.php';

	if(isset($_POST['saveprod'])){
		if(empty(preg_replace("/\s|&nbsp;/",'',$_POST['prod-price']))
		|| empty(preg_replace("/\s|&nbsp;/",'',$_POST['prod-phone']))
		|| empty(preg_replace("/\s|&nbsp;/",'',$_POST['prod-title'])) 
		|| empty(preg_replace("/\s|&nbsp;/",'',$_POST['descriptionbox'])) 
		|| empty(preg_replace("/\s|&nbsp;/",'',$_POST['category'])) 
		|| empty(preg_replace("/\s|&nbsp;/",'',$_POST['condition'])) 
		|| empty(preg_replace("/\s|&nbsp;/",'',$_POST['prod-tags']))
		|| empty(preg_replace("/\s|&nbsp;/",'',$_POST['prod-location']))){
				echo "<script>alert('You Cannot Leave The Fields Empty!')</script>";
			}else{
		$prodtitle = mysqli_real_escape_string($con,htmlentities(trim($_POST['prod-title'])));
		$prodbio = mysqli_real_escape_string($con,nl2br(htmlentities(trim($_POST['descriptionbox']))));
		$prodprice = mysqli_real_escape_string($con,htmlentities(trim($_POST['prod-price'])));
		$prodcategory = mysqli_real_escape_string($con,htmlentities(trim($_POST['category'])));
		$prodtags = mysqli_real_escape_string($con,htmlentities(trim($_POST['prod-tags'])));
		$prodlocation = mysqli_real_escape_string($con,htmlentities(trim($_POST['prod-location'])));
		$condition = mysqli_real_escape_string($con,htmlentities(trim($_POST['condition'])));
		$prodphone = mysqli_real_escape_string($con,htmlentities(trim($_POST['prod-phone'])));
		$prodcompany = mysqli_real_escape_string($con,htmlentities(trim($_POST['prod-company'])));
		$status = "1";
		
		$prodimgname =  explode(".", $_FILES["prodimg"]["name"]);
		$newfilename = round(microtime(true)) . '.' . end($prodimgname);
		$prodimgsize = $_FILES['prodimg']['size'];
		$prodimgtemp = $_FILES['prodimg']['tmp_name'];
		$location = '../product/images/';
		$maxsize=2097152;
		$extension = strtolower(end(explode('.',$_FILES["prodimg"]["name"])));
		$checkyesnoimg = getimagesize($prodimgtemp);
		$finwidth = 250;
		$imgwidth = $checkyesnoimg[0];
		$imgheight = $checkyesnoimg[1];
		$newsize = ($imgwidth + $imgheight)/($imgwidth*($imgheight/60));
		$newwidth = $finwidth;
		$newheight = floor($imgheight * ($finwidth / $imgwidth));
		$newimg = imagecreatetruecolor($newwidth,$newheight);
		
		if($extension=='png'){
			$largeimg = imagecreatefrompng($prodimgtemp);
		}else{
			$largeimg = imagecreatefromjpeg($prodimgtemp);
		}
		
		imagecopyresized($newimg,$largeimg,0,0,0,0,$newwidth,$newheight,$imgwidth,$imgheight);
		
		if($extension=='png'){
			imagepng($newimg,$location."thumb".$newfilename);
		}else{
			imagejpeg($newimg,$location."thumb".$newfilename);
		}
		imagejpeg($newimg,$location."thumb".$newfilename);
		$thumb="thumb".$newfilename;
		if($checkyesnoimg==true){
			if($extension=='jpg' || $extension=='jpeg' || $extension=='png'){
				if($prodimgsize<$maxsize){
					move_uploaded_file($prodimgtemp,$location.$newfilename);
					
					$insertprod = "INSERT INTO products(user_id,image,image_thumb,title,price,description,category,product_condition,phone,tags,date,location,company,status) VALUES('$userid','$newfilename','$thumb','$prodtitle','$prodprice','$prodbio','$prodcategory','$condition','$prodphone','$prodtags',NOW(),'$prodlocation','$prodcompany','$status')";
					
					if(mysqli_query($con,$insertprod)==true){
						header('location:../user/?userid='.$userid);
					}else{
						echo "<script>alert('Unuccessful!')</script>";
					}
				}else{echo "<script>alert('File Size must be less than 2 MB')</script>";}
			}else{echo "<script>alert('File Type JPG, JPEG or PNG.')</script>";}
		}else{echo "<script>alert('Please Upload an Image File.')</script>";}
	}
}	
	?>

<div class="global-container">
	<div class="container">
		<div class="">
			<div class="add-prod-section">
				<form name="uploadform" id="editform" class="uploadformcomp" method="POST" action="#" enctype="multipart/form-data">
					<div class="edit-img dib-vat">
						<div class="image-container">
							<img class="all0 changeimg" id="dispimg" src="images/default.png"/>
							<input type="file" name="prodimg" id="file" required />
							<label class="filelabel" for="file">Add Image</label>
						</div>
						<div class="secondary-img">
							<img class="secdispimg changeimg" src="images/default.png"/>
							<input type="file" name="prodimg2" id="file2"/>	
							<label class="filelabel2" for="file2">Add Image</label>
						</div>
						<div class="secondary-img">
							<img class="secdispimg changeimg" src="images/default.png"/>
							<input type="file" name="prodimg3" id="file3"/>	
							<label class="filelabel2" for="file3">Add Image</label>
						</div>
						<div class="secondary-img">
							<img class="secdispimg changeimg" src="images/default.png"/>
							<input type="file" name="prodimg4" id="file4"/>	
							<label class="filelabel2" for="file4">Add Image</label>
						</div>
					</div>
					<div class="edit-info form-container nompb dib-vat">
						<input type="text" name="prod-title" title="Enter the name of your Product" maxlength="64" placeholder="Enter the name of your Product" style="margin:0;" value="<?php if(isset($_POST['prod-title'])) { echo $_POST['prod-title']; } ?>" required />
					<div class="prod-bio">
						<textarea name="descriptionbox" id="descriptionbox" class="sml-scrl" maxlength="2048" placeholder="Enter the description of your Product" required><?php if(isset($_POST['descriptionbox'])) { echo $_POST['descriptionbox']; } ?></textarea>
					</div>
					<div class="tag-cont">
						<input type="text" name="prod-tags" title="Enter tags for the Product (with a , after every tag)" maxlength="64" placeholder="Enter tags for the Product (with a , after every tag)" value="<?php if(isset($_POST['prod-tags'])) { echo $_POST['prod-tags']; } ?>" style="margin-top:15px;"/>					
					</div>
					</div>
					<div class="advanced-panel dib-vat">
						<div class="category-area">
							<select name="category" class="category" required>
								<option value="" selected="selected" style="color:#7f8c8d;">Categories</option>
								<?php 
								$catg = "SELECT name from categories WHERE type='Category'";
								$runcatg = mysqli_query($con,$catg);
								while($rowcatg = mysqli_fetch_assoc($runcatg)){
									$catgname = $rowcatg['name'];
									echo"<option value='$catgname'>$catgname</option>";
								}
								?>
							</select>
							<select name="condition" class="condition dib-vat" required>
								<option value="" selected="selected" style="color:#7f8c8d;">Condition</option>
								<option value="Brand New">Brand New</option>
								<option value="Just Used">Just Used</option>
								<option value="Little Old">Little Old</option>
								<option value="Too Old">Too Old</option>
							</select>
							<input type="text" name="prod-price" class="s-inp dib-vat" title="Enter the Price" maxlength="16" placeholder="Enter the Price" value="<?php if(isset($_POST['prod-price'])) { echo $_POST['prod-price']; } ?>" style="margin-bottom:16px;" required />
							<input type="text" name="prod-phone" class="s-inp prodtelphone" title="Enter your Phone Number" placeholder="Enter your Phone Number" value="<?php if(isset($_POST['prod-phone'])) { echo $_POST['prod-phone']; } ?>" maxlength="10" required />
							<input type="text" name="prod-location" class="s-inp prodloc" title="Enter the Specific Location to Recieve" maxlength="64" placeholder="Enter the Specific Location to Recieve" value="<?php if(isset($_POST['prod-location'])) { echo $_POST['prod-location']; } ?>" required />
							<input type="text" name="prod-company" class="s-inp prodcompany" title="Enter the Company name / Homemade" maxlength="32" placeholder="Enter the Company name / Homemade" value="<?php if(isset($_POST['prod-company'])) { echo $_POST['prod-company']; } ?>" />
						</div>
					</div>
					<div class="btn-sec">
						<input type="submit" class="submitbtn savebtn" name="saveprod" value="Save Changes" disabled="disabled" />
						<a href="../user/?userid=<?php echo $userid; ?>" class="cancelbtn">Cancel</a>
					</div>
				</form>
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
echo"<script type='text/javascript'>

</script>";
include '../footer.php';
}else{
header('location:../login/');
}
?>