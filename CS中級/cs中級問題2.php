<?php

// 問題1
function countDivisionByK(int $n, int $k, int $count=0): int
{
  if ($n % $k == 1) return $count;
  $count++;
  $division = $n / $k;
  return $division % $k == 0 ? countDivisionByK($division, $k, $count) : $count;
}

echo countDivisionByK(3, 2) .PHP_EOL;
echo countDivisionByK(30, 5) .PHP_EOL;
echo countDivisionByK(10, 2) .PHP_EOL;
echo countDivisionByK(24, 2) .PHP_EOL;
echo countDivisionByK(243, 3) .PHP_EOL;
echo countDivisionByK(1024, 2) .PHP_EOL;
echo countDivisionByK(1048576, 2) .PHP_EOL;

echo '---------------------------' .PHP_EOL;

// 問題2 最大公約数
function maximumPeople(int $x, int $y): int
{
  return $x % $y == 0 ? $y : maximumPeople($y, $x % $y);
}

echo maximumPeople(12, 18) .PHP_EOL;
echo maximumPeople(30, 242) .PHP_EOL;
echo maximumPeople(1029, 1071) .PHP_EOL;
echo maximumPeople(3180, 1908) .PHP_EOL;

echo '---------------------------' .PHP_EOL;

// 問題3*
function maxBread(int $money, int $price, int $sticker): int
{
  $bought      = $money / $price;
  $buySticker  = $bought;
  return $bought + exchangeBread($buySticker, $sticker);
}

function exchangeBread(int $buySticker, int $sticker): int
{
  //シールが足りるかどうか
  if ($buySticker < $sticker) return 0;
  $bought = $buySticker / $sticker;
  $remainingStickers = $buySticker % $sticker + $bought;

  return $bought + exchangeBread($remainingStickers, $sticker);
}

echo maxBread(10, 2, 3) .PHP_EOL;
echo maxBread(15, 1, 3) .PHP_EOL;
echo maxBread(20, 2, 10) .PHP_EOL;
echo maxBread(50, 3, 2) .PHP_EOL;
echo maxBread(100, 4, 5) .PHP_EOL;
echo maxBread(5, 1, 2) .PHP_EOL;

echo '---------------------------' .PHP_EOL;

// 問題4 長方形の面積 / 正方形の面積 = 正方形の枚数
function countSquare(int $x, int $y): int
{
  return ($x * $y) / gcd($x, $y) ** 2;
}

// 最大公約数を返す（一辺の長さ）
function gcd(int $x, int $y): int
{
  return $x % $y == 0 ? $y : gcd($y, $x % $y);
}

echo countSquare(28, 32) .PHP_EOL;
echo countSquare(20, 32) .PHP_EOL;
echo countSquare(8177, 3315) .PHP_EOL;

echo '---------------------------' .PHP_EOL;

// 問題5* 整数の分割
function splitAndAdd(int $digits): int
{
  if ($digits == 0) return 0;
  $splitAndAdd = splitAndAdd($digits / 10) + $digits % 10;
  return $splitAndAdd < 10 ? $splitAndAdd : splitAndAdd($digits / 10) + $digits % 10;
}

echo splitAndAdd(19) .PHP_EOL;
echo splitAndAdd(898) .PHP_EOL;
echo splitAndAdd(23387) .PHP_EOL;
echo splitAndAdd(1066) .PHP_EOL;
echo splitAndAdd(546125) .PHP_EOL;

?>