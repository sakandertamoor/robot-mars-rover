<?php

namespace RoboticMarsRover\Tests;

use PHPUnit\Framework\TestCase;
use RoboticMarsRover\Entity\Plateau;
use RoboticMarsRover\Entity\Rover;
use RoboticMarsRover\Service\Navigator;

class RoverTest extends TestCase
{
    public function testRoverMovement()
    {
        $plateau = new Plateau(5, 5);
        $navigator = new Navigator();

        $rover1 = new Rover(1, 2, 'N', $plateau);
        $navigator->navigate($rover1, 'LMLMLMLMM');
        $this->assertEquals('1 3 N', $rover1->getPosition());

        $rover2 = new Rover(3, 3, 'E', $plateau);
        $navigator->navigate($rover2, 'MMRMMRMRRM');
        $this->assertEquals('5 1 E', $rover2->getPosition());
    }

    public function testRoverMovementOutOfBounds()
    {
        $plateau = new Plateau(5, 5);
        $navigator = new Navigator();

        $rover = new Rover(5, 5, 'N', $plateau);
        $navigator->navigate($rover, 'M');
        $this->assertEquals('5 5 N', $rover->getPosition());

        $rover = new Rover(0, 0, 'S', $plateau);
        $navigator->navigate($rover, 'M');
        $this->assertEquals('0 0 S', $rover->getPosition());
    }

    public function testPlateauBounds()
    {
        $plateau = new Plateau(5, 5);
        $this->assertTrue($plateau->isWithinBounds(0, 0));
        $this->assertTrue($plateau->isWithinBounds(5, 5));
        $this->assertFalse($plateau->isWithinBounds(6, 6));
        $this->assertFalse($plateau->isWithinBounds(-1, -1));
    }
}
