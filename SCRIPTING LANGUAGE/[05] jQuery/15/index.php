<!DOCTYPE html>
<html>

<head>
  <title>AJAX Image Upload & Display</title>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    body {
      font-family: Arial;
      padding: 20px;
    }

    #gallery img {
      width: 150px;
      margin: 10px;
      display: none;
    }
  </style>
</head>

<body>

  <h2>Upload Image</h2>

  <form id="uploadForm" enctype="multipart/form-data">
    <input type="file" name="image" required>
    <button type="submit">Upload</button>
  </form>

  <h2>Uploaded Images</h2>
  <div id="gallery"></div>

  <script>
    $(document).ready(function() {

      loadImages();

      // Upload image using AJAX
      $("#uploadForm").submit(function(e) {
        e.preventDefault();

        $.ajax({
          url: "upload.php",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          processData: false,
          success: function() {
            loadImages();
          }
        });
      });

      // Load images using AJAX
      function loadImages() {
        $.ajax({
          url: "fetch_images.php",
          success: function(data) {
            $("#gallery").html(data);
            $("#gallery img").fadeIn(1000); // jQuery fade effect
          }
        });
      }

    });
  </script>

</body>

</html>