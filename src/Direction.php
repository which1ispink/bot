<?php
namespace Bot;

/**
 * Class Direction
 */
class Direction
{
    /**
     * @var string
     */
    private $direction;

    /**
     * @var string
     */
    const NORTH = 'north';

    /**
     * @var string
     */
    const EAST = 'east';

    /**
     * @var string
     */
    const SOUTH = 'south';

    /**
     * @var string
     */
    const WEST = 'west';

    /**
     * @var array
     */
    const DIRECTIONS = [
        self::NORTH,
        self::EAST,
        self::SOUTH,
        self::WEST,
    ];

    /**
     * Direction constructor
     *
     * @param string $direction
     */
    public function __construct(string $direction)
    {
        if (! in_array($direction, self::DIRECTIONS)) {
            throw new \InvalidArgumentException(
                sprintf('Direction %s is invalid.', $direction)
            );
        }

        $this->direction = $direction;
    }

    /**
     * Returns an instance from the clockwise direction of the current direction
     *
     * @return string
     */
    public function createFromClockwiseDirection()
    {
        $currentDirectionKey = $this->getCurrentDirectionKey();
        if ($currentDirectionKey == (count(self::DIRECTIONS) - 1)) {
            $clockWiseDirectionKey = 0;
        } else {
            $clockWiseDirectionKey = $currentDirectionKey + 1;
        }

        return new self(self::DIRECTIONS[$clockWiseDirectionKey]);
    }

    /**
     * Returns an instance from the counter-clockwise direction of the current direction
     *
     * @return string
     */
    public function createFromCounterClockwiseDirection()
    {
        $currentDirectionKey = $this->getCurrentDirectionKey();
        if ($currentDirectionKey == 0) {
            $counterClockwiseDirectionKey = count(self::DIRECTIONS) - 1;
        } else {
            $counterClockwiseDirectionKey = $currentDirectionKey - 1;
        }

        return new self(self::DIRECTIONS[$counterClockwiseDirectionKey]);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->direction;
    }

    /**
     * @return int
     */
    private function getCurrentDirectionKey()
    {
        return array_search($this->direction, self::DIRECTIONS);
    }
}
