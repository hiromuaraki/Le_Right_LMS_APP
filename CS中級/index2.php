<?php

// 総和
function summation(int $n): int
{
  if ($n <= 0) return 0;
  return summation($n - 1) + $n;
}

echo summation(5) .PHP_EOL;
echo summation(10) .PHP_EOL;

// 階乗
function factorial(int $n): int
{
  if ($n <= 0) return 1;
  return factorial($n - 1) * $n;
}

echo factorial(5) .PHP_EOL;
echo factorial(10) .PHP_EOL;

?>