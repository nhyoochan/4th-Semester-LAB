<?php
$targetDir = "uploads/";

if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

if (isset($_FILES["image"])) {
    $fileName = basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . $fileName;

    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
}
?>
