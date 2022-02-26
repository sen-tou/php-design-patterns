<?php

namespace Stvbyr\PhpDesignPatterns\Strategy;

class ReminderService
{
    private Reminder $reminder;

    public function __construct(Reminder $reminder)
    {
        $this->reminder = $reminder;
    }

    public function sendNotifications(): void
    {
        $notifications = $this->reminder->getHandledNotifications();

        foreach ($notifications as $notification) {
            echo $notification->getMessage().PHP_EOL;
        }
    }
}
