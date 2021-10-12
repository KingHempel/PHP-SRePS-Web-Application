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
  $page = 'add';
  include_once("includes/header.inc");
  ?>

	<h1>Add Sales</h1>
	<div>
		<?php
	  if (isset ($_POST["item"]) && isset ($_POST["date"]) && isset ($_POST["qty"]) && isset ($_POST["unitprice"])) { // check if form data exists
			$item = $_POST["item"]; // obtain the form item data
			$date = $_POST['date']; // obtain the form date data
	    $qty = $_POST["qty"]; // obtain the form quantity data
	    $unitprice = $_POST['unitprice']; // obtain the form unitprice data

			include_once("includes/opendatabase.inc");
			$sql = "INSERT INTO sales (Item, Date, Quantity, UnitPrice, TotalPrice) VALUES (?,?,?,?,?)";
		  $db->prepare($sql)->execute([$item, $date, $qty, $unitprice, ($unitprice * $qty)]);
			header("location: displaySales.php");
	  } else { // no input
	    echo "<p>Please input values into all fields in the form.</p>";
	  }
		?>
	</div>
  <!-- FOOTER -->
  <?php
  include_once("includes/footer.inc");
  ?>
</body>
</html>
