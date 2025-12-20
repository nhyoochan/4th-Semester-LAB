<?php
include '01.php';

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {

  echo "<h2>Student Records</h2>";
  echo "<table border='1' cellpadding='5' width='100%'>";
  echo "<tr><th>ID</th><th>Name</th><th>Date of Birth</th><th>Marks</th></tr>";


  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['dob'] . "</td>";
    echo "<td>" . $row['marks'] . "</td>";
    echo "</tr>";
  }


  echo "</table>";
} else {
  echo "No student records found.";
}


mysqli_close($conn);
