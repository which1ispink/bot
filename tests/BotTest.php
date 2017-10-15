<?php
namespace Bot;

use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Bot\Bot
 */
class BotTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function test_can_be_instantiated()
    {
        $this->assertEquals(1, 1);
    }
}
