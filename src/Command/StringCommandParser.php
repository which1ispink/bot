<?php
namespace Bot\Command;

/**
 * Interface StringCommandParser
 */
interface StringCommandParser
{
    /**
     * Parses a string command and returns an array of Command objects
     *
     * @param string $command
     * @return Command[]
     */
    public function parseCommand(string $command): array;
}
