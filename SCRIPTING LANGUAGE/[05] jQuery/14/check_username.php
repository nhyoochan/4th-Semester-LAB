<?php
$conn = mysqli_connect("localhost", "root", "", "ajax_lab");

$username = trim($_POST['username']);

// Case-insensitive match
$query = "SELECT * FROM contacts WHERE LOWER(name) = LOWER('$username')";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  echo "<span style='color:red'>Not Available</span>";
} else {
  echo "<span style='color:green'>Available</span>";
}
