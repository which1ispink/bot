<?php
namespace Bot;

/**
 * Interface CommandParser
 */
interface CommandParser
{
    /**
     * Parses a raw string command and returns an array of Command objects
     *
     * @param string $command
     * @return Command[]
     */
    public function parseRawCommand(string $command): array;
}
