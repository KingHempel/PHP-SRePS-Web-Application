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
    $qty = $_POST["qty"]; // obtain the form quantity data
    $price = $_POST['price'];
    $filename = "./data/sales.csv"; // assumes php file is inside lab05
    $handle = fopen($filename, "a"); // open the file in append mode
    $data = ($item . ", " . $qty . ", " . $price . "\n"); // concatenate item and qty delimited by comma
    fwrite ($handle, $data); // write string to text file
    fclose($handle); // close the text file
    $handle = fopen($filename, "r"); // open the file in read mode
    while (! feof ($handle)) { // loop while not end of file
      $data = fgets($handle); // read a line from the text file
      echo "<p>", $data, "</p>"; // generate HTML output of the data
    }
    fclose($handle); // close the text file
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
