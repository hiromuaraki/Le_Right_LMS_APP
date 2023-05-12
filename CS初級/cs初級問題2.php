<?php

// 問題1
function stringFirst(string $input): string
{
  return $input[0];
}

echo stringFirst("hello") .PHP_EOL;
echo stringFirst("Good Morning") .PHP_EOL;
echo stringFirst("1234") .PHP_EOL;

echo '-------------------------------------' .PHP_EOL;

// 問題2
function stringLast(string $stringInput): string
{
  return $stringInput[-1];
}

echo stringLast("hello") .PHP_EOL;
echo stringLast("Good Morning") .PHP_EOL;
echo stringLast("1234") .PHP_EOL;

echo '-------------------------------------' .PHP_EOL;

function nameInitials(string $firstName, string $lastName): string
{
  return $firstName[0].'.'. $lastName[0];
}

echo nameInitials("Steve", "Jobs") .PHP_EOL;
echo nameInitials("Donald", "Tramp") .PHP_EOL;
echo nameInitials("Taro", "Yamada") .PHP_EOL;

echo '-------------------------------------' .PHP_EOL;

// 問題4*
int:const TOTAL_COUNT     = 150000;
function weekly7DaysSales(int $ticketPrice, int $defaultTicketPrice = 250, int $humCount = 7000): int
{
  int:$diffPriceRate = round(abs($ticketPrice - $defaultTicketPrice)) / 10;
  return $defaultTicketPrice > $ticketPrice ? TOTAL_COUNT + $diffPriceRate * $humCount : TOTAL_COUNT - $diffPriceRate * $humCount;
}

echo weekly7DaysSales(260) .PHP_EOL;
echo weekly7DaysSales(255) .PHP_EOL;
echo weekly7DaysSales(220) .PHP_EOL;

?>