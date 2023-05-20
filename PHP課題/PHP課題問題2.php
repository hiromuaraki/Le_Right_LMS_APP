<?php

echo "問題1" .PHP_EOL;
for ($i = 1; $i <= 3; $i++) {
  $str = "";
  for ($j = $i; $j >= 1; $j--) {
    $str .= $j;
  }
  echo $str .PHP_EOL;
}

echo "問題2" .PHP_EOL;

for ($i = 1; $i <= 9; $i++) {
  if ($i % 3 == 0) {
    echo $i .PHP_EOL;
  } else {
    echo $i;
  }
}

echo "問題3" .PHP_EOL;
$num = 112;
for ($i = 0; $i < 3; $i++) {
  if ($i != 0) $num += 100;
  echo $num .PHP_EOL;
}

?>