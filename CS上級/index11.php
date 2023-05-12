<?php

class Node {
  public int $data;
  public $next;
  public $prev;

  public function __construct(int $data)
  {
    $this->data = $data;
  }
}

class Deque {
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
    if ($this->tail === null) return $this->peekFront();
    return $this->tail->data;
  }

  // リストの先頭に要素を挿入する
  public function enqueueFront(int $data): void
  {
    if ($this->head === null) {
      $this->head = new Node($data);
      $this->tail = $this->head;
    } else {
      $this->head->prev = new Node($data);
      $this->head->prev->next = $this->head;
      $this->head = $this->head->prev;
    }
  }
  // リストの末尾に要素を挿入する
  public function enqueueBack(int $data): void
  {
    if ($this->head === null) {
      $this->head = new Node($data);
      $this->tail = $this->head;
    } else {
      $this->tail->next = new Node($data);
      $this->tail->next->prev = $this->tail;
      $this->tail = $this->tail->next;
    }
  }

  // リストの先頭の要素を削除する
  public function dequeueFront(): ?int
  {
    if ($this->head === null) return null;

    $temp = $this->head;
    $this->head = $this->head->next;
    if ($this->head === null) $this->tail = null;
    else $this->head->prev = null;
    return $temp->data;
  }

  // リストの末尾の要素を削除する
  public function dequeueBack(): ?int
  {
    if ($this->tail === null) return null;

    $temp = $this->tail;
    $this->tail = $this->tail->prev;
    if ($this->tail === null) $this->head = null;
    else $this->tail->next = null;
    return $temp->data;
  }
}

// 最大値を取得
function getMax(array $arr)
{
  $dequeue = new Deque();
  $dequeue->enqueueFront($arr[0]);

  for ($i = 1; $i < count($arr); $i++) {
    if ($arr[$i] > $dequeue->peekFront()) {
      $dequeue->enqueueFront($arr[$i]);
    } else {
      $dequeue->enqueueBack($arr[$i]);
    }
  }
  return $dequeue->peekFront();
}
echo getMax([34,35,64,34,10,2,14,5,353,23,35,63,23]) .PHP_EOL;

?>