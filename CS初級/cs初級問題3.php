<?php

// 問題1
function myXOR(bool $p, bool $q): bool
{
  return $p != $q;
}

echo (myXOR(true, false) ? "true" : "false") .PHP_EOL;
echo (myXOR(false, true) ? "true" : "false") .PHP_EOL;
echo (myXOR(false, false) ? "true" : "false") .PHP_EOL;
echo (myXOR(true, true) ? "true" : "false") .PHP_EOL;

// 問題2
function screenViewMode(int $height, int $width): string
{
  return $height >= $width ? "portrait" : "landscape";
}
echo screenViewMode(200, 150) .PHP_EOL;
echo screenViewMode(120, 100) .PHP_EOL;
echo screenViewMode(50, 100) .PHP_EOL;
echo screenViewMode(60, 60) .PHP_EOL;

echo '------------------------------' .PHP_EOL;
// 問題3 4で割り切れる かつ 100で割り切れない または 400で割り切れる→閏年
function isLeapYear(int $year): string
{
  return $year % 4 == 0 && $year % 100 != 0 || $year % 400 == 0 ? "true" : "false";
}
echo isLeapYear(2000) .PHP_EOL;
echo isLeapYear(2011) .PHP_EOL;
echo isLeapYear(2012) .PHP_EOL;
echo isLeapYear(2024) .PHP_EOL;
echo isLeapYear(1900) .PHP_EOL;
echo isLeapYear(2100) .PHP_EOL;

// 問題4
function getBootstrapClass(int $screenWidth): string
{
  string:$className = "";
  if ($screenWidth >= 1200) return $className = "lg";
  else if ($screenWidth >= 992) return $className = "md";
  else if ($screenWidth >= 768) return $className = "sm";
  else return $className = "xs";
  
}

echo getBootstrapClass(340) .PHP_EOL;
echo getBootstrapClass(800) .PHP_EOL;
echo getBootstrapClass(1000) .PHP_EOL;
echo getBootstrapClass(1350) .PHP_EOL;

echo '------------------------------' .PHP_EOL;

// 問題5
function isThereSchool(string $day, bool $isHoliday): bool
{
  //土日
  if ($day == "Sunday" || $day == "Saturday") return $isHoliday = false;
  //祝日
  else if ($day == "Monday" && $isHoliday) return $isHoliday = false;
  //平日
  else return  $isHoliday = true;
  
}

echo (isThereSchool("Sunday", true) ? "true" : "false") .PHP_EOL;
echo (isThereSchool("Saturday", true) ? "true" : "false") .PHP_EOL;
echo (isThereSchool("Saturday", false) ? "true" : "false") .PHP_EOL;
echo (isThereSchool("Sunday", false) ? "true" : "false") .PHP_EOL;
echo (isThereSchool("Monday", true) ? "true" : "false") .PHP_EOL;
echo (isThereSchool("Monday", false) ? "true" : "false") .PHP_EOL;
echo (isThereSchool("Custom String Input", false) ? "true" : "false") .PHP_EOL;


echo '------------------------------' .PHP_EOL;

// 問題6*
function canProcessOrder(bool $beef, bool $chicken, bool $salad, bool $coffee, bool $tea): bool
{
  $mainDishCount = ($beef ? 1 : 0) + ($chicken ? 1 : 0);
  $drinkCount = ($coffee ? 1 : 0)  + ($tea?  1 : 0);
  if ($mainDishCount != 1 || $drinkCount != 1) return false;
  return true;
  
}

echo (canProcessOrder(false, false, true, false, true) ? "true" : "false") .PHP_EOL;
echo (canProcessOrder(false, true, true, false, true) ? "true" : "false") .PHP_EOL;
echo (canProcessOrder(true, true, true, false, true) ? "true" : "false") .PHP_EOL;
echo (canProcessOrder(true, false, true, true, true) ? "true" : "false") .PHP_EOL;
echo (canProcessOrder(true, false, false, false, false) ? "true" : "false") .PHP_EOL;
echo (canProcessOrder(false, true, false, false, true) ? "true" : "false") .PHP_EOL;

?>