<?php
namespace Bot\Command;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Command\RawCommandParser
 */
class RawCommandParserTest extends TestCase
{
    /**
     * @covers ::parseCommand
     */
    public function test_can_correctly_parse_valid_command()
    {
        $rawCommandParser = new RawCommandParser();
        $subcommands = $rawCommandParser->parseCommand('RW15LW3L');
        $expected = [
            new TurnCommand(TurnCommand::RIGHT),
            new WalkCommand(15),
            new TurnCommand(TurnCommand::LEFT),
            new WalkCommand(3),
            new TurnCommand(TurnCommand::LEFT),
        ];

        $this->assertEquals($expected, $subcommands);
    }

    /**
     * @covers ::parseCommand
     */
    public function test_ignores_invalid_characters_in_command()
    {
        $rawCommandParser = new RawCommandParser();
        $subcommands = $rawCommandParser->parseCommand('RSLW3EL');
        $expected = [
            new TurnCommand(TurnCommand::RIGHT),
            new TurnCommand(TurnCommand::LEFT),
            new WalkCommand(3),
            new TurnCommand(TurnCommand::LEFT),
        ];

        $this->assertEquals($expected, $subcommands);
    }

    /**
     * @covers ::parseCommand
     */
    public function test_completely_invalid_command_results_in_no_subcommands()
    {
        $rawCommandParser = new RawCommandParser();
        $subcommands = $rawCommandParser->parseCommand('hsd32wk3dj3');

        $this->assertCount(0, $subcommands);
    }
}
