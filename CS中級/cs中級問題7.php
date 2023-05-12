<?php

echo "問題1" .PHP_EOL;

function maxAsciIString(array $stringList): int
{
  list($len, $maxAsciISum, $result) = array(count($stringList), 0, []);
  if ($len == 0) return 0;
  for ($i = 0; $i < $len; $i++) {
    $maxAsciISum = 0;
    for ($j = 0; $j < strlen($stringList[$i]); $j++) {
      $maxAsciISum += ord(strtolower($stringList[$i][$j]));
    }
    $result[] = $maxAsciISum;
  }
  return maxAsciIIndex($result);
}

function maxAsciIIndex(array $result): int
{
  list($max, $len, $index) = array($result[0], count($result), 0);
  for ($i = 0; $i < $len; $i++) {
    if ($result[$i] > $max) {
      $max = $result[$i];
      $index = $i;
    }
  }
  return $index;
}

echo maxAsciIString(["Fantastic", "Bridge", "Superior", "Fantastic", "Operator"]) .PHP_EOL;
echo maxAsciIString(["HeLlo", "HelLo", "bridge"]) .PHP_EOL;
echo maxAsciIString(["eatDjrPNbj", "IehUUSEMVe", "hpcbBvlTOc", "egvnPZgyCh"]) .PHP_EOL;
echo maxAsciIString(["egvnPZgyCh", "bridge", "Fantastic"]) .PHP_EOL;

echo "--------------------------" .PHP_EOL;

echo "問題2*" .PHP_EOL;

function rotateByTimes(array $ids, int $n): array
{
  list($n, $rotated, $len) = array($n % count($ids), [], count($ids));
  if ($len == $n || $n == 0) { return $ids; }
  for ($i = 0; $i < $len; $i++) {
    $rotated[] = $ids[($i + $len - $n) % $len];
  }
  return $rotated;
}

echo json_encode(rotateByTimes([1, 2, 3, 4, 5], 2)) .PHP_EOL;
echo json_encode(rotateByTimes([1, 2, 3, 4, 5], 5)) .PHP_EOL;
echo json_encode(rotateByTimes([10, 12, 3, 4, 5], 3)) .PHP_EOL;
echo json_encode(rotateByTimes([4, 23, 104, 435, 5002, 3], 26)) .PHP_EOL;
echo json_encode(rotateByTimes([4, 23, 104, 435, 5002, 3], 0)) .PHP_EOL;
echo json_encode(rotateByTimes([4, 23, 104, 435, 5002, 3], 1)) .PHP_EOL;
echo json_encode(rotateByTimes([4, 23, 104, 435, 5002, 3], 2)) .PHP_EOL;
echo json_encode(rotateByTimes([2, 3], 1)) .PHP_EOL;

echo "--------------------------" .PHP_EOL;

echo "問題3*" .PHP_EOL;

function websitePagination(array $urls, int $pageSize, int $page): array
{
  $start_index = ($page - 1) * $pageSize;
  $end_index   = $start_index + $pageSize;
  return array_slice($urls, $start_index, $end_index);
}

echo "[". implode("," ,websitePagination(["url1", "url2", "url3", "url4", "url5", "url6"], 4, 1)) ."]" .PHP_EOL;
echo "[". implode("," ,websitePagination(["url1", "url2", "url3", "url4", "url5", "url6", "url7", "url8", "url9"], 3, 2)) ."]" .PHP_EOL;
echo "[". implode("," ,websitePagination(["url1", "url2", "url3", "url4", "url5", "url6", "url7", "url8", "url9"], 4, 3)) ."]" .PHP_EOL;

echo "--------------------------" .PHP_EOL;


echo "問題4" .PHP_EOL;

function hasPenalty(array $records): bool
{
  list($isPenalty, $count) = array(false, 0);
  while($count < count($records) - 1) {
    if ($records[$count] > $records[$count + 1]) {
      $isPenalty = true;
      break;
    } else {
      $isPenalty = false;
    }
    $count++;
  }
  return $isPenalty;
}

echo json_encode(hasPenalty([1, 2, 3, 4])) .PHP_EOL;
echo json_encode(hasPenalty([4, 3, 2, 1])) .PHP_EOL;
echo json_encode(hasPenalty([4, 3, 3, 2, 1])) .PHP_EOL;
echo json_encode(hasPenalty([150, 130, 130, 82, 51])) .PHP_EOL;
echo json_encode(hasPenalty([100, 200, 200, 200, 300, 400])) .PHP_EOL;
echo json_encode(hasPenalty([80, 80, 80, 80])) .PHP_EOL;
echo json_encode(hasPenalty([80, 90, 60, 70, 80])) .PHP_EOL;
echo json_encode(hasPenalty([150, 140, 58, 67, 1100])) .PHP_EOL;
echo json_encode(hasPenalty([1 ,28, 48, 85, 3])) .PHP_EOL;

echo "--------------------------" .PHP_EOL;

echo "問題5*" .PHP_EOL;

function isMountain(array $height): bool
{
  list($count, $i) = array(count($height), 0);
  if ($count < 3) return false;
  while($i < $count -1 && $height[$i] < $height[$i + 1]) {
    $i++;
  }
  if ($i == 0 || $i == $count - 1) {
    return false;
  }
  while ($i < $count - 1 && $height[$i] > $height[$i + 1]) {
    $i++;
  }
  return $i == $count - 1;
}

echo json_encode(isMountain([1, 2, 3, 2])) . PHP_EOL;
echo json_encode(isMountain([1, 2])) . PHP_EOL;
echo json_encode(isMountain([2, 1])) . PHP_EOL;
echo json_encode(isMountain([1, 2, 2, 2, 2])) . PHP_EOL;
echo json_encode(isMountain([1, 2, 3])) .PHP_EOL;
echo json_encode(isMountain([4, 3, 2, 1])) .PHP_EOL;
echo json_encode(isMountain([1, 2, 2, 2, 3, 2])) .PHP_EOL;
echo json_encode(isMountain([3, 2, 2, 2, 1, 1])) .PHP_EOL;
echo json_encode(isMountain([10, 20, 30, 400, 500, 10])) .PHP_EOL;
echo json_encode(isMountain([100, 200, 100, 400, 500, 100])) .PHP_EOL;
echo json_encode(isMountain([100, 200, 300, 200, 100, 300])) .PHP_EOL;
echo json_encode(isMountain([100, 50, 100, 200, 300, 400])) .PHP_EOL;
echo json_encode(isMountain([53, 158, 477, 994, 994, 867, 797, 755, 744, 621, 616])) .PHP_EOL;

?>