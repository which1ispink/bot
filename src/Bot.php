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

    public function setPosition(Position $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getPosition(): Position
    {
        return $this->position;
    }

    public function setDirection(Direction $direction): self
    {
        $this->direction = $direction;

        return $this;
    }

    public function getDirection(): Direction
    {
        return $this->direction;
    }

    public function getRawCommand(): string
    {
        return $this->rawCommand;
    }

    public function executeCommand(): array
    {
        $commands = $this->commandParser->parseCommand($this->rawCommand);
        foreach ($commands as $command) {
            $command->execute($this);
        }

        return [
            'position' => $this->position->toArray(),
            'direction' => $this->direction
        ];
    }
}
