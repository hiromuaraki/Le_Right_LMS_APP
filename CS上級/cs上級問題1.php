<?php

class SinglyLinkedListNode {
  public int $data;
  public ?SinglyLinkedListNode $next;

  public function __construct(int $data)
  {
    $this->data = $data;
    $this->next = null;
  }

  // 戻り値クラス型に対し文字列型で返すためのメソッド（自動的にコール）
  public function __toString()
  {
    list($result, $currentNode, $count) = array($this->data, $this->next, 0);
    while ($currentNode != null) {
      $count++;
      $result .= "➡︎" . $currentNode->data;
      $currentNode = $currentNode->next;
    }
    if ($count <= 1) return "END";
    $result .= "➡︎END";
    return $result;
  }
}

// ノードの先頭を返す
function singlyLinkedList(array $head): ?SinglyLinkedListNode
{
  $data = new SinglyLinkedListNode($head[0]);
  $currentNode = $data;
  for ($i = 1; $i < count($head); $i++) {
    $currentNode->next = new SinglyLinkedListNode($head[$i]);
    $currentNode = $currentNode->next;
  }
  return $data;
}

echo "問題1" .PHP_EOL;

function linkedListLength(?SinglyLinkedListNode $head): int
{
  $length = 0;
  $currentNode = $head;
  while ($currentNode != null) {
    $length++;
    $currentNode = $currentNode->next;
  }
  return $length;
}

echo linkedListLength(singlyLinkedList([3,2,1,5,6,4])) .PHP_EOL;
echo linkedListLength(singlyLinkedList(([7,8,2,3,1,7,8,11,4,3,2]))) .PHP_EOL;
echo linkedListLength(singlyLinkedList([34,35,64,34,10,2,14,5,353,23,35,63,23])) .PHP_EOL;
echo linkedListLength(singlyLinkedList([1])) .PHP_EOL;

echo "-------------------------------" .PHP_EOL;

echo "問題2" .PHP_EOL;

// ノードの末尾を返す
function singlyLinkedListLast(array $data): ?SinglyLinkedListNode
{
  $head = new SinglyLinkedListNode($data[0]);
  $currentNode = $head;
  for ($i = 1; $i < count($data); $i++) {
    $currentNode->next = new SinglyLinkedListNode($data[$i]);
    $currentNode = $currentNode->next;
  }
  return $currentNode;
}

function linkedListLastValue(?SinglyLinkedListNode $head): int
{
  return $head->data;
}

echo linkedListLastValue(singlyLinkedListLast([3,2,1,5,6,4])) .PHP_EOL;
echo linkedListLastValue(singlyLinkedListLast([7,8,2,3,1,7,8,11,4,3,2])) .PHP_EOL;
echo linkedListLastValue(singlyLinkedListLast([34,35,64,34,10,2,14,5,353,23,35,63,23])) .PHP_EOL;
echo linkedListLastValue(singlyLinkedListLast([1])) .PHP_EOL;

echo "-------------------------------" .PHP_EOL;

echo "問題3＊" .PHP_EOL;

function deleteDetail(?SinglyLinkedListNode $head): ?SinglyLinkedListNode
{
  $currentNode = $head;
  // リストより削除対象の要素を特定する
  while ($currentNode->next->next !== null) {
    $currentNode = $currentNode->next;
  }
  $currentNode->next = null;
  return $head;
}

echo deleteDetail(singlyLinkedList([1])) .PHP_EOL;
echo deleteDetail(singlyLinkedList([3,3,2,10,34,45,67,356])) .PHP_EOL;
echo deleteDetail(singlyLinkedList([8,7,21,3,2,7])) .PHP_EOL;
echo deleteDetail(singlyLinkedList([8,8,7,7,5])) .PHP_EOL;
echo deleteDetail(singlyLinkedList([8,6,3,5,7])) .PHP_EOL;
echo deleteDetail(singlyLinkedList([8,8,7,7,6,6,5,5,4,4])) .PHP_EOL;
echo deleteDetail(singlyLinkedList([2,5,10,25,50])) .PHP_EOL;
echo deleteDetail(singlyLinkedList([20,-5,34,45,67,356,34,687,31,-34,5])) .PHP_EOL;

echo "-------------------------------" .PHP_EOL;

echo "問題4" .PHP_EOL;

function findMinNum(?SinglyLinkedListNode $head): int
{
  list($index, $result, $min) = array(0, 0, $head->data);
  $currentNode = $head;
  while ($currentNode != null) {
    if ($currentNode->data <= $min) {
      $min = $currentNode->data;
      $result = $index;
    }
    $index++;
    $currentNode = $currentNode->next;
  }
  return $result;
}

