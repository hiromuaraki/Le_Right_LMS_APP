<?php
$desktopComputer = [
  "motherboard" => "AGUX 203-4344 Extreme",
  "CPU" => "Fantel l9 extreme 16 core 4.5Ghz",
  "RAM" => [
    [
      "title"  => "Zolik DDR6 MegaHyper 32gb",
      "sizeMB" => 32000,
      "clockSpeedMHz" => 3000
    ],
    [
      "title"  => "Zolik DDR6 MegaHyper 32gb",
      "sizeMB" => 32000,
      "clockSpeedMHz" => 3000
    ],
  ],
  "storage" => [
    [
      "title" => "Akygate ST3433 1TB SSD",
      "sizeGb" => 2000,

    ],
    [
      "title" => "Akygate ST3433 4TB HDD",
      "sizeGb" => 4000,
    ],
  ],
    "GPU" => "Livia jtx34000i",
    "powerSupply" => "Fursair Platinum 1200W PSU DirectY 12GB VRAM"
];

echo $desktopComputer["powerSupply"] .PHP_EOL;
echo $desktopComputer["storage"][0]["title"] .PHP_EOL;
echo $desktopComputer["GPU"] .PHP_EOL;
echo $desktopComputer["RAM"][0]["title"] .PHP_EOL;

?>