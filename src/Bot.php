<?php
namespace Bot;

use Bot\Command\StringCommandParser;

/**
 * Class BotImpl
 */
class Bot
{
    /**
     * @var Position
     */
    private $position;

    /**
     * @var Direction
     */
    private $direction;

    /**
     * @var string
     */
    private $rawCommand;

    /**
     * @var StringCommandParser
     */
    private $commandParser;

    /**
     * BotImpl constructor
     *
     * @param Position $initialPosition
     * @param Direction $initialDirection
     * @param string $rawCommand
     * @param StringCommandParser $commandParser
     */
    public function __construct(
        Position $initialPosition,
        Direction $initialDirection,
        string $rawCommand,
        StringCommandParser $commandParser
    ) {
        $this->position = $initialPosition;
        $this->direction = $initialDirection;
        $this->rawCommand = $rawCommand;
        $this->commandParser = $commandParser;
    }

    /**
     * @param Position $position
     * @return static
     */
    public function setPosition(Position $position): self
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return Position
     */
    public function getPosition(): Position
    {
        return $this->position;
    }

    /**
     * @param Direction $direction
     * @return static
     */
    public function setDirection(Direction $direction): self
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * @return Direction
     */
    public function getDirection(): Direction
    {
        return $this->direction;
    }

    /**
     * @return string
     */
    public function getRawCommand(): string
    {
        return $this->rawCommand;
    }

    /**
     * Executes the raw command given to the bot
     *
     * @return array
     */
    public function executeCommand(): array
    {
        $subcommands = $this->commandParser->parseCommand($this->rawCommand);
        foreach ($subcommands as $command) {
            $command->execute($this);
        }

        return [
            'position' => $this->position->toArray(),
            'direction' => (string) $this->direction
        ];
    }
}
