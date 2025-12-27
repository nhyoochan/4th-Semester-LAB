<?php
$conn = mysqli_connect("localhost", "root", "", "ajax_lab");

$result = mysqli_query($conn, "SELECT * FROM contacts");

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>
    <td>{$row['id']}</td>
    <td class='edit' onclick=\"editCell(this, {$row['id']}, 'name')\">{$row['name']}</td>
    <td class='edit' onclick=\"editCell(this, {$row['id']}, 'email')\">{$row['email']}</td>
    <td class='edit' onclick=\"editCell(this, {$row['id']}, 'phone')\">{$row['phone']}</td>
    <td>
        <button onclick=\"deleteRecord({$row['id']}, this)\">Delete</button>
    </td>
  </tr>";
}

mysqli_close($conn);
