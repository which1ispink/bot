<?php
namespace Bot;

/**
 * Class Position
 */
class Position
{
    /**
     * @var int
     */
    private $x;

    /**
     * @var int
     */
    private $y;

    /**
     * Position constructor
     *
     * @param int $x
     * @param int $y
     */
    public function __construct(int $x = 0, int $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @param int $x
     * @param int $y
     * @return static
     */
    public function changePosition(int $x, int $y): self
    {
        $this->x = $x;
        $this->y = $y;

        return $this;
    }

    /**
     * @param int $distance
     * @return static
     */
    public function moveX(int $distance): self
    {
        $this->x += $distance;

        return $this;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @param int $distance
     * @return static
     */
    public function moveY(int $distance): self
    {
        $this->y += $distance;

        return $this;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'x' => $this->x,
            'y' => $this->y
        ];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->x . ', ' . $this->y;
    }
}
