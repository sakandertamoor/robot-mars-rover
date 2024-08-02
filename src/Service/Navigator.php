<?php

namespace RoboticMarsRover\Service;

use RoboticMarsRover\Interface\NavigatorInterface;
use RoboticMarsRover\Interface\RoverInterface;

class Navigator implements NavigatorInterface
{
    public function navigate(RoverInterface $rover, string $instructions): void
    {
        $rover->executeInstructions($instructions);
    }
}
