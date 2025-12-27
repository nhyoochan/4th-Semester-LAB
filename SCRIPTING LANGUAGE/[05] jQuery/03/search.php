<?php
$words = array(
  "Apple",
  "Banana",
  "Mango",
  "Orange",
  "Pineapple",
  "Grapes",
  "Papaya",
  "Strawberry"
);

$query = isset($_GET['query']) ? strtolower($_GET['query']) : "";

foreach ($words as $word) {
  if (strpos(strtolower($word), $query) !== false) {
    echo "<div class='item'>$word</div>";
  }
}
