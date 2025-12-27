<!DOCTYPE html>
<html>

<head>
  <title>AJAX Live Search (Fetch)</title>
  <style>
    #result {
      display: none;
      border: 1px solid #ccc;
      max-width: 300px;
      padding: 10px;
      margin-top: 5px;
    }

    .item {
      padding: 5px;
      border-bottom: 1px solid #eee;
    }
  </style>
</head>

<body>

  <h2>Live Search</h2>

  <input
    type="text"
    id="search"
    placeholder="Type to search..."
    onkeyup="searchData()">

  <div id="result"></div>

  <script>
    function searchData() {
      let keyword = document.getElementById("search").value.trim();
      let resultBox = document.getElementById("result");

      if (keyword.length === 0) {
        resultBox.style.display = "none";
        resultBox.innerHTML = "";
        return;
      }

      fetch("search.php?query=" + encodeURIComponent(keyword))
        .then(response => response.text())
        .then(data => {
          if (data.trim() === "") {
            resultBox.innerHTML = "No result found";
          } else {
            resultBox.innerHTML = data;
          }
          resultBox.style.display = "block";
        });
    }
  </script>

</body>

</html>