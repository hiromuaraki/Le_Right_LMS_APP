<?php

// 問題1
const VACATION_RENTAL_PRICE1 = 80;
const VACATION_RENTAL_PRICE2 = 60;
const VACATION_RENTAL_PRICE3 = 50;
const CREANING = 1.12;
const TAX_RATE = 1.08;
function vacationRental(int $people, int $day): int
{
  int:$sumRentalPrice = 0;
  if ($day >= 10) $sumRentalPrice = $people * (VACATION_RENTAL_PRICE3 * $day * CREANING);
  else if ($day >= 4) $sumRentalPrice = $people * (VACATION_RENTAL_PRICE2 * $day * CREANING);
  else $sumRentalPrice = $people * (VACATION_RENTAL_PRICE1 * $day * CREANING);

  return $sumRentalPrice * TAX_RATE;
}

echo vacationRental(2, 3) .PHP_EOL; 
echo vacationRental(2, 4) .PHP_EOL; 
echo vacationRental(2, 8) .PHP_EOL; 
echo vacationRental(4, 5) .PHP_EOL; 
echo vacationRental(12, 10) .PHP_EOL;


// 問題2*
const INTEREST_RATE = 0.2;
function howMuchIsYourDebt(int $year, int $debt = 10000): int
{
  int:$future_debt = $debt * pow(1 + INTEREST_RATE, $year);
  return $future_debt;
}

echo howMuchIsYourDebt(2) .PHP_EOL;
echo howMuchIsYourDebt(5) .PHP_EOL;
echo howMuchIsYourDebt(10) .PHP_EOL;

echo '--------------------------------------' .PHP_EOL;

// 問題3*
function isRationalNumber(int $number): bool
{
  if ($number < 0 || sqrt($number) != floor(sqrt($number))) return false;
  if ($number == floor($number)) return true;
}

echo (isRationalNumber(1) ? "true" : "false") .PHP_EOL;
echo (isRationalNumber(2) ? "true" : "false") .PHP_EOL;
echo (isRationalNumber(3) ? "true" : "false") .PHP_EOL;
echo (isRationalNumber(4) ? "true" : "false") .PHP_EOL;
echo (isRationalNumber(5) ? "true" : "false") .PHP_EOL;
echo (isRationalNumber(6) ? "true" : "false") .PHP_EOL;
echo (isRationalNumber(7) ? "true" : "false") .PHP_EOL;
echo (isRationalNumber(8) ? "true" : "false") .PHP_EOL;
echo (isRationalNumber(9) ? "true" : "false") .PHP_EOL;
echo (isRationalNumber(10) ? "true" : "false") .PHP_EOL;
echo (isRationalNumber(11) ? "true" : "false") .PHP_EOL;
echo (isRationalNumber(16) ? "true" : "false") .PHP_EOL;
echo (isRationalNumber(49) ? "true" : "false") .PHP_EOL;
echo (isRationalNumber(225) ? "true" : "false") .PHP_EOL;

echo '--------------------------------------' .PHP_EOL;

// 問題4
function toLowerCase(string $stringInput): string
{
  return strtolower($stringInput);
}

echo toLowerCase("HELLO") .PHP_EOL;
echo toLowerCase("Hiyoku") .PHP_EOL;
echo toLowerCase("Good Morning") .PHP_EOL;

// 問題5
function isSubString(string $s1, string $s2): bool
{
  return strpos($s1, $s2) ? true : false;
}

echo (isSubString("hello world!", "world!") ? "true" : "false") .PHP_EOL;
echo (isSubString("hello world!", "World!") ? "true" : "false") .PHP_EOL;
echo (isSubString("hello pluto!", "world!") ? "true" : "false") .PHP_EOL;
echo (isSubString("hello world!", "d!rolw") ? "true" : "false") .PHP_EOL;
echo (isSubString("hello pluto","do") ? "true" : "false") .PHP_EOL;
echo (isSubString("Fly away duck.", "aw") ? "true" : "false") .PHP_EOL;

?>