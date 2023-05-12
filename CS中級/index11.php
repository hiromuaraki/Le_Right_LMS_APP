<?php

// 問題2
class Animal {
  public static $activityMultiplier = 1.2;
  public $name;
  public $weightKg;
  public $heightM;
  public $isPredator;
  public $speedKph;

  function __construct(string $name, $weightKg, $heightM, bool $isPredator, $speedKph)
  {
    $this->name = $name;
    $this->weightKg   = $weightKg;
    $this->heightM    = $heightM;
    $this->isPredator = $isPredator;
    $this->speedKph   = $speedKph;
  }
  

  function getBmi(): float
  {
    return $this->weightKg / ($this->heightM ** 2);
  }

  function getDailyCalories(): float
  {
    return 70 * pow($this->weightKg, 0.75) * Animal::$activityMultiplier;
  }

  function isDangerous(): bool
  {
    if ($this->isPredator) return true;
    if ($this->heightM >= 1.7) return true;
    if ($this->speedKph > 35) return true;
    return false;
  }
}

echo "rabbit--------" .PHP_EOL;
$rabbit = new Animal("rabbit", 10, 0.3, false, 20);
echo round($rabbit->getBmi(), 2) .PHP_EOL;
echo ($rabbit->isDangerous() ? "true" : "false") .PHP_EOL;

echo "snake--------" .PHP_EOL;
$snake = new Animal("snake", 30, 1, true, 30);
echo ($snake->isDangerous() ? "true" : "false") .PHP_EOL;
echo round($snake->getDailyCalories(), 2) .PHP_EOL;


echo "elephant--------" .PHP_EOL;
$elephant = new Animal("elephant", 300, 3, false, 5);
echo round($elephant->getBmi(), 2) .PHP_EOL;
echo round($elephant->getDailyCalories(), 2) .PHP_EOL;


echo "gazelle--------" .PHP_EOL;
$gazelle = new Animal("gazelle", 50, 1.5, false, 100);
echo round($gazelle->getDailyCalories(), 2) .PHP_EOL;
echo($gazelle->isDangerous() ? "true" : "false") .PHP_EOL;


?>