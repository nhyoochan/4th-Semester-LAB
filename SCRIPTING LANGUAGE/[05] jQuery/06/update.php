<?php
$conn = mysqli_connect("localhost", "root", "", "ajax_lab");

$id = intval($_POST['id']);
$field = $_POST['field'];
$value = $_POST['value'];

$allowed = ['name', 'email', 'phone'];
if (!in_array($field, $allowed)) {
  exit("error");
}

$stmt = mysqli_prepare($conn, "UPDATE contacts SET $field=? WHERE id=?");
mysqli_stmt_bind_param($stmt, "si", $value, $id);

if (mysqli_stmt_execute($stmt)) {
  echo "success";
} else {
  echo "error";
}

mysqli_close($conn);
