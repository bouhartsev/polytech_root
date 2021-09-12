<!doctype html>
<html lang="ru">
	
<head>
	<meta charset="utf-8">
	<title>WEBLAB by Bouhartsev</title>
	<link rel="stylesheet" href="/style.css">
	<link rel="shortcut icon" href="/favicon.ico">
</head>
<body>
	<h1>WEBLAB</h1>
	<h2>by Matvey Bouharstev</h2>
	<ul>
		<?php 
		$courses = scandir('./');
		sort($courses, SORT_NATURAL | SORT_FLAG_CASE);
		for ($i=0; $i<count($courses); $i++) {
			if (is_dir($courses[$i]) && !str_starts_with($courses[$i], '.')) {
				echo '<li>'.$courses[$i].'<ul>';
				$labs = scandir('./'.$courses[$i]);
				sort($labs, SORT_NATURAL | SORT_FLAG_CASE);
				for ($j=2; $j<count($labs); $j++) {
					if (is_dir('./'.$courses[$i].'/'.$labs[$j])) echo '<li><a href="./'.$courses[$i].'/'.$labs[$j].'/">'.$labs[$j].'</a></li>';
				}
				echo '</ul></li>';
			}
		}
		?>
	</ul>
</body>
</html>