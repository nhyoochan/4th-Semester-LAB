<!-- Create two functions greet($name) that returns “Hello, name” and getSquare($num) function to calculate the square of a number provided using form. -->

<html>
    <body>
        <h3>Enter a number to get its square:</h3>
            <form method="post">
                Enter Name: <input type="text" name="username"><br><br>
                Enter Number: <input type="number" name="number"><br><br>
                <input type="submit" value="Submit">
            </form>
    </body>
</html>

<?php
    function greet($name) {
        return "Hello, " . $name;
    }

    function getSquare($num) {
        return $num * $num;
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['username'];
    $number = $_POST['number'];

    echo "<h3>" . greet($name) . "</h3>";
    echo "<h3>Square of $number is: " . getSquare($number) . "</h3>";
}
?>