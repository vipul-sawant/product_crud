<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "product_crud";

$con = mysqli_connect($server,$user,$password,$database);

if (mysqli_connect_errno()) {

  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}?>