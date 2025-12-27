<!DOCTYPE html>
<html>

<head>
  <title>jQuery UI Tabs Example</title>

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

    #tabs {
      width: 500px;
    }
  </style>
</head>

<body>

  <h2>jQuery UI Tabs</h2>

  <div id="tabs">
    <ul>
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>

    <div id="home">
      <h3>Home</h3>
      <p>Welcome to our website. This is the home tab with sample content.</p>
    </div>

    <div id="about">
      <h3>About</h3>
      <p>This tab contains information about us. We build simple web applications.</p>
    </div>

    <div id="contact">
      <h3>Contact</h3>
      <p>Email:raj@email.com</p>
      <p>Phone: 9800000001</p>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $("#tabs").tabs();
    });
  </script>

</body>

</html>