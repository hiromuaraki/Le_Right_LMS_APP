<?php

echo "問題1" .PHP_EOL;

function calc(int $yen, int $product): string
{
  $result = "10000円札x0枚、5000円札x1枚、1000円札x4枚、500円⽟x1枚、100円⽟x3枚、50円⽟x1枚、10円⽟x0枚、5円⽟x0枚、1円⽟x0枚";
  if ($yen >= 10000) {
    return  $result;
  } 
  if ($yen < $product) {
    return $product - $yen. "円足りません。";
  }
  $diff = $yen - $product;
  return "お釣り" . $diff ."円";
}

echo calc(10000, 150) .PHP_EOL;
echo calc(100, 150) .PHP_EOL;
echo calc(0, 150) .PHP_EOL;
echo calc(50, 150) .PHP_EOL;
echo calc(100, 250) .PHP_EOL;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>お釣り</title>
  </head>
  <body>
    <section>
      <?php echo calc(100, 150) .PHP_EOL; ?>
    </section>
  </body>
</html>

<?php

echo "問題2" .PHP_EOL;
// 保留 分数の足し算


echo "問題3" .PHP_EOL;
// 絵柄,数字
$cards = [ //ワンペア
  ['suit' => 'heart', 'number' => 12],
  ['suit' => 'spade', 'number' => 13],
  ['suit' => 'diamond', 'number' => 13],
  ['suit' => 'club', 'number' => 11],
  ['suit' => 'heart', 'number' => 10]
];

$cards1 = [ //不正
  ['suit' => 'heart', 'number' => 12],
  ['suit' => 'spade', 'number' => 1],
  ['suit' => 'diamond', 'number' => 11],
  ['suit' => 'club', 'number' => 11],
  ['suit' => 'heart', 'number' => 12]
];

$cards2 = [ //ツーペア
  ['suit' => 'heart', 'number' => 9],
  ['suit' => 'spade', 'number' => 4],
  ['suit' => 'diamond', 'number' => 9],
  ['suit' => 'spade', 'number' => 12],
  ['suit' => 'club', 'number' => 12]
];

$cards3 = [ //スリー
  ['suit' => 'heart', 'number' => 6],
  ['suit' => 'spade', 'number' => 8],
  ['suit' => 'diamond', 'number' => 12],
  ['suit' => 'spade', 'number' => 12],
  ['suit' => 'club', 'number' => 12]
];

$cards4 = [ //フォー
  ['suit' => 'heart', 'number' => 5],
  ['suit' => 'spade', 'number' => 5],
  ['suit' => 'diamond', 'number' => 5],
  ['suit' => 'spade', 'number' => 12],
  ['suit' => 'club', 'number' => 5]
];

$cards5 = [ //ストレート
  ['suit' => 'heart', 'number' => 2],
  ['suit' => 'spade', 'number' => 4],
  ['suit' => 'diamond', 'number' => 5],
  ['suit' => 'spade', 'number' => 1],
  ['suit' => 'club', 'number' => 3]
];

$cards6 = [ //ストレートフラッシュ
  ['suit' => 'spade', 'number' => 2],
  ['suit' => 'spade', 'number' => 4],
  ['suit' => 'spade', 'number' => 5],
  ['suit' => 'spade', 'number' => 1],
  ['suit' => 'spade', 'number' => 3]
];

$cards7 = [ //ロイヤルストレートフラッシュ
  ['suit' => 'club', 'number' => 13],
  ['suit' => 'club', 'number' => 11],
  ['suit' => 'club', 'number' => 1],
  ['suit' => 'club', 'number' => 10],
  ['suit' => 'club', 'number' => 12]
];

function dealCount(array &$cardNumbers, array $cards, string $key): array
{
  if (isset($cardNumbers[$cards[$key]])) {
    $cardNumbers[$cards[$key]]++;
  } else {
    $cardNumbers[$cards[$key]] = 1;
  }
  return $cardNumbers;
}


