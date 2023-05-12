<?php
echo "問題1" .PHP_EOL;
function addEveryOtherElement(array $intArr, int $oddSum = 0): int
{
  $len = count($intArr);
  if ($len == 0) return 0;
  for ($i = 1; $i <= $len; $i++) {
    if ($i % 2 == 0) continue;
    $oddSum += $intArr[$i-1];
  }
  return $oddSum;
}

echo addEveryOtherElement([34, 46, 45, 57]) .PHP_EOL;
echo addEveryOtherElement([60, 45, 66, 75, 56, 32, 654, 45, 100]) .PHP_EOL;
echo addEveryOtherElement([5, 10]) .PHP_EOL;
echo addEveryOtherElement([120, 85, 45, 67, 54, 343, 57, 800, 88, 67, 56, 57, 68, 75]) .PHP_EOL;
echo addEveryOtherElement([]) .PHP_EOL;

echo "--------------------------" .PHP_EOL;

echo "問題2" .PHP_EOL;
function charInBagOfWordsCount(array $bagOfWords, string $keyCharacter): int
{
  $count = 0;
  for ($i = 0; $i < count($bagOfWords); $i++) {
    for ($j = 0; $j < strlen($bagOfWords[$i]); $j++) {
      if ($bagOfWords[$i][$j] == $keyCharacter) $count++;
    }
  }
  return $count;
}

echo charInBagOfWordsCount(["hello", "world"], 'o') .PHP_EOL;
echo charInBagOfWordsCount(["hello", "world"], 'p') .PHP_EOL;
echo charInBagOfWordsCount(["The", "tech", "giant", "is in the", "city center"], 'p') .PHP_EOL;
echo charInBagOfWordsCount(["The", "tech", "giant", "is in the", "city center"], 'e') .PHP_EOL;

echo "--------------------------" .PHP_EOL;

echo "問題3*" .PHP_EOL;
function isMarcusLarger(string $s1, string $s2, int $marcus = 0, int $oldMan = 0): bool
{
  $array = [strtolower($s1), strtolower($s2)];
  for ($i = 0; $i < count($array); $i++) {
    for($j = 0; $j < strlen($array[$i]); $j++) {
      $i == 0 ? $marcus += ord($array[$i][$j]) : $oldMan += ord($array[$i][$j]);
    }
  }
  if ($marcus > $oldMan) return true;
  if ($marcus < $oldMan || $marcus == $oldMan) return false;
}

echo (isMarcusLarger("Fantastic", "Bridge") ? "true" : "false") .PHP_EOL;
echo (isMarcusLarger("Bridge", "Fantastic") ? "true" : "false") .PHP_EOL;
echo (isMarcusLarger("hello", "HelLo") ? "true" : "false") .PHP_EOL;
echo (isMarcusLarger("Appearances may deceive", "I think so too") ? "true" : "false") .PHP_EOL;
echo (isMarcusLarger("pool", "pooling") ? "true" : "false") .PHP_EOL;
echo (isMarcusLarger("magni", "est") ? "true" : "false") .PHP_EOL;

echo "--------------------------" .PHP_EOL;

echo "問題4" .PHP_EOL;
const MAX_SUM = 22;
function winnerBlackjack(array $playerCards, array $houseCards): bool
{
  list($player, $house, $preg_match) = array(0, 0, "/[♣|♥|♠|♦]/u");
  $twoPersonCardList = array($playerCards, $houseCards);
  $cardsList = getCardsList();
  for ($i = 0; $i < count($twoPersonCardList); $i++) {
    for ($j = 0; $j < count($twoPersonCardList[$i]); $j++) {
      if ($i == 0) {
        $player += $cardsList[removeStringRegexp($preg_match, $twoPersonCardList[$i][$j])];
      } else {
        $house  += $cardsList[removeStringRegexp($preg_match, $twoPersonCardList[$i][$j])];
      }
    }
  }
  //プレイヤーの手札の合計値が21より大きかったらプレイヤーの敗北
  if ($player > MAX_SUM) {
    return false;
  //ディラーの手札の合計値が22未満でかつプレイヤーのカードの合計値より大きければプレイヤーの敗北
  } else if ($house < MAX_SUM && $house > $player) {
    return false;
  //引き分けの場合はプレイヤーの敗北
  } else if ($player == $house) {
    return false;
  // プレイヤーの勝利
  } else {
    return true;
  }
}

