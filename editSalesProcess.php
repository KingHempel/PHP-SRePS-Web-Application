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
	<?php
		$filename = "./data/sales.csv";
		if ($_POST["LineID"] != "") { // check if ID form data exists
		$lineID = $_POST["LineID"];	//obtain id of sale to be edited
		$editItem = $_POST["editItem"]; // obtain the form item data
		$editDate = $_POST['editDate']; // obtain the form date data
		$editQty = $_POST["editQty"]; // obtain the form quantity data
		$editUnitPrice = $_POST['editUnitPrice']; // obtain the form price data


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
			if ($data[0] == $lineID){			//check if the ID matches user input
				if ($editItem != ""){			//if yes, and the data fields aren't empty
					$data[1] = trim($editItem);	//update data
				}
				if ($editDate != ""){
					$data[2] = trim($editDate);
				}
				if ($editQty != ""){
					$data[3] = trim($editQty);
				}
				if ($editUnitPrice != ""){
					$data[4] = trim($editUnitPrice);
				}
				if ($editQty != "" || $editUnitPrice != "")
				{
					$data[5] = $data[3] * $data[4];
				}
				$alldata[$key] = $data;
			}

		}
		unlink($filename);						//Deletes CSV file
												//So it can be rewritten with correct data
		$handle = fopen($filename, "a"); 		//open the file in append mode. Should create the CSV file as it has been deleted.
		foreach ($alldata as $d) {		 		//Write all the data into the CSV
			echo "<br>";
			$writedata = (trim($d[0]) . "," . trim($d[1]) . "," . trim($d[2]) . "," . trim($d[3]) . "," . trim($d[4]) . "," . trim($d[5]) . "\n"); // concatenate item and qty delimited by comma
			fwrite ($handle, $writedata); // write string to text file
		}
		fclose($handle); // close the text file
		echo"<p>Data Saved Successfully</p>";
	} else { // no input
		echo "<p>No Input.</p>";
	}
	?>

  <!-- FOOTER -->
  <?php
  include_once("includes/footer.inc");
  ?>
</body>
</html>
