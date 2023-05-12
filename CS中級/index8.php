<?php

class Rectangle {
  public $width;
  public $height;
  public $color;

  public function __construct(int $width, int $height, string $color)
  {
    $this->width  = $width;
    $this->height = $height;
    $this->color  = $color;
  }


}
$square1 = new Rectangle(20, 20, "orange");
echo $square1->color .PHP_EOL;

$rectangle1 = new Rectangle(20, 100, "blue");
echo $rectangle1->height .PHP_EOL;

$rectangle2 = new Rectangle(46, 30, "purple");
echo $rectangle2->width .PHP_EOL;

class Vehicle {
  public static $engine = "Standard Engine";

  public $kart;
  public $tire;
  public $glider;

  function __construct(string $kart, string $tire, string $glider)
  {
    $this->kart   = $kart;
    $this->tire   = $tire;
    $this->glider = $glider;
  }
}

$car1 = new Vehicle("Standard Kart", "Leaf Tires", "Toy Glider");

echo $car1->kart .PHP_EOL;
echo $car1->tire .PHP_EOL;
echo $car1->glider .PHP_EOL;
echo Vehicle::$engine .PHP_EOL;

?>