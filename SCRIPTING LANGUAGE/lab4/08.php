<?php

class FileHandler
{
  private $filePath;

  // Constructor to initialize the file path
  public function __construct($filePath)
  {
    $this->filePath = __DIR__ . "/../" . $filePath;
  }

  public function createFile()
  {
    // Create an empty file
    $file = fopen($this->filePath, 'w');
    if ($file) {
      fclose($file);
      echo "File created successfully.<br>";
    } else {
      echo "Failed to create the file.<br>";
    }
  }

  // Method to write text to a file
  public function writeToFile($text)
  {
    // Open the file for writing (create it if it doesn't exist)
    $file = fopen($this->filePath, 'w');

    if ($file) {
      fwrite($file, $text);
      fclose($file);
      echo "Text has been written to the file.<br>";
    } else {
      echo "Unable to open the file for writing.<br>";
    }
  }

  // Method to read text from a file
  public function readFromFile()
  {
    // Check if the file exists
    if (file_exists($this->filePath)) {
      $fileContent = file_get_contents($this->filePath);
      return $fileContent;
    } else {
      echo "The file does not exist.<br>";
      return null;
    }
  }
}

// Example usage
$fileHandler = new FileHandler("example.txt");

// Create the file
$fileHandler->createFile();

// Write to the file
$fileHandler->writeToFile("This is the text written to the file.\n");

// Read from the file
$fileContent = $fileHandler->readFromFile();
if ($fileContent !== null) {
  echo "Content of the file: <br>";
  echo $fileContent;
}
