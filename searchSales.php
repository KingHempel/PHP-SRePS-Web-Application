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
	$page = 'search';
	include_once("includes/header.inc");
	?>
	<h1>Search Sales</h1>
	<div>
		<?php
		include_once("includes/displaytable.inc");
		?>

		<form action = "searchSalesProcess.php" method = "post" >
			<p>Please enter the values you would like to search for</p>
			<label for="LineID">Sale ID:</label>
			<input type="number" id="LineID" name="LineID">
			<br />
			<label for="searchItem">Item:</label>
			<input type="text" id="searchItem" name="searchItem">
			<br />
			<label for="searchDate">Date:</label>
			<input type="date" id="searchDate" name="searchDate">
			<br />
			<label for="searchQty">Quantity:</label>
			<input type="text" id="searchQty" name="searchQty">
			<br />
			<label for="searchUnitPrice">Unit Price:</label>
			<input type="text" id="searchUnitPrice" name="searchUnitPrice">
			<br />
			<label for="searchTotalPrice">Total Price:</label>
			<input type="text" id="searchTotalPrice" name="searchTotalPrice">
			<br />
			<input type="submit" value="Submit">
		</form>
	</div>
	<!-- FOOTER -->
	<?php
	include_once("includes/footer.inc");
	?>
</body>
</html>
