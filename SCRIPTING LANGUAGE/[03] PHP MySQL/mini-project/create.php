<?php
include 'connection.php';

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $department = $_POST['department'];
  $salary = $_POST['salary'];
  $joining_date = $_POST['joining_date'];

  $sql = "INSERT INTO employees (name, department, salary, joining_date)
            VALUES ('$name','$department','$salary','$joining_date')";

  if (mysqli_query($conn, $sql)) {
    echo "Employee added successfully.<a href='read.php'>View Employees</a>";
    mysqli_close($conn);
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Add Employee</title>
  <style>
    h2, form {
      margin-bottom: 8px;
    }
    input {
      display: block;
      padding: 6px 12px;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <h2>Add Employee</h2>
  <form method="POST">
    Name: <input type="text" name="name" required><br>
    Department: <input type="text" name="department" required><br>
    Salary: <input type="number" step="0.01" name="salary" required><br>
    Joining Date: <input type="date" name="joining_date" required><br>
    <input type="submit" name="submit" value="Add Employee">
  </form>
  <a href="read.php">View Employees</a>
</body>

</html>