<?php
$conn = mysqli_connect("localhost", "root", "", "ajax_lab");

$id = intval($_GET['id']);

if (mysqli_query($conn, "DELETE FROM contacts WHERE id=$id")) {
  echo "success";
} else {
  echo "error";
}

mysqli_close($conn);
