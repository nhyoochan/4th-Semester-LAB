<?php
include '01.php';
  
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Students List</title>
</head>

<body>

  <h2>Students List</h2>

  <table width="100%" border="1" cellpadding="5">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Date of Birth</th>
      <th>Marks</th>
      <th>Edit</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['dob'] ?></td>
        <td><?= $row['marks'] ?></td>
        <td><a href="07-edit.php?id=<?= $row['id'] ?>">Edit</a></td>
      </tr>
    <?php } ?>

  </table>

</body>

</html>

<?php mysqli_close($conn); ?>