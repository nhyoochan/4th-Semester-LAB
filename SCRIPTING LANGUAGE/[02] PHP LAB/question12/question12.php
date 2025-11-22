<!-- Create a text file and write “Hello World” in it. Use a button “Read” to read the file and display its contents. -->
<?php
    $file = fopen("input.txt", "w"); 
    fwrite($file, "Hello, World!");
    fclose($file);
    echo "Data written to file.<br>";

    $file = fopen("input.txt", "r");
    while(!feof($file)) {
        echo "Data inside input.txt: ";
        echo fgets($file) . "<br>";
    }
    fclose($file);

?>