<?php
namespace Bot\Command;

/**
 * Interface CommandParser
 */
interface CommandParser
{
    /**
     * Parses a command and returns an array of Command objects
     *
     * @param string $command
     * @return Command[]
     */
    public function parseCommand(string $command): array;
}
