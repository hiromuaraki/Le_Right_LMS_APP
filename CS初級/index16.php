<?php

function isEven(int $x): bool
{
  return $x % 2 == 0;
}

echo (isEven(10) ? "true" : "false") .PHP_EOL;
echo (isEven(11) ? "true" : "false") .PHP_EOL;

function isLongerThan($str): string
{
  return strlen($str) > 5;
}

echo (isLongerThan("abcdef") ? "true" : "false") .PHP_EOL;
echo (isLongerThan("abcdefg") ? "true" : "false") .PHP_EOL;
?>