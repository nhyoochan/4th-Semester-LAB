<?php
// Logger interface
interface Logger
{
  // Method that must be implemented by any class that uses this interface
  public function logMessage($message);
}

// FileLogger class implements Logger
class FileLogger implements Logger
{
  // Implement the logMessage method to log messages to a file
  public function logMessage($message)
  {
    echo "Message logged to file: " . $message . "<br>";
  }
}

// DatabaseLogger class implements Logger
class DatabaseLogger implements Logger
{
  public function logMessage($message)
  {
    echo "Message logged to database: " . $message . "<br>";
  }
}

// Create objects of FileLogger and DatabaseLogger
$fileLogger = new FileLogger();
$databaseLogger = new DatabaseLogger();

// Log messages using both objects
echo "<h3>Logging with FileLogger:</h3>";
$fileLogger->logMessage("This is a log message to file.");

echo "<h3>Logging with DatabaseLogger:</h3>";
$databaseLogger->logMessage("This is a log message to database.");
