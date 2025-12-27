<?php
// Database connection (NO separate file)
$conn = mysqli_connect("localhost", "root", "", "ajax_lab");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Fetch data
$sql = "SELECT * FROM contacts";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

  echo "<table border='1' cellpadding='8' width='100%'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['phone'] . "</td>
              </tr>";
  }

  echo "</table>";
} else {
  echo "No records found";
}

mysqli_close($conn);
