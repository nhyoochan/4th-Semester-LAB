<?php
$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql_db = "CREATE DATABASE IF NOT EXISTS company";
mysqli_query($conn, $sql_db);

$conn->select_db("company");

$sql_table = "CREATE TABLE IF NOT EXISTS employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    department VARCHAR(50) NOT NULL,
    salary DECIMAL(10,2) NOT NULL,
    joining_date DATE NOT NULL
)";

mysqli_query($conn, $sql_table);