echo findMinNum(singlyLinkedList([1,2,3,4,-1,2])) .PHP_EOL;
echo findMinNum(singlyLinkedList([1,1,1])) .PHP_EOL;
echo findMinNum(singlyLinkedList([3,3,2,10,34,45,67,356])) .PHP_EOL;
echo findMinNum(singlyLinkedList([20,-5,34,45,67,356,34,687,31,-34,5])) .PHP_EOL;
echo findMinNum(singlyLinkedList([71,8,16,33])) .PHP_EOL;
echo findMinNum(singlyLinkedList([101,54,82002,93,1207,131,1800,99])) .PHP_EOL;
echo findMinNum(singlyLinkedList([580,781])) .PHP_EOL;
echo findMinNum(singlyLinkedList([2,4,52,108])) .PHP_EOL;
echo findMinNum(singlyLinkedList([61,73,27,3001])) .PHP_EOL;

echo "-------------------------------" .PHP_EOL;

echo "問題5" .PHP_EOL;

function linkedListSearch(?SinglyLinkedListNode $head, int $data): int
{
  list($currentNode, $result, $index) = array($head, -1, 0);
  while ($currentNode != null) {
    if ($currentNode->data == $data) {
      $result = $index;
      break;
    }
    $index++;
    $currentNode = $currentNode->next;
  }
  return $result;
}

echo linkedListSearch(singlyLinkedList([1,3,4,5]), 3) .PHP_EOL;
echo linkedListSearch(singlyLinkedList([1,1,1,1]),1) .PHP_EOL;
echo linkedListSearch(singlyLinkedList([1,6,3,63,68,9,5]),5) .PHP_EOL;
echo linkedListSearch(singlyLinkedList([3,3,2,10,34,45,67,356]),67) .PHP_EOL;
echo linkedListSearch(singlyLinkedList([20,-5,34,45,67,356,34,687,31,-34,5]),-5) .PHP_EOL;
echo linkedListSearch(singlyLinkedList([71,8,16,33]),71) .PHP_EOL;
echo linkedListSearch(singlyLinkedList([71,8,16,33]),686) .PHP_EOL;
echo linkedListSearch(singlyLinkedList([101,54,822,93,131,1800,99]),1800) .PHP_EOL;
echo linkedListSearch(singlyLinkedList([580,781]),781) .PHP_EOL;
echo linkedListSearch(singlyLinkedList([2,4,52,108]),52) .PHP_EOL;
echo linkedListSearch(singlyLinkedList([61,73,27,3001]),45) .PHP_EOL;

echo "-------------------------------" .PHP_EOL;

echo "問題6＊" .PHP_EOL;

function insertAtPosition(?SinglyLinkedListNode $head, int $position, int $data): ?SinglyLinkedListNode
{
  list($currentNode, $i, $newNode) = array($head, 0, new SinglyLinkedListNode($data));
  // 挿入位置の特定
  while ($currentNode != null && $i < $position)  {
    $i++;
    $currentNode = $currentNode->next;
  }

  // 挿入位置が無効だった場合もとのノードを返す
  if ($currentNode == null) {
    return $head;
  }
  $tempNode = $currentNode->next;
  $currentNode->next = $newNode;
  $newNode->next = $tempNode;
  return $head;
}

echo insertAtPosition(singlyLinkedList([2,4]),0,5) .PHP_EOL;
echo insertAtPosition(singlyLinkedList([2,4]),1,5) .PHP_EOL;
echo insertAtPosition(singlyLinkedList([2,10,34,45,67,356]),2,5) .PHP_EOL;
echo insertAtPosition(singlyLinkedList([2,10,34,45,67,356]),2,3) .PHP_EOL;
echo insertAtPosition(singlyLinkedList([2,10,34,45,67,356]),5,3) .PHP_EOL;
echo insertAtPosition(singlyLinkedList([20,-5,34,45,67,356]),34,50) .PHP_EOL;
echo insertAtPosition(singlyLinkedList([20,-5,34,45,67,356,34,687,31,-34,5]),20,54) .PHP_EOL;
echo insertAtPosition(singlyLinkedList([20,-5,34,45,67,356,34,687,31,-34,5]),4,54) .PHP_EOL;

echo "-------------------------------" .PHP_EOL;

echo "問題7" .PHP_EOL;

