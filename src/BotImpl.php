<?php
namespace Bot;

use Bot\Command\Command;

class BotImpl implements Bot
{
    /**
     * @var Position
     */
    private $position;

    /**
     * @var string
     */
    private $direction;

    /**
     * @var Command[]
     */
    private $commands;

    /**
     * Bot constructor
     *
     * @param Position $initialPosition
     * @param string $initialDirection
     * @param Command[] $commands
     */
    public function __construct(Position $initialPosition, string $initialDirection, array $commands)
    {
        $this->position = $initialPosition;
        $this->direction = $initialDirection;
        $this->commands = $commands;
    }

    /**
     * @return Position
     */
    public function getPosition(): Position
    {
        return $this->position;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }

    /**
     * @return Command[]
     */
    public function getCommands(): array
    {
        return $this->commands;
    }

    /**
     * @inheritdoc
     */
    public function executeCommands(): array
    {
        foreach ($this->commands as $command) {
            $this->executeCommand($command);
        }

        return [
            'position'  => $this->position,
            'direction' => $this->direction
        ];
    }

    /**
     * @param Command $command
     */
    private function executeCommand(Command $command)
    {
        $command->execute($this);
    }
}
