<?php

// 例題
function userName()
{
  $firstName = "Emily";
  $lastName  = "Robertson";
  
  return $firstName . "-" . $lastName;
}

$firstName = "Masamune";
$lastName  = "Watanabe";

function myFun()
{
  global $firstName, $lastName;
  echo $firstName. "-" .$lastName .PHP_EOL;

  $firstName = "Fernando";
  $lastName  = "Yamato";
  echo $firstName . "-" . $lastName .PHP_EOL;
  
  echo userName() .PHP_EOL;

  $firstName = "Andy";
  $lastName  = "Jordan";
  echo $firstName . "-" . $lastName .PHP_EOL;

}

myFun();
// echo $firstName . "-" . $lastName .PHP_EOL;

// グローバル変数
$x = 34;
$y = 10;

function square(int $x): int
{
  return $x * $x;
}

function globalMult($x): int
{
  global $y;
  return $x * $y;
}

function myFunc()
{
  global $x;
  echo $x .PHP_EOL;

  $x = 56;
  echo $x .PHP_EOL;

  echo square(4) .PHP_EOL;
  echo globalMult(4) .PHP_EOL;
}

myFunc();

class A {
  public static $x = 3;
  public static $y = 10;

  function multiply(int $x): int
  {
    return $x * A::$y;
  }
}

function myFun1()
{
  $x = 33;
  echo $x .PHP_EOL;
  echo A::$x .PHP_EOL;
  $classA = new A();
  echo $classA->multiply(5) .PHP_EOL;

}

myFun1();
?>