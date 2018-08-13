<?php

namespace App\Telegram;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;
use \App\User;
use Telegram\Bot\Laravel\Facades\Telegram;
/**
 * Class HelpCommand.
 */
class TestCommand extends Command
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
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        $this->replyWithMessage('Devil');
    }
}
