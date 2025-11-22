<!-- Print sum of even numbers from 1 to 100. -->
<?php
    $sum = 0;

    for ($a = 1; $a <= 100; $a++) {
        if ($a % 2 == 0) {
            $sum += $a;
        }
    }

    echo "Sum of even numbers from 1 to 100 is: $sum";
?>
