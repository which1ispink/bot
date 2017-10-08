<?php
namespace Bot;

/**
 * Class BotImpl
 */
class BotImpl implements Bot
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
     * @var CommandParser
     */
    private $commandParser;

    /**
     * BotImpl constructor
     *
     * @param Position $initialPosition
     * @param Direction $initialDirection
     * @param string $rawCommand
     * @param CommandParser $commandParser
     */
    public function __construct(
        Position $initialPosition,
        Direction $initialDirection,
        string $rawCommand,
        CommandParser $commandParser
    ) {
        $this->position = $initialPosition;
        $this->direction = $initialDirection;
        $this->rawCommand = $rawCommand;
        $this->commandParser = $commandParser;
    }

    /**
     * @inheritdoc
     */
    public function executeCommand(): array
    {
        $commands = $this->commandParser->parseRawCommand($this->rawCommand);
        foreach ($commands as $command) {
            $command->execute($this);
        }

        return [
            'position' => $this->position->toArray(),
            'direction' => $this->direction
        ];
    }

    /**
     * @inheritdoc
     */
    public function getPosition(): Position
    {
        return $this->position;
    }

    /**
     * @inheritdoc
     */
    public function changeDirection(string $direction): self
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * @inheritdoc
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
}
