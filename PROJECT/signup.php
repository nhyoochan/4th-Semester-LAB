<?php
include 'db.php';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO userdata (username, email, password, roles) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        $error = "Prepare failed: " . mysqli_error($conn);
    } else {
        $role = 'user';
        mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $password, $role);

        if (mysqli_stmt_execute($stmt)) {
            echo "<p style='color:green;'><strong>Success!</strong> Registration successful! <a href='login.php'>Login Here</a></p>";
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
    <title>SignUp | Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signup-form">
        <h2>Signup Here</h2>
        <?php if (!empty($error)) { echo "<p style='color:red;'><strong>Error:</strong> " . htmlspecialchars($error) . "</p>"; } ?>
        <form method="POST" action="signup.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" name="submit" value="Submit">
            <a href="login.php">Login Here</a>
        </form>
    </div>
</body>
</html>

