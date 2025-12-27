<?php
$conn = mysqli_connect("localhost", "root", "", "ajax_lab");

if (!$conn) {
  die("Database connection failed");
}

$result = mysqli_query($conn, "SELECT * FROM students");

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['marks']}</td>
          </tr>";
}

mysqli_close($conn);
