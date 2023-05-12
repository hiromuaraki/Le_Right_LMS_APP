<?php

// 参照渡し
function message(&$inputMessage): string
{
  return $inputMessage .= "- is the message"; 
}

function myFunc()
{
  $subject = "It will rain tomorrow";
  echo $subject .PHP_EOL;
  $newMessage = message($subject);
  
  echo $subject .PHP_EOL;
  echo $newMessage .PHP_EOL;
}

myFunc();

$pi = 3.14159265359;

function myFun()
{
  global $pi;
  echo $pi. PHP_EOL;
}

echo myFun();

function monsterAttackSwitchMenu(string $monsterName): string
{
  $attack  = 1000;
  $message = "attack is:";

  switch ($monsterName)
  {
    case "Cyclops":
      $attack *= 1.8;
      $message = "Cyclops" .$message .$attack;
      break;
    case "Ogre":
      $attack *= 2.5;
      $message = "Ogre" .$message .$attack;
      break;
    case "Zombie":
      $attack *= 1.2;
      $message = "Zombie" .$message .$attack;
      break;
    default:
      $message = "Monster does not exist.";
  }
  return $message;
}
echo monsterAttackSwitchMenu("Cyclops") .PHP_EOL;
echo monsterAttackSwitchMenu("Ogre") .PHP_EOL;
echo monsterAttackSwitchMenu("Zombie") .PHP_EOL;
echo monsterAttackSwitchMenu("Ghost") .PHP_EOL;

function isEven(int $n): string
{
  return $n % 2 == 0 ? "The number" .$n. "is even" : "The number" .$n. "is odd";
}

echo isEven(43) .PHP_EOL;
echo isEven(44) .PHP_EOL;
echo isEven(1023) .PHP_EOL;
echo isEven(9992) .PHP_EOL;

?>