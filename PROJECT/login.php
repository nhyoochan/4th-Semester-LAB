<?php
session_start();
include 'db.php';


$sql_table = "CREATE TABLE IF NOT EXISTS userdata (
        id INT NOT NULL AUTO_INCREMENT,
        username VARCHAR(45) NOT NULL,
        email VARCHAR(45) NOT NULL,
        password VARCHAR(255) NOT NULL,
        roles VARCHAR(50) NOT NULL,
        PRIMARY KEY (id)
        )";
        
mysqli_query($conn, $sql_table);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];  

    $sql = "SELECT id, email, password, roles FROM userdata WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("SQL Error: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        
            if (mysqli_num_rows($result)===1){
                $user = mysqli_fetch_assoc($result);
                if (password_verify($password, $user['password'])) {

                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['user_name'] = $user['username'];
                    $_SESSION['role'] = $user['roles'];

                    if ($user['roles'] === 'admin') {
                        header("Location: admin.php");
                    } else {
                        header("Location: index.php");
                    }
                    exit();

                } else {
                    $error = "Incorrect password";
                }
            } else {
                $error = "User does not exist";
            }
}
?>

<html>
<head>
    <title>LogIn | Project</title>    <link rel="stylesheet" href="style.css"></head>
<body>
    <div class="login-form">
        <h2>Login Here</h2>
        <?php if (isset($error)) { echo "<p style='color:red;'><strong>Error:</strong> " . htmlspecialchars($error) . "</p>"; } ?>
        <form action="login.php" method="POST">
            <!-- Username: <input type="name" name="username" required>  -->
            <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" name="submit" value="Submit">
            <a href="signup.php">Register Here</a>
        </form>
    </div>
</body>
</html>