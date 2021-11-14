<?php 
	include 'core.php';

	if(isset($_GET['url']) && !empty(trim($_GET['url']))){
		$url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		$file = "controllers/" . $url[0] . ".php";
		if(file_exists($file)){
			require $file;
		}else{
			require "controllers/404.php";
			die();
		}
	}else{
		require "controllers/home.php";
	}

	$tempVars = [
		'title' => $title,
		'content' => $content,
		'extraStyle' => $extraStyle
	];

	$html = getViews('views/main.php', $tempVars);
	echo $html;
?>
