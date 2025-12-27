<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>AJAX Load Message</title>
  <style>
    #message {
      margin-top: 20px;
      padding: 10px;
      border: 1px solid #333;
      width: 300px;
    }
  </style>
</head>

<body>

  <h2>AJAX Example</h2>

  <button onclick="loadMessage()">Load Message</button>

  <div id="message">Message will appear here</div>

  <script>
    function loadMessage() {
      var ajaxCall = new XMLHttpRequest();
      ajaxCall.open("GET", "message.php", true);

      ajaxCall.onreadystatechange = function() {
        if (ajaxCall.readyState === 4 && ajaxCall.status === 200) {
          document.getElementById("message").innerHTML = ajaxCall.responseText;
        }
      };

      ajaxCall.send();
    }
  </script>

</body>

</html>