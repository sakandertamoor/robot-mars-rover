<?php

namespace RoboticMarsRover\Interface;

interface NavigatorInterface
{
    public function navigate(RoverInterface $rover, string $instructions): void;
}
