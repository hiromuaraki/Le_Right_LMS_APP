<?php


string:$lastName = "Albert";
echo strtoupper($lastName) .PHP_EOL;
echo strtolower($lastName) .PHP_EOL;

// 例題
$cityName = "California";
echo strtoupper($cityName) .PHP_EOL;
echo strtolower($cityName) .PHP_EOL;

$sentence  = "I will go hiking near a ranch in Oregon.";
$sentence2 = "The ranch";

echo substr($sentence, 2, 4) .PHP_EOL;
echo substr($sentence, 3, 3) .PHP_EOL;
echo substr($sentence, 7, strlen($sentence) - 7) .PHP_EOL;
echo substr($sentence, 2, 8).substr($sentence2, 3, 20) .PHP_EOL;

// 例題1
$email = "re-light-lms@info.com";
echo substr($email, strlen($mail) - 8) .PHP_EOL;
$name  = "Steve Jobs";
echo substr($name, strlen($name) - 4) .PHP_EOL;

echo strpos($sentence, "Oregon"). PHP_EOL;
echo strpos($sentence2, "ranch"). PHP_EOL;
echo strpos($sentence, substr($sentence2, 3, strlen($sentence2) - 3)) .PHP_EOL;

// 例題1
echo strpos($email, "@") .PHP_EOL;
// 例題2
$atLocation = strpos($email, "@");
echo substr($email, $atLocation). PHP_EOL; 

$bun = "100人近くの人がいたが、ほとんどあったことのある人たちだった";

echo str_replace("Oregon", "California", $sentence). PHP_EOL;
echo str_replace("近く", "ぐらい", $bun). PHP_EOL;
echo str_replace("The", $lastName .'s', $sentence2). PHP_EOL;

// 例題1
echo str_replace("l", "p", "Hello"). PHP_EOL;

// 例題2
echo str_replace("I", $lastName, $sentence). PHP_EOL;

?>