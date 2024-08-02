<?php

namespace RoboticMarsRover\Interface;

interface PlateauInterface
{
    public function isWithinBounds(int $x, int $y): bool;
}
