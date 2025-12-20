<?php

// Custom exception class for division errors
class DivisionByZeroException extends Exception
{
  public function errorMessage()
  {
    // Custom error message
    return "Error: Division by zero is not allowed!";
  }
}

// Function to divide two numbers
function divide($numerator, $denominator)
{
  try {
    // Check if the denominator is zero
    if ($denominator == 0) {
      // Throw a custom exception if denominator is zero
      throw new DivisionByZeroException();
    }

    // Perform the division
    $result = $numerator / $denominator;
    echo "$numerator / $denominator = $result<br>";
  } catch (DivisionByZeroException $e) {
    // Catch the custom exception and display the error message
    echo $e->errorMessage();
  }
}

?>


<!DOCTYPE html>
<html>

<head>
  <title>Division Operation</title>
</head>

<body>

  <?php
  // Check if the form is submitted
  if (isset($_GET['dividend']) && isset($_GET['divisor']) && $_GET['dividend'] !== '' && $_GET['divisor'] !== '') {
    echo "<h3>Result:";
    $dividend = $_GET['dividend'];
    $divisor = $_GET['divisor'];
    divide($dividend, $divisor);
    echo "</h3>";
  }
  ?>

  <h2>Division Operation</h2>

  <form method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    Dividend: <br>
    <input type="number" name="dividend"><br><br>

    Divisor: <br>
    <input type="number" name="divisor"><br><br>

    <input type="submit" value="Calculate">
  </form>

</body>

</html>