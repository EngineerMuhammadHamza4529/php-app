<?php
abstract class Animal2 {
    // Base Class
    public abstract function animalSound();
    
    public function sleep() {
        echo "Zzzz….\n";
    }
}

class Dog extends Animal2 {
    // Derived Class
    public function animalSound() {
        echo "The Dog is Barking..\n";
    }
}

// Create a Dog object
$d = new Dog();
$d->animalSound();
$d->sleep();
?>
