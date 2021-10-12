<?php
  $dbFile = './data/database.db';
  if (!file_exists($dbFile)) {
    $db = new PDO("sqlite:$dbFile");
    $db -> exec('create table sales (
      ID INTEGER PRIMARY KEY AUTOINCREMENT,
      Item VARCHAR(255) NOT NULL,
      Date DATE NOT NULL,
      Quantity INT NOT NULL,
      UnitPrice DECIMAL(10,2) NOT NULL,
      TotalPrice DECIMAL(10,2) NOT NULL
    )');
  }
  else {
    $db = new PDO("sqlite:$dbFile");
  }
?>
