<?php
class Shape {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function getArea() {
        return 0;
    }
}

class Circle extends Shape {
    private $radius;

    public function __construct($name, $radius) {
        parent::__construct($name);
        $this->radius = $radius;
    }

    public function getArea() {
        return 3.14 * $this->radius * $this->radius;
    }
}

class Rectangle extends Shape {
    private $width;
    private $length;

    public function __construct($name, $width, $length) {
        parent::__construct($name);
        $this->width = $width;
        $this->length = $length;
    }

    public function getArea() {
        return $this->width * $this->length;
    }
}

$circle = new Circle("Circle", 7);
echo "Area of " . $circle->getName() . " is " . $circle->getArea() . "<br>";

$rectangle = new Rectangle("Rectangle", 5, 3);
echo "Area of " . $rectangle->getName() . " is " . $rectangle->getArea() . "<br>";