<?php

// 例題1
function gcd(int $m, int $n, int $count = 0)
{
  $count++;
  echo $count ."回目➡︎". "m：" . $m . " " . "n：" .$n .PHP_EOL;
  return $m % $n == 0 ? $n : gcd($n, $m % $n, $count);
}

echo gcd(44, 242) .PHP_EOL;

function getGreatestDivisor(int $n): int
{
  return getGreatestDivisorHelper($n, $n - 1);
}

function getGreatestDivisorHelper(int $n, int $k): int
{
  return $n % $k == 0 ?  $k : getGreatestDivisorHelper($n, $k-1);
}

echo getGreatestDivisor(12) .PHP_EOL;
echo getGreatestDivisor(36) .PHP_EOL;

?>