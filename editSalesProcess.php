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
			if ($_POST["LineID"] != "") { // check if ID form data exists
				$lineID = $_POST["LineID"];	//obtain id of sale to be edited
				$editItem = $_POST["editItem"]; // obtain the form item data
				$editDate = $_POST['editDate']; // obtain the form date data
				$editQty = $_POST["editQty"]; // obtain the form quantity data
				$editUnitPrice = $_POST['editUnitPrice']; // obtain the form price data

				include_once("includes/opendatabase.inc");

				$res = $db -> query("SELECT * FROM sales WHERE id=$lineID");
				$row = $res -> fetch();

				if ($editItem != ""){	//if yes, and the data fields aren't empty
					$row['Item'] = trim($editItem);	//update data
				}
				if ($editDate != ""){
					$row['Date'] = trim($editDate);
				}
				if ($editQty != ""){
					$row['Quantity'] = trim($editQty);
				}
				if ($editUnitPrice != ""){
					$row['UnitPrice'] = trim($editUnitPrice);
				}
				if ($editQty != "" || $editUnitPrice != ""){
					$row['TotalPrice'] = $row['UnitPrice'] * $row['Quantity'];
				}

				$sql = "UPDATE sales SET Item=?, Date=?, Quantity=?, UnitPrice=?, TotalPrice=? WHERE id=$lineID";
				$db->prepare($sql)->execute([$row['Item'], $row['Date'], $row['Quantity'], $row['UnitPrice'], $row['TotalPrice']]);

				header("location: editSales.php");
			}
			else {
				echo "<p>No Input.</p>";
			}
		?>
	</div>

  <!-- FOOTER -->
  <?php
  include_once("includes/footer.inc");
  ?>
</body>
</html>
