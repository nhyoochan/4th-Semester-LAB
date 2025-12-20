<?php
include '01.php';

$sql_total = "SELECT COUNT(*) AS total_students FROM students";
$result_total = mysqli_query($conn, $sql_total);
$data_total = mysqli_fetch_assoc($result_total);

$sql_sum = "SELECT SUM(marks) AS total_marks FROM students";
$result_sum = mysqli_query($conn, $sql_sum);
$data_sum = mysqli_fetch_assoc($result_sum);

$sql_avg = "SELECT AVG(marks) AS avg_marks FROM students";
$result_avg = mysqli_query($conn, $sql_avg);
$data_avg = mysqli_fetch_assoc($result_avg);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Statistics</title>
</head>

<body>

  <h2>Student Statistics</h2>

  <p><strong>Total Students:</strong> <?= $data_total['total_students'] ?></p>
  <p><strong>Total Marks Sum:</strong> <?= $data_sum['total_marks'] ?></p>
  <p><strong>Average Marks:</strong> <?= number_format($data_avg['avg_marks'], 2) ?></p>

</body>

</html>

<?php mysqli_close($conn); ?>