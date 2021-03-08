<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<link rel="icon" href="<?php echo $filedir;?>assets/favicon.ico">
	<title><?php global $title; echo $title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="<?php echo $filedir;?>assets/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $filedir;?>assets/fonts/font-awesome/css/font-awesome.min.css" />
	<script type="text/javascript" src="<?php echo $filedir;?>assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo $filedir;?>assets/js/main.js"></script>
	<?php 
	if(isset($userid)){
		echo"
		<script type='text/javascript'>
		function msgnotif(){
			if(window.XMLHttpRequest){
				notif = new XMLHttpRequest();
			}else{
				notif = new ActiveXObject('Microsoft.XMLHTTP');
			}

			notif.onreadystatechange = function(){
				if(notif.readyState==4 && notif.status==200){
					document.getElementById('msgnum').innerHTML = notif.responseText;
				}
			}
			userid = 'userid='+".$userid.";
			notif.open('POST','".$filedir."assets/Codesnips/msgnotif.php',true);
			notif.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			notif.send(userid);	

		}
		setInterval(function(){msgnotif()},1000);
		
		
		function notifications(){
			if(window.XMLHttpRequest){
				notifs = new XMLHttpRequest();
			}else{
				notifs = new ActiveXObject('Microsoft.XMLHTTP');
			}

			notifs.onreadystatechange = function(){
				if(notifs.readyState==4 && notifs.status==200){
					document.getElementById('notifsnum').innerHTML = notifs.responseText;
				}
			}
			notifuserid = 'userid='+".$userid.";
			notifs.open('POST','".$filedir."assets/Codesnips/notifications.php',true);
			notifs.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			notifs.send(notifuserid);	

		}
		setInterval(function(){notifications()},1000);

		</script>";
		}
	?>
</head>
<body id="body">
<header>
	<div id="topnav">
		<div class="logobx dib-vat"><a class='logo' href="<?php echo $filedir;?>" title="Buorso"><img src="<?php echo $filedir;?>assets/logoFullComp.svg"></a></div>
		<div class="searcharea dib-vat">
			<form id="searchform" method="GET" action="<?php echo $filedir;?>search/" enctype="application/x-www-form-urlencoded">
				<input type="text" name="search" id="searchbox" value="<?php echo $titlename;?>" placeholder="Search an Ad here..." autocomplete="off"/>
				<input name="searchbtn" id="searchbtn" type="button" onclick="javascript:submit_form();" value="&#xf002;"></input>
				</form>
		</div>
		<ul class="topnav-ul dib-vat">
			<?php
			if(isset($userid)){
			?>
			<li class="topnavli" title="Home"><a href="<?php echo $filedir;?>"><i class="fa fa-home fa-nom fa-hid" aria-hidden="true"></i><span class="headertext">Home</span></a></li>
			<li class="topnavli" title="Notifications"><a href="<?php echo $filedir;?>notifications/"><i class="fa fa-bell-o fa-nom" aria-hidden="true"></i>
			<span id="notifsnum" class='msgnum'></span>
			</a></li>
			<li class="topnavli" title="Messages"><a id="msgnavlink" name="msgnavlink" href="<?php echo $filedir;?>messages/"><i class="fa fa-envelope-o fa-nom" aria-hidden="true"></i>
			<span id="msgnum" class='msgnum'></span>
			</a></li>
			<li class="subnavbtn"><a><img src="<?php echo $filedir;?>user/images/<?php echo $profileimg;?>" class="headerimg dib-vat"><div class="headertext dib-vat"><?php echo $fname; ?></div></a>
				<ul class="subnav">
					<li class="hiddensubnav"><a href="<?php echo $filedir;?>">Home</a></li>
					<li><a href="<?php echo $filedir;?>user/?userid=<?php echo $userid;?>">Profile</a></li>
					<li class="hiddensubnav"><a href="#">Notifications</a></li>
					<li class="hiddensubnav"><a href="<?php echo $filedir;?>messages/">Messages<span class="msgnum hiddensubnav" style="display:<?php echo @$msgnumdisp;?>;"><?php echo @$totalnum; ?></span></a></li>
					<li><a href="<?php echo $filedir;?>upload/">Upload</a></li>
					<li><a href="<?php echo $filedir;?>favourites/">Favourites</a></li>
					<li><a href="<?php echo $filedir;?>settings/">Settings</a></li>
					<li><a href="<?php echo $filedir;?>help/">Help</a></li>
					<li><a href="<?php echo $filedir;?>logout.php">Log Out</a></li>
				</ul>
			</li>
			<?php
			}else{
			?>	
			<li class="jointext"><a href="<?php echo $filedir;?>login/">Login</a></li>
			<li class="jointext"><a href="<?php echo $filedir;?>register/">Signup</a></li>
			<li class="joinicon" title="Login"><a href="<?php echo $filedir;?>login/"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
			
			<?php
			}
			?>
		</ul>
	</div>
</header>
<?php
echo "<script>
$('.subnavbtn').on('click',function(e){
    $('.subnav').toggle();
	e.stopPropagation();
  }); 
 $(window).click(function(){ $('.subnav').hide();});

function submit_form(){
	if($.trim(document.getElementById('searchbox').value)==''){

	}else{
	var searchform = document.getElementById('searchform');
	searchform.submit();}
}

</script>"
?>