<?php
namespace Bot;

use Bot\Command\StringCommandParser;
use Bot\Command\TurnCommand;
use Bot\Command\WalkCommand;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Bot\Bot
 */
class BotTest extends TestCase
{
    /**
     * @covers ::executeCommand
     */
    public function test_executeCommand_executes_subcommands_and_returns_end_position_and_direction()
    {
        $rawCommand = 'RW10LW3R';
        $parsedSubcommands = [
            new TurnCommand(TurnCommand::RIGHT),
            new WalkCommand(10),
            new TurnCommand(TurnCommand::LEFT),
            new WalkCommand(3),
            new TurnCommand(TurnCommand::RIGHT),
        ];

        $commandParserProphecy = $this->prophesize(StringCommandParser::class);
        $commandParserProphecy
            ->parseCommand($rawCommand)
            ->shouldBeCalled()
            ->willReturn($parsedSubcommands);

        $commandParser = $commandParserProphecy->reveal();

        $expectedEndData = [
            'position' => (new Position(10, -3))->toArray(),
            'direction' => (string) (new Direction(Direction::EAST))
        ];

        $bot = new Bot(new Position(), new Direction(), $rawCommand, $commandParser);
        $endData = $bot->executeCommand();

        $this->assertEquals($expectedEndData, $endData);
    }
}
