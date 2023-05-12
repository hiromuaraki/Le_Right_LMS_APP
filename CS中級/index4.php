<?php

function subtractBy3Count(int $n): int
{
  return $n < 3 ? 0 : 1 + subtractBy3Count($n - 3);
}

echo subtractBy3Count(12) .PHP_EOL;

function simpleSummation(int $n): int
{
  if ($n <= 0) return 0;
  return + $n + simpleSummation($n - 1);
}

echo simpleSummation(2) .PHP_EOL;
echo simpleSummation(4) .PHP_EOL;
echo simpleSummation(5) .PHP_EOL;


function simpleSummationTail(int $n): int
{
  // 途中結果を保存するための引数を追加
  return simpleSummationTailHelper($n, 0);
}

// 補助関数 $count + $total = 計算結果
function simpleSummationTailHelper(int $count, int $total): int
{
  return $count <= 0 ? $total : simpleSummationTailHelper($count - 1, $total + $count);
}

echo simpleSummationTail(5) .PHP_EOL;

echo '----------------------------------' .PHP_EOL;

function fibonacciNumberTail(int $n): int
{
  return fibonacciNumberTailHelper(0, 1, $n);
}


function fibonacciNumberTailHelper(int $fn1, int $fn2, int $n): int
{
  return $n < 1 ? $fn1 : fibonacciNumberTailHelper($fn2, $fn1 + $fn2, $n - 1);
}

echo fibonacciNumberTail(6) .PHP_EOL;
echo fibonacciNumberTail(10) .PHP_EOL;

?>