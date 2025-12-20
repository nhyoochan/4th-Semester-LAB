<?php
include 'connection.php';

$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM employees WHERE id=$id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $department = $_POST['department'];
        $salary = $_POST['salary'];
        $joining_date = $_POST['joining_date'];

      $sql_update = "UPDATE employees SET 
                        name='$name', department='$department', salary='$salary', joining_date='$joining_date'
                        WHERE id=$id";

      if (mysqli_query($conn, $sql_update)) {
        echo "Employee updated successfully.<br><a href='read.php'>View Employees</a>";
        $conn->close();
        exit;
      } else {
        echo "Error: " . mysqli_error($conn);
      }
    }
?>



<html>
  <head>
    <title>Update Employee</title>
      <style>
        input {
          display: block;
          padding: 8px;
          font-size: 16px;
        }
      </style>
  </head>

    <body>
      <h2>Update Employee</h2>
          <form method="POST">
            Name: <input type="text" name="name" value="<?= $data['name'] ?>" required><br>
            Department: <input type="text" name="department" value="<?= $data['department'] ?>" required><br>
            Salary: <input type="number" step="0.01" name="salary" value="<?= $data['salary'] ?>" required><br>
            Joining Date: <input type="date" name="joining_date" value="<?= $data['joining_date'] ?>" required><br>
            <input type="submit" name="update" value="Update Employee">
          </form>
      <br>
        <a href="read.php">Cancel</a>
    </body>

</html>