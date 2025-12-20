<?php
include '01.php';

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $dob = $_POST['dob'];
  $marks = $_POST['marks'];

  $sql = "UPDATE students SET 
            name='$name', 
            dob='$dob', 
            marks='$marks' 
            WHERE id=$id";

  if (mysqli_query($conn, $sql)) {
    header("Location: 07-list.php");
    exit;
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}

$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE id=$id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>

<html>

<head>
  <title>Edit Student</title>
</head>

<body>

  <h2>Edit Student</h2>

  <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    Name: <br>
    <input type="text" name="name" value="<?= $data['name'] ?>"><br><br>

    Date of Birth: <br>
    <input type="date" name="dob" value="<?= $data['dob'] ?>"><br><br>

    Marks: <br>
    <input type="number" step="0.01" name="marks" value="<?= $data['marks'] ?>"><br><br>

    <input type="submit" name="update" value="Update">
  </form>

  <br>
  <a href="07-list.php">Cancel</a>

</body>

</html>

<?php mysqli_close($conn); ?>