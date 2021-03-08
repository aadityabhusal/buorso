<?php
if(isset($userid)){
include '../core.php';
$title = "Edit Product - Buorso";
include '../header.php';

if(isset($_GET['productid'])){
	$prodid = preg_replace('#[^0-9]#i','',mysqli_real_escape_string($con,htmlentities(trim($_GET['productid']))));
	$prodquery = "SELECT * FROM products WHERE product_id='$prodid'";
	$prodqueryrun = mysqli_query($con,$prodquery);
	$row = mysqli_fetch_array($prodqueryrun);
	$productid = $row['product_id'];
	$produserid = $row['user_id'];
	$prodimg = $row['image'];
	$prodimgthumb = $row['image_thumb'];
	$prodtitle = $row['title'];
	$prodprice = $row['price'];
	$prodbio = $row['description'];
	$prodcategory = $row['category'];
	$prodcondition = $row['product_condition'];
	$prodtags = $row['tags'];
	$proddate = $row['date'];
	$prodlocation= $row['location'];
	$prodphone= $row['phone'];
	$prodcompany= $row['company'];
	$status = $row['status'];
	
	if(isset($_POST['saveprod'])){
		if(empty(preg_replace("/\s|&nbsp;/",'',$_POST['prod-title'])) 
		|| empty(preg_replace("/\s|&nbsp;/",'',$_POST['descriptionbox'])) 
		|| empty(preg_replace("/\s|&nbsp;/",'',$_POST['prod-tags'])) 
		|| empty(preg_replace("/\s|&nbsp;/",'',$_POST['category'])) 
		|| empty(preg_replace("/\s|&nbsp;/",'',$_POST['condition'])) 
		|| empty(preg_replace("/\s|&nbsp;/",'',$_POST['prod-phone'])) 
		|| empty(preg_replace("/\s|&nbsp;/",'',$_POST['prod-price'])) 
		|| empty(preg_replace("/\s|&nbsp;/",'',$_POST['prod-location']))){
			echo "<script>alert('You Cannot Leave The Fields Empty!')</script>";
		}else{
		$title = mysqli_real_escape_string($con,htmlentities(trim($_POST['prod-title'])));
		$description = mysqli_real_escape_string($con,nl2br(htmlentities(trim($_POST['descriptionbox']))));
		$price = mysqli_real_escape_string($con,htmlentities(trim($_POST['prod-price'])));
		$category = mysqli_real_escape_string($con,htmlentities(trim($_POST['category'])));
		$tags = mysqli_real_escape_string($con,htmlentities(trim($_POST['prod-tags'])));
		$location = mysqli_real_escape_string($con,htmlentities(trim($_POST['prod-location'])));
		$condition = mysqli_real_escape_string($con,htmlentities(trim($_POST['condition'])));
		$phone = mysqli_real_escape_string($con,htmlentities(trim($_POST['prod-phone'])));		
		$company = mysqli_real_escape_string($con,htmlentities(trim($_POST['prod-company'])));
		$status = "1";
		
		if($_FILES["prodimg"]["error"] != 4){
		$prodimgname =  explode(".", $_FILES["prodimg"]["name"]);
		$newfilename = round(microtime(true)) . '.' . end($prodimgname);
		$prodimgsize = $_FILES['prodimg']['size'];
		$prodimgtype = $_FILES['prodimg']['type'];
		$prodimgtemp = $_FILES['prodimg']['tmp_name'];
		$loc = '../product/images/';
		$maxsize=2097152;
		$extension = substr($_FILES["prodimg"]["name"],strpos($_FILES["prodimg"]["name"],'.')+1);
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
			imagepng($newimg,$loc."thumb".$newfilename);
		}else{
			imagejpeg($newimg,$loc."thumb".$newfilename);
		}
		imagejpeg($newimg,$loc."thumb".$newfilename);
		$thumb="thumb".$newfilename;
			if($extension=='jpg' || $extension=='jpeg' || $extension=='png'){
				if($prodimgsize<$maxsize){			
					unlink($loc.$prodimg);
					unlink($loc.$prodimgthumb);
					move_uploaded_file($prodimgtemp,$loc.$newfilename);
					
					$updateimg = "UPDATE products SET image='$newfilename',image_thumb='$thumb' where product_id ='$productid'";
					$runupdateimg = mysqli_query($con,$updateimg);
				}else{echo "<script>alert('File Size must be less than 2 MB')</script>";}
			}else{echo "<script>alert('File Type JPG, JPEG or PNG.')</script>";}			
		}
			
			$updatequery = "UPDATE products SET title='$title',description='$description', price='$price',category='$category',tags='$tags',location='$location',product_condition='$condition',phone='$phone',company='$company' where product_id ='$productid'";
			if($runupdate = mysqli_query($con,$updatequery)){
				header('location:../user/?userid='.$userid);
			}else{
				echo "<script>alert('Update Failed!')</script>";
			}
	}
	
}	
}else{
		header('location:../user/?userid='.$userid);
}





