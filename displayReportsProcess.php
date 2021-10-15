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
  $page = 'salesreport';
  include_once("includes/header.inc");
  ?>

	<h1>Sales Report</h1>
	<div>
		<table>
			<thead>
				<tr>
					<th scope="col">Year</th>
					<th scope="col">Month</th>
					<th scope="col">Total Sales</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include_once("includes/opendatabase.inc");

					$res = $db -> query("SELECT strftime('%Y', date) AS 'year',
						case strftime('%m', date)
						when '01' then 'January'
						when '02' then 'Febuary'
						when '03' then 'March'
						when '04' then 'April'
						when '05' then 'May'
						when '06' then 'June'
						when '07' then 'July'
						when '08' then 'August'
						when '09' then 'September'
						when '10' then 'October'
						when '11' then 'November'
						when '12' then 'December'
						else '' end AS 'month',
					SUM(UnitPrice * Quantity) AS 'totalsales'
					FROM sales
					group by strftime('%Y/%m', date)
					order by strftime('%Y/%m', date)");

					foreach ($res as $row) {
						echo '<tr><td>' . $row['year'] . '</td><td>' . $row['month'] . '</td><td>' . '$' . $row['totalsales'] . '</td></tr>';
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
