<?php
namespace Bot;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Bot\Position
 */
class PositionTest extends TestCase
{
    /**
     * @covers ::changePosition
     */
    public function test_can_change_both_x_and_y()
    {
        $position = new Position();
        $position->changePosition(4, 6);

        $this->assertEquals(4, $position->getX());
        $this->assertEquals(6, $position->getY());
    }

    /**
     * @covers ::moveX
     */
    public function test_can_move_x_without_affecting_y()
    {
        $position = new Position();
        $position->moveX(3);

        $this->assertEquals(3, $position->getX());
        $this->assertEquals(0, $position->getY());
    }

    /**
     * @covers ::moveY
     */
    public function test_can_move_y_without_affecting_x()
    {
        $position = new Position();
        $position->moveY(3);

        $this->assertEquals(0, $position->getX());
        $this->assertEquals(3, $position->getY());
    }

    /**
     * @covers ::toArray
     */
    public function test_can_turn_into_array()
    {
        $position = new Position(3, 3);
        $array = $position->toArray();
        $expected = [
            'x' => $position->getX(),
            'y' => $position->getY()
        ];

        $this->assertEquals($expected, $array);
    }

    /**
     * @covers ::__toString
     */
    public function test_can_be_cast_to_string()
    {
        $position = new Position(3, 2);

        $this->assertEquals('3, 2', $position);
    }
}
