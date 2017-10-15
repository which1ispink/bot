<?php
namespace Bot\Command;

/**
 * Class RawCommandParser
 */
class RawCommandParser implements StringCommandParser
{
    /**
     * @inheritdoc
     */
    public function parseCommand(string $command): array
    {
        $commands = [
            new TurnCommand(TurnCommand::RIGHT),
            new WalkCommand(15),
            new TurnCommand(TurnCommand::RIGHT),
            new WalkCommand(3),
            new TurnCommand(TurnCommand::LEFT),
            new WalkCommand(2),
        ];

        $chars = str_split($command);
        foreach ($chars as $char) {}

        return $commands;
    }
}
