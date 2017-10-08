<?php
namespace Bot;

/**
 * Interface Bot
 */
interface Bot
{
    /**
     * Executes the given command on the bot and returns an array with details of the end position
     *
     * @return array
     */
    public function executeCommand(): array;

    /**
     * @return Position
     */
    public function getPosition(): Position;

    /**
     * @param string $direction
     * @return static
     */
    public function changeDirection(string $direction): self;

    /**
     * @return Direction
     */
    public function getDirection(): Direction;

    /**
     * @return string
     */
    public function getRawCommand(): string;
}
