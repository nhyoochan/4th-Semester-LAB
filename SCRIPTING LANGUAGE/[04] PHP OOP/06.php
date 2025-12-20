<?php
// Abstract class Vehicle
abstract class Vehicle
{
  // Abstract method - must be implemented by child classes
  abstract public function startEngine();
}

// Child class Car extends Vehicle
class Car extends Vehicle
{
  // Implementing the startEngine() method for Car
  public function startEngine()
  {
    return "Car engine started.";
  }
}

// Child class Motorcycle extends Vehicle
class Motorcycle extends Vehicle
{
  // Implementing the startEngine() method for Motorcycle
  public function startEngine()
  {
    return "Motorcycle engine started.";
  }
}

// Create objects of Car and Motorcycle
$car = new Car();
$motorcycle = new Motorcycle();

// Demonstrating polymorphism: calling startEngine() on different objects
echo "<h3>Vehicle Start Engine Demonstration:</h3>";
echo "Car: " . $car->startEngine() . "<br>";
echo "Motorcycle: " . $motorcycle->startEngine() . "<br>";
