<?php

// 連結リスト
class Task {
  public $name;
  public $next;
  
  function __construct(string $name)
  {
    $this->name = $name;
    $this->next = null;
  }
}

class TodoList {
  public $head;

  function construct()
  {
    $this->head = null;
  }

  function printList()
  {
    echo "Printing the TodoList..." .PHP_EOL;
    $currentNode = $this->head;
    while ($currentNode != null) {
      // 現在のノードの値を出力
      echo $currentNode->name .PHP_EOL;
      $currentNode = $currentNode->next;
    }
  }
}

$toDoList = new TodoList();
$task1 = new Task("Fix the alarm clock.");
$toDoList->head = $task1;

$task2 = new Task("Pickup grandmother from the dentist.");
$task1->next = $task2;

$task3 = new Task("Call the handyman to fix the home appliance.");
$task2->next = $task3;

$task4 = new Task("Go to the park to jog.");
$task3->next = $task4;

$toDoList->printList();

echo "-----------------------------" .PHP_EOL;
var_dump($toDoList->head);

// $task1 = new Task("Fiz the alarm");
// $task2 = new Task("Go to the dentist to pick up my grandmother");
// $task3 = new Task("Call a handyman to fiz an appliance");
// $task4 = new Task("Go to the park for jog");

// $task1->next = $task2;
// $task2->next = $task3;
// $task3->next = $task4;

// echo $task1->next->name .PHP_EOL;
// echo $task1->next->next->name. PHP_EOL;
// echo $task1->next->next->next->name. PHP_EOL;
// var_dump($task1->next);
?>