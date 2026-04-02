<!-- /* CSS HEX */
--cerulean: #086788ff;
--blue-green: #07a0c3ff;
--bright-amber: #f0c808ff;
--papaya-whip: #fff1d0ff;
--primary-scarlet: #dd1c1aff; -->

<?php
$host = "localhost";
$user = "root";
$pass = "";

$conn = mysqli_connect($host, $user, $pass);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

    $sql_db = "CREATE DATABASE IF NOT EXISTS project";
    mysqli_query($conn, $sql_db);
    
    $conn->select_db("project");
    

  

?>