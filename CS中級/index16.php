<?php

// タビュレーション
function tabulation(int $n): int
{
  $cache = array_fill(0, $n + 1, -1);
  $cache[0] = 0;
  $cache[1] = 1;

  for ($i = 2; $i < $n + 1; $i++) {
    $cache[$i] = $cache[$i - 1] + $cache[$i -2];
  }

  return $cache[$n];
}

echo tabulation(50) .PHP_EOL;

echo "------------------" .PHP_EOL;

// メモ化
function memoizationFib(int $n) :int
{
  $cache = array_fill(0, $n + 1, null);
  $innerMemoizationFib = function($n) use(&$cache, &$innerMemoizationFib) {
    if ($cache[$n] == null) {
      if ($n == 0) {
        $cache[$n] = 0;
      } else if ($n == 1) {
        $cache[$n] = 1;
      } else {
        $cache[$n] = $innerMemoizationFib($n - 1) + $innerMemoizationFib($n - 2);
      }
    }
    return $cache[$n];
  };
  return memoizationFib($n);
}
echo memoizationFib(50) .PHP_EOL;

?>