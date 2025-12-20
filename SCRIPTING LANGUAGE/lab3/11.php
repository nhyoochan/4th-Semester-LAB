<?php
include '01.php';

$sql_avg = "SELECT AVG(marks) AS avg_marks FROM students";
$result_avg = mysqli_query($conn, $sql_avg);
$avg_data = mysqli_fetch_assoc($result_avg);
$average_marks = $avg_data['avg_marks'];

$sql_students = "SELECT * FROM students WHERE marks > $average_marks ORDER BY marks DESC";
$result_students = mysqli_query($conn, $sql_students);
?>

<html>
<head>
    <title>Students Above Average</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 6px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) { background-color: #f9f9f9; }
    </style>
</head>
<body>

<h2>Students with Marks Greater Than Average (<?= number_format($average_marks, 2) ?>)</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Class</th>
        <th>Marks</th>
    </tr>

    <?php if(mysqli_num_rows($result_students) > 0) { ?>
        <?php while($row = mysqli_fetch_assoc($result_students)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['dob'] ?></td>
                <td><?= $row['class'] ?></td>
                <td><?= $row['marks'] ?></td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr><td colspan="5">No students have marks above average.</td></tr>
    <?php } ?>
</table>

</body>
</html>

<?php mysqli_close($conn); ?>
