
## Mars Rover

This is a PHP project that simulates how rovers will be navigated on Mars in a plateau as controlled by the NASA project. The user gives the input to define the plateau size and then a series of commands for each rover one by one. The output shows the final coordinates and orientation of each rover after the execution of the set of provided commands.

### Configuration

```bash
composer install
```

### Implementation details

#### Project Structure

```bash
  /src                     # Source files
    /Entity                # Entities representing core objects
      - Plateau.php        # Plateau class to define grid
      - Rover.php          # Rover class to define rover behavior
    /Interface             # Interfaces for dependency inversion
      - NavigatorInterface.php  # Interface for navigation behavior
      - PlateauInterface.php    # Interface for plateau behavior
      - RoverInterface.php      # Interface for rover behavior
    /Service               # Services to handle core logic
      - Navigator.php      # Navigator service to manage rovers
  /tests                   # PHPUnit tests
    - RoverTest.php
  index.php                # Main script to run the application
  input.txt                # Sample input file
  phpunit.xml              # PHPUnit configuration file
```

#### Architecture details
SOLID principles use for implementation

- Single Responsibility Principle

*Plateau Class*: Handling the grid boundaries and make sure rovers do not move outside these boundaries.

*Rover Class*: Manage the movement and executing commands of a rover.

*Navigator Class*: This class would be responsible for input processing control, creation of rover, and management of the command execution sequence for each rover.

- Open/Closed Principle

*Rover Class*: The behavior of moving and rotating the rover is put into methods that can be further extended in case there is a need. Easily new movement behaviors can be added without a single modification in the already existing method _executeInstructions_.

*Navigator Class*: Can be extended to handle more complex navigation strategies or do extra preprocessing of the input command without altering.

- Interface Segregation Principle
 Specific interfaces that the project will be developed with are _NavigatorInterface, PlateauInterface, and RoverInterface_. These interfaces establish that the classes are all dependent on methods needing to be invoked and create a clean, maintainable codebase.

- Dependency Inversion Principle

Rover class depends upon the PlateauInterface abstractions instead of a concrete Plateau implementation. This allows for flexible substitution of a different plateau implementation for the Rover class.


<!-- ```php
$input = file_get_contents('input.txt');
$lines = explode("\n", trim($input));
``` -->

### Run tha code

```bash
php index.php

```

### Test the code

```bash
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests

Or

 vendor/bin/phpunit tests/RoverTest.php
```