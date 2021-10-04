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
</div>
	<!-- FOOTER -->
	<?php
	include_once("includes/footer.inc");
	?>
</body>
</html>
