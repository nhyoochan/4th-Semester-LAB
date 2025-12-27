<!DOCTYPE html>
<html>

<head>
  <title>jQuery UI Dialog Example</title>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- jQuery UI -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    #dialog {
      display: none;
    }

    button {
      padding: 8px 15px;
      cursor: pointer;
    }
  </style>
</head>

<body>

  <h2>jQuery UI Dialog Demo</h2>

  <button id="openDialog">Open Details</button>

  <div id="dialog" title="Details">
    <p>This is a custom message shown inside a jQuery UI Dialog box.</p>
  </div>

  <script>
    $(document).ready(function() {

      // Initialize dialog (hidden by default)
      $("#dialog").dialog({
        autoOpen: false,
        modal: true,
        width: 400
      });

      // Open dialog on button click
      $("#openDialog").click(function() {
        $("#dialog").dialog("open");
      });

    });
  </script>

</body>

</html>