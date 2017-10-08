<?php
namespace Bot\Command;

use Bot\Bot;

/**
 * Interface Command
 */
interface Command
{
    /**
     * Execute the command on a particular bot
     *
     * @param Bot $bot
     */
    public function execute(Bot $bot);
}
