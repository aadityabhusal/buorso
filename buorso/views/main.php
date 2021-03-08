<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
	if(isset($_COOKIE['theme']) && !empty($_COOKIE['theme']) && $_COOKIE['theme'] == 'dark'){
		$theme = 'dark';
		$themeReverse = 'light';
		$darkMode = 'ON';
	}else{
		$theme = 'light';
		$themeReverse = 'dark';
		$darkMode = 'OFF';
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" data-theme="<?php echo $theme; ?>">
<head>
	<title><?php echo $title; ?></title>
	<link rel="icon" href="assets/images/favicon.ico">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<?php 
		if($extraStyle){
			echo '<link rel="stylesheet" type="text/css" href="assets/css/'.$extraStyle.'.css">';
		}
	?>
</head>
<body>
	<header>
		<div id="head-section">
			<div class="logo">
				<a href="home">
					<img src="images/logoFullComp.svg" alt="Buorso Logo">
				</a>
			</div>
			<div id="search">
				<?php 
					if(isset($_GET['search'])){
						$search = $_GET['search'];
					}else{
						$search = '';
					} 
				?>
				<form action="search" method="GET" id="searchform" enctype="application/x-www-form-urlencoded">
					<input type="text" id="searchbox" name="search" placeholder="Search an Ad here..." value="<?php echo $search ?>" autocomplete="off">
					<button type="button" id="searchbutton" onClick="searchSubmit();">
						<?php echo Icons::getIcon('search',20, 20); ?>
					</button>
				</form>
			</div>
			<nav>
				<ul id="nav-list" class="hover-bg">
					<?php 
						if(isLoggedIn()){
					 ?>
					<li><a href="upload">Upload</a></li>
					<li>
						<a href="notifications">
							<?php echo Icons::getIcon('notification',24,50); ?>
						</a>
					</li>
					<li>
						<a href="messages">
							<?php echo Icons::getIcon('message',24,50); ?>
						</a>
					</li>
					<li class="dropdown-container">
						<?php 
							$userFname = new Queries('users');
							$uFResults = $userFname->select('firstname', 'user_id', isLoggedIn(),'');
							$uFData = $uFResults->fetch();
						 ?>
						<a class="dropdown-button"><?php echo $uFData['firstname']; ?></a>
						<div class="dropdown-box hide">
						<ul>
							<li><a href="user?id=<?php echo isLoggedIn();?>">Profile</a></li>
							<li><a href="profile-settings">Settings</a></li>
							<li><a href="favourites">Favourites</a></li>
							<li><a id="theme" data-change-theme='<?php echo $themeReverse?>' >Dark Mode: <?php echo $darkMode?></a></li>
							<li><a href="logout">Logout</a></li>
						</ul>
					</div>
					</li>
					<?php 
						}else{
					 ?>
					 <li><a id="theme" data-change-theme='<?php echo $themeReverse?>' >Dark Mode: <?php echo $darkMode?></a></li>
					<li><a href="login">Login</a></li>
					<li><a href="signup">Signup</a></li>
					<?php } ?>
				</ul>
			</nav>
		</div>
	</header>
	<main id="container">
		<?php echo $content; ?>
	</main>
	<footer>
	
	</footer>
	<script type="text/javascript" src="assets/js/script.js"></script>
	</body>
	</html>