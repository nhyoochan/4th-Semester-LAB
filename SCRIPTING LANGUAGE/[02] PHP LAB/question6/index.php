<!-- Print prime numbers from 1 to n. n is asked from user via HTML form. -->
<html>
<body>
    <h1>Find Prime Numbers</h1>
    <form method="POST">
        <label for="n">Enter a number (n):</label>
        <input type="number" id="n" name="n" required>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $n = $_POST['n'];
        function isPrime($num) {
            if ($num <= 1) {
                return false;
            }
            for ($i = 2; $i <= sqrt($num); $i++) {
                if ($num % $i == 0) {
                    return false;
                }
            }
            return true;
        }
        echo "<h2>Prime numbers from 1 to $n:</h2>";
        echo "<ul>";
        for ($i = 2; $i <= $n; $i++) {
            if (isPrime($i)) {
                echo "<li>$i</li>";
            }
        }
    }
    ?>
</body>
</html>
