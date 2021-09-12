<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
  <meta name="description" content="Managing Software Projects" />
  <meta name="author" content="Charlie Sargeant, Ed Sargeant, Jack Swanton, Kelvin Fu, Riley Hempel" />
	<title>PHP-SRePS</title>
</head>

<body>
	<h1>Display Sales</h1>
	<?php
	
		if (($sales = fopen("./data/sales.csv", "r")) !== FALSE) 
  {
  
	while (! feof ($sales)) {
		$data = fgets($sales); 
		echo "<p>", $data, "</p>"; 
	  }
	  fclose($sales); 
	} else { 
	  echo "<p>Please enter item and quantity in the add sales form.</p>";
	}
  
  

	

	 
	?>
</body>
</html>
