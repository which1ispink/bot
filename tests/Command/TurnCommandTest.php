<?php
namespace Bot\Command;

use Bot\Bot;
use Bot\Direction;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Command\TurnCommand
 */
class TurnCommandTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function test_gets_instaniated_with_valid_argument()
    {
        $turnCommand = new TurnCommand(TurnCommand::LEFT);

        $this->assertInstanceOf(TurnCommand::class, $turnCommand);
    }

    /**
     * @covers ::__construct
     * @expectedException \InvalidArgumentException
     */
    public function test_throws_exception_if_instantiated_with_invalid_argument()
    {
        $turnCommand = new TurnCommand('invalid argument');
    }

    /**
     * @covers ::execute
     */
    public function test_execute_executes_turn_right_command_on_given_bot()
    {
        $botProphecy = $this->prophesize(Bot::class);
        $botProphecy
            ->setDirection(new Direction(Direction::EAST))
            ->shouldBeCalled()
            ->willReturn($this->prophesize(Bot::class)->reveal());

        $botProphecy
            ->getDirection()
            ->shouldBeCalled()
            ->willReturn(new Direction(Direction::NORTH));

        $bot = $botProphecy->reveal();

        $turnCommand = new TurnCommand(TurnCommand::RIGHT);
        $turnCommand->execute($bot);
    }

    /**
     * @covers ::execute
     */
    public function test_execute_executes_turn_left_command_on_given_bot()
    {
        $botProphecy = $this->prophesize(Bot::class);
        $botProphecy
            ->setDirection(new Direction(Direction::WEST))
            ->shouldBeCalled()
            ->willReturn($this->prophesize(Bot::class)->reveal());

        $botProphecy
            ->getDirection()
            ->shouldBeCalled()
            ->willReturn(new Direction(Direction::NORTH));

        $bot = $botProphecy->reveal();

        $turnCommand = new TurnCommand(TurnCommand::LEFT);
        $turnCommand->execute($bot);
    }
}
