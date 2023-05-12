<?php

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
  private $head, $tail;

  public function __construct(array $arr)
  {
    if (count($arr) <= 0) {
      $this->head = new Node(null);
      $this->tail = $this->head;
      return;
    }

    $this->head = new Node($arr[0]);
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

  public function printList(): void
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
$numList->printList();
$numList->printReverse();

// echo $numList->at(0)->data .PHP_EOL;
// echo $numList->at(2)->data .PHP_EOL;
// echo $numList->at(12)->data .PHP_EOL;
$numList->printList();
$numList->reverse() .PHP_EOL;


?>