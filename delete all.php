<?php
require 'db.php';

$sql = 'DELETE FROM donor ';
$statement = $connection->prepare($sql);
if ($statement->execute()) {
  header("Location: E.d.php");
}