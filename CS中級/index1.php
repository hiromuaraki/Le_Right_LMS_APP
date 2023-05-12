<?php
// 練習1
$email = "recursion@info.com";
echo strtoupper(substr($email, strpos($email, "com"))) .PHP_EOL;
echo str_replace("@", "%", strtoupper(substr($email, strpos($email, "@")))) .PHP_EOL;
echo str_replace("r", "R", substr($email, strpos($email, "recursion"), strlen("recursion"))) .PHP_EOL;


// ドメイン名を返す
function getDomain(string $email): string
{
  return substr($email, strpos($email, "@"));
}

function isFirstLetterVowel(string $domain): bool
{
  string:$boinList = array('a', 'e', 'i', 'o', 'u');
  return in_array($domain[0], $boinList);
}
$email = "re-light-lms@outlook.jp";
echo (isFirstLetterVowel(getDomain($email)) ? "true" : "false") .PHP_EOL;

// 例題2
echo 3000000 * pow(1 + 0.03, 20) .PHP_EOL;

echo rand(5, 100) .PHP_EOL;
echo "abcdefghijk"[rand(0, strlen("abcdefghijk"))] .PHP_EOL;

function add(int $x, int $y): int
{
  $x += $y;
  if ($x < 10) return add($x, $y);
  return $x;
}

echo add(1, 1). PHP_EOL;

?>