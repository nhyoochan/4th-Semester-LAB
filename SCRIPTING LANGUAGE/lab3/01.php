<?php
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "school";

$isCurrentFile = (__FILE__ == $_SERVER['SCRIPT_FILENAME']);
$conn = mysqli_connect($dbhost, $dbusername, $dbpassword);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
  // echo "Connected successfully to MySQL server.<br>";

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if (mysqli_query($conn, $sql)) {
  if ($isCurrentFile) echo "Database created successfully or already exists.<br>";
} else {
  echo "Error creating database: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);

$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

if ($conn) {
  if ($isCurrentFile) echo "Connected to the database '$dbname' successfully.<br>";
} else {
  echo "Connection failed: " . mysqli_connect_error() . "<br>";
}

if ($isCurrentFile) {
  mysqli_close($conn);

  echo "Connection closed.";
}
