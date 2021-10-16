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
	$page = 'salesreport';
	include_once("includes/header.inc");
	?>
	<h1>Sales Report</h1>

    <div>

    <form action = "displayReportsProcess.php" method = "post" >
			<p>Generate a Monthly Report</p>
			<input type="submit" value="Submit">
		</form>
	</div>

	<div>

    <form action = "monthlyItemSalesProcess.php" method = "post" >
			<p>Predict Monthly Sales of an Item</p>
			<input type="submit" value="Submit">
		</form>
	</div>

	<div>

    <form action = "monthlyGroupSalesProcess.php" method = "post" >
			<p>Predict Monthly Sales of a Group of Items</p>
			<input type="submit" value="Submit">
		</form>
	</div>

	

	<!-- FOOTER -->
	<?php
	include_once("includes/footer.inc");
	?>
</body>
</html>
