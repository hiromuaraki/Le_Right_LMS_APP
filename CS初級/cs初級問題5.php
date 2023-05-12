<?php

// 問題1
function insertUnderscoreAt(string $s, int $i): string
{
  if ($i >= strlen($s)) return $s;
  return substr_replace($s, '_', $i, 0);
}

echo insertUnderscoreAt("stevejobs", 8) .PHP_EOL;
echo insertUnderscoreAt("stevejobs", 9) .PHP_EOL;
echo insertUnderscoreAt("stevejobs", 5) .PHP_EOL;
echo insertUnderscoreAt("stevejobs", 0) .PHP_EOL;
echo insertUnderscoreAt("stevejobs", 10) .PHP_EOL;
echo insertUnderscoreAt("donaldtrump", 6) .PHP_EOL;
echo insertUnderscoreAt("Baseball is very fun.", 5) .PHP_EOL;

// 問題2
function lastFourHint(string $stringInput): string
{
  if (strlen($stringInput) < 6) return "There is no Hint";
  return "Hint is:".substr($stringInput, -4);
}

echo lastFourHint("text"). PHP_EOL;
echo lastFourHint("Ocean"). PHP_EOL;
echo lastFourHint("the ocean is blue"). PHP_EOL;
echo lastFourHint("abcdef"). PHP_EOL;
echo lastFourHint("integer"). PHP_EOL;
echo lastFourHint("1-545-452-5123"). PHP_EOL;

// 問題3*
function isValidEmail(string $email): bool
{
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

echo (isValidEmail("ccc@aaa.com") ? "true" : "false") .PHP_EOL;
echo (isValidEmail("c@cc@aaa.com") ? "true" : "false") .PHP_EOL;
echo (isValidEmail("cc c@aaa.com") ? "true" : "false") .PHP_EOL;
echo (isValidEmail("cc.c@aaacom") ? "true" : "false") .PHP_EOL;
echo (isValidEmail("cc.c@aaa.com") ? "true" : "false") .PHP_EOL;
echo (isValidEmail("@aaa.com") ? "true" : "false") .PHP_EOL;
echo (isValidEmail("aaaccc.com") ? "true" : "false") .PHP_EOL;

// 問題4*
function middleSubString(string $stringInput): string
{
  if (strlen($stringInput) <= 2) return $stringInput[0];
  if (strlen($stringInput) <= 3) return $stringInput[1];
  $startIndex  = middleStartIndex($stringInput);
  $cutStrCount = middleStartIndex($stringInput);
  $startIndex > 3 ? $startIndex /= 2 : $startIndex -= 1;
  if (middleStartIndex($stringInput) >= 5) {
    $startIndex = middleStartIndex($stringInput);
    $startIndex % 2 == 0 ? $startIndex /= 2 : $startIndex -= 2;
  }
  
  return substr($stringInput, $startIndex, $cutStrCount);
}

// 渡された文字列の半分の開始地点を返す
function middleStartIndex(string $stringInput): int
{
  return strlen($stringInput) / 2;
}

echo middleSubString("A") .PHP_EOL;
echo middleSubString("AB") .PHP_EOL;
echo middleSubString("ABC") .PHP_EOL;
echo middleSubString("ABCD") .PHP_EOL;
echo middleSubString("ABCDE") .PHP_EOL;
echo middleSubString("ABCDEF") .PHP_EOL;
echo middleSubString("ABCDEFG") .PHP_EOL;
echo middleSubString("ABCDEFGH") .PHP_EOL;
echo middleSubString("ABCDEFGHI") .PHP_EOL;
echo middleSubString("ABCDEFGHIJ") .PHP_EOL;
echo middleSubString("ABCDEFGHIJK") .PHP_EOL;
echo middleSubString("ABCDEFGHIJKL") .PHP_EOL;
echo middleSubString("fundamental") .PHP_EOL;

//-1, -2
// 開始地点 -1する時 戻り値：2,3　-2する時 戻り値：4,5,6 



?>