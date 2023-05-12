<?php


class Node {
  public array | int $data;
  // 前
  public $prev;
  // 次
  public $next;

  public function __construct(array | int $data)
  {
    $this->data = $data;
  }
}

class DoublyLinkedList {
  public array $arr;
  // 先頭/末尾
  public $head, $tail;

  // 新規ノードを作成
  public function __construct(array $arr)
  {
    if (count($arr) <= 0) {
      $this->head = new Node(null);
      $this->tail = $this->head;
      return;
    }

    $this->head  = new Node($arr[0]);
    $currentNode = $this->head;
    
    for ($i = 1; $i < count($arr); $i++) {
      $currentNode->next = new Node($arr[$i]);
      $currentNode->next->prev = $currentNode;
      $currentNode = $currentNode->next;
    }
    $this->tail = $currentNode;
  }

  public function at(int $index): ?Node
  {
    $iterator = $this->head;
    for ($i = 0; $i < $index; $i++) {
      $iterator = $iterator->next;
      if ($iterator == null) return null;
    }
    return $iterator;
  }

  public function popFront(): void
  {
    $this->head = $this->head->next;
    $this->head->prev = null;
  }

  public function pop()
  {
    $this->tail = $this->tail->prev;
    $this->tail->next = null;
  }

  // 前に挿入
  public function preAppend(Node $newNode): void
  {
    $this->head->prev = $newNode;
    $newNode->next = $this->head;
    $newNode->prev = null;
    $this->head = $newNode;
  }

  // 追加
  public function append(Node $newNode): void
  {
    $this->tail->next = $newNode;
    $newNode->next = null;
    $newNode->prev = $this->tail;
    $this->tail = $newNode;
  }

  public function addNextNode(Node $node, Node $newNode): void
  {
    $tempNode = $node->next;
    $node->next = $newNode;
    $newNode->next = $tempNode;
    $newNode->prev = $node;

    if ($node == $this->tail) $this->tail = $newNode;
    else $tempNode->prev = $newNode;
  }


  public function deleteNode(Node $node): ?Node
  {
    if ($node == $this->tail) return $this->pop();
    if ($node == $this->head) return $this->popFront();

    // 双方向のポインタを設定
    $node->prev->next = $node->next;
    $node->next->prev = $node->prev;
    return $node;
  }

  public function reverse(): void
  {
    $reverse  = $this->tail;
    $iterator = $this->tail->prev;
    $currentNode = $reverse;
    while($iterator != null) {
      $currentNode->next = $iterator;
      $iterator = $iterator->prev;
      if ($iterator != null) $iterator->next = null;
      $currentNode->next->prev = $currentNode;
      $currentNode = $currentNode->next;
    }
    $this->tail = $currentNode;
  }

  public function printInReverse(): void
  {
    $iterator = $this->tail;
    $str = "";
    while ($iterator != null) {
      $str .= $iterator->data . ",";
      $iterator = $iterator->prev;
    }
    echo trim($str, ",") .PHP_EOL;
  }

  public function printList()
  {
    $iterator = $this->head;
    $str = "";
    while ($iterator != null) {
      $str .= $iterator->data . ",";
      $iterator = $iterator->next;
    }
    echo trim($str, ",") .PHP_EOL;
  }
}

$numList = new DoublyLinkedList([35,23,546,67,86,234,56,767,34,1,98,78,555]);
// $numList->printList();

$numList->popFront();
$numList->pop();

$numList->printList();
$numList->printInReverse();

echo "Deleting in O(1)" .PHP_EOL;
$numList->printList();

$numList->deleteNode($numList->at(3));
$numList->deleteNode($numList->at(9));
$numList->deleteNode($numList->at(0));

$numList->printList();
$numList->printInReverse();

?>