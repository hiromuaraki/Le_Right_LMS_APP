<?php

// 問題1
function divideBy3Count(int $n): int
{
  return divideBy3CountHelper($n, 0);
}

function divideBy3CountHelper($n, $count): int
{
  return $n % 3 == 0 ? divideBy3CountHelper($n / 3, $count + 1) : $count;
}


echo divideBy3Count(1) .PHP_EOL;
echo divideBy3Count(3) .PHP_EOL;
echo divideBy3Count(27) .PHP_EOL;
echo divideBy3Count(729) .PHP_EOL;
echo divideBy3Count(6561) .PHP_EOL;

echo '-------------------------------' .PHP_EOL;

// 問題2 約数
function divisor(int $number, int $count= 1, string $divisor=""): string
{
  if ($number % $count == 0) $divisor .= $count."-"; $count++;
  return $count <= $number / 2 ? divisor($number, $count, $divisor) : $divisor .$number;
}

echo divisor(28) .PHP_EOL;
echo divisor(29) .PHP_EOL;
echo divisor(720) .PHP_EOL;

echo '-------------------------------' .PHP_EOL;

const MAX_HUM_YEAR  = 80;
const ODD_INTEREST  = 1.03;
const EVEN_INTEREST = 1.02;
const MAX_YEAR      = 80;
// 問題3 偶数 1.02 奇数 1.03
function howLongToReachFundGoal(int $capitalMoney, int $goalMoney, int $interest, int $year=0): int
{
  if ($capitalMoney > $goalMoney) return 0;
  $year++;
  $year % 2 == 0 ? $goalMoney *= EVEN_INTEREST : $goalMoney *= ODD_INTEREST;
  $nextCapitalMoney = $capitalMoney * (1 + $interest / 100);
  return $nextCapitalMoney > $goalMoney || $year >= MAX_YEAR ? $year : howLongToReachFundGoal($nextCapitalMoney, $goalMoney, $interest, $year);
}

echo howLongToReachFundGoal(5421, 10421, 5) .PHP_EOL;
echo howLongToReachFundGoal(5421, 30 ,30) .PHP_EOL;
echo howLongToReachFundGoal(600, 10400, 7) .PHP_EOL;
echo howLongToReachFundGoal(32555, 5200000, 12) .PHP_EOL;
echo howLongToReachFundGoal(50, 35000, 65) .PHP_EOL;
echo howLongToReachFundGoal(10, 350000, 2) .PHP_EOL;
echo howLongToReachFundGoal(20000, 10050000, 30) .PHP_EOL;

echo '-------------------------------' .PHP_EOL;

// 問題4
function fibonacci(int $n): int
{
  if ($n == 0) return 0;
  else if ($n == 1) return 1;
  return fibonacci($n - 1) + fibonacci($n - 2);
}

echo fibonacci(5) .PHP_EOL;
echo fibonacci(9) .PHP_EOL;
echo fibonacci(10) .PHP_EOL;
echo fibonacci(19) .PHP_EOL;

echo '-------------------------------' .PHP_EOL;

// 問題5*
function recursiveDigitsAdded(int $digits): int
{
  if ($digits < 10) return $digits;
  $array_digits = str_split($digits);
  $sum = array_sum($array_digits);
  return $sum > 10 ? $sum + recursiveDigitsAdded($sum): $sum;
}

echo recursiveDigitsAdded(5) .PHP_EOL;
echo recursiveDigitsAdded(8) .PHP_EOL;
echo recursiveDigitsAdded(12) .PHP_EOL;
echo recursiveDigitsAdded(98) .PHP_EOL;
echo recursiveDigitsAdded(3528) .PHP_EOL;
echo recursiveDigitsAdded(99999999999884) .PHP_EOL;
echo recursiveDigitsAdded(5462) .PHP_EOL;
echo recursiveDigitsAdded(45622943) .PHP_EOL;
echo recursiveDigitsAdded(9514599) .PHP_EOL;

?>