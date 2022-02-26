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

    public function getHandledNotifications(): array
    {
        return array_values(array_filter($this->notifications, function (Notification $notification) {
            return in_array(
                $notification->getType(),
                [new Type(Type::BREAKING), new Type(Type::EMERGENCY)]
            );
        }));
    }
}
