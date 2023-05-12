<?php

echo floor(3.6) .PHP_EOL;
echo ceil(3.6) .PHP_EOL;
echo pow(3, 5) .PHP_EOL;
echo sqrt(3*3+3*10) .PHP_EOL;

// 例題1
echo floor(3 * 4 / 5) .PHP_EOL;
echo ceil(3 * 4 / 5) .PHP_EOL;
// 例題2
function hypotenuse(int $width, int $height): int
{
  return sqrt($width ** 2 + $width * $height);
}

echo hypotenuse(4, 3) .PHP_EOL;

// 例題
function exponentialOfTwo(int $x): int
{
  return pow($x, 2);
}

echo exponentialOfTwo(3) .PHP_EOL;
echo exponentialOfTwo(10) .PHP_EOL;

?>