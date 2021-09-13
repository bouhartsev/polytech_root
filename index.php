<!doctype html>
<html lang="ru">
	
<head>
	<meta charset="utf-8">
	<title>WEBLAB by Bouhartsev</title>
	<link rel="stylesheet" href="/style.css">
	<link rel="shortcut icon" href="//bouhartsev.top/favicon.ico">
</head>
<body>
	<?php
	$heading = 'weblab';
	$wrapper = '';

	$folders = scandir('./');
	sort($folders, SORT_NATURAL | SORT_FLAG_CASE);

	$toFind = [];
	preg_match('/\/(.*?)\//', $_SERVER['REQUEST_URI'], $toFind);
	if (count($toFind) && in_array($toFind[1], $folders)) {
		$heading = $toFind[1];
		$folders = scandir('./'+$toFind[1]);
		for ($i=0; $i<count($folders); $i++) {
			if ($folders[$i][0]!='.' && is_dir($folders[$i])) {
				$wrapper.='<details><summary>'.$folders[$i].'</summary><ul>';
				$subfolders = scandir('./'.$folders[$i]);
				sort($subfolders, SORT_NATURAL | SORT_FLAG_CASE);
				for ($j=2; $j<count($subfolders); $j++) {
					if (is_dir('./'.$folders[$i].'/'.$subfolders[$j])) $wrapper.='<li><a href="./'.$folders[$i].'/'.$subfolders[$j].'/">'.$subfolders[$j].'</a></li>';
				}
				$wrapper.='</ul></details>';
			}
		}
	}
	else {
		$wrapper.='<ul>';
		for ($i=0; $i<count($folders); $i++) {
			if ($folders[$i][0]!='.' && is_dir($folders[$i])) {
				$wrapper.='<li><a href="/'.$folders[$i].'/">'.$folders[$i].'</a></li>';
			}
		}
		$wrapper.='</ul>';
	}
	echo '<h1>'.$heading.'</h1>';
	echo '<h2>by <a href="https://bouhartsev.top">Matvey Bouharstev</a></h2><div class="wrapper">'.$wrapper.'</div>';
	?>
	
</body>
</html>