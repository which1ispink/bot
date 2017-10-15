<?php
namespace Bot\Command;

/**
 * Class RawCommandParser
 */
class RawCommandParser implements StringCommandParser
{
    /**
     * @var string
     */
    const COMMAND_REGEX = "/R|L|(W\d+)/";

    /**
     * @inheritdoc
     */
    public function parseCommand(string $command): array
    {
        $subcommands = [];

        $patternMatches = [];
        preg_match_all(self::COMMAND_REGEX, $command, $patternMatches);
        foreach ($patternMatches[0] as $match) {
            if (in_array($match, [TurnCommand::RIGHT, TurnCommand::LEFT])) {
                $subcommands[] = new TurnCommand($match);
            } elseif (strpos($match, 'W') !== false) {
                $distance = str_replace('W', '', $match);
                $subcommands[] = new WalkCommand($distance);
            }
        }

        return $subcommands;
    }
}
