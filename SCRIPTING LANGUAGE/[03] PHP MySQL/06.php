<?php
include '01.php';

if (isset($_GET['delete_id'])) {
  $delete_id = $_GET['delete_id'];

  $delete_sql = "DELETE FROM students WHERE id = $delete_id";

  if (mysqli_query($conn, $delete_sql)) {
    echo "Student record deleted successfully.";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
}

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

?>
<html>
<head>
  <title>Student Records</title>

  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 6px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .btn-delete {
      color: red;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>

<body>

  <h2>Student Records</h2>

  <?php
  if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Date of Birth</th><th>Marks</th><th>Action</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['dob'] . "</td>";
      echo "<td>" . $row['marks'] . "</td>";
      echo "<td><a href='?delete_id=" . $row['id'] . "' class='btn-delete'>Delete</a></td>";
      echo "</tr>";
    }

    echo "</table>";
  } else {
    echo "No student records found.";
  }

  mysqli_close($conn);
  ?>

</body>

</html>