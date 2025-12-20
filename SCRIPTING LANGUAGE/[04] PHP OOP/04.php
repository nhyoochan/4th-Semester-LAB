<?php
// Parent class Shape
class Shape {
    // Method to calculate area (to be overridden by child classes)
    public function area() {
        return 0;
    }
}

// Child class Circle extending Shape
class Circle extends Shape {
    // Property for the radius
    private $radius;

    // Constructor to initialize radius
    public function __construct($radius) {
        $this->radius = $radius;
    }

    // Override the area() method to calculate the area of a circle
    public function area() {
        return pi() * pow($this->radius, 2); // Formula: πr^2
    }
}

// Child class Rectangle extending Shape
class Rectangle extends Shape {
    // Properties for length and width
    private $length;
    private $width;

    // Constructor to initialize length and width
    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }

    // Override the area() method to calculate the area of a rectangle
    public function area() {
        return $this->length * $this->width; // Formula: length * width
    }
}

// Create objects of Circle and Rectangle
$circle = new Circle(5);      // Circle with radius 5
$rectangle = new Rectangle(4, 6); // Rectangle with length 4 and width 6


echo "<h3>Area of Shapes:</h3>";
echo "Area of Circle: " . $circle->area() . "<br>";
echo "Area of Rectangle: " . $rectangle->area() . "<br>";
?>
