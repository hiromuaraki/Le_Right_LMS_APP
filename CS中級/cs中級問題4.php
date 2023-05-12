<?php
// 問題1 素数の判定
function isPrime(int $number, $count = 3): bool
{
  if ($number < 2) return false;
  if ($number == 2 || $number == 3 || $number == 5 || $number == 7) return true;
  if ($number % 4 == 0 || $number % 6 == 0 || $number % 8 == 0 || $number % 10 == 0) return false;
  $isPrimeCount = 0;
  while ($number > $count) {
    if ($number % $count == 0) {$isPrimeCount++; break; }
    $count++;
  }
  return $isPrimeCount >= 1 ? false : true;
}

echo (isPrime(1) ? "true" : "false") .PHP_EOL;
echo (isPrime(2) ? "true" : "false") .PHP_EOL;
echo (isPrime(3) ? "true" : "false") .PHP_EOL;
echo (isPrime(4) ? "true" : "false") .PHP_EOL;
echo (isPrime(25) ? "true": "false") .PHP_EOL;
echo (isPrime(29) ? "true": "false") .PHP_EOL;
echo (isPrime(36) ? "true": "false") .PHP_EOL;
echo (isPrime(45) ? "true": "false") .PHP_EOL;
echo (isPrime(85) ? "true": "false") .PHP_EOL;
echo (isPrime(455) ? "true" : "false") .PHP_EOL;

echo "----------------------" .PHP_EOL;

// 問題2
function doYouFail(string $string): string
{
  $passCount = 0;
  $absenceCount = 0;
  $len = strlen($string);
  for ($i = 0; $i < $len; $i++) {
    $string[$i] == "A" ? $absenceCount++ : $passCount++;
    if ($absenceCount >= 3 || $passCount >= 3) break;
  }
  return $absenceCount >= 3 ? "fail" : "pass";
}

echo doYouFail("AAPPAP") .PHP_EOL;
echo doYouFail("AAPPAA") .PHP_EOL;
echo doYouFail("PAPPA") .PHP_EOL;

echo "----------------------" .PHP_EOL;

// 問題3
function notDivided(int $x, int $y): string
{
  if ($x <= 1 || $y <= 1) return "引数は1以上で指定してください。" .PHP_EOL;
  $attendanceNumber = "";
  for ($i = 1; $i <= $x; $i++) {
    if ($i % $y != 0) $attendanceNumber .= $i ."-";
  }
  return trim($attendanceNumber, "-");
}
echo notDivided(0, 0) .PHP_EOL;
echo notDivided(20, 3) .PHP_EOL;
echo notDivided(50, 4) .PHP_EOL;
echo notDivided(100, 2) .PHP_EOL;

echo "----------------------" .PHP_EOL;

// 問題4
function fizzBuzz(int $n, string $strFizzBuzz = ""): string
{
  $count = 1;
  $result = "";
  while ($count <= $n) {
    if ($count % 15 == 0) $strFizzBuzz = "FizzBuzz";
    else if ($count % 5 == 0) $strFizzBuzz = "Buzz";
    else if ($count % 3 == 0) $strFizzBuzz = "Fizz";
    $strFizzBuzz != "" ? $result .= $strFizzBuzz ."-" : $result .= $count. "-";
    $count++;
    $strFizzBuzz = "";
  }
  return trim($result, "-");
}

echo fizzBuzz(7) .PHP_EOL;
echo fizzBuzz(16) .PHP_EOL;
echo fizzBuzz(30) .PHP_EOL;

echo "----------------------" .PHP_EOL;

// 問題5
function isPerfect(int $num): bool
{
  $sum = 0;
  for ($i = 1; $i <= $num / 2; $i++) {
    if ($num % $i == 0) {
      $sum += $i;
    }
  }
  return $num === $sum;
}

function perfectNumberList(int $num): string 
{
  if ($num < 6) return "none";
  $result = "";
  for ($i = 2; $i <= $num; $i++) {
    if (isPerfect($i)) {
      $result .= $i . "-";
    }
  }
  return trim($result, "-");
}

echo perfectNumberList(3) . PHP_EOL;
echo perfectNumberList(6) . PHP_EOL;
echo perfectNumberList(28) . PHP_EOL;
echo perfectNumberList(100) . PHP_EOL;
// echo perfectNumberList(496) . PHP_EOL;
// echo perfectNumberList(1000) . PHP_EOL;
// echo perfectNumberList(10000) . PHP_EOL;

echo "----------------------" .PHP_EOL;

// 問題6 回文
function isPalindromeInteger(int $n, string $palindrome = ""): bool
{
  if ($n < 10) return true;
  if (strval($n)[0] != strval($n)[-1]) return false;
  $count = -1;
  for ($i = 0; $i < strlen($n); $i++) {
    $palindrome .= substr($n, $count, 1);
    --$count;
  }
  return strval($n) === $palindrome;
}

