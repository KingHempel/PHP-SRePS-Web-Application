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
	<?php
  if (isset ($_POST["item"])) { // check if both form data exists
		$item = $_POST["item"]; // obtain the form item data
		$date = $_POST['date'];
    $qty = $_POST["qty"]; // obtain the form quantity data
    $unitprice = $_POST['unitprice'];

    $filename = "./data/sales.csv"; // assumes php file is inside lab05
    $handle = fopen($filename, "a"); // open the file in append mode
		if ($handle)
		{
			$id = count(file($filename)) + 1;
		}
		$data = ($id . "," .$item . "," . $date . "," . $qty . "," . $unitprice . "," . ($unitprice * $qty) . "\n"); // concatenate item and qty delimited by comma
    fwrite ($handle, $data); // write string to text file
    fclose($handle); // close the text file
    header("location: displaySales.php");
  } else { // no input
    echo "<p>Please enter item and quantity in the add sales form.</p>";
  }
	?>
  <!-- FOOTER -->
  <?php
  include_once("includes/footer.inc");
  ?>
</body>
</html>
