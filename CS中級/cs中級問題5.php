<?php

echo "問題1" .PHP_EOL;
class Dog {
  
  private $name;
  private $size;
  private $age;

  function __construct(string $name, int $size, int $age)
  {
    $this->name = $name;
    $this->size = $size;
    $this->age  = $age;
  }

  function bark(): string
  {
    if ($this->size >= 50) return "Woof!Woof!";
    else if ($this->size >= 20) return "Ruff!Ruff!";
    else return "Yip!Yip!";
  }

  function calcHumanAge(): int
  {
    return 12 + ($this->age -1) * 7; 
  }
}

$goldenRetriever = new Dog("Golden Retriever", 60, 10);
echo $goldenRetriever->bark() .PHP_EOL;
echo $goldenRetriever->calcHumanAge() .PHP_EOL;

$siberianHusky = new Dog("Siberian Husky", 55, 6);
echo $siberianHusky->bark() .PHP_EOL;
echo $siberianHusky->calcHumanAge() .PHP_EOL;

$poodle = new Dog("poodle", 10, 1);
echo $poodle->bark() .PHP_EOL;
echo $poodle->calcHumanAge() .PHP_EOL;

$shibalnu = new Dog("shibalnu", 35, 4);
echo $shibalnu->bark() .PHP_EOL;
echo $shibalnu->calcHumanAge() .PHP_EOL;

echo "-------------------------------" .PHP_EOL;

echo "問題2*" .PHP_EOL;
class Animal {
  private static $activityMultiplier = 1.2;
  private $name;
  private $weightKg;
  private $heightM;
  private $isPredator;
  private $speedKph;

  function __construct(string $name, $weightKg, $heightM, bool $isPredator, $speedKph)
  {
    $this->name = $name;
    $this->weightKg   = $weightKg;
    $this->heightM    = $heightM;
    $this->isPredator = $isPredator;
    $this->speedKph   = $speedKph;
  }
  

  function getBmi(): float
  {
    return $this->weightKg / ($this->heightM ** 2);
  }

  function getDailyCalories(): float
  {
    return 70 * pow($this->weightKg, 0.75) * Animal::$activityMultiplier;
  }

  function isDangerous(): bool
  {
    if ($this->isPredator) return true;
    if ($this->heightM >= 1.7) return true;
    if ($this->speedKph > 35) return true;
    return false;
  }
}

echo "rabbit--------" .PHP_EOL;
$rabbit = new Animal("rabbit", 10, 0.3, false, 20);
echo round($rabbit->getBmi(), 2) .PHP_EOL;
echo ($rabbit->isDangerous() ? "true" : "false") .PHP_EOL;

echo "snake--------" .PHP_EOL;
$snake = new Animal("snake", 30, 1, true, 30);
echo ($snake->isDangerous() ? "true" : "false") .PHP_EOL;
echo round($snake->getDailyCalories(), 2) .PHP_EOL;


echo "elephant--------" .PHP_EOL;
$elephant = new Animal("elephant", 300, 3, false, 5);
echo round($elephant->getBmi(), 2) .PHP_EOL;
echo round($elephant->getDailyCalories(), 2) .PHP_EOL;


echo "gazelle--------" .PHP_EOL;
$gazelle = new Animal("gazelle", 50, 1.5, false, 100);
echo round($gazelle->getDailyCalories(), 2) .PHP_EOL;
echo($gazelle->isDangerous() ? "true" : "false") .PHP_EOL;

echo "-------------------------------" .PHP_EOL;

echo "問題3*" .PHP_EOL;
class RGB {
 
  private $red;
  private $green; 
  private $blue; 

  public function __construct(int $red, int $green, int $blue)
  {
    $this->red = $red;
    $this->green = $green;
    $this->blue  = $blue;
  }

  // カラーコード（10進数）を16進数を0埋めして返す
  public function getHexCode(string $rgb = ""): string
  {
    return "#". sprintf('%02x%02x%02x', $this->red, $this->green, $this->blue);
  }
  
  // 10進数を2進数で返す
  public function getBits($binary = ""): string
  {
    $hecColor = trim($this->getHexCode(), "#");
    $decColor = hexdec($hecColor);
    $binary   = decbin($decColor);
    return $binary;
    
  }

  // 一番濃ゆい色を返す
  public function getColorShade(): string
  {
    if ($this->red == $this->green && $this->red == $this->blue) return "grayscale";
    $max = $this->red;
    $rgb = $this->rgbList();
    $colorName = (array_keys($rgb)[0]);
    foreach($rgb as $key => $value) {
      if ($key == "red") continue;
      if ($value > $max) {
        $max = $value;
        $colorName = $key;
      }
    }
    return $colorName;
  }

  // getColorShadeの中で使うため
  public function rgbList(): array
  {
    return array("red" => $this->red, "green" => $this->green, "blue" => $this->blue );
  }
}
$color1 = new RGB(0, 153, 255);
echo $color1->getHexCode() .PHP_EOL;
echo $color1->getBits() .PHP_EOL;
echo $color1->getColorShade(). PHP_EOL;


