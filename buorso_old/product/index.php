<?php
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI']; 
include '../core.php';

if(isset($_GET['productid']) && !empty($_GET['productid'])){
	$prodid = preg_replace('#[^0-9]#i','',mysqli_real_escape_string($con,$_GET['productid']));
	$prodquery = "SELECT * FROM products WHERE product_id='$prodid'";
	$prodqueryrun = mysqli_query($con,$prodquery);
	if(mysqli_num_rows($prodqueryrun)>0){
		$row = mysqli_fetch_array($prodqueryrun);
		$productid = $row['product_id'];
		$produserid = $row['user_id'];
		$prodimg = $row['image'];
		$prodimg2 = $row['image2'];
		$prodimg3 = $row['image3'];
		$prodimg4 = $row['image4'];
		$prodimgthumb = $row['image_thumb'];
		$prodimgthumb2 = $row['image_thumb2'];
		$prodimgthumb3 = $row['image_thumb3'];
		$prodimgthumb4 = $row['image_thumb4'];
		$prodtitle = $row['title'];
		$prodprice = $row['price'];
		$prodbio = $row['description'];
		$prodcategory = $row['category'];
		$prodcondition = $row['product_condition'];
		$prodtags = $row['tags'];
		$prodviews = $row['views'];
		$proddate = $row['date'];
		$prodlocation= $row['location'];
		$prodphone= $row['phone'];
		$prodcompany= $row['company'];
		$status = $row['status'];
		
		$produserquery = "SELECT firstname,lastname FROM users WHERE user_id='$produserid'";
		$produserrun = mysqli_query($con,$produserquery);
		$row2 = mysqli_fetch_array($produserrun);
		$produserfname = $row2['firstname'];
		$produserlname = $row2['lastname'];
	}else{
		header('location:../');		
	}
}else{
		header('location:../user/?userid='.$userid);
}

$title = $prodtitle." - Buorso";
include '../header.php';
?>
<script type="text/javascript">
function showcmt(){
	if(window.XMLHttpRequest){
		cmt = new XMLHttpRequest();
	}else{
		cmt = new ActiveXObject('Microsoft.XMLHTTP');
	}

	cmt.onreadystatechange = function(){
		if(cmt.readyState==4 && cmt.status==200){
			document.getElementById('comments-body').innerHTML = cmt.responseText;
		}
	}
	parameters = 'productid=' + <?php echo $productid;?>;
	
	cmt.open('POST','../assets/Codesnips/cmtshow.php',true);
	cmt.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	cmt.send(parameters);	

}
window.onload = showcmt();



function insertcmt(){
	if(window.XMLHttpRequest){
		inscmt = new XMLHttpRequest();
	}else{
		inscmt = new ActiveXObject('Microsoft.XMLHTTP');
	}
	
	inscmt.onreadystatechange = function(){
		if(inscmt.readyState==4 && inscmt.status==200){
			showcmt();
		}
	}
	
	param = 'commentbox='+document.getElementById('commentbox').value + '&userid='+ <?php echo $userid ;?> +'&produserid='+ <?php echo $produserid ;?> +'&productid='+ <?php echo $productid ;?> ;
	
	inscmt.open('POST','../assets/Codesnips/cmt.php',true);
	inscmt.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	inscmt.send(param);
	document.getElementById('commentbox').value = '';
	document.getElementById('commentbtn').setAttribute('disabled','disabled');

}


function showfav(){
	if(window.XMLHttpRequest){
		fav = new XMLHttpRequest();
	}else{
		fav = new ActiveXObject('Microsoft.XMLHTTP');
	}

	fav.onreadystatechange = function(){
		if(fav.readyState==4 && fav.status==200){
			document.getElementById('favcont').innerHTML = fav.responseText;
		}
	}
	favparam = 'userid='+ <?php echo $userid ;?> + '&mainuserid='+ <?php echo $userid ;?> + '&productid=' + <?php echo $productid;?>;
	
	fav.open('POST','../assets/Codesnips/favshow.php',true);
	fav.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	fav.send(favparam);	

}
window.onload = showfav();


function checkfav(){
	if(window.XMLHttpRequest){
		cfav = new XMLHttpRequest();
	}else{
		cfav = new ActiveXObject('Microsoft.XMLHTTP');
	}
	
	cfav.onreadystatechange = function(){
		if(cfav.readyState==4 && cfav.status==200){
			showfav();
		}
	}
	
	fparam = 'userid='+ <?php echo $userid ;?> + '&productid=' + <?php echo $productid;?>;
	
	cfav.open('POST','../assets/Codesnips/fav.php',true);
	cfav.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	cfav.send(fparam);
}

