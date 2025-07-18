<?php

class Node {
  public array | int $data;
  public $next;

  public function __construct(array | int $data)
  {
    $this->data = $data;
  }

  public function addNextNode(Node $newNode):void
  {
    $tempNode = $this->next;
    $this->next = $newNode;
    $newNode->next = $tempNode;
  }
}

class SinglyLinkedList {
  public array $arr;
  public Node $head;

  // 連結リストの作成
  public function __construct(array $arr)
  {
    $this->head = count($arr) > 0 ? new Node($arr[0]) : new Node(null);
    $currentNode = $this->head;
    for ($i = 1; $i < count($arr); $i++) {
      if ($i != 0) $currentNode->next = new Node($arr[$i]);
      $currentNode = $currentNode->next;
    }
  }

  public function at(int $index): Node
  {
    $iterator = $this->head;
    for ($i = 0; $i < $index; $i++) {
      $iterator = $iterator->next;
      if ($iterator === null) return null;
    }
    return $iterator;
  }

  // 先頭に挿入
  public function preAppend(Node $newNode): void
  {
    $newNode->next = $this->head;
    $this->head = $newNode;
  }

  public function popFront()
  {
    $this->head = $this->head->next;
  }

  public function delete(int $index): ?Node
  {
    if ($index == 0) return $this->popFront();
    $iterator = $this->head;
    for ($i = 0; $i < $index - 1; $i++) {
      if ($iterator->next == null) return null;
      $iterator = $iterator->next;
    }
    $iterator->next = $iterator->next->next;
    return $iterator;
  }

  public function printList(): void
  {
    $iterator = $this->head;
    $str = "";
    while ($iterator != null) {
      $str .= $iterator->data. ",";
      $iterator = $iterator->next;
    }
    echo trim($str, ",") .PHP_EOL;
  }
}

$numList = new SinglyLinkedList([35,23,546,67,86,234,56,767,34,1,98,78,555]);
$numList->printList();

$numList->popFront();
$numList->popFront();
$numList->printList();

$numList->delete(4);
$numList->printList();
// 
$numList->delete(9);
$numList->printList();


?>