$color2 = new RGB(255, 153, 204);
echo $color2->getHexCode() .PHP_EOL;
echo $color2->getBits() .PHP_EOL;
echo $color2->getColorShade() .PHP_EOL;

$color3 = new RGB(0, 87, 0);
echo $color3->getHexCode() .PHP_EOL;
echo $color3->getBits() .PHP_EOL;
echo $color3->getColorShade() .PHP_EOL;

$color4 = new RGB(123, 123, 123);
echo $color4->getHexCode() .PHP_EOL;
echo $color4->getBits() .PHP_EOL;
echo $color4->getColorShade() .PHP_EOL;

echo "-------------------------------" .PHP_EOL;

echo "問題4" .PHP_EOL;

class BankAccount {
  private static $maxDrawerRate  = 0.2;
  private static $handlingCharge = 100;
  private $bankName; //銀行名
  private $ownerName; //銀行口座の所有者の名前
  private $savings; //口座の中にある合計貯蓄額

  public function __construct(string $bankName, string $ownerName, int $savings)
  {
    $this->bankName  = $bankName;
    $this->ownerName = $ownerName;
    $this->savings   = $savings;
  }

  // 入金
  public function depositMoney(int $depositAmount): int
  {
    if ($this->getSavings() <= 20000) $depositAmount -= BankAccount::$handlingCharge;
    return $this->setDepositMoney($depositAmount);
  }

  // 出金
  public function withdrawMoney(int $withdrawAmount): int
  {
    $currentSavings = $this->getSavings();
    if ($currentSavings <= 0) return "999";
    return $this->setWithDrawMoney($currentSavings, $withdrawAmount);
  }

  public function pastime(int $days): float
  {
    $days *= 0.25;
    return $this->savings + $days;
  }

  public function getSavings(): int
  {
    return $this->savings;
  }

  public function setWithDrawMoney(int $currentSavings, int $withdrawAmount): int
  {
    $maxDrawerSavings = $currentSavings * BankAccount::$maxDrawerRate;
    if ($maxDrawerSavings >= $withdrawAmount) {
      $this->savings -= $withdrawAmount;
    } else {
      $this->savings -= $maxDrawerSavings;
    }
    return $this->savings;
  }

  public function setDepositMoney(int $depositAmount): int
  {
    return $this->savings += $depositAmount;
  }
}

$user1 = new BankAccount("Chase", "Claire Simmmons", 30000);
echo $user1->withdrawMoney(2000) .PHP_EOL;
echo $user1->depositMoney(10000) .PHP_EOL;
echo $user1->pastime(93) .PHP_EOL;

$user2 = new BankAccount("Bank Of America", "Remy Clay", 10000);
echo $user2->withdrawMoney(5000) .PHP_EOL;
echo $user2->depositMoney(12000) .PHP_EOL;
echo $user2->pastime(505) .PHP_EOL;

echo "-------------------------------" .PHP_EOL;

echo "問題5" .PHP_EOL;

class Files {
  /*ファイル名 */
  private $fileName;
  /*ファイルの拡張子 */
  private $fileExtension;
  /*ファイルに含まれるコンテンツ*/
  private $content;
  /*ファイルが置かれているフォルダの名前 */
  private $parentFolder;

  public function __construct(string $fileName, string $fileExtension, string $content, string $parentFolder)
  {
    $this->fileName = $fileName;
    $this->fileExtension = $fileExtension;
    $this->content = $content;
    $this->parentFolder = $parentFolder;
  }

  public function getLifetimeBandwidthSize(): string
  {
    $content = strlen($this->content) * 25;
    return $content >= 1000 ? $content / 1000 ."GB" : $content ."MB";
  }

  public function prependContent(string $data): string
  {
    return $this->content = $data .= $this->content;
  }

  public function addContent(string $data, int $position): string
  {
    $addContent = substr_replace($this->content, $data, $position, 0);
    return $addContent;
  }

  public function showFileLocation(): string
  {
    $extension = "";
    if ($this->searchExtension($this->fileExtension) == "") $extension = ".txt";
    return $extension != "" ? $this->parentFolder . ">" .$this->fileName  .$extension
    : $this->parentFolder . ">" . $this->fileName .$this->fileExtension;
  }

  public function searchExtension(string $extension): string
  {
    $fileExtension = ".word .png .mp4 .pdf";
    return stristr($fileExtension, $extension);
  }
}

$assignment = new Files("assignment", ".word", "ABCDEFGH", "homework");
echo $assignment->getLifetimeBandwidthSize() .PHP_EOL;
echo $assignment->prependContent("MMM") .PHP_EOL;
echo $assignment->addContent("hello world",5) .PHP_EOL;
echo $assignment->showFileLocation() .PHP_EOL;

$blade = new Files("blade", ".php", "bg-primary text-white m-0 p-0 d-flex justify-content-center", "view");
echo $blade->getLifetimeBandwidthSize() .PHP_EOL;
echo $blade->addContent("font-weight-bold ", 11) .PHP_EOL;
echo $blade->showFileLocation() .PHP_EOL;

?>