if(isset($_POST['deleteprodbtn'])){
	$deleteprodquery="DELETE FROM products WHERE product_id='$productid'";
	unlink('../product/images/'.$prodimg);
	unlink('../product/images/'.$prodimgthumb);
	if(mysqli_query($con,$deleteprodquery)==true){
		$deleteprodcmt="DELETE FROM comments WHERE product_id='$productid'";
		if(mysqli_query($con,$deleteprodcmt)==true){
			$deleteprodfav="DELETE FROM favourites WHERE favprod_id='$productid'";
			if(mysqli_query($con,$deleteprodfav)==true){
				header('Location:../user/?userid='.$userid);
				exit();
			}
		}
	}
}


	if($produserid==$userid){
	
	
?>
<div class="global-container">
	<div id="modal-bg" onclick="exit_msgbox();"></div>
	<div id="modal">
		<div class="modal-head">
			<h3 class="smltitle">Confirm Delete</h3>
		</div>
		<form name="deleteprodform" id="deleteprodform" method="POST" action='#' enctype="application/x-www-form-urlencoded">
			<div class="modal-body">
				<div class="msgbox-to">Are you sure you want to delete this product?</div>
			</div>
			<div class="modal-foot">
				<span class="cancelbtn" onclick="exit_msgbox();">Cancel</span>
				<input type="submit" name="deleteprodbtn" class="savebtn" value="Delete"/>
			</div>
		</form>
	</div>
	<div class="container">
		<div class="">
			<div class="add-prod-section edit-prod">
				<form name="?" id="editform" class="uploadformcomp" method="POST" action="../edit/?productid=<?php echo $prodid; ?>" enctype="multipart/form-data">
					<div class="edit-img dib-vat">
						<div class="image-container">
							<img class="all0" id="dispimg"src="../product/images/<?php echo "$prodimg"?>"/>
							<input type="file" name="prodimg" id="file"/>
							<label class="filelabel" for="file">Add Image</label>
						</div>
					</div>
					<div class="edit-info form-container nompb dib-vat">
						<input type="text" name="prod-title" value="<?php echo $prodtitle;?>" title="Enter the name of your Product" maxlength="64" placeholder="Enter the name of your Product" style="margin:0;" required />
					<div class="prod-bio">
							<textarea name="descriptionbox" id="descriptionbox" class="sml-scrl" maxlength="2048" placeholder="Enter the description of your Product" required><?php $breaks = array("<br />","<br>","<br/>");  
							$text = str_ireplace($breaks, "", $prodbio); 
							echo $text ?></textarea>
					</div>
					<div class="tag-cont">
						<input type="text" name="prod-tags" value="<?php echo $prodtags;?>" title="Enter tags for the Product (with a , after every tag)" maxlength="64" placeholder="Enter tags for the Product (with a , after every tag)" style="margin-top:15px;"/>					
					</div>
					</div>
					<div class="advanced-panel dib-vat">
						<div class="category-area">
							<select name="category" class="category" required>
								<option value="" style="color:#7f8c8d;">Categories</option>
								<?php 
								$catg = "SELECT name from categories WHERE type='Category'";
								$runcatg = mysqli_query($con,$catg);
								while($rowcatg = mysqli_fetch_assoc($runcatg)){
									$catgname = $rowcatg['name'];
									if($catgname==$prodcategory){$selected="selected='selected'";}else{$selected='';}
									echo"<option value='$catgname' $selected>$catgname</option>";
								}
								?>								
							</select>
							<select name="condition" class="condition dib-vat" required>
								<option value="0" selected="1" style="color:#7f8c8d;">Condition</option>
								<option value="Brand New" <?php if($prodcondition=="Brand New"){echo 'selected="selected"';}?>>Brand New</option>
								<option value="Just Used" <?php if($prodcondition=="Just Used"){echo 'selected="selected"';}?>>Just Used</option>
								<option value="Little Old" <?php if($prodcondition=="Little Old"){echo 'selected="selected"';}?>>Little Old</option>
								<option value="Too Old" <?php if($prodcondition=="Too Old"){echo 'selected="selected"';}?>>Too Old</option>
							</select>
							<input type="text" name="prod-price" class="s-inp dib-vat" value="<?php echo $prodprice;?>" title="Enter the Price"  maxlength="16"placeholder="Enter the Price" style="margin-bottom:16px;" required />
							<input type="text" name="prod-phone" class="s-inp prodtelphone" title="Enter your Phone Number" value="<?php echo $prodphone;?>" placeholder="Enter your Phone Number" maxlength=10 required />							
							<input type="text" name="prod-location" class="s-inp prodloc" value="<?php echo $prodlocation;?>" title="Enter the Specific Location to Recieve" placeholder="Enter the Specific Location to Recieve"  maxlength="64" required/>
							<input type="text" name="prod-company" class="s-inp prodcompany" value="<?php echo $prodcompany?>" title="Enter the Company name / Homemade" maxlength="32" placeholder="Enter the Company name / Homemade" />
						</div>
						<div id="deleteprodbtn" onclick="show_msgbox();">Delete Product</div>
					</div>
					<div class="btn-sec">
						<input type="submit" class="submitbtn savebtn" name="saveprod" value="Save Changes" />
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
}else{
	header('location:../user/?userid='.$userid);
}
echo"<script type='text/javascript'>
	
</script>";
include '../footer.php';
}else{
header('location:../login/');
}
?>