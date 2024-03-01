<?php
class Animal {
    private $name;
    
    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

class Cat extends Animal {

    public function __construct($name) {
        parent::__construct($name);
    }

    public function meow() {
        return $this->getName() . " is saying meow";
    }

    public function walk() {
        return $this->getName() . " is walking";
    }
}

class Bird extends Animal {

    public function __construct($name) {
        parent::__construct($name);
    }

    public function fly() {
        return $this->getName() . " is flying";
    }
}

$cat = new Cat("Lucy");
echo $cat->meow() . "<br>";
echo $cat->walk() . "<br>";

$bird = new Bird("Tweety");
echo $bird->fly() . "<br>";