<?php
class Person {
    // Private property
    private $name;

    // Getter method
    public function getName() {
        return $this->name;
    }

    // Setter method
    public function setName($name) {
        $this->name = $name;
    }
}

// Create an Object
$p = new Person();
$p->setName("Ali");
echo $p->getName();
?>
