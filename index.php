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

	$request = [];
	preg_match('/\/([^\/]*)\/([^\/]*)?\/?/', $_SERVER['REQUEST_URI'], $request);
	if (count($request) && in_array($request[1], $folders)) {
		$heading = $request[1];
		$folders = scandir('./'.$request[1]);
		for ($i=0; $i<count($folders); $i++) {
			$dir = './'.$request[1].'/'.$folders[$i];
			if ($folders[$i][0]!='.' && is_dir($dir) && ($request[2]=='' || $request[2]==$folders[$i])) {
				$wrapper.='<details'.(($request[2]==$folders[$i])?' open':'').'><summary>'.$folders[$i].'</summary><ul>';
				$subfolders = scandir($dir);
				sort($subfolders, SORT_NATURAL | SORT_FLAG_CASE);
				for ($j=2; $j<count($subfolders); $j++) {
					if (is_dir($dir.'/'.$subfolders[$j])) $wrapper.='<li><a href="./'.(($request[2]==$folders[$i])?'':$folders[$i].'/').$subfolders[$j].'/">'.$subfolders[$j].'</a></li>';
				}
				$wrapper.='</ul></details>';
			}
		}
	}
	else {
		for ($i=0; $i<count($folders); $i++) {
			if ($folders[$i][0]!='.' && is_dir($folders[$i])) {
				$wrapper.='<a href="/'.$folders[$i].'/">'.$folders[$i].'</a>';
			}
		}
	}
	echo '<h1>'.$heading.'</h1>';
	echo '<h2>by <a href="https://bouhartsev.top">Matvey Bouharstev</a></h2><div class="wrapper">'.$wrapper.'</div>';
	?>
	
</body>
</html>