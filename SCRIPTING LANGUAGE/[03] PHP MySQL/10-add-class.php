<?php

include '01.php';
$sql = "ALTER TABLE students ADD COLUMN IF NOT EXISTS class VARCHAR(50)";

if (mysqli_query($conn, $sql)) {
  echo "Column 'class' added successfully or already exists.";
} else {
  echo "Error adding column: " . mysqli_error($conn);
}

mysqli_close($conn);
