<?php


function triangleArea(int $width, int $height): int
{
  return ($width * $height) / 2;
}


echo triangleArea(5, 4) .PHP_EOL;
echo triangleArea(100, 5) .PHP_EOL;
echo triangleArea(10, 12) .PHP_EOL;
?>