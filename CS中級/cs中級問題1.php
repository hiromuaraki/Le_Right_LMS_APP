<?php
//　規則性、法則性を見つける

// 問題1　①総和を出す
function numberOfDots(int $x): int
{
  if ($x <= 0) return 0;
  return numberOfDots($x - 1) + $x;
}

echo numberOfDots(2) .PHP_EOL;
echo numberOfDots(4) .PHP_EOL;
echo numberOfDots(5) .PHP_EOL;
echo numberOfDots(10) .PHP_EOL;

echo '---------------------------' .PHP_EOL;

// 問題2　①総和を出す　②①の結果を階乗する　
function totalSquareArea(int $x): int
{
  if ($x <= 0) return 0;
  return totalSquareArea($x - 1) + $x;
}

function totalFactorial(int $totalSquareArea): int
{
  return $totalSquareArea ** 2;
}
echo totalFactorial(totalSquareArea(1)) .PHP_EOL;
echo totalFactorial(totalSquareArea(2)) .PHP_EOL;
echo totalFactorial(totalSquareArea(3)) .PHP_EOL;
echo totalFactorial(totalSquareArea(4)) .PHP_EOL;
echo totalFactorial(totalSquareArea(5)) .PHP_EOL;
echo totalFactorial(totalSquareArea(12)) .PHP_EOL;
echo totalFactorial(totalSquareArea(10)) .PHP_EOL;

echo '---------------------------' .PHP_EOL;

// 問題3
function sheeps(int $count, int $i= 1, string $str=""): string
{
  if ($count <= 0) return $str;
  $str .= $i .' '. 'sheep' .' ~' . ' ';
  $count--; $i++;
  return sheeps($count, $i, $str);
}

echo '---------------------------' .PHP_EOL;

echo sheeps(2) .PHP_EOL;
echo sheeps(4) .PHP_EOL;
echo sheeps(5) .PHP_EOL;
echo sheeps(10) .PHP_EOL;

// 問題4
function reverseString(string $s, string $reverseStr="", int $startIndex=-1): string
{
  if (strlen($s) > strlen($reverseStr)) {
    if ($reverseStr !== "") --$startIndex;
    $reverseStr .= substr($s, $startIndex, 1);
    return reverseString($s, $reverseStr, $startIndex);
  } 
  return $reverseStr;
  
}

echo '---------------------------' .PHP_EOL;

echo reverseString("abcd") .PHP_EOL;
echo reverseString("recursion") .PHP_EOL;
echo reverseString("I am a software engineer") .PHP_EOL;


?>