<?php
// Parent class Employee
class Employee
{
  // Properties
  public $name;
  public $salary;

  // Constructor to initialize name and salary
  public function __construct($name, $salary)
  {
    $this->name = $name;
    $this->salary = $salary;
  }

  // Method in parent class to display employee details
  public function displayDetails()
  {
    echo "Employee Name: $this->name<br>";
    echo "Salary: NPR$this->salary<br>";
  }

  // Method to calculate annual salary
  public function calculateAnnualSalary()
  {
    return $this->salary * 12;
  }
}

// Child class Manager extending Employee
class Manager extends Employee
{
  // Additional property for Manager
  public $department;

  // Constructor to initialize name, salary, and department
  public function __construct($name, $salary, $department)
  {
    // Call parent class constructor to initialize name and salary
    parent::__construct($name, $salary);
    $this->department = $department;
  }

  // Method in child class to display manager details
  public function displayDetails()
  {
    parent::displayDetails(); // Call the parent class method to display basic details
    echo "Department: $this->department<br>";
  }

  // Method to calculate bonus for manager (e.g., 20% of salary)
  public function calculateBonus()
  {
    return $this->salary * 0.20;
  }
}

// Create objects for Employee and Manager
$employee = new Employee("Ram Shakya", 50000);
$manager = new Manager("Nhyoochan Rajkarnikar", 20000, "Marketing");

// Display employee and manager details
echo "<h3>Employee Details:</h3>";
$employee->displayDetails();
echo "Annual Salary: NPR" . $employee->calculateAnnualSalary() . "<br><br>";

echo "<h3>Manager Details:</h3>";
$manager->displayDetails();
echo "Annual Salary: NPR" . $manager->calculateAnnualSalary() . "<br>";
echo "Bonus: NPR" . $manager->calculateBonus() . "<br>";
