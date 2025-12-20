<?php

include '01.php';

// SQL query to create the 'students' table
$sql = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    dob DATE NOT NULL,
    marks DECIMAL(5, 2) NOT NULL
)";

// Execute the query and check if it was successful
if (mysqli_query($conn, $sql)) {
  echo "Table 'students' created successfully.";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);