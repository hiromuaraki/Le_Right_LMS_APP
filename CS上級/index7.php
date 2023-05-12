<?php

use DoublyLinkedList as GlobalDoublyLinkedList;

class Node {
  public array | int $data;
  public $prev;
  public $next;

  public function __construct(array | int $data)
  {
    $this->data = $data;
  }
}

class DoublyLinkedList {
  private array $arr;
  public $head, $tail;

  // 双方向リストの作成
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

  // index番号の要素を検索
  public function at(int $index): ?Node
  {
    $iterator = $this->head;

    for ($i = 0; $i < $index; $i++) {
      $iterator = $iterator->next;
      if ($iterator == null) return null;
    }
    return $iterator;
  }

  // ??
  public function preAppend(Node $newNode): void
  {
    $this->head->prev = $newNode;
    $newNode->next = $this->head;
    $newNode->prev = null;
    $this->head = $newNode;
  }

  // 挿入
  public function append(Node $newNode): void
  {
    $this->tail->next = $newNode;
    $newNode->next = null;
    $newNode->prev = $this->tail;
    $this->tail = $newNode;
  }

  // 次のノードを追加
  public function addNextNode(Node $node, Node $newNode): void
  {
    $tempNode = $node->next;
    $node->next = $newNode;
    $newNode->next = $tempNode;
    $newNode->prev = $node;

    if ($node == $this->tail) $this->tail = $newNode;
    else $tempNode->prev = $newNode;
  }

  public function reverse(): void
  {
    $reverse  = $this->tail;
    $iterator = $this->tail->prev;

    $currentNode = $reverse;
    while ($iterator != null) {
      $currentNode->next = $iterator;

      $iterator = $iterator->prev;
      if ($iterator != null) $iterator->next = null;
      $currentNode->next->prev = $currentNode;
      $currentNode = $currentNode->next;
    }
    $this->tail = $currentNode;
    $this->head = $reverse;
  }

  public function printReverse(): void
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
      $str .= $iterator->data .",";
      $iterator = $iterator->next;
    }
    echo trim($str, ",") .PHP_EOL;
  }
}

$numList = new DoublyLinkedList([35,23,546,67,86,234,56,767,34,1,98,78,555]);
$numList->printList();

$numList->preAppend(new Node(45));
echo $numList->head->data .PHP_EOL;
$numList->printList();

$numList->append(new Node(71));
echo $numList->tail->data .PHP_EOL;
$numList->printList();

$numList->addNextNode($numList->at(3), new Node(4));
$numList->printList();
echo $numList->tail->data .PHP_EOL;

?>