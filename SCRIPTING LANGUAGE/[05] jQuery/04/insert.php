<?php
$conn = mysqli_connect("localhost", "root", "", "ajax_lab");

if (!$conn) {
  die("Connection failed");
}

$name  = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "INSERT INTO contacts (name, email, phone)
        VALUES ('$name', '$email', '$phone')";

if (mysqli_query($conn, $sql)) {
  echo "Data inserted successfully";
} else {
  echo "Error inserting data";
}

mysqli_close($conn);
