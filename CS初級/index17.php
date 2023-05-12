<?php

function canSeeMovie(int $age): bool
{
  return $age >= 13;
}

echo (int)canSeeMovie(20) .PHP_EOL;
echo (int)canSeeMovie(10) .PHP_EOL;

// 例題1
function canDrinkSake(int $age): string
{
  return $age > 20 ? "true" : "false";
}

echo canDrinkSake(21) .PHP_EOL;
echo canDrinkSake(8) .PHP_EOL;

// 例題2
function firstLastCharacter(string $word): string
{
  return strlen($word) == 0 ? "Type random words" : $word[0].$word[-1];
}

echo firstLastCharacter("") .PHP_EOL;
echo firstLastCharacter("lunch") .PHP_EOL;
echo firstLastCharacter("breakfast") .PHP_EOL;

// 例題3
const PERCENT_LATE    = 1.15;
const PERCENT_DEFAULT = 1.02;
const SERVICE_FREE    = 2.5;

function interestsPaid(int $initialLoan, bool $didPayOnTime): float
{
  int:$total = $initialLoan;
  if ($didPayOnTime) $total *= PERCENT_DEFAULT;
  else $total *= PERCENT_LATE;
  return $total + SERVICE_FREE;
}

echo interestsPaid(100, true) .PHP_EOL;
echo interestsPaid(100, false) .PHP_EOL;

// 例題4
function redirectionUrl(string $language): string
{
  string:$url = "wwww.example.org/";
  if ($language == "English") $url .= "en";
  else if ($language == "Japanese") $url .= "ja";
  else if ($language == "Spanish")  $url .= "es";
  else $url .= "ru";
  
  return $url;
}
echo redirectionUrl("English") .PHP_EOL;
echo redirectionUrl("Japanese") .PHP_EOL;
echo redirectionUrl("Spanish") .PHP_EOL;
echo redirectionUrl("Russian") .PHP_EOL;

const MAX_AGE  = 8;
const MAX_HEIGHT =  120;
function canRideRollerCoaster(int $age, int $height): bool
{
  return $age >= MAX_AGE && $height >= MAX_HEIGHT;
}

echo (canRideRollerCoaster(9, 140) ? "true" : "false") .PHP_EOL;
echo (canRideRollerCoaster(9, 110) ? "true" : "false") .PHP_EOL;
echo (canRideRollerCoaster(6, 130) ? "true" : "false") .PHP_EOL;
echo (canRideRollerCoaster(6, 90) ? "true" : "false") .PHP_EOL;


// 問題
function fizzBuzz(int $num): string
{
  if ($num % 15 == 0) return "fizzbuzz";
  else if ($num % 3 == 0) return "fizz";
  else if ($num % 5 == 0) return "buzz";
  else return "NOT FOUND!";
}

echo fizzBuzz(3) .PHP_EOL;
echo fizzBuzz(5) .PHP_EOL;
echo fizzBuzz(15) .PHP_EOL;
echo fizzBuzz(67) .PHP_EOL;


int: const DISCOUNT = 0.2;
function subscriptionPrice(int $price, string $userType, int $age): int
{ 
  return $userType == "student" || $age >= 60 ? $price * (1 - DISCOUNT) : $price;
}

echo subscriptionPrice(60, "student", 23) .PHP_EOL;
echo subscriptionPrice(60, "student", 65) .PHP_EOL;
echo subscriptionPrice(60, "teacher", 23) .PHP_EOL;
echo subscriptionPrice(60, "teacher", 65) .PHP_EOL;


echo '----------------------------------------' .PHP_EOL;
// 例題
function isVowel(string $str): string
{
  $eList = array('a', 'i', 'u', 'e', 'o');
  return in_array($str, $eList) ? "true" : "false";
}

echo isVowel('a') .PHP_EOL;
echo isVowel('e') .PHP_EOL;
echo isVowel('z') .PHP_EOL;
echo isVowel('k') .PHP_EOL;


?>