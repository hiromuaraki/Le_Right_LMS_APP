<?php

// 問題1
function getLowestTemperature(int $x, int $y): int
{
  return $x - $y;
}

echo getLowestTemperature(3, 2) .PHP_EOL;
echo getLowestTemperature(2, 10) .PHP_EOL;
echo getLowestTemperature(18, 5) .PHP_EOL;
echo getLowestTemperature(8, 14) .PHP_EOL;
echo getLowestTemperature(20, 5) .PHP_EOL;

echo '-------------------------------------' .PHP_EOL;

// 問題2
function totalCandies(int $x, int $y): int
{
  return $x * $y;
}
echo totalCandies(3, 4) .PHP_EOL;
echo totalCandies(20, 5) .PHP_EOL;
echo totalCandies(6, 7) .PHP_EOL;

echo '-------------------------------------' .PHP_EOL;

// 問題3
function cubeVolume(int $x): int
{
  return $x ** 3;
}

echo cubeVolume(2). PHP_EOL;
echo cubeVolume(3). PHP_EOL;
echo cubeVolume(4). PHP_EOL;
echo cubeVolume(5). PHP_EOL;

echo '-------------------------------------' .PHP_EOL;

// 問題4
function cubeSurfaceArea(int $x): int
{
  return $x ** 2 * 6;
}

echo cubeSurfaceArea(2) .PHP_EOL;
echo cubeSurfaceArea(4) .PHP_EOL;
echo cubeSurfaceArea(7) .PHP_EOL;

echo '-------------------------------------' .PHP_EOL;

// 問題5*
//小数点以下5桁で丸め込む
float:const ONE_MILES = 0.000621371;
function metersToMiles(int $meters): float
{
  return round($meters * ONE_MILES, 5);
}

echo metersToMiles(1000) .PHP_EOL;
echo metersToMiles(300) .PHP_EOL;
echo metersToMiles(200000) .PHP_EOL;

?>