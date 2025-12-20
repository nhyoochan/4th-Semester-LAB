<?php

include '01.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $marks = mysqli_real_escape_string($conn, $_POST['marks']);

  // SQL query to insert data into 'students' table
  $sql = "INSERT INTO students (name, dob, marks) VALUES ('$name', '$dob', '$marks')";

  // Execute the query
  if (mysqli_query($conn, $sql)) {
    echo "Student data inserted successfully!. <a href='03-student-form.html'>Go back to form</a>";
  } else {
    echo "Error inserting data: " . mysqli_error($conn);
  }
}

// Close the connection
mysqli_close($conn);
