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
	$page = 'edit';
	include_once("includes/header.inc");
	?>
	<h1>Edit Sales</h1>
	<div>
		<?php
		include_once("includes/displaytable.inc");
		?>

		<form action = "editSalesProcess.php" method = "post" >
			<p>Please enter the ID of the row you would like to edit</p>
			<label for="LineID">Sale ID:</label>
			<input type="number" id="LineID" name="LineID">
			<br />
			<label for="editItem">New Item:</label>
			<input type="text" id="editItem" name="editItem">
			<br />
			<label for="editDate">New Date:</label>
			<input type="date" id="editDate" name="editDate">
			<br />
			<label for="editQty">New Quantity:</label>
			<input type="text" id="editQty" name="editQty">
			<br />
			<label for="editUnitPrice">New Unit Price:</label>
			<input type="text" id="editUnitPrice" name="editUnitPrice">
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
