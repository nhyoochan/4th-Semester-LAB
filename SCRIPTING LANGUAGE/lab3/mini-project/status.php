<?php
include 'connection.php';
$sql = "SELECT department, COUNT(*) AS total_employees, AVG(salary) AS avg_salary
        FROM employees
        GROUP BY department";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Department Stats</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      border: 1px solid #ccc;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <h2>Department Statistics</h2>
  <table>
    <tr>
      <th>Department</th>
      <th>Total Employees</th>
      <th>Average Salary</th>
    </tr>
    <?php if (mysqli_num_rows($result) > 0) { ?>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?= $row['department'] ?></td>
          <td><?= $row['total_employees'] ?></td>
          <td><?= number_format($row['avg_salary'], 2) ?></td>
        </tr>
      <?php } ?>
    <?php } else { ?>
      <tr>
        <td colspan="3">No data found.</td>
      </tr>
    <?php } ?>
  </table>
  <br>
  <a href="read.php">Back to Employees</a>
</body>

</html>
<?php $conn->close(); ?>