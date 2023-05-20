<?php

use LDAP\Result;

echo "二分探索" .PHP_EOL;
/** 昇順もしくは降順の時 */
function binarySearch(array $array, int $search): string
{
  list($head, $tail, $center, $result) = array(0, count($array) - 1, 0, "検索対象が見つかりませんでした。");
  
  echo "「{$search}」を検索します！！".PHP_EOL;
  for ($i = 0; $i < count($array); $i++) {
    if ($head <= $tail) { $center = ($head + $tail) / 2; }
    if ($array[$i] == $search) {
      $result = "検索対象が見つかりました。index番号 = {$i}番号";
      break;
    }
    if ($array[$i] < 17) {
      $head = $center + 1;
    } else {
      $tails = $center -1 ;
    }
  }
  return $result;
}

$array = [11, 13, 17, 19, 23, 29, 31];
$search = rand(0, count($array) - 1);
echo binarySearch($array, $array[$search]). PHP_EOL;

?>