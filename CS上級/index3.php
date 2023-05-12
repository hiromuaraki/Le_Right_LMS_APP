<?php

use SinglyLinkedList as GlobalSinglyLinkedList;

class Node {
  public ?int $data;
  public $next;

  public function __construct(?int $data)
  {
    $this->data = $data;
  }

  public function addNextNode(Node $newNode)
  {
    $tempNode = $this->next;
    $this->next = $newNode;
    $newNode->next = $tempNode;
  }
}

class SinglyLinkedList {
  public $arr;
  public Node $head;

  // 連結リストを作成
  public function __construct($arr)
  {
    $this->head = count($arr) > 0 ? new Node($arr[0]) : new Node(null);
    $currentNode = $this->head;
    for ($i = 0; $i < count($arr); $i++) {
      $currentNode->next = new Node($arr[$i]);
      $currentNode = $currentNode->next;
    }
  }

  public function at(int $index): Node
  {
    $iterator = $this->head;
    for ($i = 0; $i < $index; $i++) {
      $iterator = $iterator->next;
      if ($iterator == null) return null;
    }
    return $iterator;
  }

  public function preAppend(Node $newNode): void
  {
    $newNode->next = $this->head;
    $this->head = $newNode;
  }

  // リストの末尾に追加
  public function append(Node $newNode): void
  {
    if ($this->head === null) {
      $this->head = $newNode;
    } else {
      $iterator = $this->head;
      while ($iterator->next != null) {
        $iterator = $iterator->next;
      }
      $iterator->next = $newNode;
    }
  }

  public function printList(): void
  {
    $count = 0;
    $iterator = $this->head;
    $str = "";
    while ($iterator != null) {
      if ($count != 0 ) $str .= $iterator->data . "";
      $iterator = $iterator->next;
      $count++;
    }
    echo $str. PHP_EOL;
  }
}

$numList = new SinglyLinkedList([35,23,546,67,86,234,56,767,34,1,98,78,555]);
$iterator = $numList->head;
$i = 0;
while ($iterator != null) {
  $currentNode = $iterator;
  $iterator = $iterator->next;
  if ($i % 2 == 0) $currentNode->addNextNode(new Node($currentNode->data * 2));
  $i++;
}

$numList->printList();
$numList->preAppend(new Node(45));
$numList->preAppend(new Node(236));
$numList->append(new Node(10));
$numList->printList();
?>