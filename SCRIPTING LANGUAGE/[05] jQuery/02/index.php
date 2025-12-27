<!DOCTYPE html>
<html>

<head>
  <title>AJAX Sum</title>
</head>

<body>

  <h2>Add Two Numbers (AJAX)</h2>

  <form onsubmit="return calculateSum();">
    <input type="number" id="num1" placeholder="Enter first number" required>
    <br><br>
    <input type="number" id="num2" placeholder="Enter second number" required>
    <br><br>
    <button type="submit">Calculate</button>
  </form>

  <h3>Result: <span id="result">---</span></h3>

  <script>
    function calculateSum() {
      var n1 = document.getElementById("num1").value;
      var n2 = document.getElementById("num2").value;

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "sum.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          document.getElementById("result").innerHTML = xhr.responseText;
        }
      };

      xhr.send("num1=" + n1 + "&num2=" + n2);
      return false; // prevent page refresh
    }
  </script>

</body>

</html>