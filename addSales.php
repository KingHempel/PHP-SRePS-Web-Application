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

  <!-- FORM -->
    <form action = "addSalesProcess.php" method = "post" >
      <label for="item">Item:</label>
      <input type="text" id="item" name="item">
      <br />
      <label for="qty">Quantity:</label>
      <input type="text" id="qty" name="qty">
      <br />
      <label for="price">Price:</label>
      <input type="text" id="price" name="price">
      <br />
      <input type="submit" value="Submit">
    </form>

    <!-- FOOTER -->
    <?php
    include_once("includes/footer.inc");
    ?>
</body>
</html>
