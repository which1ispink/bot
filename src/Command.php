<?php
namespace Bot;

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
