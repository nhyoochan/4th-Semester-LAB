<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Welcome, <?php echo $username; ?>!</h2>

    <form action="logout.php" method="POST">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
