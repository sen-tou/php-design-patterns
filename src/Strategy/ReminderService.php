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
        $this->reminder->sendNotifications();
    }
}
