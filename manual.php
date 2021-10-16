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
  $page = 'manual';
  include_once("includes/header.inc");
  ?>

	<h1>Manual</h1>
	<div>
        <p> Below is a link to download the manual on how to use the website</p>
	</div>

    <div>

    <form method = "get" action = "includes/Manual.docx">
			<input type="submit" value="Download">
		</form>
	</div>

  <!-- FOOTER -->
  <?php
  include_once("includes/footer.inc");
  ?>
</body>
</html>
