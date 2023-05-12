<?php

class Person {
  public static $burningCalories = 3.5;
  public $firstName;
  public $lastName;
  public $heightM;
  public $weightKg;
  public $birthYear;

  function __construct(string $firstName, string $lastName, int $heightM, int $weightKg, int $birthYear)
  {
    $this->firstName = $firstName;
    $this->lastName  = $lastName;
    $this->heightM   = $heightM;
    $this->weightKg   = $weightKg;
    $this->birthYear = $birthYear;
  }

  function getStateString(): string
  {
    return "First Name:".$this->firstName." ". "Last Name:" .$this->lastName .
    "heightM:". $this->heightM ."weightKg:" .$this->weightKg ."birthYear:" .$this->birthYear;
  }

  function getFullName(): string
  {
    return $this->firstName. " " .$this->lastName;
  }

  function getAge(): int
  {
    $currentYear = date("Y");
    return $currentYear - $this->birthYear;
  }

  function getBmi(): float
  {
    return $this->weightKg / ($this->heightM ** 2);
  }

  function eat($calories): float
  {
    $this->weightKg += $calories / 7700;
    return $this->weightKg;
  }

  function calorieBurnedPerMinuteExercise(string $exercise): float
  {
    $met = 1;
    if ($exercise == "running") $met = 8;
    else if ($exercise == "walking") $met = 3;
    else if ($exercise == "tennis") $met = 5;
    else if ($exercise == "rope jump") $met = 9;

    return $met * Person::$burningCalories * $this->weightKg / 200;
  }

  function horusToLose1KgByExercise(string $exercise): float
  {
    return 7700 / ($this->calorieBurnedPerMinuteExercise($exercise) * 60);
  }

  function exercise(string $exercise, int $minutes)
  {
    $caloriesBurned = $this->calorieBurnedPerMinuteExercise($exercise) * $minutes;
    $this->weightKg .= $caloriesBurned / 7700;
    return $this->weightKg;
  }

}
$mike  = new Person("Michael", "Johnson", 1.72, 85.5, 1988);
$carly = new Person("Carly", "Angelo", 1.72, 85.5, 1996);

echo $mike->firstName .PHP_EOL;
echo $mike->lastName .PHP_EOL;
echo $mike->heightM .PHP_EOL;
echo $mike->weightKg .PHP_EOL;
echo $mike->birthYear .PHP_EOL;

echo "----------------" .PHP_EOL;

echo "Carly burns:" .$carly->calorieBurnedPerMinuteExercise("running").
"calories per minute running" .PHP_EOL;
echo "It takes carly:" .$carly->horusToLose1KgByExercise("running").
"hours running to burn 1 kg". PHP_EOL;

echo $carly->exercise("running", 600).PHP_EOL;
echo "Carly went running for 10 hours" .PHP_EOL;
echo $carly->getStateString() .PHP_EOL;

?>