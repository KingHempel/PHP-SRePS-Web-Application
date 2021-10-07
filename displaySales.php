<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
  	<meta name="description" content="Managing Software Projects" />
  	<meta name="author" content="Charlie Sargeant, Ed Sargeant, Jack Swanton, Kelvin Fu, Riley Hempel" />

	<link href="style.css" rel="stylesheet" type="text/css" />

	<title>PHP-SRePS</title>
</head>

<body>
	<!-- HEADER -->
	<?php
	$page = 'display';
	include_once("includes/header.inc");
	?>
	<h1>Display Sales</h1>
	<div>
		<?php
		include_once("includes/displaytable.inc");
		?>
	</div>
	<!-- FOOTER -->
	<?php
	include_once("includes/footer.inc");
	?>
</body>
</html>
