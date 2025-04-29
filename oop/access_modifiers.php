<?php
class Fruit4 {
  public $name;
  protected $color;
  private $weight;
}

$mango = new Fruit4();
$mango1->name = 'Mango'; // OK
$mango1->color1 = 'Yellow'; // ERROR
$mango1->weight2 = '300'; // ERROR
?>