<?php

class PhysicsThings
{
  public const GRAVITYONEARTH = 9.8;
  public const GRAVITY        = 9.8;
  public const GRAVITYONMOON  = 1.62;

  // 質量 * 重力 で重さを返す
  public function newtonOnEarth($weight)
  {
    return $weight * PhysicsThings::GRAVITYONEARTH;
  }

  public function newtonOnMoon($weight)
  {
    return $weight * PhysicsThings::GRAVITYONMOON;
  }

  public function getWeight(int $mass): int
  {
    return $mass * PhysicsThings::GRAVITY;
  }

  public function potentialEnergy(int $mass, int $height): int
  {
    return $mass * $height * PhysicsThings::GRAVITY;
  }

  public function kineticeEnergy(int $mass, int $speed): int
  {
    return $mass * $speed ** 2 / 2;
  }
}

$physicsThings = new PhysicsThings();

// echo $physicsThings -> newtonOnEarth(80) .PHP_EOL;
// echo $physicsThings -> newtonOnMoon(80) .PHP_EOL;

echo $physicsThings::GRAVITY .PHP_EOL;
echo $physicsThings->getWeight(80) .PHP_EOL;
echo $physicsThings->potentialEnergy(80, 4) .PHP_EOL;
echo $physicsThings->kineticeEnergy(80, 10) .PHP_EOL;

echo("California"[strlen("California")-1]=='i'?"True":"False").PHP_EOL;

?>