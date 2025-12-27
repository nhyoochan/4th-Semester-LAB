<!DOCTYPE html>
<html>
<head>
  <title>AJAX CRUD</title>
  <style>
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 1px solid #000; padding: 8px; }
    td.edit { cursor: pointer; background: #f5f5f5; }
  </style>
</head>
<body>

<h2>CRUD using AJAX</h2>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody id="data"></tbody>
</table>

<script>
function loadData() {
  fetch("fetch.php")
    .then(res => res.text())
    .then(data => document.getElementById("data").innerHTML = data);
}
loadData();

/* DELETE */
function deleteRecord(id, btn) {
  if (!confirm("Delete this record?")) return;

  fetch("delete.php?id=" + id)
    .then(res => res.text())
    .then(msg => {
      if (msg === "success") {
        btn.closest("tr").remove();
      }
    });
}

function editCell(td, id, field) {
  let oldValue = td.innerText;
  td.innerHTML = `<input type="text" value="${oldValue}">`;
  let input = td.firstChild;
  input.focus();

  input.onkeydown = function (e) {
    if (e.key === "Enter") {
      input.blur();
    }
  };

  input.onblur = function () {
    if (input.value !== oldValue) {
      updateData(id, field, input.value, td);
    } else {
      td.innerText = oldValue;
    }
  };
}


/* UPDATE */
function updateData(id, field, value, td) {
  fetch("update.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `id=${id}&field=${field}&value=${value}`
  })
  .then(res => res.text())
  .then(msg => {
    if (msg === "success") {
      td.innerText = value;
    }
  });
}
</script>

</body>
</html>
