<!DOCTYPE html>
<html>

<head>
  <title>jQuery Paragraph Control</title>

  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    .highlight {
      background-color: yellow;
      padding: 10px;
      border-radius: 5px;
    }
  </style>
</head>

<body>

  <h2>jQuery Example</h2>

  <p id="para">This is a sample paragraph.</p>

  <button id="textBtn">Change Text</button>
  <button id="colorBtn">Change Color</button>
  <button id="sizeBtn">Change Font Size</button>
  <button id="classBtn">Add / Remove Class</button>

  <script>
    $(document).ready(function() {

      $("#textBtn").click(function() {
        $("#para").text("Text changed using jQuery!");
      });

      $("#colorBtn").click(function() {
        $("#para").css("color", "red");
      });

      $("#sizeBtn").click(function() {
        $("#para").css("font-size", "24px");
      });

      $("#classBtn").click(function() {
        $("#para").toggleClass("highlight");
      });

    });
  </script>

</body>

</html>