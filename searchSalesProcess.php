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
	<table>
	  <thead>
	    <tr>
	      <th scope="col">ID</th>
	      <th scope="col">Item</th>
	      <th scope="col">Date</th>
	      <th scope="col">Quantity</th>
	      <th scope="col">Unit Price</th>
	      <th scope="col">Total Price</th>
	    </tr>
	  </thead>
	  <tbody>
	<?php
	$lineID = trim($_POST["LineID"]);	//obtain id of sale to be searched
	$searchItem = trim($_POST["searchItem"]); // obtain the form item data
	$searchDate = $_POST['searchDate']; // obtain the form date data
	$searchQty = trim($_POST["searchQty"]); // obtain the form quantity data
	$searchUnitPrice = trim($_POST['searchUnitPrice']); // obtain the form price data
	$searchTotalPrice = trim($_POST['searchTotalPrice']); // obtain the form total price data

	$sql = "SELECT * FROM sales";

	$queries = array();
	if ($lineID != "") {
		$queries[] = "ID LIKE $lineID";
	}
	if ($searchItem != "") {
		$queries[] = "Item LIKE '%$searchItem%'";
	}
	if ($searchDate != "") {
		$queries[] = "Date LIKE '$searchDate'";
	}
	if ($searchQty != "") {
		$queries[] = "Quantity LIKE $searchQty";
	}
	if ($searchUnitPrice != "") {
		$queries[] = "UnitPrice LIKE $searchUnitPrice";
	}
	if ($searchTotalPrice != "") {
		$queries[] = "TotalPrice LIKE $searchTotalPrice";
	}
	$query = implode(" AND ", $queries);

	if ($query != "") {
		$sql = $sql . " WHERE " . $query;
	}

	include_once("includes/opendatabase.inc");
	$res = $db -> query($sql);
	foreach ($res as $row) {
		echo '<tr><td>' . $row['ID'] . '</td><td>' . $row['Item'] . '</td><td>' . date("d/m/Y", strtotime($row['Date'])) . '</td><td>' . $row['Quantity'] . '</td><td>' . '$' . $row['UnitPrice'] . '</td><td>' . '$' . $row['TotalPrice'] . '</td></tr>';
	}
	?>
		</tbody>
	</table>
	</div>

  <!-- FOOTER -->
  <?php
  include_once("includes/footer.inc");
  ?>
</body>
</html>
