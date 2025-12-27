<!DOCTYPE html>
<html>

<head>
  <title>DOB Datepicker Example</title>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- jQuery UI -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 30px;
    }

    label {
      font-size: 16px;
    }

    input {
      padding: 6px;
      font-size: 14px;
    }

    button {
      padding: 6px 12px;
      margin-left: 10px;
    }
  </style>
</head>

<body>

  <h2>Date of Birth Form</h2>

  <form>
    <label for="dob">Date of Birth:</label>
    <input type="text" id="dob" placeholder="Select DOB">
    <button type="button" id="save">Save</button>
  </form>

  <script>
    $(document).ready(function() {

      // Apply datepicker
      $("#dob").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "1950:2025",
        dateFormat: "dd-mm-yy"
      });

      // Show selected date in alert
      $("#save").click(function() {
        let selectedDate = $("#dob").val();
        alert("Selected Date of Birth: " + selectedDate);
      });

    });
  </script>

</body>

</html>