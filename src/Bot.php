<?php
namespace Bot;

/**
 * Interface Bot
 */
interface Bot
{
    /**
     * Executes the commands supplied to the Bot and returns an array with details of the end position
     *
     * @return array
     */
    public function executeCommands(): array;
}
