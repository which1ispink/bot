<?php
namespace Bot;

/**
 * Class TurnCommand
 */
class TurnCommand implements Command
{
    /**
     * @var string
     */
    private $turningDirection;

    /**
     * @var string
     */
    const RIGHT = 'R';

    /**
     * @var string
     */
    const LEFT = 'L';

    /**
     * TurnCommand constructor
     *
     * @param string $turningDirection
     */
    public function __construct(string $turningDirection)
    {
        if (! in_array($turningDirection, [self::RIGHT, self::LEFT])) {
            throw new \InvalidArgumentException(
                sprintf('Invalid turning direction given: %s.', $turningDirection)
            );
        }

        $this->turningDirection = $turningDirection;
    }

    public function execute(Bot $bot)
    {
        if ($this->turningDirection == self::LEFT) {
            $bot->changeDirection()
        }
    }
}
