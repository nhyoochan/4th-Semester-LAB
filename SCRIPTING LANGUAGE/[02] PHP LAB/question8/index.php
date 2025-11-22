<!-- Create an array to store 10 cities. Use foreach to print each city in uppercase with its respective string length. -->
<?php
    $cities = array("Kathmandu", "Lalitpur", "Pokhara", "New York", "Dubai", "Rome", "New Delhi", "Paris", "Los Angeles", "Washington");

    foreach ($cities as $city) {
        $upper = strtoupper($city);
        $length = strlen($city);
            echo $upper . " - Length: " . $length . "<br>";
}
?>