// 要修正
function judge1(array $cards): string
{
  list($deal, $cardNumbers, $pattern, $chk, $result) = array([], [], [], 0, "不正です");
  $number = [];
  $dealCount = [];
  $type = [];
  
  for ($i = 0; $i < count($cards); $i++) {
    // 手札を用意
    $deal[] = $cards[$i]['suit'] . $cards[$i]['number'];
    $number[] = $cards[$i]['number'];
  }

  for ($i = 1; $i < count($deal); $i++) {
    for ($j = $i; $j < count($deal); $j++) {
      // 同じカードか
      if ($deal[$i -1] == $deal[$j]) { return $result; }
      if (in_array($cards[$i -1]['suit'], $cards[$j])) { $chk++; }
    }
  }

  // 存在しない絵柄か
  if ($chk == 0) { return $result; }
  
  for ($i = 0; $i < count($deal); $i++) {
    dealCount($cardNumbers, $cards[$i], 'number');
    dealCount($pattern, $cards[$i], 'suit');
  }

  // 数字件数
  foreach ($cardNumbers as $value) {
    $dealCount[] = $value;
  }

  // マーク件数
  foreach ($pattern as $value) {
    $type[] = $value;
  }
  
  // 連番判定のため並べ替え
  sort($number);
  $count = 1;
  
  for ($i = 1; $i < count($number); $i++) {
    // 連番判定
    if ($number[$i] - $number[$i -1] == 1) {
      $count++;
    } else if (count($type) == 1) {
      $result = "フラッシュです";
      return $result;
    }
  }
  if ($count == count($number) && count($type) == 1) {
    $result = "ストレートフラッシュです";
    return $result;
  } else if ($count == count($number)) {
    $result = "ストレートです";
    return $result;
  } 

  // 役判定（数字）
  rsort($number);
  
  $count = 0;
  if ($cardNumbers[$number[$count]] == 2) { //フルハウス
    $result = "フルハウスです";
    return $result;
  } else if (count($cardNumbers) == 2) { //フォーカード
    $result = "フォーカードです";
    return $result;
  } else if ($cardNumbers[$number[$count]] == 3) { //スリーカード
    $result = "スリーカードです";
    return $result;
  } else if ($cardNumbers[$number[$count]] == 2 && count($dealCount) == 3) { //ツーペア
    $result = "ツーペアです";
    return $result;
  } else if ($cardNumbers[$number[$count]] == 2 && count($dealCount) == 4) { //ワンペア
    $result = "ワンペアです";
    return $result;
  } else {
    $result = "なしです";
    return $result;
  }

  return $result;
}

// 不正チェック
function validateCards(array $cards): bool
{
  //判定用の手札を用意
  $suits = ['heart', 'spade', 'diamond', 'club'];
  $numbers = range(1, 13);
  $cardCounts = [];

  foreach ($cards as $card) {
    $suit = $card[$suits];
    $number = $card[$numbers];

    //不正な絵柄と数字が存在しないか
    if (!(in_array($suit, $suits) || in_array($number, $numbers))) {
      return false;
    }
    $cardKey = $suit ."-". $number;

    //同じカードが存在しないか
    if (isset($cardCounts[$cardKey])) {
      return false;
    }
    $cardCounts[$cardKey] = 1;
  }
  return true;
}

function judge(array $cards) :string
{
  // 不正チェック 手札は5枚か、同じカードが存在しないか 不正な絵柄が存在しないか
  if (count($cards) != 5 || validateCards($cards)) {
    return "不正です。";
  }

  // 役判定
    if (isRoyalStraightFlush($cards)) {
      return 'ロイヤルストレートフラッシュです';
  } elseif (isStraightFlush($cards)) {
      return 'ストレートフラッシュです';
  } elseif (isFourOfAKind($cards)) {
      return 'フォーカードです';
  } elseif (isFullHouse($cards)) {
      return 'フルハウスです';
  } elseif (isFlush($cards)) {
      return 'フラッシュです';
  } elseif (isStraight($cards)) {
      return 'ストレートです';
  } elseif (isThreeOfAKind($cards)) {
      return 'スリーカードです';
  } elseif (isTwoPair($cards)) {
      return 'ツーペアです';
  } elseif (isOnePair($cards)) {
      return 'ワンペアです';
  } else {
      return '役なしです';
  }
}


// echo judge($cards) .PHP_EOL;
// echo judge($cards1) .PHP_EOL;
// echo judge($cards2) .PHP_EOL;
// echo judge($cards3) .PHP_EOL;
// echo judge($cards4) .PHP_EOL;
// echo judge($cards5) .PHP_EOL;
// echo judge($cards6) .PHP_EOL;
echo judge($cards7) .PHP_EOL;
?>