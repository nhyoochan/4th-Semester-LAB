<!-- Ask username from user via HTML form and start a session and store username. Display session username and data on another page. Use logout button to destroy the session. -->
<?php
session_start();

if(isset($_SESSION['username'])){
    header("Location: welcome.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = trim($_POST['username']);

    if(!empty($username)){
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <form action="" method="POST">
        <h1>Enter username</h1>
        <input type="text" name="username" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
