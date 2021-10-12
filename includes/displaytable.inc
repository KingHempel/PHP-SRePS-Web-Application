<table>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Item</th>
      <th scope="col">Date</th>
      <th scope="col">Quantity</th>
      <th scope="col">Unit Price</th>
      <th scope="col">Total Price</th>
    </tr>
  </thead>
  <tbody>
<?php
  include_once("includes/opendatabase.inc");
  $res = $db -> query('SELECT * FROM sales');
  foreach ($res as $row) {
    echo '<tr><td>' . $row['ID'] . '</td><td>' . $row['Item'] . '</td><td>' . date("d/m/Y", strtotime($row['Date'])) . '</td><td>' . $row['Quantity'] . '</td><td>' . '$' . $row['UnitPrice'] . '</td><td>' . '$' . $row['TotalPrice'] . '</td></tr>';
  }
?>
</tbody>
</table>
