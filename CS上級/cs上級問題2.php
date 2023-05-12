<?php

class Node {
  public int $data;
  public $next;
  
  public function __construct(int $data)
  {
    $this->data = $data;
  }
}

class Queue {
  // head:先頭　
  public $head, $tail;

  // 先頭のデータを返す
  public function peekFront(): ?int
  {
    if ($this->head === null) return null;
    return $this->head->data;
  }

  // 末尾のデータを返す
  public function peekBack(): ?int
  {
    if ($this->tail === null) return null;
    return $this->tail->data; 
  }

  // キューをセット
  public function enqueue(array $arr): Node
  {
    $this->head = new Node($arr[0]);
    $this->tail = $this->head;
    for ($i = 1; $i < count($arr); $i++) {
      $this->tail->next = new Node($arr[$i]);
      $this->tail = $this->tail->next;
    }
    return $this->head;
  }
}

echo "問題1" .PHP_EOL;

// 一旦ストップ　処理の条件はメモ帳へ記載
function diceStreakGamble(array $player1, array $player2, array $player3, array $player4): string
{
  $node = 
  $q = new Queue();
  $player1 = $q->enqueue($player1);
  $player2 = $q->enqueue($player2);
  $player3 = $q->enqueue($player3);
  $player4 = $q->enqueue($player4);
  return json_encode($player1);
}

echo diceStreakGamble([1,2,3],[3,4,2],[4,2,4],[6,16,4]);
?>