// 配列から指定された正規表現で文字列を除去し数値のみにするためのメソッド
function removeStringRegexp(string $preg_match , string $twoPersonCardList): string
{
  return trim(preg_replace($preg_match, '', $twoPersonCardList));
}

function getCardsList(): array
{
  return array
  (
    "A" => 1,
    "2" => 2,
    "3" => 3,
    "4" => 4,
    "5" => 5,
    "6" => 6,
    "7" => 7,
    "8" => 8,
    "9" => 9,
    "10"=> 10,
    "J" => 11,
    "Q" => 12,
    "K" => 13
  );
}

echo (winnerBlackjack(["♣4","♥7","♥7"],["♠Q","♣J"]) ? "true" : "false") .PHP_EOL;
echo (winnerBlackjack(["♥10","♥6","♣K"],["♠Q","♦2","♥K"]) ? "true" : "false") .PHP_EOL;
echo (winnerBlackjack(["♠3","♠J","♣5"],["♣A","♥Q","♣5"]) ? "true" : "false") .PHP_EOL;
echo (winnerBlackjack(["♥2","♣A","♣8","♥7","♥3"],["♥6","♥K","♣5"," ♥K"]) ? "true" : "false") .PHP_EOL;
echo (winnerBlackjack(["♥2","♣A","♣8","♥7","♥3"],["♥2","♣A","♣8"," ♥7","♥3"]) ? "true" : "false") .PHP_EOL;

echo "--------------------------" .PHP_EOL;

echo "問題5" .PHP_EOL;

function validEmailList(array $emailList, array $email = []): array
{
  $len = count($emailList);
  for ($i = 0; $i < $len; $i++) {
    if (filter_var($emailList[$i], FILTER_VALIDATE_EMAIL)) { $email[] = $emailList[$i]; }
  }
  return $email;
}

// カンマごとに区切り一つの文字列に変換する
echo "[" .implode(",", validEmailList(["ccc@aaa.com", "c@cc@aaa.com", "cc c@aaa.com", "cc.c@aaa.com"])) ."]"  .PHP_EOL;
echo "[" .implode(",", validEmailList(["c@cc@aaa.com", "cc c@aaa.com", "cc.c@aaacom"])) ."]" .PHP_EOL;
echo "[" .implode(",", validEmailList(["ccc@aaa.com", "cvsd@a.com","tele@bb.aa","cc.c@aaa.com"])) ."]" .PHP_EOL;
echo "[" .implode(",", validEmailList(["c@cc@aaa.com", "tele@bb.aa", "cc.c@aaa.com", "ccc@aaa.com"])) ."]" .PHP_EOL;

echo "--------------------------" .PHP_EOL;

echo "問題6*" .PHP_EOL;

function generateAlphabet(string $firstAlphabet, string $secondAlphabet): array
{
  $stopList = range('a', 'z');
  list($range1, $range2, $result)  = array(null, null, null);
  list($firstA, $secondA) = array(strtolower($firstAlphabet), strtolower($secondAlphabet));
  if ($firstA == $secondA) return [$secondA];
  // 先頭に入力された値の乗車駅が先か後かをアスキーコードに変換し調べる
  if (ord($firstA) < ord($secondA)) {
    $range1  = strpos(implode("", $stopList), $firstA);
    $range2  = strpos(implode("", $stopList), $secondA);
  } else {
    $range1  = strpos(implode("", $stopList), $secondA);
    $range2  = strpos(implode("", $stopList), $firstA);
  }
  $result = getRangeStop($range1, $range2, $stopList);
  return $result;
}

function getRangeStop(int $range1, int $range2, array $stopList, array $stop = null): array
{
  $twoStopRange = range($range1, $range2);
  for ($i = 0; $i < count($twoStopRange); $i++) {
    $stop[] = $stopList[$twoStopRange[$i]];
  }
  return $stop;
}

echo "[". implode(",", generateAlphabet("a", "z")) ."]" .PHP_EOL;
echo "[". implode(",", generateAlphabet("b", "b")) ."]" .PHP_EOL;
echo "[". implode(",", generateAlphabet("C", "Z")) ."]" .PHP_EOL;
echo "[". implode(",", generateAlphabet("M", "z")) ."]" .PHP_EOL;
echo "[". implode(",", generateAlphabet("z", "a")) ."]" .PHP_EOL;

?>