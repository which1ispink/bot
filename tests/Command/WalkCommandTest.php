<?php
namespace Bot\Command;

use Bot\Bot;
use Bot\Direction;
use Bot\Position;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Command\WalkCommand
 */
class WalkCommandTest extends TestCase
{
    /**
     * @covers ::execute
     */
    public function test_execute_with_bot_pointing_north()
    {
        $bot = $this->getBotMock(Direction::NORTH, 0, -10);
        $walkCommand = new WalkCommand(10);
        $walkCommand->execute($bot);
    }

    /**
     * @covers ::execute
     */
    public function test_execute_with_bot_pointing_east()
    {
        $bot = $this->getBotMock(Direction::EAST, 10, 0);
        $walkCommand = new WalkCommand(10);
        $walkCommand->execute($bot);
    }

    /**
     * @covers ::execute
     */
    public function test_execute_with_bot_pointing_south()
    {
        $bot = $this->getBotMock(Direction::SOUTH, 0, 10);
        $walkCommand = new WalkCommand(10);
        $walkCommand->execute($bot);
    }

    /**
     * @covers ::execute
     */
    public function test_execute_with_bot_pointing_west()
    {
        $bot = $this->getBotMock(Direction::WEST, -10, 0);
        $walkCommand = new WalkCommand(10);
        $walkCommand->execute($bot);
    }

    /**
     * Helper method to create a Bot mock
     *
     * @param string $initialDirection
     * @param int $newX
     * @param int $newY
     * @return object
     */
    private function getBotMock(string $initialDirection, int $newX, int $newY)
    {
        $botProphecy = $this->prophesize(Bot::class);
        $botProphecy
            ->getDirection()
            ->shouldBeCalled()
            ->willReturn(new Direction($initialDirection));

        $botProphecy
            ->getPosition()
            ->shouldBeCalled()
            ->willReturn(new Position());

        $botProphecy
            ->setPosition(new Position($newX, $newY))
            ->shouldBeCalled();

        return $botProphecy->reveal();
    }
}
