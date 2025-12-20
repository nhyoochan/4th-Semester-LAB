<?php

class StudentManager
{
  private $students = [];

  // Method to add a student
  public function addStudent($id, $name, $age)
  {
    // Check if student already exists by ID
    if (isset($this->students[$id])) {
      echo "Student with ID $id already exists.<br>";
    } else {
      // Add student to the array
      $this->students[$id] = [
        'name' => $name,
        'age' => $age
      ];
      echo "Student with ID $id added successfully.<br>";
    }
  }

  // Method to get student details by ID
  public function getStudent($id)
  {
    // Check if student exists
    if (isset($this->students[$id])) {
      return $this->students[$id];
    } else {
      echo "Student with ID $id not found.<br>";
      return null;
    }
  }

  // Method to update student details
  public function updateStudent($id, $name, $age)
  {
    // Check if student exists
    if (isset($this->students[$id])) {
      $this->students[$id] = [
        'name' => $name,
        'age' => $age
      ];
      echo "Student with ID $id updated successfully.<br>";
    } else {
      echo "Student with ID $id not found.<br>";
    }
  }

  // Method to delete a student by ID
  public function deleteStudent($id)
  {
    // Check if student exists
    if (isset($this->students[$id])) {
      unset($this->students[$id]);
      echo "Student with ID $id deleted successfully.<br>";
    } else {
      echo "Student with ID $id not found.<br>";
    }
  }

  // Method to list all students
  public function listStudents()
  {
    if (empty($this->students)) {
      echo "No students available.<br>";
    } else {
      foreach ($this->students as $id => $student) {
        echo "ID: $id, Name: {$student['name']}, Age: {$student['age']}<br>";
      }
    }
  }
}

// Example usage of the StudentManager class
$studentManager = new StudentManager();

// Add students
$studentManager->addStudent(1, "Nhyoochan Rajkarnikar", 20);
$studentManager->addStudent(2, "Tarjan Lama", 22);

echo "<h5 style='margin-bottom: 4px'>Students List:</h5>";

// List all students
$studentManager->listStudents();

echo "<h5 style='margin-bottom: 4px'>Get Student by ID = 1</h5>";

// Get student by ID
$student = $studentManager->getStudent(1);
if ($student) {
  echo "Student ID 1: Name - {$student['name']}, Age - {$student['age']}";
}

echo "<h5 style='margin-bottom: 4px'>Update Student with ID = 2</h5>";

// Update student details
$studentManager->updateStudent(2, "Anup Rawal", 21);

echo "<h5 style='margin-bottom: 4px'>Students List:</h5>";
// List all students after update
$studentManager->listStudents();

echo "<h5 style='margin-bottom: 4px'>Delete Student with ID = 2</h5>";
// Delete a student
$studentManager->deleteStudent(2);

echo "<h5 style='margin-bottom: 4px'>Students List:</h5>";
// List all students after deletion
$studentManager->listStudents();
