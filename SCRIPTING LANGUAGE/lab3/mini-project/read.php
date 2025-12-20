<?php
include 'connection.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$sort_by = isset($_GET['sort']) ? $_GET['sort'] : 'id';
$order = isset($_GET['order']) && $_GET['order'] == 'DESC' ? 'DESC' : 'ASC';

$sql = "SELECT * FROM employees 
        WHERE name LIKE '%$search%' OR department LIKE '%$search%' 
        ORDER BY $sort_by $order";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Employees</title>
  <style>
    h2, form {
      margin-bottom: 8px;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      border: 1px solid #ccc;
      padding: 6px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <h2>Employees List</h2>

  <form method="GET">
    Search: <input type="text" name="search" value="<?= $search ?>">
    <input type="submit" value="Search">
  </form>

  <table>
    <tr>
      <th><a href="?sort=id&order=<?= ($order == 'ASC') ? 'DESC' : 'ASC' ?>">ID</a></th>
      <th><a href="?sort=name&order=<?= ($order == 'ASC') ? 'DESC' : 'ASC' ?>">Name</a></th>
      <th><a href="?sort=department&order=<?= ($order == 'ASC') ? 'DESC' : 'ASC' ?>">Department</a></th>
      <th><a href="?sort=salary&order=<?= ($order == 'ASC') ? 'DESC' : 'ASC' ?>">Salary</a></th>
      <th>Joining Date</th>
      <th>Actions</th>
    </tr>

    <?php if (mysqli_num_rows($result) > 0) { ?>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['department'] ?></td>
          <td><?= $row['salary'] ?></td>
          <td><?= $row['joining_date'] ?></td>
          <td>
            <a href="update.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="delete.php?id=<?= $row['id'] ?>">Delete</a>
          </td>
        </tr>
      <?php } ?>
    <?php } else { ?>
      <tr>
        <td colspan="6">No employees found.</td>
      </tr>
    <?php } ?>
  </table>

  <br>
  <a href="create.php">Add Employee</a> |
  <a href="status.php">Department Stats</a>

</body>

</html>

<?php $conn->close(); ?>