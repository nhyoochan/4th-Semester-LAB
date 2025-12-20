<?php
include '01.php';

$sort_by = "marks";
$order = "DESC";

if (isset($_GET['sort'])) {
  if ($_GET['sort'] == "name") {
    $sort_by = "name";
    $order = "ASC";
  } elseif ($_GET['sort'] == "marks") {
    $sort_by = "marks";
    $order = "DESC";
  }
}

$sql = "SELECT * FROM students ORDER BY $sort_by $order";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Sort Students</title>
  <style>
    h2, form {
      margin-bottom: 8px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 6px;
      border: 1px solid #ccc;
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

  <h2>Students List</h2>

  <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label>Sort By:</label>
    <select name="sort" onchange="this.form.submit()">
      <option value="marks" <?= ($sort_by == "marks") ? "selected" : "" ?>>Marks (High to Low)</option>
      <option value="name" <?= ($sort_by == "name") ? "selected" : "" ?>>Name (A-Z)</option>
    </select>
  </form>

  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Date of Birth</th>
      <th>Marks</th>
    </tr>

    <?php if (mysqli_num_rows($result) > 0) { ?>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['dob'] ?></td>
          <td><?= $row['marks'] ?></td>
        </tr>
      <?php } ?>
    <?php } else { ?>
      <tr>
        <td colspan="4">No students found.</td>
      </tr>
    <?php } ?>
  </table>

</body>

</html>

<?php mysqli_close($conn); ?>