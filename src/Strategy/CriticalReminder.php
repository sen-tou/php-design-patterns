<?php

namespace Stvbyr\PhpDesignPatterns\Strategy;

class CriticalReminder implements Reminder
{
    /** @param Notification[] $notifications */
    private array $notifications;

    public function __construct(array $notifications)
    {
        $this->notifications = $notifications;
    }

    public function sendNotifications(): void
    {
        $filtered = array_filter($this->notifications, function (Notification $notification) {
            return in_array(
                $notification->getType(),
                [new Type(Type::BREAKING), new Type(Type::EMERGENCY)]
            );
        });

        foreach ($filtered as $notification) {
            echo $notification->getMessage().PHP_EOL;
        }
    }
}
