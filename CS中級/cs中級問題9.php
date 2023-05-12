<?php

echo "問題1" .PHP_EOL;

function missingItems(array $listA, array $listB): array
{
  $result = [];
  foreach ($listA as $item) {
    if (!in_array($item, $listB)) {
      $result[] = $item;
    }
  }
  return $result;
}

echo "[" .implode(",", missingItems([1,2,3,4,5,6,7,8],[1,3,5])) ."]" .PHP_EOL;
echo "[" .implode(",", missingItems([1,2,3,4,5],[1, 2])) ."]" .PHP_EOL;
echo "[" .implode(",", missingItems([1, 1],[2, 2])) ."]" .PHP_EOL;
echo "[" .implode(",", missingItems([9,8,7,6,5],[1, 2])) ."]" .PHP_EOL;
echo "[" .implode(",", missingItems([1,2],[9, 8, 7, 6, 5])) ."]" .PHP_EOL;
echo "[" .implode(",", missingItems([3,4,5,1,2],[1, 2])) ."]" .PHP_EOL;
echo "[" .implode(",", missingItems([8,3,45,67,23,9,3],[5, 7])) ."]" .PHP_EOL;
echo "[" .implode(",", missingItems([8,3,45,67,23,9,3],[5, 45])) ."]" .PHP_EOL;
echo "[" .implode(",", missingItems([8,3,45,67,23,9,3],[3])) ."]" .PHP_EOL;
echo "[" .implode(",", missingItems([8,3,45,67,23,9,3],[])) ."]" .PHP_EOL;

echo "----------------------------" .PHP_EOL;

echo "問題2" .PHP_EOL;

function numberOfOccurrences(array &$count, string $key): array
{
  if (isset($count[$key])) {
    $count[$key]++;
  } else {
    $count[$key] = 1;
  }
  return $count;
}

function bubbleSort(array $itemList): array
{
  for ($i = 0; $i < count($itemList) - 1; $i++) {
    $index = $i;
    for ($j = $i + 1; $j < count($itemList); $j++) {
      // 昇順へ入れ替えるindex番号を保持
      if ($itemList[$j] < $itemList[$index]) {
        $index = $j;
      }
    }
    
    if ($index != $i) {
      $temp = $itemList[$i];
      $itemList[$i] = $itemList[$index];
      $itemList[$index] = $temp;
    }
  }
  return $itemList;
}

function intersectionOfArraysRepeats(array $intList1, array $intList2): array
{
  list($count, $result) = array([], []);
  // intList2との要素の重複を比較するため出現回数をカウント
  foreach ($intList1 as $item) {
    numberOfOccurrences($count, $item);
  }

  // intList1とintList2を比較し共通の要素を格納する
  foreach ($intList2 as $item) {
    if (isset($count[$item]) && $count[$item] > 0) {
       $result[] = $item;
       $count[$item]--;
    }  
  }
  return bubbleSort($result);
}

echo json_encode(intersectionOfArraysRepeats([3, 2, 1], [3, 2, 1])) .PHP_EOL;
echo json_encode(intersectionOfArraysRepeats([1, 1, 1], [1, 2, 3, 2, 1])) .PHP_EOL;
echo json_encode(intersectionOfArraysRepeats([3,2,2,2,1,10,10],[3,2,10,10,10])) .PHP_EOL;
echo json_encode(intersectionOfArraysRepeats([2,19,11,2,6,8],[10,23,5,8,19])) .PHP_EOL;
echo json_encode(intersectionOfArraysRepeats([4,22,100,88,6,8],[1,2,3])) .PHP_EOL;
echo json_encode(intersectionOfArraysRepeats([-1,-2,-1,-1],[-1,-1,-2,-2])) .PHP_EOL;
echo json_encode(intersectionOfArraysRepeats([1,2,2,1],[2,2,2,1])) .PHP_EOL;
echo json_encode(intersectionOfArraysRepeats([4,9,5],[9,4,9,8,4])) .PHP_EOL;

echo "----------------------------" .PHP_EOL;

echo "問題3" .PHP_EOL;

function findXTimes(string $teams): bool
{
  list($result, $count, $len, $isFindXTimes) = array([], [], strlen($teams), true);
  for ($i = 0; $i < $len; $i++) {
    // 各チームの比較用の出現回数をカウント
    if (isset($result[$teams[$i]])) {
      $result[$teams[$i]]++;
    } else {
      $result[$teams[$i]] = 1; 
    }
  }

  // カウントを比較させる為に配列へ格納
  foreach ($result as $value) {
    $count[] = $value;
  }

  for ($j = 1; $j < count($count) - 1; $j++) {
    if ($count[$j - 1] != $count[$j]) {
      $isFindXTimes = false;
      break;
    }
  }
  return $isFindXTimes;
}

echo json_encode(findXTimes("bacddc")) .PHP_EOL;
echo json_encode(findXTimes("babcddc")) .PHP_EOL;
echo json_encode(findXTimes("babacddc")) .PHP_EOL;
echo json_encode(findXTimes("aaabbbcccddd")) .PHP_EOL;
echo json_encode(findXTimes("aaabbccdd")) .PHP_EOL;
echo json_encode(findXTimes("zadbchvwxbwhdxvcza")) .PHP_EOL;
echo json_encode(findXTimes("zadbchvwxbwhdxvczb")) .PHP_EOL;
echo json_encode(findXTimes("zab")) .PHP_EOL;
echo json_encode(findXTimes("z")) .PHP_EOL;

