<?php
namespace Bot;

/**
 * Class CommandParserImpl
 */
class CommandParserImpl implements CommandParser
{
    /**
     * @inheritdoc
     */
    public function parseRawCommand(string $command): array
    {
        $commands = [];

        $chars = str_split($command);
        foreach ($chars as $char) {
            
        }

        return $commands;
    }
}
