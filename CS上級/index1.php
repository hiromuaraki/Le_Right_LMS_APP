<?php

class Node {
  public int $data;
  public $next;

  public function __construct(int $data)
  {
    $this->data = $data;
  }
}

class SinglyLinkedList {
  public Node $head;

  public function __construct(Node $head)
  {
    $this->head = $head;
  }
}

$node1 = new Node(4);
$node2 = new Node(65);
$node3 = new Node(24);

$numList = new SinglyLinkedList($node1);

$numList->head->next = $node2;
$node2->next = $node3;

$currentNode = $numList->head;
while ($currentNode != null) {
  echo $currentNode->data. PHP_EOL;
  $currentNode = $currentNode->next;
}
?>