<!-- Ask user for a day number (1–7). Display the day name using switch. -->
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $day = htmlspecialchars($_POST["day"]);

        switch ($day) {
            case 1:
                echo "Sunday";
                break;
            case 2:
                echo "Monday";
                break;
            case 3:
                echo "Tuesday";
                break;
            case 4:
                echo "Wednesday";
                break;
            case 5:
                echo "Thursday";
                break;
            case 6:
                echo "Friday";
                break;
            case 7:
                echo "Saturday";
                break;
            default:
                echo "Invalid input! Please enter a number between 1 and 7.";
        }
    }
?>
<html>
<body>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <label>Enter day number (1–7):</label>
    <input type="number" name="day" min="1" max="7" required>
    <input type="submit" value="Submit">
</form>

</body>
</html>
