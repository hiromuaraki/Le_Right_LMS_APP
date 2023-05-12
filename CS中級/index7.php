<?php

for ($i = 1; $i <= 2; $i++) {
  for ($j = 1; $j <= 3; $j++) {
    echo "外for：" . $i . ",". "内for：" .$j .PHP_EOL;
  }
}

function simpleSummationOfSummationsNestedIteration($n)
{
  $total = 0;
  for ($i = 1; $i <= $n; $i++) {
    $summationOf = 0;

    for ($j = 1; $j <= $i; $j++) {
      $summationOf += $j;
    }
    $total += $summationOf;
  }
  return $total;

}

echo simpleSummationOfSummationsNestedIteration(4) .PHP_EOL;

function countUpToNWhile(int $n)
{
  $i = 0;

  while ($i < $n) {
    echo $i. PHP_EOL;
    $i++;
  }
}

echo countUpToNWhile(15);

function summationWhileLoopIteration($n): int
{
  $total = 0;
  while ($n >= 0) {
    $total += $n;
    $n--;
  }
  return $total;
}

echo summationWhileLoopIteration(10) .PHP_EOL;

function findLetter(string $sentence, string $letter): string
{
  $found = false;
  $message = "Will we find[".$letter."]in our message? ";

  for ($i = 0; $i < strlen($sentence); $i++) {
    if ($sentence[$i] === $letter[0]) {$found = true; break; }
  }
  return $found ? $message ."It looks like we found it!" : $message ."Sadly, we did not find it.";
}

echo findLetter("It is a sunny day.", "a") .PHP_EOL;
echo findLetter("It is a sunny day.", "o") .PHP_EOL;

function luckyDigitRange(int $number, int $luckyDigit): string
{
  $prefectCounter = 0;
  $closeCounter = 0;
  $closeEnoughCounter = 0;

  $message = "Let's how well our digits match with ". $luckyDigit. "....";

  while ($number >= 1) {
    $currentDigits = $number % 10;
    $number = floor($number / 10);
    $distance = abs($currentDigits - $luckyDigit);
    if ($distance > 2) continue;
    if ($distance == 0) $prefectCounter++;
    else if ($distance == 1) $closeCounter++;
    else $closeEnoughCounter++;
  }
  return $message. "Prefect digits:" .$prefectCounter. " -Close-:" .$closeCounter. " -Close Enough-:". $closeEnoughCounter;
}

echo luckyDigitRange(575445677589, 7). PHP_EOL;

?>