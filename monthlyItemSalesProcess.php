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

	<h1>Sales Predictions</h1>

  <div>
    <p>Sales Prediction for upcoming month per item.</p>
    <table>
			<thead>
				<tr>
          <th scope="col">Item</th>
					<th scope="col">Quantity</th>
          <th scope="col">Unit Price</th>
          <th scope="col">Total Price</th>
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
        Item, SUM(Quantity) AS Quantity, UnitPrice
      FROM sales
        group by strftime('%Y/%m', date), item
        order by strftime('%Y/%m', date)");

      $result = $res -> fetchAll();

      $averaged = [];
      foreach ($result as $row) {
        if (array_search($row["Item"], array_column($averaged, 0)) === FALSE) {
          $i = 0;
          $quantity = 0;
          foreach ($result as $v) {
            if ($row["Item"] == $v["Item"]) {
              $quantity += $v["Quantity"];
              $i++;
            }
          }
          $quantity = round($quantity/$i);
          $averaged[] = [$row["Item"], $quantity, $row["UnitPrice"], $quantity * $row["UnitPrice"]];
        }
      }

      foreach ($averaged as $row) {
        echo '<tr><td>' . $row[0] . '</td><td>' . $row[1] . '</td><td>$' . $row[2] . '</td><td>$' . $row[3] . '</td></tr>';
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
