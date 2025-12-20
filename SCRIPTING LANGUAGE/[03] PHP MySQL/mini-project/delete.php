<?php
include 'connection.php';

$id = $_GET['id'] ?? 0;

$sql = "DELETE FROM employees WHERE id=$id";
if (mysqli_query($conn, $sql)) {
  $conn->close();
  header("Location: read.php");
  exit;
} else {
  echo "Error: " . mysqli_error($conn);
}
