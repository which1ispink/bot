<?php
namespace Bot\Command;

use Bot\Bot;
use Bot\Direction;

/**
 * Class WalkCommand
 */
class WalkCommand implements Command
{
    /**
     * @var int
     */
    private $distance;

    /**
     * WalkCommand constructor
     *
     * @param int $distance
     */
    public function __construct(int $distance)
    {
        $this->distance = $distance;
    }

    public function execute(Bot $bot)
    {
        $currentBotDirection = (string) $bot->getDirection();
        $currentBotPosition = $bot->getPosition();
        switch ($currentBotDirection) {
            case Direction::NORTH:
                $bot->setPosition($currentBotPosition->moveY(-$this->distance));
                break;
            case Direction::EAST:
                $bot->setPosition($currentBotPosition->moveX($this->distance));
                break;
            case Direction::SOUTH:
                $bot->setPosition($currentBotPosition->moveY($this->distance));
                break;
            case Direction::WEST:
                $bot->setPosition($currentBotPosition->moveX(-$this->distance));
                break;
            default:
                throw new \InvalidArgumentException(
                    sprintf('The current bot direction "%s" is invalid.', $currentBotDirection)
                );
        }
    }
}
