<?php
include '01.php';

$sql = "SELECT class, COUNT(*) AS total_students, AVG(marks) AS avg_marks
        FROM students
        GROUP BY class
        ORDER BY class";
$result = mysqli_query($conn, $sql);
?>
<html>
<head>
  <title>Average Marks by Class</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th,td {
      padding: 6px;
      border: 1px solid #ccc;
      text-align: center;
    }
    th {
      background-color: #f2f2f2;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
  </style>
</head>

<body>

  <h2>Average Marks Per Class</h2>

  <table>
    <tr>
      <th>Class</th>
      <th>Total Students</th>
      <th>Average Marks</th>
    </tr>

    <?php if (mysqli_num_rows($result) > 0) { ?>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?= $row['class'] ?: 'Unknown' ?></td>
          <td><?= $row['total_students'] ?></td>
          <td><?= number_format($row['avg_marks'], 2) ?></td>
        </tr>
      <?php } ?>
    <?php } else { ?>
      <tr>
        <td colspan="3">No students found.</td>
      </tr>
    <?php } ?>
  </table>

</body>

</html>

<?php mysqli_close($conn); ?>