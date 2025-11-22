<!-- Create an array of fruits. Add a new fruit to the array. Remove a fruit from the array. Display all fruits for each activity. -->
 <?php
    $fruits = array("Apples", "Banana", "Grape", "Pineapple");

    array_push($fruits, "Mango", "Orange");
    array_pop($fruits);
    print_r($fruits);
 ?>