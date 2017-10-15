<?php
namespace Bot;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Bot\Direction
 */
class DirectionTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function test_gets_instaniated_with_valid_argument()
    {
        $direction = new Direction(Direction::WEST);

        $this->assertInstanceOf(Direction::class, $direction);
    }

    /**
     * @covers ::__construct
     * @expectedException \InvalidArgumentException
     */
    public function test_throws_exception_if_instantiated_with_invalid_argument()
    {
        $direction = new Direction('invalid argument');
    }

    /**
     * @covers ::createFromClockwiseDirection
     */
    public function test_createFromClockwiseDirection_creates_new_instance_from_clockwise_direction()
    {
        $direction = new Direction(Direction::NORTH);
        $newDirection = $direction->createFromClockwiseDirection();

        $this->assertEquals(Direction::EAST, (string) $newDirection);
    }

    /**
     * @covers ::createFromCounterClockwiseDirection
     */
    public function test_createFromCounterClockwiseDirection_creates_new_instance_from_counter_clockwise_direction()
    {
        $direction = new Direction(Direction::NORTH);
        $newDirection = $direction->createFromCounterClockwiseDirection();

        $this->assertEquals(Direction::WEST, (string) $newDirection);
    }

    /**
     * @covers ::__toString
     */
    public function test_can_be_cast_to_string()
    {
        $direction = new Direction(Direction::NORTH);

        $this->assertEquals(Direction::NORTH, $direction);
    }
}
