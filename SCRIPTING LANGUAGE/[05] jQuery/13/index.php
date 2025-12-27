<!DOCTYPE html>
<html>

<head>
  <title>jQuery UI Menu & Drag Drop</title>

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

    /* Menu at top */
    #menu {
      width: 100%;
      display: flex;
      gap: 20px;
      list-style: none;
      padding: 10px;
      background: #f2f2f2;
    }

    #menu>li {
      padding: 5px 10px;
    }

    #menu ul {
      position: absolute;
      z-index: 1000;
    }

    /* Drag & Drop */
    #drag {
      width: 100px;
      height: 100px;
      background-color: steelblue;
      color: white;
      text-align: center;
      line-height: 100px;
      cursor: move;
      margin-top: 40px;
      margin-bottom: 20px;
    }

    #drop {
      width: 200px;
      height: 150px;
      border: 2px dashed #333;
      text-align: center;
      line-height: 150px;
      font-weight: bold;
    }

    #message {
      margin-top: 10px;
      color: green;
      font-weight: bold;
    }
  </style>
</head>

<body>

  <!-- MENU AT TOP -->
  <ul id="menu">
    <li>Home</li>
    <li>About</li>
    <li>Services
      <ul>
        <li>Web Design</li>
        <li>Development</li>
        <li>SEO</li>
      </ul>
    </li>
    <li>Contact</li>
  </ul>

  <h2>Drag and Drop</h2>

  <div id="drag">Drag me</div>
  <div id="drop">Drop here</div>
  <div id="message"></div>

  <script>
    $(document).ready(function() {

      // jQuery UI Menu
      $("#menu").menu();

      // Draggable
      $("#drag").draggable();

      // Droppable
      $("#drop").droppable({
        drop: function() {
          $("#message").text("Dropped successfully!");
        }
      });

    });
  </script>

</body>

</html>