</script>
<div class="global-container">
	<div class="promo-section-top promo">
	<span class="promoclose"><i class="fa fa-close" aria-hidden="true"></i></span>
		<div class="promo-box">
			<img src="../assets/images/promolong.jpg" class="ad-long-img">
		</div>
	</div>
	<div id="myModal" class="modal" onclick="close_model();"></div>
	  <span class="close" id="modelclose" onclick="close_model();">&times;</span>
	  <img class="modal-content" id="img01">
	<div class="container">
		<div class="product-section">
			<div class="product-header">
				<div class="prodimg dib-vat">
					<img class='all0' id="mainimg" src='../product/images/<?php echo $prodimg;?>' title='<?php echo $prodtitle;?>'>
					<div id="imgthumblist">
					<?php if(!empty($prodimgthumb)){ echo"<img class='thumb' id='imgthumb1' src='../product/images/$prodimgthumb' data-img='../product/images/$prodimg'>";} ?>
					<?php if(!empty($prodimgthumb2)){ echo"<img class='thumb' id='imgthumb2' src='../product/images/$prodimgthumb2' data-img='../product/images/$prodimg2'>";} ?>
					<?php if(!empty($prodimgthumb3)){ echo"<img class='thumb' id='imgthumb3' src='../product/images/$prodimgthumb3' data-img='../product/images/$prodimg3'>";} ?>
					<?php if(!empty($prodimgthumb4)){ echo"<img class='thumb' id='imgthumb4' src='../product/images/$prodimgthumb4' data-img='../product/images/$prodimg4'>";} ?>
					</div>
				</div>
				<div class="prodinfo dib-vat">
					<?php if($produserid==$userid){echo"<a href='../edit/?productid=$prodid' class='prodedit' title='Edit Product'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";}?>
					<div class="prodtitle" title="<?php echo $prodtitle;?>"><h1><?php echo $prodtitle;?></h1></div>
					<div class="prodowner">by <a href='../user/?userid=<?php echo $produserid;?>' title='<?php echo $produserfname.' '.$produserlname;?>'><?php echo $produserfname.' '.$produserlname;?></a></div>
					<div class="prodprice" title="Price"><i class="fa fa-money" aria-hidden="true"></i><span class="prodpricenum">रु&nbsp;<?php echo $prodprice;?></span></div>
					<div class="prodcategory" title="Category"><i class="fa fa-th-large" aria-hidden="true"></i><span class="prodcategorynum"><a href="#" title="<?php echo $prodcategory;?>"><?php echo $prodcategory;?></a></span></div>
					<?php if(strlen($prodcompany)!=0){echo"<div class='prodcomp' title='Company/Brand'><i class='fa fa-building' aria-hidden='true'></i><span class='prodcompnum'>$prodcompany</span></div>";}?>
					<div class="proddate" title="Upload Date"><i class="fa fa-calendar" aria-hidden="true"></i><span class="proddatenum"><?php echo substr($proddate,0,10);?></span></div>
					<div class="prodplace" title="Location/Place"><i class="fa fa-map-marker" aria-hidden="true"></i><span class="prodplacenum"><?php echo $prodlocation;?></span></div>
					<div class="prodphone" title="Phone Number"><i class="fa fa-phone" aria-hidden="true"></i><span class="prodphonenum"><?php echo $prodphone;?></span></div>
					<div class="prodcondition" title="Condition"><i class="fa fa-heartbeat" aria-hidden="true"></i><span class="prodconditionnum"><?php echo $prodcondition;?></span></div>
					<div class="prodviews" title="<?php echo $prodviews;?> views"><i class="fa fa-eye" aria-hidden="true"></i><span class="prodviewsnum"><?php echo $prodviews;?></span></div>
					<?php 
					$viewsquery = "SELECT views FROM products WHERE product_id='$productid'";
						if($run = mysqli_query($con,$viewsquery)){
							while($row = mysqli_fetch_assoc($run)){
								$count = $row['views'];
								$count_inc = $count + 1;
								
								$update = "UPDATE products SET views = '$count_inc' WHERE product_id='$productid'";
								$update_run = mysqli_query($con, $update);
								echo $count_inc;
							}
						}
					

					?>
					<div id="favcont"></div>
				</div>
				<div class="security-box dib-vat">
					<div class="security-box-title"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Safety Tips for Buyers</div>
					<ol type="1" class="security-tips">
						<li>Meet seller at a safe location</li>
						<li>Check the item before you buy</li>
						<li>Pay only after collecting item</li>
						<li>Avoid non face-to-face transactions</li>
					</ol>
				</div>
				<div class="proddescription dib-vat">
					<label>Description</label>
					<?php echo $prodbio;?>
				</div>
			</div>
			
			<div id="comments" class="comments-section dib-vat">
				<div class="comments-header">
					<div class="comments-title">Comments</div>
				</div>
				<div id="comments-body" class="comments-body">

				</div>
				<?php
				if(isset($userid)){
					echo"
					<div class='comment-box'>
					<div class='cmt-user dib-vat'><img class='' src='".$filedir."user/images/$profileimg'></div>
					<form id='commentform' name='commentform' class='uploadformcomp dib-vat' method='POST' action='#comments' enctype='application/x-www-form-urlencoded'>
						<div class='commentbox-wrap dib-vat nomp'><textarea id='commentbox' name='commentbox' class='nompb dib-vat' placeholder='Write a comment' required></textarea></div>
						<input id='commentbtn' class='submitbtn dib-vat' name='commentbtn' type='button' value='&#xf1d8;' onclick='insertcmt();' disabled='disabled'/>
					</form>
				</div>
					";
				}
				?>
			</div>
			<div class="promo-section-side dib-vat promo">
			<span class="promoclose"><i class="fa fa-close" aria-hidden="true"></i></span>
				<div class="promo-box">
					<img class="" src="../assets/images/promosmall.JPG">
				</div>
			</div>
			<div class="prod-slider-container" style="margin-top:60px;">
				<div class="prod-slider">
					<div class="smltitle">Similar ads suggestion</div>
					<ul class="prod-slider-list" id="img-list">
							<?php
							$getmyprod = "SELECT * FROM products ORDER BY RAND() LIMIT 12";
							$rungetmyprod = mysqli_query($con,$getmyprod);
								 while($row2 = mysqli_fetch_assoc($rungetmyprod)){
									$prodid = $row2['product_id'];
									$prodimgthumb = $row2['image_thumb'];
									$prodtitle = $row2['title'];
									$prodprice = $row2['price'];
									 echo "
									 <li class='dib-vat'>
									 <div class='prodbox'>
									 <div class='prodimg'><a href='".$filedir."product/?productid=$prodid'><img class='all0' src='".$filedir."product/images/$prodimgthumb' title='$prodtitle'></a></div>
									 <div class='prodtitle'><a href='".$filedir."product/?productid=$prodid' class='elips2' title='$prodtitle'>$prodtitle</a></div>
									 <div class='prodprice' style='float:left;'>$$prodprice</div></div></li>";
								 }
							?>
					</ul>
				</div>
				<div id="left" class="arrow" onclick="goright()"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
				<div id="right" class="arrow" onclick="goleft()"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
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
<script type="text/javascript">
function showcmt(){
	if(window.XMLHttpRequest){
		cmt = new XMLHttpRequest();
	}else{
		cmt = new ActiveXObject('Microsoft.XMLHTTP');
	}

	cmt.onreadystatechange = function(){
		if(cmt.readyState==4 && cmt.status==200){
			document.getElementById('comments-body').innerHTML = cmt.responseText;
		}
	}
	parameters = 'productid=' + <?php echo $productid;?>;
	
	cmt.open('POST','../assets/Codesnips/cmtshow.php',true);
	cmt.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	cmt.send(parameters);	

}
window.onload = showcmt();
</script>
<?php
echo"
<script>
var docbody = document.getElementById('body');
var mymodal = document.getElementById('myModal');
var img = document.getElementById('mainimg');
var modalImg = document.getElementById('img01');
var modelclose = document.getElementById('modelclose');

img.onclick = function(){ mymodal.style.display = 'block'; modalImg.style.display = 'block'; modelclose.style.display = 'block'; modalImg.src = this.src; docbody.style.overflow = 'hidden';}
function close_model(){mymodal.style.display = 'none'; modalImg.style.display = 'none'; modelclose.style.display = 'none'; docbody.style.overflow = 'auto';}


var thumb = document.getElementsByClassName('thumb');

var thumbimg = function() {
    img.src=this.getAttribute('data-img');
};

for (var i = 0; i < thumb.length; i++) {
    thumb[i].addEventListener('click', thumbimg, false);
}


 
$('textarea').each(function () {
  this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
}).on('input', function () {
  this.style.height = 'auto';
  this.style.height = (this.scrollHeight) + 'px';
});
$('textarea').trigger('input');

 
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

include '../footer.php';
//}else{
//header('location:../login/');
//}
?>