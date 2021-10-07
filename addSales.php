<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
  <meta name="description" content="Managing Software Projects" />
  <meta name="author" content="Charlie Sargeant, Ed Sargeant, Jack Swanton, Kelvin Fu, Riley Hempel" />

  <link href="style.css" rel="stylesheet" type="text/css" />

  <script src="script/validate.js"></script>
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
  <!-- FORM -->
    <form id= "addsales" action = "addSalesProcess.php" method = "post">
      <label for="item">Item:</label>
      <input type="text" id="item" name="item" required="required">
			<br />
      <label for="date">Date:</label>
      <input type="date" id="date" name="date" value=<?php echo date('Y-m-d'); ?>>
			<br />
      <label for="qty">Quantity:</label>
      <input type="text" id="qty" name="qty" required="required">
      <br />
      <label for="unitprice">Unit Price:</label>
      <input type="text" id="unitprice" name="unitprice" required="required">
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
