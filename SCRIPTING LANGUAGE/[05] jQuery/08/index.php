<!DOCTYPE html>
<html>

<head>
  <title>jQuery Animation Example</title>

  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    #box {
      width: 100px;
      height: 100px;
      background-color: steelblue;
      position: relative;
      margin: 20px;
    }

    button {
      margin: 5px;
      padding: 8px 12px;
    }
  </style>
</head>

<body>

  <h2>jQuery Animate Demo</h2>

  <div id="box"></div>

  <button id="grow">Increase Width</button>
  <button id="move">Move Right</button>
  <button id="fadeOut">Fade Out</button>
  <button id="fadeIn">Fade In</button>

  <script>
    $(document).ready(function() {

      // Increase width
      $("#grow").click(function() {
        $("#box").animate({
          width: "200px"
        }, 1000);
      });

      // Move right
      $("#move").click(function() {
        $("#box").animate({
          left: "200px"
        }, 1000);
      });

      // Fade out
      $("#fadeOut").click(function() {
        $("#box").fadeOut(1000);
      });

      // Fade in
      $("#fadeIn").click(function() {
        $("#box").fadeIn(1000);
      });

    });
  </script>

</body>

</html>