<?php
// このページのプログラムはバグ
function existsWithinList(array $listL, int $dataY): bool
{
  $hashMap = array();
  for ($i = 0; $i < count($listL); $i++) {
    $hashMap[$listL[$i]] = $listL[$i];
  }
  return is_null($hashMap[$dataY]) ? false : true;
}

function printBool($bool)
{
  echo $bool ? "True" : "False" .PHP_EOL;
}

$sampleList = [3,10,23,3,4,50,2,3,4,18,6,1,-2];
echo printBool(existsWithinList($sampleList, 23)) .PHP_EOL;
echo printBool(existsWithinList($sampleList, -2)) .PHP_EOL;
// echo printBool(existsWithinList($sampleList, 100)) .PHP_EOL;

echo "----------------------------" .PHP_EOL;

function listIntersection(array $targetList, array $searchList): array
{
  list($hashMap, $result) = array([], []);
  // L1の要素をキャッシュ
  for ($i = 0; $i < count($targetList); $i++) {
    $hashMap[$targetList[$i]] = $targetList[$i];
  }

  // L2のそれぞれの要素をチェック
  for ($j = 0; $j < count($searchList); $j++) {
    if (is_null($hashMap[$searchList[$j]]) === false) $result[] = $searchList[$j];
  }
  return $result;
}

function printArray(array $intArr): void
{
  echo "[";
  for ($i = 0; $i < count($intArr); $i++) {
    echo $intArr[$i] ."";
  }
  echo "]" .PHP_EOL;
}

// printArray(listIntersection([1 ,2, 3, 4, 5, 6], [1,4,4,5,8,9,10,11]));
printArray(listIntersection([1 ,2, 3, 4, 5, 6], [1,4,4,5,8,9]));
// printArray(listIntersection([3,4,5,10,2,20,4,5],[4,20,22,2,2,2,10,1,4]));
printArray(listIntersection([3,4,5,10,2,20,4,5],[4,20,22,2,2,2,10,1]));
printArray(listIntersection([2,3,4,54,10,5,9,11],[3,10,23,10,0,5,9,2]));

?>