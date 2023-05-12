<?php

class Person {
  public $firstName;
  public $lastName;

  function __construct(string $firstName, string $lastName)
  {
    $this->firstName = $firstName;
    $this->lastName  = $lastName;
  }

  function getFullName(): string
  {
    return $this->firstName ."". $this->lastName;
  }
}

  function changePersonState(Person $inputPerson)
  {
    $inputPerson = new Person($inputPerson->firstName, $inputPerson->lastName);
    $inputPerson->firstName ="Denice";
    $inputPerson->lastName ="Harrison";
    return $inputPerson->getFullName();
  }

  $carly = new Person("Carly", "Angelo");
  echo spl_object_hash($carly) .PHP_EOL;
  echo $carly->getFullName() .PHP_EOL;
  
  echo changePersonState($carly) .PHP_EOL;
  
  echo $carly->getFullName() .PHP_EOL;

  class MathThings {
    // メンバ変数を定義
    public const PIAPPROX = 3.14159265359;

    public static function circleSurfaceArea(int $radius): float
    {
      return MathThings::PIAPPROX * $radius * $radius;
    }

    public static function boxVolume(int $x): int
    {
      return $x ** 3;
    }
  }

  echo "πは" .MathThings::PIAPPROX .PHP_EOL;
  echo "1辺が２つの立方体の体積は" .MathThings::boxVolume(2) .PHP_EOL;
  echo "半径４の円の面積は". MathThings::circleSurfaceArea(4) .PHP_EOL;


?>