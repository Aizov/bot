<?php

namespace App\Telegram;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
/**
 * Class HelpCommand.
 */
class HelpCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'test';

    /**
     * @var string Command Description
     */
    protected $description = 'Тестовая команда';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        $commands = $this->telegram->getCommands();

        $text = '';
        foreach ($commands as $name => $handler) {
            $text .= sprintf('/%s - %s'.PHP_EOL, $name, $handler->getDescription());
        }

        $this->replyWithMessage(compact('text'));
    }
}
