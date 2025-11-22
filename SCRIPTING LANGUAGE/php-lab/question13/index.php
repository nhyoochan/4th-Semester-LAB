<!-- Create a form to upload an image. Save it in an uploads folder and display the uploaded image. -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!is_dir("uploads")) {
        mkdir("uploads");
    }

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {

        $target = "uploads/" . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
            $uploadedImage = $target;
        } else {
            echo "File upload failed.";
        }
    }
}
?>
<html>
<body>

<h2>Upload an Image</h2>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" accept="image/*">
    <button type="submit">Upload</button>
</form>

<?php if (!empty($uploadedImage)): ?>
    <h3>Uploaded Image:</h3>
    <img src="<?php echo $uploadedImage; ?>" width="300">
<?php endif; ?>

</body>
</html>
