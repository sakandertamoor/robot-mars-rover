<?php

require 'vendor/autoload.php';

use RoboticMarsRover\Entity\Plateau;
use RoboticMarsRover\Entity\Rover;
use RoboticMarsRover\Service\Navigator;


$input = "5 5\n1 2 N\nLMLMLMLMM\n3 3 E\nMMRMMRMRRM";
$lines = explode("\n", $input);
$plateauDimensions = explode(" ", array_shift($lines));
$plateau = new Plateau($plateauDimensions[0], $plateauDimensions[1]);
$navigator = new Navigator();

$output = [];
while (count($lines) > 0) {
    $position = explode(" ", array_shift($lines));
    $instructions = array_shift($lines);
    $rover = new Rover($position[0], $position[1], $position[2], $plateau);
    $navigator->navigate($rover, $instructions);
    $output[] = $rover->getPosition();
}

foreach ($output as $line) {
    echo $line . PHP_EOL;
}
