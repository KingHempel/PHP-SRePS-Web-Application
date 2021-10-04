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
	<table>
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Item</th>
				<th scope="col">Quantity</th>
				<th scope="col">Price</th>
				<th scope="col">Date</th>
			</tr>
		</thead>
		<tbody>
	<?php
	if (($sales = fopen("./data/sales.csv", "r")) !== FALSE)
	{
		while (! feof ($sales)) {
			$data = fgets($sales);
			$data_arr = explode (",", $data);
			if (!empty($data_arr[0])) {
				if (isset($data_arr[0]))
				{
					echo "<tr><td>" . $data_arr[0] . "</td>";
				}
				if (isset($data_arr[1])){
					echo "<td>" . $data_arr[1] . "</td>"; // generate HTML output of the data
				}
				if (isset($data_arr[2])){
					echo "<td>" . $data_arr[2] . "</td>"; // generate HTML output of the data
				}
				if (isset($data_arr[3])){
					echo "<td>" . $data_arr[3] . "</td>"; // generate HTML output of the data
				}
				if (isset($data_arr[4])){
					echo "<td>" . $data_arr[4] . "</td></tr>"; // generate HTML output of the data
				}
			}
	  }
	  fclose($sales);
	} else {
	  echo "<p>Please enter item and quantity in the add sales form.</p>";
	}
	?>
</tbody>
</table>

<form action = "editSalesProcess.php" method = "post" >
	<p>Please enter the ID of the row you would like to edit</p>
	<label for="LineID">Sale ID:</label>
	<input type="number" id="LineID" name="LineID">
	<br />
	<label for="editItem">New Item:</label>
	<input type="text" id="editItem" name="editItem">
	<br />
	<label for="editQty">New Quantity:</label>
	<input type="text" id="editQty" name="editQty">
	<br />
	<label for="editPrice">New Price:</label>
	<input type="text" id="editPrice" name="editPrice">
	<br />
	<label for="editDate">New Date:</label>
	<input type="date" id="editDate" name="editDate">
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
