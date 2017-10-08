<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);
ini_set('memory_limit', '2048m');

require 'vendor/autoload.php';

use Bot\Command\CommandParserImpl;
use Bot\Position;
use Bot\Direction;
use Bot\BotImpl;

$command = 'RW15LW3LW6R';
$commandParser = new CommandParserImpl();

$commands = $commandParser->parseCommand($command);
$initialPosition = new Position();
$initialDirection = Direction::NORTH;

$bot = new BotImpl($initialPosition, $initialDirection, $commands);
$endDetails = $bot->executeCommands();

print_r($endDetails);
