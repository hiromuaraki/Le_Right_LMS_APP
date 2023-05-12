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
  // 先頭と末尾
  public $head, $tail;

  // 先頭のデータを返す
  public function peekFront(): ?int
  {
    if ($this->head === null) return null;
    return $this->head->data;
  }

  // 末尾のデータを返す
  public function peekBack()
  {
    if ($this->tail === null) return $this->peekFront();
    return $this->tail->data;
  }

  // キューをセットする
  public function enqueue(int $data): void
  {
    if ($this->head === null) {
      $this->head = new Node($data);
      $this->tail = $this->head;
    } else {
      $this->tail->next = new Node($data);
      $this->tail = $this->tail->next;
    }
  }

  public function dequeue()
  {
    if ($this->head === null) return null;
    $temp = $this->head;
    $this->head = $this->head->next;
    if ($this->head === null) $this->tail = null;

    return $temp->data;
  }
}

$q = new Queue();
echo json_encode($q->peekFront()) .PHP_EOL;
echo json_encode($q->peekBack()) .PHP_EOL;

$q->enqueue(4);
echo json_encode($q->peekFront()) .PHP_EOL;
echo json_encode($q->peekBack()) .PHP_EOL;

$q->enqueue(64);
echo json_encode($q->peekFront()) .PHP_EOL;
echo json_encode($q->peekBack()) .PHP_EOL;

echo json_encode("dequeued：". $q->dequeue()) .PHP_EOL;
echo json_encode($q->peekFront()) .PHP_EOL;
echo json_encode($q->peekBack()) .PHP_EOL;
?>