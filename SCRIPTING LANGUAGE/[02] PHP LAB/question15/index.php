<!-- Set a cookie named user with your name. Read and display the cookie value. Delete the cookie. -->
<?php
$cookie_name = "user";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["name"])) {
    $cookie_value = $_POST["name"];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
}

if (isset($_POST['delete'])) {
    setcookie($cookie_name, "", time() - 3600, "/");
}
?>

<html>
<body>
<form action="" method="POST">
    Enter the name: 
    <input type="text" name="name" required>
    <input type="submit" value="Set Cookie">
</form>
<br>
<form action="" method="POST">
    <input type="submit" name="read" value="Read Cookie">
    <input type="submit" name="delete" value="Delete Cookie">
</form>
<br>

<?php

if (isset($_POST['read'])) {
    if (!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '$cookie_name' is not set!";
    } else {
        echo "Cookie '$cookie_name' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];
    }
}
?>

</body>
</html>
