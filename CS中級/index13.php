<?php

// O(n) 一つ一つ比較
function needleInHaystack(array $haystack, string $needle): int
{
  for ($i = 0; $i < count($haystack); $i++) {
    if ($haystack[$i] == $needle) {
      return $i;
    }
  } 
  return -1;
}

function printAthIndex(int $index, array $words): void
{
  if ($index >= 0 && $index < count($words)) {
    echo "Printing:->" .$words[$index] . "<- at index:>" .$index .PHP_EOL;
  } else {
    echo "Index out of scope!" .PHP_EOL;
  }
}


$words = ["Take", "Restaurant", "Family", "Running", "Tea", "Apples"];
printAthIndex(needleInHaystack($words, "Running"), $words);

function maxInArray(array $arr): int
{
  $maxValue = $arr[0];
  for ($i = 0; $i < count($arr); $i++) {
    if ($arr[$i] > $maxValue) {
      $maxValue = $arr[$i];
    }
  }
  return $maxValue;
}


function hasLargerMax(array $arrOp1, array $arrOp2): bool
{
  if (!$arrOp1) {
    return false;
  }

  if (!$arrOp2) {
    return true;
  }
  
  $arrOp1Max = maxInArray($arrOp1);
  $arrOp2Max = maxInArray($arrOp2);
  return $arrOp1Max > $arrOp2Max;
}

function boolString(bool $boolVal): string
{
  return $boolVal === false ? "false" : "true";
}

$array1 = [23, 43, 2432, 5464, 3425, 656, 232];
$array2 = [43, 23, 55, 34];
$array3 = [23, 6464, 43, 54, 6988];

echo boolString(hasLargerMax($array1, $array2)) .PHP_EOL;
echo boolString(hasLargerMax($array1, $array3)) .PHP_EOL;

class Student {
  private $firstName;
  private $lastName;
  private $age;
  private $id;

  function __construct(string $firstName, string $lastName, int $age, int $id)
  {
    $this->firstName = $firstName;
    $this->lastName  = $lastName;
    $this->age   = $age;
    $this->id = $id;
  }
}

function setStudentIds(array $students): void
{
  for ($i = 0; $i < count($students); $i++) {
    $students[$i]->id = $i + 1;
    echo "Student" .$students[$i]->firstName . "has an id of" . $students[$i]->id .PHP_EOL;
  }
}

function searchForStudent(int $id, $listOfStudents): string
{
  $corrected = $id - 1;
  if (!(0 <= $corrected && $corrected <= count($listOfStudents) - 1)) {
    return "Not FOUND!";
  }
  $studentFound = $listOfStudents[$corrected];
  return $studentFound->firstName . " " . $studentFound->lastName;
}

function searchForStudentLinear(int $studentId, array $listOfStudents): string
{
  for ($i = 0; $i < count($listOfStudents); $i++) {
    if ($listOfStudents[$i]->id == $studentId) {
      $studentFound = $listOfStudents[$i];
      return $studentFound->firstName . " " .$studentFound->lastName;
    }
  }
  return "Not FOUND!";
}

$students = [];
$students[] = new Student("Paula", "Cooper", 15, 10);
$students[] = new Student("Daniel", "Roger", 14, 10);
$students[] = new Student("Trevor", "Nishi", 14, 9);
$students[] = new Student("Kei", "Hdeyoshi", 16, 11);

// idを設定
setStudentIds($students);

// idが3の学生を検索
echo "Search for id of 3 constant time -" . searchForStudent(3, $students) .PHP_EOL;
echo "Search for id of 3 linear time -" . searchForStudentLinear(3, $students) .PHP_EOL;


// idが10の学生を検索
echo "Search for id of 10 constant time -" . searchForStudent(10, $students) .PHP_EOL;
echo "Search for id of 10 linear time -" . searchForStudentLinear(10, $students) .PHP_EOL;
?>