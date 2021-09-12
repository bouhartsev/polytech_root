<!doctype html>
<html lang="ru">
	
<head>
	<meta charset="utf-8">
	<title>WEBLAB by Bouhartsev</title>
	<link rel="stylesheet" href="/style.css">
	<link rel="shortcut icon" href="//bouhartsev.top/favicon.ico">
</head>
<body>
	<h1>WEBLAB</h1>
	<h2>by <a href="https://bouhartsev.top">Matvey Bouharstev</a></h2>
	<div class="wrapper">
	<!-- <details> -->
	<?php 
	$folders = scandir('./');
	sort($folders, SORT_NATURAL | SORT_FLAG_CASE);
	for ($i=0; $i<count($folders); $i++) {
		if (is_dir($folders[$i]) && $folders[$i][0]!='.') {
			echo '<details><summary>'.$folders[$i].'</summary><ul>';
			$subfolders = scandir('./'.$folders[$i]);
			sort($subfolders, SORT_NATURAL | SORT_FLAG_CASE);
			for ($j=2; $j<count($subfolders); $j++) {
				if (is_dir('./'.$folders[$i].'/'.$subfolders[$j])) echo '<li><a href="./'.$folders[$i].'/'.$subfolders[$j].'/">'.$subfolders[$j].'</a></li>';
			}
			echo '</ul></details>';
		}
	}
	?>
	<!-- </details> -->
	</div>
</body>
</html>