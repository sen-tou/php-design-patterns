<?php

namespace Stvbyr\PhpDesignPatterns\Strategy;

class NoReminder implements Reminder
{
    public function getHandledNotifications(): array
    {
        return [];
    }
}
