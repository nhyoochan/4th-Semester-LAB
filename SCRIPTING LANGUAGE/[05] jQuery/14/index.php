<!DOCTYPE html>
<html>

<head>
  <title>Username Availability Check</title>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    input {
      padding: 6px;
    }

    #status {
      margin-left: 10px;
      font-weight: bold;
    }
  </style>
</head>

<body>

  <h2>Check Username Availability</h2>

  <input type="text" id="username" placeholder="Enter name">
  <span id="status"></span>

  <script>
    $(document).ready(function() {

      $("#username").keyup(function() {
        let uname = $(this).val();

        if (uname !== "") {
          $.ajax({
            url: "check_username.php",
            type: "POST",
            data: {
              username: uname
            },
            success: function(data) {
              $("#status").html(data);
            }
          });
        } else {
          $("#status").html("");
        }
      });

    });
  </script>

</body>

</html>