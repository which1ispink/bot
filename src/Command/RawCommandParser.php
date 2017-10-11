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
        $commands = [];

        $chars = str_split($command);
        foreach ($chars as $char) {
            
        }

        return $commands;
    }
}