echo (isPalindromeInteger(12222) ? "true" : "false") .PHP_EOL;
echo (isPalindromeInteger(12321) ? "true" : "false") .PHP_EOL;
echo (isPalindromeInteger(22782) ? "true" : "false") .PHP_EOL;
echo (isPalindromeInteger(189981) ? "true" : "false") .PHP_EOL;
echo (isPalindromeInteger(1) ? "true" : "false") .PHP_EOL;
echo (isPalindromeInteger(987823) ? "true" : "false") .PHP_EOL;

echo "----------------------" .PHP_EOL;

// 問題7*
function sumOfAllPrimes(int $n): int
{
  if ($n < 2) return 0;
  $isPrime = array_fill(2, $n - 1, true);
  $sum = 0;
  for ($i = 2; $i <= $n; $i++) {
    if ($isPrime[$i]) {
      $sum += $i;
      for ($j = $i * $i; $j <= $n; $j += $i) {
        $isPrime[$j] = false;
      }
    }
  }
  return $sum;
}

echo sumOfAllPrimes(1) .PHP_EOL;
echo sumOfAllPrimes(2) .PHP_EOL;
echo sumOfAllPrimes(3) .PHP_EOL;
echo sumOfAllPrimes(100) .PHP_EOL;
echo sumOfAllPrimes(1000) .PHP_EOL;

echo '---------------------------' .PHP_EOL;

// 問題8 10進数➡︎2進数変換
function decimalToBinary(int $decNumber): string
{
  $binary = "";
  while ($decNumber > 0) {
    $binary = ($decNumber % 2) .$binary;
    $decNumber = (int)($decNumber / 2);
  }
  return $binary;
}

echo decimalToBinary(60) .PHP_EOL;
echo decimalToBinary(26) .PHP_EOL;
echo decimalToBinary(35) .PHP_EOL;
echo decimalToBinary(100) .PHP_EOL;
echo decimalToBinary(505) .PHP_EOL;

echo '---------------------------' .PHP_EOL;

// 問題9 10進数➡︎16進数変換
function decimalToHexadecimal(int $decNumber): string
{
  $decimalToHexadecimal = "";
  $hexaDecimal = array_merge(range(0, 9), range("A", "F"));
  while ($decNumber > 0) {
    $decimalToHexadecimal = ($hexaDecimal[$decNumber % 16]) .$decimalToHexadecimal;
    $decNumber = (int)($decNumber / 16);
  }
  return $decimalToHexadecimal;
}

echo decimalToHexadecimal(532454) .PHP_EOL;
echo decimalToHexadecimal(90304) .PHP_EOL;
echo decimalToHexadecimal(28394) .PHP_EOL;
echo decimalToHexadecimal(15) .PHP_EOL;
echo decimalToHexadecimal(74) .PHP_EOL;

echo '---------------------------' .PHP_EOL;

// 問題10 1の補数
function oneComplement(string $bits, string $afterBits = ""): string
{
  $len = strlen($bits);
  if ($bits != "1" && is_numeric($bits)) $afterBits = reverseBits($bits, $len);
  else return "0";
  return $afterBits;
}

echo oneComplement("00011100") .PHP_EOL;
echo oneComplement("10010") .PHP_EOL;
echo oneComplement("001001") .PHP_EOL;
echo oneComplement("0111010") .PHP_EOL;
echo oneComplement("1") .PHP_EOL;

echo '---------------------------' .PHP_EOL;


// 問題11* 2の補数
function twosComplement(string $bits, string $twosComp = ""): string
{
  $len = strlen($bits);
  if (is_numeric($bits)) {
    // 1の補数を求める
    $oneComplement = reverseBits($bits, $len);
    // 2進数➡︎10真数に変換し1を加える➡︎2進数に再変換し2の補数を求める
    $twosComp = decbin(bindec($oneComplement) + 1);
  } else return "0";
  return str_pad($twosComp, $len, "0", STR_PAD_LEFT);
}

// ビットを反転させ１の補数を返す
function reverseBits(string $bits, int $len, string $afterBits = ""): string
{
  for ($i = 0; $i < $len; $i++) {
    $afterBits .= $bits[$i] != "1" ?  "1" : "0";
  }
  return $afterBits;
}

echo twosComplement("00000000") .PHP_EOL;
echo twosComplement("00000010") .PHP_EOL;
echo twosComplement("11111111") .PHP_EOL;
echo twosComplement("01110101") .PHP_EOL;
echo twosComplement("00000001") .PHP_EOL;
echo twosComplement("10000000") .PHP_EOL;
echo twosComplement("10101010") .PHP_EOL;
echo twosComplement("11111110") .PHP_EOL;

?>