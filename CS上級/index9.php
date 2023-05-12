<?php

class Node {
  public int $data;
  public $next;

  public function __construct(int $data)
  {
    $this->data = $data;
  }
}

class Stack {
  public $head;

  // 先頭に新規ノードを追加
  public function push(int $data)
  {
    $temp = $this->head;
    $this->head = new Node($data);
    $this->head->next = $temp;

  }

  // 2番目のデータを返す
  public function pop(): ?int
  {
    if ($this->head == null) return null;
      $temp = $this->head;
      $this->head = $this->head->next;
      return $temp->data;
  }

  // 先頭のデータを返す
  public function peek(): ?int
  {
    if ($this->head == null) return null;
    return $this->head->data;
  }
}

function consecutiveWalk(array $arr)
{
  $stack = new Stack();
  $stack->push($arr[0]);
  for ($i = 1; $i < count($arr); $i++) {
    if ($stack->peek() < $arr[$i]) {
      // 次へずらす
      while($stack->pop() != null);
    }
    $stack->push($arr[$i]);
  }
  $results = [];
  while($stack->peek() != null) array_unshift($results, $stack->pop());
  return $results;
}

print(json_encode(consecutiveWalk([3,4,20,45,56,6,4,3,5,3,2]))). PHP_EOL;
print(json_encode(consecutiveWalk([4,5,4,2,4,3646,34,64,3,0,-34,-54]))). PHP_EOL;
print(json_encode(consecutiveWalk([4,5,4,2,4,3646,34,64,3,0,-34,-54,4]))). PHP_EOL;

?>