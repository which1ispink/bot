# which1ispink/bot

This is a simple bot implementation that accepts a command like the following 
'RW15RW3LW5', executes it (turns right, walks 15 steps, turns right, 
walks 3 steps, turns left, walks 5 steps), and returns the position and 
direction at the end of execution. Initial position is 0, 0, and initial 
direction is north.

## Installation

Install the composer packages:

```bash
$ composer install
```

## Usage

- First make sure the "run" script is executable.
- Run it:

```bash
./run RW15RW3LW5
```

## Tests

To run the unit tests:

```bash
$ vendor/bin/phpunit
```
