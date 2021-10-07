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
if (($sales = fopen("./data/sales.csv", "r")) !== FALSE)
{
  while (! feof ($sales)) {
    $data = fgets($sales);
    $data_arr = explode (",", $data);
    if (!empty($data_arr[0])) {
      if (isset($data_arr[0]))
      {
        echo "<tr><td>" . $data_arr[0] . "</td>";
      }
      if (isset($data_arr[1])){
        echo "<td>" . $data_arr[1] . "</td>"; // generate HTML output of the data
      }
      if (isset($data_arr[2])){
        echo "<td>" . date("d/m/Y", strtotime($data_arr[2])) . "</td>"; // generate HTML output of the data
      }
      if (isset($data_arr[3])){
        echo "<td>" . $data_arr[3] . "</td>"; // generate HTML output of the data
      }
      if (isset($data_arr[4])){
        echo "<td>" . "$" . $data_arr[4] . "</td>"; // generate HTML output of the data
      }
      if (isset($data_arr[5])){
        echo "<td>" . "$" . $data_arr[5] . "</td></tr>"; // generate HTML output of the data
      }
    }
  }
  fclose($sales);
} else {
  echo "<p>Please enter item and quantity in the add sales form.</p>";
}
?>
</tbody>
</table>
