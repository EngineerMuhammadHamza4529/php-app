<?php
class Animal5 {
    public function eat() {
        echo "All animals eating food..\n";
    }
}

class Dog extends Animal5 {
    public function bark() {
        echo "The Dog is Barking..\n";
    }
}

// Create an object of Animal
$a = new Animal5();
$a->eat();

// Create an object of Dog
$d = new Dog();
$d->bark();
?>
