<?php

namespace RoboticMarsRover\Interface;

interface RoverInterface
{
    public function getPosition(): string;
    public function executeInstructions(string $instructions): void;
}
