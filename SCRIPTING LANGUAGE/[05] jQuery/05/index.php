<!DOCTYPE html>
<html>

<head>
  <title>AJAX Display Contacts</title>
</head>

<body>

  <h2>Contacts List</h2>

  <button onclick="loadContacts()">Load Contacts</button>

  <br><br>

  <div id="result">Click the button to load data</div>

  <script>
    function loadContacts() {
      fetch("fetch_contact.php")
        .then(response => response.text())
        .then(data => {
          document.getElementById("result").innerHTML = data;
        })
        .catch(error => {
          document.getElementById("result").innerHTML = "Error loading data";
        });
    }
  </script>

</body>

</html>