<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<?php
		header ('Content-type: text/html; charset=utf-8');
	?>
	<title>Movies List</title>
	<meta name="description" content="Movies List">
	<meta name="author" content="Jose Conde">
</head>

<body>
	<h1><?=ucfirst($genre)?> genre movies</h1>
	<table>
		<th>Movie</th>
		<th>Relase Year</th>
	  	<?php foreach ($movies as $movie) {?>
			<tr>
				<td><?=$movie["Title"]?></td>
				<td><?=$movie["releaseYear"]?></td>
			</tr>	
		<?php } ?>
	</table>
</body>
</html>