echo "----------------------------" .PHP_EOL;

echo "問題4**" .PHP_EOL;

// 連続した文字列のパターン回数を比較するための関数
function getTypeString(string $user): string
{
  list($len, $count, $currentChar, $type) = array(strlen($user), 0, '', '');
  for ($i = 0; $i < $len; $i++) {
    if ($user[$i] !== $currentChar) {
      if ($i != 0) $type .= $count;
      $currentChar = $user[$i];
      $count = 1;
    } else {
      $count++;
    }
  }
  $type .= $count;
  return $type;
}

// 重複した文字列の出現回数を保持するための関数
function userTypeCount(string $user, array $userCount = array()): array
{
  $result = array();
  for ($i = 0; $i < strlen($user); $i++) {
    if (isset($userCount[$user[$i]])) {
      $userCount[$user[$i]]++;
    } else {
      $userCount[$user[$i]] = 1;
    }
  }
  foreach ($userCount as $data) {
    $result[] = $data;
  }
  return $result;
}


function hasSameType(string $user1, string $user2): bool
{
  // 2つの文字数が違う場合パターンに当てはまらないから処理終了
  if (strlen($user1) != strlen($user2)) { return false; }
  list($type1, $type2) = array("", "");

  // ①連続する文字列のパターンタイプ単語ごとで比較するために用意
  $type1 = getTypeString($user1);
  $type2 = getTypeString($user2);

  // ②単語ごとの出現回数を保持しパターンに当てはまるか比較させるために用意
  $user1Count = userTypeCount($user1);
  $user2Count = userTypeCount($user2);

  // ①②をもとに文字列のパターンを判定
  if (count($user1Count) != count($user2Count) || $type1 !== $type2) {
    return false;
  }
  return $type1 === $type2;
}


echo json_encode(hasSameType("aabb", "yyza")) .PHP_EOL;
echo json_encode(hasSameType("aappl", "bbtte")) .PHP_EOL;
echo json_encode(hasSameType("aappl", "bbttb")) .PHP_EOL;
echo json_encode(hasSameType("aabb", "abab")) .PHP_EOL;
echo json_encode(hasSameType("aappl", "bktte")) .PHP_EOL;
echo json_encode(hasSameType("aaapppl", "bbbttke")) .PHP_EOL;
echo json_encode(hasSameType("abcd", "tso")) .PHP_EOL;
echo json_encode(hasSameType("abcd", "jklm")) .PHP_EOL;
echo json_encode(hasSameType("aaabbccdddaa", "jjjddkkpppjj")) .PHP_EOL;
echo json_encode(hasSameType("aaabbccdddaa", "jjjddkkpppjd")) .PHP_EOL;

echo "----------------------------" .PHP_EOL;

echo "問題5" .PHP_EOL;

function findParis(array $numbers): array
{
  list($count, $length, $result) = array([], count($numbers), []);
  for ($i = 0; $i < $length; $i++) {
    if (isset($count[$numbers[$i]])) {
      $count[$numbers[$i]]++;
    } else {
      $count[$numbers[$i]] = 1;
    }
  }

  foreach ($count as $key => $value) {
    if ($value == 2) {
      $result[] = $key;
    }
  }

  for ($i = 1; $i < count($result); $i++) {
    if ($result[$i] < $result[$i - 1]) {
      $temp = $result[$i];
      $result[$i] = $result[$i - 1];
      $result[$i - 1] = $temp; 
    }
  }
  return $result;
}

echo "[" . implode(",", findParis([10, 12, 13, 14, 15, 16, 16, 7, 7, 8])). "]" .PHP_EOL;
echo "[" . implode(",", findParis([1, 1])). "]" .PHP_EOL;
echo "[" . implode(",", findParis([1, 2])). "]" .PHP_EOL;
echo "[" . implode(",", findParis([1, 2, 3, 4, 5, 6, 6, 7, 7, 8])). "]" .PHP_EOL;
echo "[" . implode(",", findParis([1, 3, 6, 3, 1, 4, 6, 4])). "]" .PHP_EOL;
echo "[" . implode(",", findParis([3, 3, -1, -1, 1, 6, 6, 4, 4])). "]" .PHP_EOL;
echo "[" . implode(",", findParis([30, 30, 30, 30, 1, 600, 600, 40, 40, 40])). "]" .PHP_EOL;

echo "----------------------------" .PHP_EOL;

echo "問題6" .PHP_EOL;

function firstNonRepeating(string $s): int
{
  list($len, $result, $count) = array(strlen($s), -1, []);
  for ($i = 0; $i < $len; $i++) {
    if (isset($count[$s[$i]])) {
      $count[$s[$i]]++;
    } else {
      $count[$s[$i]] = 1;
    }
  }

  foreach ($count as $key => $value) {
    if ($value == 1) {
      $result = strpos($s, $key);
    }
    if ($result != -1) {
      break;
    }
  } 
  return $result;
}

echo firstNonRepeating("aabbcdddeffg") .PHP_EOL;
echo firstNonRepeating("abcdabcdf") .PHP_EOL;
echo firstNonRepeating("abcddaebcdf") .PHP_EOL;
echo firstNonRepeating("aabbbccdd") .PHP_EOL;
echo firstNonRepeating("ddecdfg") .PHP_EOL;
echo firstNonRepeating("abcdeef") .PHP_EOL;
echo firstNonRepeating("zzcbdefghafhgbbcd") .PHP_EOL;

?>