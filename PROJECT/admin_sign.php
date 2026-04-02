<?php
include 'db.php';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'admin';

    $sql = "INSERT INTO userdata (username, email, password, roles) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        $error = "Prepare failed: " . mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $password, $role);

        if (mysqli_stmt_execute($stmt)) {
            echo "<p style='color:green;'><strong>Success!</strong> Admin registration successful! <a href='login.php'>Login Here</a></p>";
        } else {
            $error = "Error inserting data: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}
?>

<html>
<head>
    <title>Admin SignUp | Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <h2>Admin Signup Here  | Project</h2>
        <?php if (isset($error)) { echo "<p style='color:red;'><strong>Error:</strong> " . htmlspecialchars($error) . "</p>"; } ?>
        <form method = "POST" action="admin_sign.php">
            Username: <input type = "name" name = "username" required> 
            Email: <input type = "email" name = "email" required>
            Password: <input type = "password" name = "password" required>
            <input type = "submit" name = "submit" required>
        </form>
    </div>
</body>
</html>

