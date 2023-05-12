<?php

echo "問題1" .PHP_EOL;

function isPangram(string $string) :bool
{
  $str = preg_replace("/\s+/", "", strtolower($string));
  $count = strlen($str);
  list($cache, $isPangram) = array(array_fill(0, $count, null), 0);
  for ($i = 0; $i < $count; $i++) {
    if (!in_array($str[$i], $cache)) {
      $cache[$i] = $str[$i];
      $isPangram++;
    } 
  }
  return $isPangram == 26;
}

echo json_encode(isPangram("we promptly judged antique ivory buckles for the next prize")) .PHP_EOL;
echo json_encode(isPangram("We promptly judged Antique ivory buckles for the next prize")) .PHP_EOL;
echo json_encode(isPangram("a quick brown fox jumps over the lazy dog")) .PHP_EOL;
echo json_encode(isPangram("sphinx of black quartz judge my vow")) .PHP_EOL;
echo json_encode(isPangram("the five boxing wizards jump quickly")) .PHP_EOL;
echo json_encode(isPangram("sheep for a unique zebra when quick red vixens jump over the yacht")) .PHP_EOL;
echo json_encode(isPangram("the Japanese yen for commerce is still well-known")) .PHP_EOL;
echo json_encode(isPangram("dan took the deep dive down the rabbit hole")) .PHP_EOL;

echo "--------------------------" .PHP_EOL;

echo "問題2" .PHP_EOL;

function fireEmployees(array $employees, array $unemployed, array $result = []): array
{  
  foreach ($employees as $employee) {
   if (!in_array($employee, $unemployed)) {
     $result[] = $employee;
   }
  }
 return $result;
}

echo "[" . implode(",", fireEmployees(["Steve", "David", "Mike", "Donald", "Lake", "Julian"],["Donald", "Lake"])) ."]" .PHP_EOL;
echo "[" . implode(",", fireEmployees(["Donald", "Lake"],["Donald", "Lake"])) ."]" .PHP_EOL;
echo "[" . implode(",", fireEmployees(["Steve", "David", "Mike", "Donald", "Lake", "Julian"],[])) ."]" .PHP_EOL;
echo "[" . implode(",", fireEmployees(["Mike", "Steve", "David", "Mike", "Donald", "Lake", "Julian"],["Mike"])) ."]" .PHP_EOL;
echo "[" . implode(",", fireEmployees(["Kailey", "Kailey"],["Kailey"])) ."]" .PHP_EOL;

echo "--------------------------" .PHP_EOL;

echo "問題3 素数" .PHP_EOL;

function primesUpToNCount(int $n, int $primeCount = 0): int
{
  if ($n < 2) return 0;
  for ($i = 2; $i < $n; $i++) {
    $isPrime = true;
    for ($j = 2; $j < $i; $j++) {
      if ($i % $j == 0) {
        $isPrime = false;
        break;
      }
    }

    if ($isPrime) {
      $primeCount++;
    } 
}
  return $primeCount;
}

echo primesUpToNCount(2) .PHP_EOL;
echo primesUpToNCount(3) .PHP_EOL;
echo primesUpToNCount(5) .PHP_EOL;
echo primesUpToNCount(13) .PHP_EOL;
echo primesUpToNCount(18) .PHP_EOL;
echo primesUpToNCount(89) .PHP_EOL;
echo primesUpToNCount(97) .PHP_EOL;
echo primesUpToNCount(100) .PHP_EOL;
// echo primesUpToNCount(367) .PHP_EOL;
// echo primesUpToNCount(673) .PHP_EOL;
// echo primesUpToNCount(1000) .PHP_EOL;
// echo primesUpToNCount(3406) .PHP_EOL;
// echo primesUpToNCount(20034) .PHP_EOL;

echo "--------------------------" .PHP_EOL;


echo "問題4" .PHP_EOL;

function shuffledPosition(array $arr, array $shuffledArr): array
{
  $result = [];  
  foreach ($arr as $value) {
    $result[] = array_search($value, $shuffledArr, true);
  }
  return $result;
}

echo "[" . implode(",", shuffledPosition([2, 32, 45], [45, 32, 2])). "]" .PHP_EOL;
echo "[" . implode(",", shuffledPosition([10, 11, 12, 13], [12, 10, 13, 11])). "]" .PHP_EOL;
echo "[" . implode(",", shuffledPosition([10, 11, 12, 13], [10, 11, 12, 13])). "]" .PHP_EOL;
echo "[" . implode(",", shuffledPosition([1350, 181, 1714, 375, 1331, 943, 735], [1714, 1331, 735, 375, 1350, 181, 943])). "]" .PHP_EOL;

echo "問題5" .PHP_EOL;

function shuffleSuccessRate(array $arr, array $shuffledArr): int
{
  list($itemRate, $count) = array(100 / count($arr), 0);
  foreach ($arr as $index => $beforeArr) {
    $afterArrIndex = array_search($beforeArr, $shuffledArr);
    if ($index != $afterArrIndex) {
      $count++;
    }
  }
  return $itemRate * $count;
}

echo shuffleSuccessRate([2, 32, 45], [45, 32, 2]) .PHP_EOL;
echo shuffleSuccessRate([2, 32, 45], [45, 2, 32]) .PHP_EOL;
echo shuffleSuccessRate([2, 32, 45], [2, 32, 45]) .PHP_EOL;
echo shuffleSuccessRate([2, 32, 45, 67], [2, 32, 67, 45]) .PHP_EOL;
echo shuffleSuccessRate([2, 32, 45, 67, 89], [2, 89, 67, 45, 32]) .PHP_EOL;
echo shuffleSuccessRate([119,726,398,187,943,486,728,305,968,754,650,536,969,305,111,225,708,806,40,969], [708,969,111,398,754,726,536,943,486,305,969,40,650,806,187,225,968,119,728,305]) .PHP_EOL;


?>