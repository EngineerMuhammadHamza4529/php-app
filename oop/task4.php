<?php
class Animal3 {
    // Base class
    public function makeSound() {
        echo "Animal makes a sound..\n";
    }
}

class Dog extends Animal3 {
    // Derived class inherits from Base class
    public function makeSound() {
        // Overriding makeSound() method in Dog class
        echo "The Dog Barks..\n";
    }
}

// Create an object of Animal
$a = new Animal3();
$a->makeSound();

// Create an object of Dog
$dog = new Dog();
$dog->makeSound();
?>
