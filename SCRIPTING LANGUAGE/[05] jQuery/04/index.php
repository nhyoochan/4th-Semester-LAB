<!DOCTYPE html>
<html>

<head>
  <title>AJAX Form Submit</title>
  <style>
    input {
      display: block;
      margin-bottom: 10px;
      padding: 5px;
      width: 250px;
    }

    button {
      padding: 5px 10px;
    }

    #msg {
      margin-top: 10px;
      color: green;
    }
  </style>
</head>

<body>

  <h2>Contact Form</h2>

  <form onsubmit="return submitForm();">
    <input type="text" id="name" placeholder="Enter Name" required>
    <input type="email" id="email" placeholder="Enter Email" required>
    <input type="text" id="phone" placeholder="Enter Phone" required>
    <button type="submit">Submit</button>
  </form>

  <div id="msg"></div>

  <script>
    function submitForm() {
      let name = document.getElementById("name").value;
      let email = document.getElementById("email").value;
      let phone = document.getElementById("phone").value;

      fetch("insert.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded"
          },
          body: "name=" + encodeURIComponent(name) +
            "&email=" + encodeURIComponent(email) +
            "&phone=" + encodeURIComponent(phone)
        })
        .then(response => response.text())
        .then(data => {
          document.getElementById("msg").innerHTML = data;
          document.querySelector("form").reset();
        });

      return false; // prevent page refresh
    }
  </script>

</body>

</html>