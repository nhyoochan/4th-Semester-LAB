<!-- Create a form with name and email fields. Display submitted values using $_GET, $_POST and $_REQUEST. -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo "<strong>Using \$_POST:</strong><br>";
    echo "Name: " . $_POST['name'] . "<br>";
    echo "Email: " . $_POST['email'] . "<br><br>";

    echo "<strong>Using \$_REQUEST:</strong><br>";
    echo "Name: " . $_REQUEST['name'] . "<br>";
    echo "Email: " . $_REQUEST['email'] . "<br><br>";

    echo "<strong>Using \$_GET:</strong><br>";
    if (empty($_GET)) {
        echo "<em>The \$_GET array is empty because the form method is set to POST.</em><br>";
    } else {
        echo "Name: " . $_GET['name'] . "<br>";
        echo "Email: " . $_GET['email'] . "<br>";
    }
}
?>

<html>
<head>
    <title>PHP Form Handling</title>
</head>
<body>
    <h2>Enter your Details</h2>
    <form action="" method="POST">
        Input Name: <input type="text" name="name" required><br>
        Input Email: <input type="email" name="email" required><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
