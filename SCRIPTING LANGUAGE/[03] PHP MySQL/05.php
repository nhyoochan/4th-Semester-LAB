<?php
include '01.php';

$search_name = '';

if (isset($_GET['search_name'])) {
  $search_name = mysqli_real_escape_string($conn, $_GET['search_name']);
}

$sql = "SELECT * FROM students WHERE marks > 50";
if ($search_name != '') {
  $sql .= " AND name LIKE '%$search_name%'";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Students by Name</title>
  <style>
    h2 {
      margin-bottom: 8px;
    }
    input {
      padding: 8px;
      font-size: 16px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
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

  <h2>Search Students</h2>
  <!-- Search Form -->
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
    <label for="search_name">Enter Student Name:</label><br>
    <input type="text" id="search_name" name="search_name" value="<?php echo htmlspecialchars($search_name); ?>" placeholder="Search by name..." required>
    <input type="submit" value="Search">
  </form>

  <h2>Student Records (Marks > 50)</h2>

  <?php
  // Check if there are any results
  if (mysqli_num_rows($result) > 0) {
    // Display results in an HTML table
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>ID</th><th>Name</th><th>Date of Birth</th><th>Marks</th></tr>";

    // Loop through the result set and display each student
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['dob'] . "</td>";
      echo "<td>" . $row['marks'] . "</td>";
      echo "</tr>";
    }

    // End the HTML table
    echo "</table>";
  } else {
    echo "No students found with marks greater than 50.";
  }

  // Close the connection
  mysqli_close($conn);
  ?>

</body>

</html>