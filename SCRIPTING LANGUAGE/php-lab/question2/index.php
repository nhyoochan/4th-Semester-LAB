<!-- Create two variables $a = 10, $b = 5. Perform addition, subtraction, multiplication, division. Test comparison operators (>, <, ==, ===, !=). Use logical operators (&&, ||, !) in if statements. -->

<?php
    $a = 10;
    $b = 5;

    echo "Addition: " . ($a + $b) . "<br>";
    echo "Subtraction: " . ($a - $b) . "<br>";
    echo "Multiplication: " . ($a * $b) . "<br>";
    echo "Division: " . ($a / $b) . "<br><br>";

    echo "a > b: " . ($a > $b ? "true" : "false") . "<br>";
    echo "a < b: " . ($a < $b ? "true" : "false") . "<br>";
    echo "a == b: " . ($a == $b ? "true" : "false") . "<br>";
    echo "a === b: " . ($a === $b ? "true" : "false") . "<br>";
    echo "a != b: " . ($a != $b ? "true" : "false") . "<br><br>";

    if ($a > 0 && $b > 0) {
        echo "Both a and b are positive (using &&)." . "<br>";
    }
    if ($a == 10 || $b == 10) {
        echo "Either a or b is equal to 10 (using ||)." . "<br>";
    }
    if (!($a < 0)) {
        echo "a is NOT negative (using !)." . "<br>";
    }
?>
