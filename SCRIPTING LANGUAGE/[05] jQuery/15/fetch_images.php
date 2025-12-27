<?php
$folder = "uploads/";

if (is_dir($folder)) {
    $files = scandir($folder);

    foreach ($files as $file) {
        if ($file != "." && $file != "..") {
            echo "<img src='uploads/$file'>";
        }
    }
} else {
    echo "Uploads folder not found.";
}
?>
