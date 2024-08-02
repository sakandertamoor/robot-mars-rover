<?php

namespace RoboticMarsRover\Entity;

use RoboticMarsRover\Interface\PlateauInterface;

class Plateau implements PlateauInterface
{
    private int $maxX;
    private int $maxY;

    public function __construct(int $maxX, int $maxY)
    {
        $this->maxX = $maxX;
        $this->maxY = $maxY;
    }

    public function isWithinBounds(int $x, int $y): bool
    {
        return $x >= 0 && $x <= $this->maxX && $y >= 0 && $y <= $this->maxY;
    }
}
