<?php

namespace RoboticMarsRover\Entity;

use RoboticMarsRover\Interface\RoverInterface;
use RoboticMarsRover\Interface\PlateauInterface;

class Rover implements RoverInterface
{
    private int $x;
    private int $y;
    private string $direction;
    private PlateauInterface $plateau;

    private static array $directions = ['N', 'E', 'S', 'W'];

    public function __construct(int $x, int $y, string $direction, PlateauInterface $plateau)
    {
        $this->x = $x;
        $this->y = $y;
        $this->direction = $direction;
        $this->plateau = $plateau;
    }

    public function getPosition(): string
    {
        return "{$this->x} {$this->y} {$this->direction}";
    }

    public function executeInstructions(string $instructions): void
    {
        foreach (str_split($instructions) as $instruction) {
            $this->move($instruction);
        }
    }

    private function move(string $instruction): void
    {
        switch ($instruction) {
            case 'L':
                $this->turnLeft();
                break;
            case 'R':
                $this->turnRight();
                break;
            case 'M':
                $this->moveForward();
                break;
        }
    }

    private function turnLeft(): void
    {
        $currentIndex = array_search($this->direction, self::$directions);
        $this->direction = self::$directions[($currentIndex + 3) % 4];
    }

    private function turnRight(): void
    {
        $currentIndex = array_search($this->direction, self::$directions);
        $this->direction = self::$directions[($currentIndex + 1) % 4];
    }

    private function moveForward(): void
    {
        $newX = $this->x;
        $newY = $this->y;
        switch ($this->direction) {
            case 'N':
                $newY += 1;
                break;
            case 'E':
                $newX += 1;
                break;
            case 'S':
                $newY -= 1;
                break;
            case 'W':
                $newX -= 1;
                break;
        }
        if ($this->plateau->isWithinBounds($newX, $newY)) {
            $this->x = $newX;
            $this->y = $newY;
        }
    }
}
