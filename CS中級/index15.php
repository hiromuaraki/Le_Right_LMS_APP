<?php

function printArray(array $intArr): void
{
  $string = "[";
  for ($i = 0; $i < count($intArr); $i++) {
    $string .= $intArr[$i]. " ";
  }
  echo $string . "]" .PHP_EOL;
}

// エラトステネスのふるいのアルゴリズム
function allNPrimesSieve(int $n): array
{
  $cache = array_fill(0, $n, true);
  for ($currentPrime = 2; $currentPrime <= ceil(sqrt($n)); $currentPrime++) {
    if (!$cache[$currentPrime]) continue;
    $i = 2;
    $ip = $i * $currentPrime;
    while ($ip < $n) {
      $cache[$ip] = false;
      $ip++;
      $ip = $i * $currentPrime;
    }
  }
  $primeNumbers = [];
  for ($i = 2; $i < count($cache); $i++) {
    $predicate = $cache[$i];
    if ($predicate) {
      $primeNumbers[] = $i;
    }
  }
  
  return $primeNumbers;
}

$answer = allNPrimesSieve(100);
printArray($answer);
echo count($answer) .PHP_EOL;

?>