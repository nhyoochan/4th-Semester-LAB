<!-- Ask user for a number (via HTML form). If number is positive → display “Positive number”. If negative → display “Negative number”. If zero → display “Zero”. -->
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = htmlspecialchars($_POST['number']);

        if ($number == 0) {
            echo "The number is Zero.";
        } elseif ($number < 0) {
            echo "The number is a Negative Number.";
        } else {
            echo "The number is a Positive Number.";
        }
    }
?>
<html>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label>Provide me a number:</label>
    <input type="number" name="number" required>
    <input type="submit" name="submit">
</form>

</body>
</html>
