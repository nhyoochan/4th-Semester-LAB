<?php
include '01.php';

$sql_create = "CREATE TABLE IF NOT EXISTS tblResult (
    symbolNo INT AUTO_INCREMENT PRIMARY KEY,
    result VARCHAR(10) NOT NULL,
    stu_id INT NOT NULL,
    FOREIGN KEY (stu_id) REFERENCES students(id) ON DELETE CASCADE
)";

if (!mysqli_query($conn, $sql_create)) {
  die("Error creating table: " . mysqli_error($conn) . "<br>");
}


$sql_students = "SELECT * FROM students";
$result_students = mysqli_query($conn, $sql_students);

while ($student = mysqli_fetch_assoc($result_students)) {
  $stu_id = $student['id'];
  $marks = $student['marks'];

  $result_text = ($marks > 39) ? 'pass' : 'fail';

  $check_sql = "SELECT * FROM tblResult WHERE stu_id=$stu_id";
  $check_res = mysqli_query($conn, $check_sql);

  if (mysqli_num_rows($check_res) == 0) {
    $insert_sql = "INSERT INTO tblResult (result, stu_id) VALUES ('$result_text', $stu_id)";
    mysqli_query($conn, $insert_sql);
  }
}

$sql_display = "SELECT s.name, s.marks, r.result 
                FROM students s 
                JOIN tblResult r ON s.id = r.stu_id";

$result_display = mysqli_query($conn, $sql_display);
?>

<html>

<head>
  <title>Student Results</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
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

  <h2>Student Results</h2>

  <table>
    <tr>
      <th>Name</th>
      <th>Marks</th>
      <th>Result</th>
    </tr>

    <?php if (mysqli_num_rows($result_display) > 0) { ?>
      <?php while ($row = mysqli_fetch_assoc($result_display)) { ?>
        <tr>
          <td><?= $row['name'] ?></td>
          <td><?= $row['marks'] ?></td>
          <td><?= ucfirst($row['result']) ?></td>
        </tr>
      <?php } ?>
    <?php } else { ?>
      <tr>
        <td colspan="3">No results found.</td>
      </tr>
    <?php } ?>
  </table>

</body>

</html>

<?php mysqli_close($conn); ?>