// 挿入箇所　＊先頭/＊末尾/＊間
function insertNodeInSorted(?SinglyLinkedListNode $head, int $data): ?SinglyLinkedListNode
{
  list($currentNode, $newNode, $tempNode, $temp) = array($head, new SinglyLinkedListNode($data), 0, 0);
  // 先頭へ挿入
  if ($data < $currentNode->data) {
    $newNode->next = $currentNode;
    return $newNode;
  }
  // 挿入位置を検索
  $currentNode->next;
  while ($currentNode != null && $data < $currentNode->data) {
    $temp = $currentNode;
    $currentNode = $currentNode->next;
  }

  while ($currentNode->next != null && $data > $currentNode->data) {
    $temp = $currentNode;
    $currentNode = $currentNode->next;
  }

  if ($currentNode->next == null) {
    // 末尾に挿入
    $currentNode->next = $newNode;
    return $head;
  } else if ($newNode->data > $temp->data) {
    $tempNode = $temp->next;
    $temp->next = $newNode;
  } else  {
    $tempNode = $currentNode->next;
    $currentNode->next = $newNode;  
  }
  $newNode->next = $tempNode;
  return $head;
}

echo insertNodeInSorted(singlyLinkedList([2,10,34,45,67,356]),3) .PHP_EOL;
echo insertNodeInSorted(singlyLinkedList([2,10,34,45,67,356]),-5) .PHP_EOL;
echo insertNodeInSorted(singlyLinkedList([2,10,34,45,67,356]),358) .PHP_EOL;
echo insertNodeInSorted(singlyLinkedList([4,23,53,56,134,645]),34) .PHP_EOL;

echo "-------------------------------" .PHP_EOL;

echo "問題8" .PHP_EOL;

function findMergeNode(?SinglyLinkedListNode $headA, ?SinglyLinkedListNode $headB): int
{
  list($currentNodeA, $currentNodeB, $result, $indexA, $indexB) = array($headA, $headB, -1, -1, 0);
  // 末尾が一致しなければ交差しない
  while ($currentNodeA->next != null) {
    $currentNodeA = $currentNodeA->next;
  }

  while ($currentNodeB->next != null) {
    $currentNodeB = $currentNodeB->next;
  }
  
  if ($currentNodeA->data != $currentNodeB->data) {
    return -1;
  }
  
  list($currentNodeA, $currentNodeB) = array($headA, $headB); 
  while ($currentNodeA != null) {
    $indexB = 0;
    $currentNodeB = $headB;
    
    while ($currentNodeB != null) {
      if ($currentNodeA->data == $currentNodeB->data) {
        $result = $currentNodeA->data;
        break;
      }
      $indexB++;
      $currentNodeB = $currentNodeB->next;
    }
    
    $indexA++;
    $currentNodeA = $currentNodeA->next;
    if ($indexA < $indexB) { continue; }
    if ($result != -1) { break; }
  }
  return $result;
}


echo findMergeNode(singlyLinkedList([2,10,34,45,67,356]), singlyLinkedList([20,5,34,45,67,356])) .PHP_EOL;
echo findMergeNode(singlyLinkedList([34,657,24,36,75,867,345,75,345,64,75]), singlyLinkedList([13,4,6,3,345,64,75])) .PHP_EOL;
echo findMergeNode(singlyLinkedList([34,657,24,36,75,867,345,75,345,64,75]), singlyLinkedList([13,4,6,3,345,64,75,34])) .PHP_EOL;

echo "-------------------------------" .PHP_EOL;

echo "問題9" .PHP_EOL;

function reproduceByN(?SinglyLinkedListNode $head, int $n) :?SinglyLinkedListNode
{
  list($currentNode, $count, $data) = array($head, 0, new SinglyLinkedListNode($head->data));
  $newNode = $data;
  $currentNode = $currentNode->next;
  while ($count < $n) {
    if ($count != 0) { $currentNode = $head; }
    while ($currentNode != null) {
      $newNode->next = new SinglyLinkedListNode($currentNode->data);
      $currentNode = $currentNode->next;
      $newNode = $newNode->next;
    }
    $count++;
  }
  return $data;
}

echo reproduceByN(singlyLinkedList([2,10,34,45,67,356]),  3) .PHP_EOL;
echo reproduceByN(singlyLinkedList([20,-5,34,45,67,356]), 4) .PHP_EOL;
echo reproduceByN(singlyLinkedList([20,-5,34,45,67,356]), 6) .PHP_EOL;
echo reproduceByN(singlyLinkedList([-8,14,34,45,67,356]), 1) .PHP_EOL;


?>