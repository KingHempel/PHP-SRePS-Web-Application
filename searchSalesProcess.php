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
		$filename = "./data/sales.csv";

		$lineID = $_POST["LineID"];	//obtain id of sale to be searched
		$searchItem = $_POST["searchItem"]; // obtain the form item data
		$searchDate = $_POST['searchDate']; // obtain the form date data
		$searchQty = $_POST["searchQty"]; // obtain the form quantity data
		$searchUnitPrice = $_POST['searchUnitPrice']; // obtain the form price data
		$searchTotalPrice = $_POST['searchTotalPrice']; // obtain the form total price data


		$alldata = array();	//create array. This will contain all the data
		$handle = fopen($filename, "r"); // open the file in read mode
		while (! feof ($handle)) { // loop while not end of file
			$data = fgets($handle); // read a line from the text file
			if ($data != "") {
				$data2 = explode(",", $data);
				$alldata[] = $data2;	//Fills the array with data
			}
		}
		fclose($handle); // close the text file
		foreach ($alldata as $key =>$data) {	//Foreach data entry,
			if ($data[0] == $lineID || $lineID == null){			//check if the ID matches user input
				if ($data[1] == $searchItem || $searchItem == null){			//if yes, and the data fields aren't empty
					if ($data[2] == $searchDate || $searchDate == null){
						if ($data[3] == $searchQty || $searchQty == null){
							if ($data[4] == $searchUnitPrice || $searchUnitPrice == null){
								if ($data[5] == $searchTotalPrice || $searchTotalPrice == null){
									echo "<tr><td>" . $data[0] . "</td>
									<td>" . $data[1] . "</td>
									<td>" . date("d/m/Y", strtotime($data[2])) . "</td>
									<td>" . $data[3] . "</td>
									<td>" . "$" . $data[4] . "</td>
									<td>" . "$" . $data[5] . "</td></tr>";
								}
							}
						}
					}
				}
			}
			$alldata[$key] = $data;
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
