<?php

namespace Stvbyr\PhpDesignPatterns\Strategy;

class AllReminder implements Reminder
{
    /** @param Notification[] $notifications */
    private array $notifications;

    public function __construct(array $notifications)
    {
        $this->notifications = $notifications;
    }

    public function getHandledNotifications(): array
    {
        return $this->notifications;
    }
}
